<?php
require 'includes/db.php';
?>

<style>
    nav {
        background-color: lightcyan;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .navbar-brand {
        color: grey;
    }

    .nav-item,
    .navbar-brand {
        transition: transform 0.3s;
    }

    .nav-item:hover,
    .navbar-brand:hover {
        transform: scale(1.05);
        color: darkgray;
    }

    .nav-item .nav-link.active {
        color: grey;
    }

    @media screen and (max-width:860px) {

        .nav-item:hover,
        .navbar-brand:hover {
            transform: scale(1.01);
        }
    }
</style>

<?php
if (isset($_SESSION['email'])) {
?>

    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"> To Do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php"> Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="list.php"> My Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="history.php">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#aboutus"> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#faq"> FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#contactus"> Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<?php
} else {
?>
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"> To Do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#aboutus"> About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#faq"> FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#contactus"> Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php
}


?>