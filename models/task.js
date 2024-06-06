var dbConn = require("../db");

var Task = function (task) {
	this.email = task.email;
	this.title = task.title;
	this.description = task.description;
	this.date_added = task.date_added;
	this.deadline = task.deadline;
	this.category = task.category;
	this.status = task.status;
};

Task.create = function (newTask, result) {
	dbConn.query(
		"INSERT INTO user_tasks (email, title, description, date_added, deadline, category, status) VALUES (?, ?, ?, ?, ?, ?, ?)",
		[newTask.email, newTask.title, newTask.description, newTask.date_added, newTask.deadline, newTask.category, newTask.status],
		function (err, res) {
			if (err) {
				console.log("error: ", err);
				result(err, null);
			} else {
				console.log(res.insertId);
				result(null, res.insertId);
			}
		}
	);
};

Task.findAll = function (email, result) {
	dbConn.query("SELECT * FROM user_tasks WHERE email = ?", [email], function (err, res) {
		if (err) {
			console.log("error: ", err);
			result(null, err);
		} else {
			console.log("Tasks: ", res);
			result(null, res);
		}
	});
};

Task.findById = function (id, email, result) {
	dbConn.query("SELECT * FROM user_tasks WHERE id = ? AND email = ?", [id, email], function (err, res) {
		if (err) {
			console.log("error: ", err);
			result(err, null);
		} else {
			console.log("Task: ", res);
			result(null, res);
		}
	});
};

Task.update = function (id, task, email, result) {
	dbConn.query(
		"UPDATE user_tasks SET email=?, title=?, description=?, date_added=?, deadline=?, category=?, status=? WHERE id = ? AND email = ?",
		[task.email, task.title, task.description, task.date_added, task.deadline, task.category, task.status, id, email],
		function (err, res) {
			if (err) {
				console.log("error: ", err);
				result(null, err);
			} else {
				if (res.affectedRows == 0) {
					result({ error: "No task found with the given id and email" }, null);
				} else {
					result(null, res);
				}
			}
		}
	);
};

Task.delete = function (id, email, result) {
	dbConn.query("DELETE FROM user_tasks WHERE id = ? AND email = ?", [id, email], function (err, res) {
		if (err) {
			console.log("error: ", err);
			result(null, err);
		} else {
			result(null, res);
		}
	});
};

module.exports = Task;
