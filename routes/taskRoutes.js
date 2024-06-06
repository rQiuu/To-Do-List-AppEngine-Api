const express = require("express");
const router = express.Router();
const taskController = require("../controllers/taskController");
const authenticateJWT = require("../middleware/auth");

router.get("/", authenticateJWT, taskController.findAll);
router.post("/", authenticateJWT, taskController.create);
router.get("/:id", authenticateJWT, taskController.findById);
router.put("/:id", authenticateJWT, taskController.update);
router.delete("/:id", authenticateJWT, taskController.delete);

module.exports = router;
