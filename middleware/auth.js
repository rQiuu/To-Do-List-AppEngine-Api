const jwt = require("jsonwebtoken");
const SECRET_KEY = "your_secret_key";

const authenticateJWT = (req, res, next) => {
  const authHeader = req.headers.authorization;

  if (!authHeader) {
    return res.status(403).send({
      error: true,
      message: "No token provided.",
    });
  }

  const token = authHeader.split(' ')[1];

  jwt.verify(token, SECRET_KEY, (err, decoded) => {
    if (err) {
      return res.status(401).send({
        error: true,
        message: "Failed to authenticate token.",
      });
    }

    req.user = decoded; // Store user information in request object
    next();
  });
};

module.exports = authenticateJWT;
