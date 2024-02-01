import formidable from 'formidable'

export const uploadMiddleware = settings => (req, res, next) => {
    const ct = req.get('content-type')
    if(!ct || !ct.startsWith('multipart/form-data')){
        return next()
    }

    const form = formidable({
        uploadDir: settings.uploadDir,
        keepExtensions: true,
        maxFiles: 1
    })

    form.parse(req, (err, fields, files) => {
        req.body = req.body || {}
        for(const [key, values] of Object.entries(fields)){
            req.body[key] = values[0]
        }
        for(const fileField of Object.keys(files)){
            req.body[
                fileField+'Url'
            ] = settings.baseUrl + files[fileField][0].newFilename
        }

        next(err)
    })
}
