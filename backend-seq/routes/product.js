const express = require('express')
const ProductController = require('../controller/ProductController')
const router = express.Router()

router.get("/products", ProductController.ProductSlider)
router.get("/products/:slug", ProductController.ProductDetail)

module.exports  = router