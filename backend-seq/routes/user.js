const express = require('express')
const UserController = require('../controller/UserController')
const router = express.Router()

router.post("/auth", UserController.Auth)
router.put("/save", UserController.saveUserData)

module.exports  = router