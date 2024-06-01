<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/index.css" rel="stylesheet">
    <link rel="shortcut icon" href="icon/head.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header">
        <?php
        include_once 'includes/header.php'
        ?>
    </div>

    <div class="info-text">
        <h3>Welcome to Your own Personalized To Do List!!!</h3>
        <h5>Join us to organise and manage tasks effectively, and timely...</h5>

    </div>

    <div class="table-container d-flex flex-wrap justify-content-around" id="front">

        <div class="signup">

            <div class="table-item">
                <img src="images/todolistfront.png" alt="intro-img" width="500px">
            </div>

            <div class="intro-info">
                <h5>A platform to organize your work....</h5>
                <h5>Create a work schedule, make yourself more efficient....</h5>
                <h5>New Here?</h5>
                <button class="btn btn-warning btn1"><a href="signup.php" style="text-decoration: none; color:black">Create an Account</a></button>
            </div>
        </div>


        <div class="login">
            <div class="table-item">
                <img src="images/intro-img2.png" alt="intro-img" width="400px">
            </div>

            <div class="intro-info">
                <h5>Get back from where you left....</h5>
                <h5>Don't lose focus. Stay organized everytime...</h5>
                <h5>Already have an account?</h5>
                <button class="btn btn-danger btn1" style="width:100px "><a href="login.php" style="text-decoration: none; color:black">Login</a></button>
            </div>
        </div>
    </div>

    <hr>

    <table class="intro-features" id="aboutus">
        <tr>
            <td>
                <div class="portal">
                    <h2 class="p-2">About The Portal</h2>
                    <img src="icon/head.png" class="about_img" alt="icon_aboutweb" width="144px">
                    <p class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptatum distinctio in ipsum, sed possimus quas nostrum quos veniam nobis laborum enim repellendus iste et consequatur soluta fuga illum! Nihil, assumenda autem amet distinctio minima iste facere et facilis animi velit ad adipisci, odit architecto sunt, maxime tempora delectus culpa?</p>
                </div>
            </td>
            <td>
                <div class="author">

                    <h2 class="p-2">About The Author</h2>
                    <img src="icon/img-auth.png" class="about_img" alt="icon_aboutweb" width="144px">
                    <p class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptatum distinctio in ipsum, sed possimus quas nostrum quos veniam nobis laborum enim repellendus iste et consequatur soluta fuga illum! Nihil, assumenda autem amet distinctio minima iste facere et facilis animi velit ad adipisci, odit architecto sunt, maxime tempora delectus culpa?</p>

                </div>
            </td>
        </tr>
    </table>
    <hr>
</body>

<?php
include_once 'includes/footer.php'
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/index.js"></script>

</html>