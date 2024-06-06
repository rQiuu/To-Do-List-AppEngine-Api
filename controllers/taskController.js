const Task = require("../models/task");

exports.findAll = function (req, res) {
	Task.findAll(req.user.email, function (err, tasks) {
		if (err) {
			res.send(err);
		} else {
			if (tasks.length === 0) {
				res.json({
					message: "You have no tasks.",
					tasks: []
				});
			} else {
				res.json(tasks);
			}
		}
	});
};

exports.create = function (req, res) {
	const new_task = new Task(req.body);
	new_task.email = req.user.email;

	if (req.body.constructor === Object && Object.keys(req.body).length === 0) {
		res.status(400).send({
			error: true,
			message: "Please provide all required fields",
		});
	} else {
		Task.create(new_task, function (err, task) {
			if (err) res.send(err);
			res.json({
				error: false,
				message: "Task added successfully!",
				data: task,
			});
		});
	}
};

exports.findById = function (req, res) {
	Task.findById(req.params.id, req.user.email, function (err, task) {
		if (err) res.send(err);
		res.json(task);
	});
};

exports.update = function (req, res) {
	if (req.body.constructor === Object && Object.keys(req.body).length === 0) {
		res.status(400).send({
			error: true,
			message: "Please provide all required fields",
		});
	} else {
		const updated_task = new Task(req.body);
		updated_task.email = req.user.email;

		console.log("Updated Task: ", updated_task);  // Tambahkan log untuk melihat data task yang di-update

		Task.update(req.params.id, updated_task, req.user.email, function (err, task) {
			if (err) {
				res.send(err);
			} else {
				console.log("Update result: ", task);  // Tambahkan log untuk melihat hasil update
				res.json({
					error: false,
					message: "Task updated successfully!",
				});
			}
		});
	}
};


exports.delete = function (req, res) {
	Task.delete(req.params.id, req.user.email, function (err, task) {
		if (err) {
			res.send(err);
		} else {
			res.json({
				error: false,
				message: "Task deleted successfully!",
			});
		}
	});
};
