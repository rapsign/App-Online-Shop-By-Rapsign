const express = require('express')
const router = express.Router()
const productRouter = require('./product');
const userRouter = require('./user')

router.use(productRouter)
router.use(userRouter)

module.exports  = router