<?php
include_once 'includes/db.php';
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks | To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/list.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="shortcut icon" href="icons/head.png" type="image/x-icon">
</head>

<body>


    <?php
    if (!isset($_SESSION['email'])) {
    ?>
        <script>
            alert("Please login to view your To-Do List...");
            location.href = 'login.php';
        </script>
    <?php
    } else {
    ?>

        <div class="header">
            <?php
            include_once 'includes/header.php'
            ?>
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

                    <div class="function-nav-item row  m-2 text-center addTask">
                        <a href="" class="text-white p-2 text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalRegisterForm">Add Task</a>
                    </div>

                    <div class="function-nav-item row text-center m-2 ">
                        <div class="sortBy">
                            <div class="dropdown">
                                <a class="text-white text-decoration-none p-2 " href="list.php?action=deadline" type="button">Sort By Deadline</a>
                            </div>
                        </div>
                    </div>


                    <div class="function-nav-item row text-center m-2 ">
                        <div class="sortBy">
                            <div class="dropdown">
                                <a class="text-white text-decoration-none p-2 dropdown-toggle" type="button" id="sortBy" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">Filter By Category</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="list.php">None</a>
                                    <a class="dropdown-item" href="list.php?category=Home">Home</a>
                                    <a class="dropdown-item" href="list.php?category=Education">Education</a>
                                    <a class="dropdown-item" href="list.php?category=Work">Work</a>
                                    <a class="dropdown-item" href="list.php?category=Other">Other</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tasks">

                    <!-- Cards To Display Tasks -->

                    <?php



                    $category = null;
                    $category = $_GET['category'];
                    $action = null;
                    $action = $_GET['action'];
                    $email = $_SESSION['email'];
                    $status = 'Pending';

                    if (isset($category)) {
                        $fetchdata = "SELECT id,name, email, title,description,deadline,category,status FROM user_tasks WHERE email='$email'AND status!='Completed' AND category='$category'";
                    } else if (isset($action)) {
                        $fetchdata = "SELECT id,name, email, title,description,deadline,category,status FROM user_tasks WHERE email='$email' AND status!='Completed' ORDER BY $action ASC";
                    } else {
                        $fetchdata = "SELECT id,name, email, title,description,deadline,category,status FROM user_tasks WHERE email='$email' AND status!='Completed'";
                    }

                    $result = mysqli_query($con, $fetchdata);
                    $now = time();
                    if (mysqli_num_rows($result) > 0) {
                        while ($res = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="m-2">
                                <div class="task-details">
                                    <p class="m-2 category"><i class="fa fa-clipboard-list-check m-1"></i><?php echo $res['category']; ?></p>
                                    <p class="m-2 category">

                                        <i class="fa fa-alarm-clock m-1"></i>


                                        <?php
                                        $future = strtotime($res['deadline']);
                                        $now = time();
                                        $timeleft = $future - $now;
                                        $daysleft = round((($timeleft / 24) / 60) / 60);

                                        if ($daysleft > 1) {
                                            echo '  ' . $daysleft . ' days';
                                        } else if ($daysleft == 1) {
                                            echo '  ' . $daysleft . ' day';
                                        } else if ($daysleft == 0) {
                                            echo '  Today ';
                                        } else {
                                            echo '  Overdue ';
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="task-item">
                                    <h5 class="task-title">

                                        <?php
                                        echo $res['title'] ?>
                                    </h5>
                                    <div class="task-body">
                                        <p class="" id="text-desc"><?php $str = str_replace('\r\n', '<br>', $res['description']);
                                                                    echo $str ?></p>
                                    </div>
                                    <div class="c-foot">

                                        <div class="btn-group btn-group-md mx-2" role="group" aria-label="Small button group">
                                            <button class="btn btn-primary text-white" onclick="toviewModal('<?php echo $res['id'] ?>','<?php echo $res['title'] ?>','<?php echo $res['description'] ?>','<?php echo $res['deadline'] ?>','<?php echo $res['category'] ?>')" data-bs-toggle="modal" data-bs-target="#viewModal">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button class="btn btn-success text-white" onclick="toModal('<?php echo $res['id'] ?>','<?php echo $res['title'] ?>','<?php echo $res['description'] ?>','<?php echo $res['deadline'] ?>','<?php echo $res['category'] ?>')" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger text-white remove-task">
                                                <a class="text-decoration-none text-white" onclick="return confirm('Do you really want to delete this task?');" href="remove-task.php?id=<?php echo $res["id"] ?>" type="button"><i class="fa fa-trash"></i></a>
                                            </button>
                                        </div>
                                        <p class="m-2 category"><i class="fa fa-hourglass m-1"></i><?php echo '  ' . $res['status'] . ' '; ?></p>


                                    </div>

                                </div>

                            </div>

                        <?php
                        }
                    } else {

                        ?>
                        <style>
                            .tasks {
                                text-align: center;
                                grid-template-columns: auto;
                            }



                            .noTaskImg {
                                width: 100%;
                                height: auto;
                                max-height: 75%;
                                max-width: 75%;
                                padding: 20%;
                            }
                        </style>
                        <?php

                        ?>

                        <div class="NoTask">

                            <div class="p-3 bg-light noTaskTitle">


                                <h4>No Pending Tasks....</h4>
                                <p>You are up-to date...</p>
                            </div>
                            <img src="images/task-complete.png" alt="completeTask" class="img-thumbnail border border-0">
                        </div>

                <?php

                    }
                }
                ?>



                </div>
            </div>




            <!-- Modals Used for various functionalities -->

            <!--Modal For Add Task -->

            <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light text-center bg-beige">
                            <h4 class="modal-title w-100 font-weight-bold">Add Task</h4>
                            <button type="button" class="btn btn-rounded close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="addtask.php" method="POST">
                            <div class="modal-body mx-3">


                                <div class="md-form form-floating my-2">
                                    <input type="text" id="addTaskTitle" name="title" class="form-control validate" placeholder="Title: " required>
                                    <label data-bs-error="wrong" data-bs-success="right" for="addTaskTitle">Title : </label>
                                </div>
                                <div class="md-form form-floating my-2">
                                    <textarea type="email" id="addTaskDescription" name="desc" class="form-control validate" placeholder="Description: " required></textarea>
                                    <label data-bs-error="wrong" data-bs-success="right" for="addTaskDescription">Description : </label>
                                </div>

                                <div class="d-flex flex-wrap justify-content-around">

                                    <div class="md-form form-floating my-2">
                                        <input type="datetime-local" id="addTaskDeadline" name="ddline" class="form-control validate " placeholder="Deadline: " required>
                                        <label data-bs-error="wrong" data-bs-success="right" for="addTaskDeadline">Deadline: </label>
                                    </div>

                                    <div class="md-form form-floating my-2">
                                        <select class="form-select" id="floatingSelect" name="ctgry" aria-label="Floating label select example" required>
                                            <option value="Work">Work</option>
                                            <option value="Home">Home</option>
                                            <option value="Education">Education</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <label data-bs-error="wrong" data-bs-success="right" for="floatingSelect">Category: </label>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer bg-light d-flex justify-content-center">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <input type="hidden" value="" id="today" name='date_added'>
                        </form>
                    </div>
                </div>
            </div>

            <!--Modal For Edit Task -->

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center bg-beige">
                            <h4 class="modal-title w-100 font-weight-bold">Edit Task</h4>
                            <button type="button" class="btn btn-rounded close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="edittask.php" method="POST">
                            <div class="modal-body mx-3">


                                <div class="md-form form-floating my-2">
                                    <input type="text" id="editTaskTitle" name="edit-title" class="form-control validate" placeholder="Title: ">
                                    <label data-bs-error="wrong" data-bs-success="right" for="editTaskTitle">Title : </label>
                                </div>
                                <div class="md-form form-floating my-2">
                                    <textarea type="text" id="editTaskDescription" name="edit-desc" class="form-control validate" placeholder="Description: " style="height:100px"></textarea>
                                    <label data-bs-error="wrong" data-bs-success="right" for="editTaskDescription">Description : </label>
                                </div>

                                <div class="d-flex flex-wrap justify-content-around">

                                    <div class="md-form form-floating my-2">
                                        <input type="datetime-local" id="editTaskDeadline" name="edit-ddline" class="form-control validate " placeholder="Deadline: ">
                                        <label data-bs-error="wrong" data-bs-success="right" for="editTaskDeadline">Deadline: </label>
                                    </div>

                                    <div class="md-form form-floating my-2">
                                        <select class="form-select" id="editFloatingSelect" name="edit-ctgry" aria-label="Floating label select example">
                                            <option value="Work">Work</option>
                                            <option value="Home">Home</option>
                                            <option value="Education">Education</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <label data-bs-error="wrong" data-bs-success="right" for="editFloatingSelect">Category: </label>
                                    </div>
                                </div>
                                <input type="hidden" name="editID" id="editID" value="">

                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" name="edit-submit" class="btn btn-primary">Submit</button>
                            </div>
                            <input type="hidden" value="" id="edit_today" name="date_added">
                        </form>
                    </div>
                </div>
            </div>

        </div>


        <!-- Modal For View Task -->

        <div class="modal fade" id="viewModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TaskTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="TaskDescription"></p>
                    </div>
                    <div class="modal-footer">


                        <p class="mx-2 category" id="FloatingSelect"></p>

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer">
            <?php
            include_once 'includes/footer.php'
            ?>
        </div>








</body>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/list.js"></script>
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</html>