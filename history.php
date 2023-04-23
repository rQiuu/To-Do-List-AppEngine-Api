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
    <title>History | To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/history.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="shortcut icon" href="icons/head.png" type="image/x-icon">
</head>

<body>

    <div class="header">
        <?php
        include_once 'includes/header.php'
        ?>
    </div>



    <div class="wrapper">
        <div class="task-item1 features">
            <h3>Your History of To-Dos...</h3>
            <h5>See what was completed and what you missed....</h5>
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

            <?php

            if (!isset($_SESSION['email'])) {
            ?>

                <script>
                    alert("Please Login first to view your To Do List History");
                    location.href = 'login.php';
                </script>
            <?php
            } else {
                $email = $_SESSION['email'];


                $fetchdata = "SELECT id,name, email, title,description,date_added, deadline,category,status FROM user_tasks WHERE email='$email' AND status='Completed'";

                $result = mysqli_query($con, $fetchdata);
                $now = time();

            ?>

                <table class="history-table">
                    <thead class="history-head">
                        <th class="col-md-1">Task ID</th>
                        <th class="col-md-2">Title</th>
                        <th class="col-md-5">Description</th>
                        <th class="col-md-1">Date Added</th>
                        <th class="col-md-1">Deadline</th>
                        <th class="col-md-1">Category</th>
                        <th class="col-md-1">Action</th>
                    </thead>

                    <tbody class="history-body">


                        <?php


                        if (mysqli_num_rows($result) > 0) {
                            while ($res = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td class="col-md-1"><?php echo $res['id'] ?></td>
                                    <td class="col-md-2"><?php echo $res['title'] ?></td>
                                    <td class="col-md-4"><?php echo $res['description'] ?></td>
                                    <td class="col-md-1"><?php echo $res['date_added'] ?></td>
                                    <td class="col-md-1"><?php echo $res['deadline'] ?></td>
                                    <td class="col-md-1"><?php echo $res['category'] ?></td>
                                     <td class="col-md-1">
                                         <a class="btn btn-dark m-1" type="button" onclick="return confirm('Do you want to restore this task to your list?')" href="restore-task.php?id=<?php echo $res['id'] ?>"><i class="fa fa-recycle"></i></a>
                                         <a class="btn btn-dark m-1" type="button" onclick="return confirm('Do you want to remove this task from history?')" href="del-task.php?id=<?php echo $res['id'] ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php

                            }
                        } else {
                            ?>

                            <tr>
                                <td colspan="7">
                                    <div>
                                        <h5 class="p-2">

                                            You have no history of tasks...
                                        </h5>
                                    </div>
                                    <div>
                                        <img src="images/alltask.png" alt="notasks" class="img-thumbnail border-0 bg-transparent">
                                    </div>
                                </td>
                              
                            </tr>
                    <?php

                        }
                    }
                    ?>
                    </tbody>

                </table>

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