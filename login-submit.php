<?php

include_once 'includes/db.php';

if(isset($_POST['submit'])){

    $email=mysqli_real_escape_string($con, $_POST["email"]);
    $pass=md5(mysqli_real_escape_string($con, $_POST["pass"]));


    $sql = "SELECT id, email, password FROM users WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)==0){
        ?>
            <script>
                alert("Incorrect Username or Password!!");
                location.href='login.php';
            </script>
        <?php
    }

    else{
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $_SESSION["email"]=$row["email"];
        $_SESSION["pass"]=$row["password"];
        $_SESSION['uid']=$row["id"];
        

        ?>
            <script>
                alert("You have logged in successfully!!");
                location.href = "list.php"; 
            </script>
            <?php
    }

}

?>