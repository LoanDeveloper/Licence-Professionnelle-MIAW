import path from 'node:path'

import express from 'express'
const Router = express.Router

import debug from 'debug'

import jsonServer from 'json-server'
import { authMiddleware } from './auth.mjs'

import { uploadMiddleware } from './upload.mjs'

const settings = {
    port: process.env.PORT || 8080,
    database: path.join('db', 'db.json'),
    loggerName: 'lpmiaw-react-hackathon',
    jwt: {
        secret: '123456789',
        algorithm: 'HS256',
        // Valid one day
        lifetime: 60 * 60 * 24,
        cookieKey: 'lpmiaw-react-auth-token'
    },
    upload: {
        uploadDir: path.resolve(
            './public/uploads'
        ),
        baseUrl: '/uploads/'
    }
}

debug.enable(settings.loggerName)
const logger = debug(settings.loggerName)


const jsonServerRouter = jsonServer.router(settings.database)
const middlewares = jsonServer.defaults()

const app = express()

const apiRouter = Router()
    .use(authMiddleware(settings))
    .use(uploadMiddleware(settings.upload))
    .use(jsonServerRouter)

app
    // Set default middlewares (logger, static, cors and no-cache)
    .use(middlewares)
    .use(jsonServer.bodyParser)
    .use('/api', apiRouter)


app.listen(settings.port, () => {
    logger('Listening on port ' + settings.port)
})
