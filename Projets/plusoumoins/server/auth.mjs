import fs from 'node:fs/promises'
import express from 'express'
const Router = express.Router

import jwt from 'jsonwebtoken'

import cookieParser from 'cookie-parser'
import {expressjwt as jwtMiddleware} from 'express-jwt'

const getTokenFromCookie = cookieKey => req => {
    const token = req.cookies && req.cookies[cookieKey]
    if(token){
        return token
    }

    return null
}

const getCredentialsFromRequest = req => {
    if(req.headers.authorization){
        const b64auth = (req.headers.authorization || '').split(' ')[1] || ''
        const [email, password] = Buffer.from(b64auth, 'base64').toString().split(':')
        return {
            email,
            password
        }
    } else if(req.body.email && req.body.password){
        return {
            email: req.body.email,
            password: req.body.password
        }
    } else {
        return null
    }
}

export const authMiddleware = settings => Router()
    .use(cookieParser())
    .post('/auth/login', (req, res) => {

        const credentials = getCredentialsFromRequest(req)
        if(!credentials){
            return res.status(401)
                .json({
                    error: 'Failed to authenticate : Missing credentials'
                })
        }

        const {
            email,
            password
        } = credentials
    
        fs.readFile(settings.database)
            .then(content => JSON.parse(content))
            .then(data => {
                const user = data.users.find(user => user.email === email)
                const {
                    password: userPwd,
                    ...userWithoutPwd
                } = user

                if(user && userPwd === password){
                    return {
                        token: jwt.sign({
                            user: userWithoutPwd,
                            exp: Math.floor(Date.now() / 1000) + (60 * 60),
                            iat: Date.now()
                        }, settings.jwt.secret),
                        userWithoutPwd
                    }
                    
                } else {
                    throw new Error('Mismatching credentials')
                }
            })
            .then(({token, user}) => {
                res.cookie(settings.jwt.cookieKey, token)
                res.json({
                    msg: 'success',
                    user
                })
            })
            .catch(() => {
                res.status(401)
                    .json({
                        error: 'Failed to authenticate : Mismatching credentials'
                    })
            })
    })

    .use(jwtMiddleware({
        secret: settings.jwt.secret,
        algorithms: [settings.jwt.algorithm],
        credentialsRequired: false,
        requestProperty: 'auth',
        getToken: getTokenFromCookie(settings.jwt.cookieKey)
    }))

    .use((err, req, res, next) => {
        if(err && err.name === 'UnauthorizedError'){
            return next()
        }

        next(err)
    })
    
    .get('/auth/me', (req, res) => {
        if(!req.auth){
            return res.status(401)
                .json({
                    msg: 'Unauthorized'
                })
        }
        fs.readFile(settings.database)
            .then(content => JSON.parse(content))
            .then(data => {
                const user = data.users.find(user => user.email === req.auth.user.email)
                return res.json(user)
            })
    })
    
    .post('/auth/logout', (req, res) => {
        res.cookie(settings.jwt.cookieKey, '')
        res.json({
            msg: 'success'
        })
    })


export const protect = (req, res, next) => {
    next()
}
