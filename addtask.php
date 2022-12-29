<?php
    include_once 'includes/db.php';

    if(isset($_POST['submit'])){

        
        $title=mysqli_real_escape_string($con,$_POST["title"]);
        $desc=mysqli_real_escape_string($con,$_POST["desc"]);
        $ddline=mysqli_real_escape_string($con,$_POST["ddline"]);
        $ctgry=mysqli_real_escape_string($con,$_POST["ctgry"]);
        $email=$_SESSION['email'];
        $name_query=mysqli_query($con,"SELECT name FROM users WHERE email='$email'");
        $date_added=mysqli_real_escape_string($con,$_POST["date_added"]);
  
        $name_query_data=mysqli_fetch_assoc($name_query);
        $name=$name_query_data['name'];
        $status = mysqli_real_escape_string($con,'Pending');


        $query = "INSERT INTO user_tasks (name, email, title, description, date_added, deadline, category,status) VALUES (?,?,?,?,?,?,?,?)";
        
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssss", $name, $email, $title, $desc,$date_added, $ddline, $ctgry,$status);
        mysqli_stmt_execute($stmt);

        ?>
        <script>
            alert("Task added successfully!!");
            location.href="list.php";
        </script>

        <?php
        
    }

?>

