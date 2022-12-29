<?php
    include_once 'includes/db.php';

    if(isset($_POST['submit'])){

        
        $name=mysqli_real_escape_string($con,$_POST["name"]);
        $email=mysqli_real_escape_string($con,$_POST["email"]);
        $phone=mysqli_real_escape_string($con,$_POST["phone"]);
        $msg=mysqli_real_escape_string($con,$_POST["message"]);

        $query = "INSERT INTO contact (name, email, phone, query) VALUES (?,?,?,?)";
        
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $msg);
        mysqli_stmt_execute($stmt);

        ?>
        <script>
            alert("Your query has been registered! Our team will contact you soon...");
            location.href="index.php";
        </script>

        <?php
        
    }

?>

