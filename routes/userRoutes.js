const express = require("express");
const router = express.Router();
const userController = require("../controllers/userController");
const authenticateJWT = require("../middleware/auth");

router.get("/", authenticateJWT, userController.getUserData);

router.post("/", userController.create);
router.get("/:id", authenticateJWT, userController.findById);
router.put("/:id", authenticateJWT, userController.update);
router.delete("/:id", authenticateJWT, userController.delete);

router.post("/login", userController.login);
router.post("/register", userController.register);

module.exports = router;
