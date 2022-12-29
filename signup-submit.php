<?php

include_once 'includes/db.php';

if (isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $name = $fname . " " . $lname;
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phno']);
    $password = md5(mysqli_real_escape_string($con, $_POST['pass']));


    $sql = "SELECT email FROM users WHERE email='$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 0) {
        $query = "INSERT INTO users (name,email,phone,password) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $password);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if ($affected_rows == 1) {
?>
            <script>
                alert("You have successfully signed up !");
                location.href = "list.php";
            </script>
        <?php
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        } else {
        ?>
            <script>
                alert("An error occurred. Try again later !");
                location.href = "index.php";
            </script>
        <?php
            echo mysqli_error($con);
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    } else {
        ?>
        <script>
            alert("User already exists");
            location.href = "signup.php";
        </script>
<?php
    }
}

?>