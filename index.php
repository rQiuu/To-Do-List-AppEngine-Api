<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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




    <div class="faq" id="faq">

        <div class="faq-header">
            <h2>Frequently Asked Questions...</h2>
        </div>

        <div class="faq_ques">




            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                            Why should I use a to-do list?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, quae assumenda? Id eveniet odit animi adipisci voluptate laboriosam iure porro.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            What features do you offer?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. In ipsum unde saepe odit ad rerum ea a numquam optio sint.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Are there any charges for this website?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id corporis odit a molestiae amet nobis magni animi perspiciatis recusandae eaque.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                            Is this website secure?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id corporis odit a molestiae amet nobis magni animi perspiciatis recusandae eaque.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                            How can I view my To-Dos History?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                        <div class="accordion-body">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id corporis odit a molestiae amet nobis magni animi perspiciatis recusandae eaque.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <hr>

    <div class="contact">
        <h2 class="contact-header">Contact Us</h2>

        <section class="contact-us d-flex flex-wrap justify-content-around">

            <div class="contact-address">
                <h3>Reach out to us at..</h3>
                <p>Lower Arithang<br>Near CS Rai Sec. School <br>Gangtok, East Sikkim - 737101 <br>
                    <br> P: +91 97717 29061<br> E-mail : anmolksharma2003@gmail.com<br><br>We are available on : <br> Monday - Friday -- 9:00 AM to 5:00 PM
                </p>
            </div>
            <section class="contact-form">
                <div class="form container ">
                    <form action="contact-submit.php" method="POST">
                        <div class="form-row">
                            <div class="">
                                <p>Name : </p>
                                <input type="text" name="name" class="form-control my-3" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="form-row">
                                <div class="form-inputs" style="margin-right:2%">
                                    <p>Email : </p>
                                    <input type="email" name="email" class="form-control my-3" placeholder="username@domain.com">
                                </div>
                            </div>
                            <div class="form-row" style="margin-left:2%">
                                <div class="form-inputs">
                                    <p>Phone No. : </p>
                                    <input type="text" name="phone" class="form-control my-3" placeholder="Phone No. ">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-inputs">
                                <p>Message : </p>
                                <textarea name="message" class="form-control my-3" placeholder="Describe us your query... "></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" name="submit" class="btn btn1 btn-primary my-2">Submit</button>
                        </div>
                    </form>

                </div>
            </section>

            <div class="social-media">
                <h3>Follow us on...</h3>

                <ul>
                    <li>
                        <a href="https://twitter.com/Anmol2363"><img src="icon/twitter.png" alt="twitter" width="48px">
                            <p>Twitter</p>
                        </a>

                    </li>
                    <li>
                        <a href="https://www.facebook.com/Anmol2363/"><img src="icon/fb.png" alt="facebook" width="48px">
                            <p>Facebook</p>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/aksharma_2363/"><img src="icon/insta.png" alt="insta" width="48px">
                            <p>Instagram</p>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/anmol-kumar-sharma-2706b4228/"><img src="icon/linkedin.png" alt="linkedin" width="48px">
                            <p>LinkedIn</p>
                        </a>
                    </li>
                    <li>
                        <a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCKCFSmjbrLzTmlDQTJVThFDCjdSQjvpxVjCdWXjDPzSsjZvsBwcHLgbKxcWGSbZzdGMWzvB"><img src="icon/gmail.png" alt="linkedin" width="48px">
                            <p>Gmail</p>
                        </a>
                    </li>

                </ul>
            </div>
        </section>

    </div>





</body>

<?php
include_once 'includes/footer.php'
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="js/index.js"></script>

</html>