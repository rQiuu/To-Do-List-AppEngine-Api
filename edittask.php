<?php

include_once 'includes/db.php';




    if (isset($_POST['edit-submit'])) {

        $title = mysqli_real_escape_string($con, $_POST['edit-title']);
        $desc = mysqli_real_escape_string($con, $_POST['edit-desc']);
        $ddline = mysqli_real_escape_string($con, $_POST['edit-ddline']);
        $ctgry = mysqli_real_escape_string($con, $_POST['edit-ctgry']);
        $id = mysqli_real_escape_string($con, $_POST['editID']);
        $date_added = mysqli_real_escape_string($con, $_POST['date_added']);


        $query = "UPDATE user_tasks SET title='$title', description='$desc', deadline='$ddline', category='$ctgry', date_added='$date_added' WHERE id='$id'";
        $res = mysqli_query($con, $query);

        echo($id);

        ?>
        <script>
            location.href='list.php';
        </script>


<?php
    }
