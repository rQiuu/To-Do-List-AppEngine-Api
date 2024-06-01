<?php
session_start();

if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit();
}

$token = $_SESSION['token'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/list.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="shortcut icon" href="icon/head.png" type="image/x-icon">
    <style>
        .card {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="header">
        <?php include_once 'includes/header.php'; ?>
    </div>
    <div class="wrapper">
        <div class="task-item1 features">
            <h3>Create and customise your To-Do list...</h3>
            <h5>Be more efficient, more timely and more punctual...</h5>
        </div>
        <div class="today_info">
            <h3>Today</h3>
            <p id="today_date"></p>
            <div class="time">
                <div class="btn-group today_time">
                    <button class="btn btn-secondary text-white bg-dark btn1" id="today_hrs"></button>
                    <button class="btn btn-secondary text-white bg-dark btn1" disabled>:</button>
                    <button class="btn btn-secondary text-white bg-dark btn1" id="today_min"></button>
                    <button class="btn btn-secondary text-white bg-dark btn1" disabled>:</button>
                    <button class="btn btn-secondary text-white bg-dark btn1" id="today_sec"></button>
                    <button class="btn btn-secondary text-white bg-dark btn1" id="today_ampm" disabled></button>
                </div>
            </div>
        </div>
        <div class="grid-container">
            <div class="function-nav">
                <div class="function-nav-item row m-2 text-center addTask">
                    <a href="#" class="text-white p-2 text-decoration-none" data-toggle="modal" data-target="#taskModal" onclick="showCreateModal()">Add Task</a>
                </div>
                <div class="function-nav-item row text-center m-2 ">
                    <div class="sortBy">
                        <div class="dropdown">
                            <a class="text-white text-decoration-none p-2" href="#" onclick="sortByDeadline()">Sort By Deadline</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <h2 class="mb-4">Task List for <?php echo $email; ?></h2>
                <div id="taskList" class="row"></div>
            </div>

            <!-- Task Modal -->
            <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="taskModalLabel">Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="taskForm">
                                <input type="hidden" id="taskId">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date_added">Date Added</label>
                                    <input type="date" class="form-control" id="date_added" required>
                                </div>
                                <div class="form-group">
                                    <label for="deadline">Deadline</label>
                                    <input type="datetime-local" class="form-control" id="deadline" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" required>
                                        <option value="Home">Home</option>
                                        <option value="Work">Work</option>
                                        <option value="Education">Education</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" required>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Restored">Restored</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Task</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                let tasks = [];

                $(document).ready(function() {
                    fetchTasks();

                    $('#taskForm').on('submit', function(e) {
                        e.preventDefault();
                        const id = $('#taskId').val();
                        const taskData = {
                            title: $('#title').val(),
                            description: $('#description').val(),
                            date_added: $('#date_added').val(),
                            deadline: $('#deadline').val(),
                            category: $('#category').val(),
                            status: $('#status').val()
                        };

                        if (id) {
                            updateTask(id, taskData);
                        } else {
                            createTask(taskData);
                        }
                    });
                });

                function fetchTasks() {
                    $.ajax({
                        url: 'https://backend-dot-e-03-417104.uc.r.appspot.com/tasks',
                        method: 'GET',
                        headers: {
                            'Authorization': 'Bearer <?php echo $token; ?>'
                        },
                        success: function(response) {
                            tasks = response;
                            renderTasks(tasks);
                        }
                    });
                }

                function createTask(taskData) {
                    $.ajax({
                        url: 'addtask.php',
                        method: 'POST',
                        data: taskData,
                        success: function(response) {
                            $('#taskModal').modal('hide');
                            fetchTasks();
                        }
                    });
                }

                function updateTask(id, taskData) {
                    taskData.id = id;
                    $.ajax({
                        url: 'edittask.php',
                        method: 'POST',
                        data: taskData,
                        success: function(response) {
                            $('#taskModal').modal('hide');
                            fetchTasks();
                        }
                    });
                }

                function deleteTask(id) {
                    if (confirm('Are you sure you want to delete this task?')) {
                        $.ajax({
                            url: 'remove-task.php',
                            method: 'POST',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                fetchTasks();
                            }
                        });
                    }
                }

                function showCreateModal() {
                    $('#taskModalLabel').text('Add Task');
                    $('#taskId').val('');
                    $('#title').val('');
                    $('#description').val('');
                    $('#date_added').val('');
                    $('#deadline').val('');
                    $('#category').val('Home');
                    $('#status').val('Pending');
                    $('#taskModal').modal('show');
                }

                function showEditModal(id, title, description, date_added, deadline, category, status) {
                    $('#taskModalLabel').text('Edit Task');
                    $('#taskId').val(id);
                    $('#title').val(title);
                    $('#description').val(description);
                    $('#date_added').val(date_added);
                    $('#deadline').val(deadline);
                    $('#category').val(category);
                    $('#status').val(status);
                    $('#taskModal').modal('show');
                }

                function renderTasks(tasks) {
                    let taskList = '';
                    tasks.forEach(task => {
                        taskList += `
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">${task.title}</h5>
                                        <p class="card-text">${task.description}</p>
                                        <p class="card-text"><small class="text-muted">Date Added: ${task.date_added}</small></p>
                                        <p class="card-text"><small class="text-muted">Deadline: ${task.deadline}</small></p>
                                        <p class="card-text"><small class="text-muted">Category: ${task.category}</small></p>
                                        <p class="card-text"><small class="text-muted">Status: ${task.status}</small></p>
                                        <button class="btn btn-info" onclick="showEditModal(${task.id}, '${task.title}', '${task.description}', '${task.date_added}', '${task.deadline}', '${task.category}', '${task.status}')">Edit</button>
                                        <button class="btn btn-danger" onclick="deleteTask(${task.id})">Delete</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    $('#taskList').html(taskList);
                }

                function sortByDeadline() {
                    const sortedTasks = tasks.sort((a, b) => new Date(a.deadline) - new Date(b.deadline));
                    renderTasks(sortedTasks);
                }

                function filterByCategory(category) {
                    if (category === 'None') {
                        renderTasks(tasks);
                    } else {
                        const filteredTasks = tasks.filter(task => task.category === category);
                        renderTasks(filteredTasks);
                    }
                }
            </script>
            <script src="js/list.js"></script>
            <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>

</html>