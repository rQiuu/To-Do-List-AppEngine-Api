<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/signup.css" rel="stylesheet">
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
                    <div class="col-lg-6" id="signup-img">
                        <img src="images/back-img2.jpg" class="img-fluid" id="login-img" alt="background">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="font-weight-bold py-3">Sign Up</h1>
                        <h4>Create a new account</h4>
                        <form action="signup-submit.php" method="POST">
                            <table class="table-container">
                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-lg-8 table-item">
                                                <input type="text" name="fname" class="form-control my-3 p-2" placeholder="First Name">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-lg-8  table-item">
                                                <input type="text" name="lname" class="form-control my-3 p-2" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-lg-8  table-item">
                                                <input type="email" name="email" class="form-control my-3 p-2" placeholder="Email">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-lg-8  table-item">
                                                <input type="text" name="phno" class="form-control my-3 p-2" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </td>
                                </tr>



                                <tr>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-lg-8  table-item">
                                                <input type="password" id="password" name="pass" class="form-control my-3 p-2" placeholder="Create Password">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-row">
                                            <div class="col-lg-8  table-item">
                                                <input type="password" id="confirm_password" class="form-control my-3 p-2" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="form-row">
                                <div class="col-lg-8  table-item">
                                    <button type="submit" name="submit" class="btn1 mt-3 mb-3">Create Account</button>
                                </div>
                            </div>
                        </form>
                        <p>Already have an account?<a href="login.php">Login</a></p>
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
<script src="js/pass_check.js"></script>

</html>