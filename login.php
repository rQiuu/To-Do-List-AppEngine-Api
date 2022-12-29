<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet">
    <link rel="shortcut icon" href="icons/head.png" type="image/x-icon">

</head>

<body>

    <div class="header">
        <?php
        include_once 'includes/header.php'
        ?>
    </div>

    <div class="body">

        <section id="login-form">
            <div class="container" id="login-content">
                <div class="row no-gutters">
                    <div class="col-lg-6" id="img-login">
                        <img src="images/back-img.jpg" class="img-fluid" id="login-img" alt="background">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="font-weight-bold py-3">Login</h1>
                        <h4>Login to your account</h4>
                        <br>
                     
                        <form action="login-submit.php" method="POST">
                            <div class="form-row">
                                <div class="col-lg-10">
                                    <input type="email" name="email" class="form-control my-3 p-3" placeholder="example@something.com">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-10">
                                    <input type="password" name="pass" class="form-control my-3 p-3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-10">
                                    <button type="submit" name="submit" class="btn1 mt-3 mb-3">Login</button>
                                </div>
                            </div>
                            <a href="#">Forgot Password?</a>
                            <p>Don't have an account?<a href="signup.php"> Register here</a></p>
                        </form>
                    
                    </div>

                </div>
            </div>
        </section>
    </div>



</body>
<?php
include_once 'includes/footer.php'
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>