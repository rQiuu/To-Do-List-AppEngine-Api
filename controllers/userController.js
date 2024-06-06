const User = require("../models/user");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");

const SECRET_KEY = "your_secret_key";

exports.findAll = function (req, res) {
	User.findAll(function (err, user) {
		console.log("controller");
		if (err) res.send(err);
		console.log("res", user);
		res.send(user);
	});
};

exports.getUserData = function (req, res) {
	User.findById(req.user.id, function (err, user) {
		if (err) res.send(err);
		res.json({
			error: false,
			message: "User data retrieved successfully!",
			data: user
		});
	});
};


exports.create = function (req, res) {
	const new_user = new User(req.body);
	if (req.body.constructor === Object && Object.keys(req.body).length === 0) {
		res.status(400).send({
			error: true,
			message: "Please provide all required fields",
		});
	} else {
		bcrypt.hash(new_user.password, 10, function (err, hash) {
			if (err) res.send(err);
			new_user.password = hash;
			User.create(new_user, function (err, user) {
				if (err) res.send(err);
				res.json({
					error: false,
					message: "User added successfully!",
					data: user,
				});
			});
		});
	}
};

exports.findById = function (req, res) {
	User.findById(req.params.id, function (err, user) {
		if (err) res.send(err);
		res.json(user);
	});
};

exports.update = function (req, res) {
	if (req.body.constructor === Object && Object.keys(req.body).length === 0) {
		res.status(400).send({
			error: true,
			message: "Please provide all required fields",
		});
	} else {
		const updated_user = new User(req.body);
		if (updated_user.password) {
			bcrypt.hash(updated_user.password, 10, function (err, hash) {
				if (err) res.send(err);
				updated_user.password = hash;
				User.update(req.params.id, updated_user, function (err, user) {
					if (err) res.send(err);
					res.json({
						error: false,
						message: "User updated successfully!",
					});
				});
			});
		} else {
			User.update(req.params.id, updated_user, function (err, user) {
				if (err) res.send(err);
				res.json({
					error: false,
					message: "User updated successfully!",
				});
			});
		}
	}
};

exports.delete = function (req, res) {
	User.delete(req.params.id, function (err, user) {
		if (err) res.send(err);
		res.json({
			error: false,
			message: "User deleted successfully!",
		});
	});
};

exports.register = function (req, res) {
	const new_user = new User(req.body);
	if (req.body.constructor === Object && Object.keys(req.body).length === 0) {
		res.status(400).send({
			error: true,
			message: "Please provide all required fields",
		});
	} else {
		User.findByEmail(new_user.email, function (err, user) {
			if (err) res.send(err);
			if (user) {
				res.status(400).send({
					error: true,
					message: "Email already exists, please use a different email.",
				});
			} else {
				bcrypt.hash(new_user.password, 10, function (err, hash) {
					if (err) res.send(err);
					new_user.password = hash;
					User.create(new_user, function (err, user) {
						if (err) res.send(err);
						res.json({
							error: false,
							message: "User registered successfully!",
							data: user,
						});
					});
				});
			}
		});
	}
};


exports.login = function (req, res) {
	const { email, password } = req.body;
	User.findByEmail(email, function (err, user) {
		if (err) res.send(err);
		if (!user) {
			res.status(401).send({
				error: true,
				message: "Authentication failed. User not found.",
			});
		} else {
			bcrypt.compare(password, user.password, function (err, isMatch) {
				if (isMatch && !err) {
					const token = jwt.sign({ id: user.id, email: user.email }, SECRET_KEY, {
						expiresIn: "1h",
					});
					res.json({
						error: false,
						message: "Authentication successful!",
						token: token,
					});
				} else {
					res.status(401).send({
						error: true,
						message: "Authentication failed. Wrong password.",
					});
				}
			});
		}
	});
};
