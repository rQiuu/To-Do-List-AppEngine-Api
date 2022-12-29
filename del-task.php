<?php
include_once 'includes/db.php';
if (isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $task_id = $_GET['id'];
        $del = "DELETE FROM user_tasks WHERE id='$task_id'";
        mysqli_query($con, $del);

?>
        <script>
            location.href = "history.php";
        </script>
<?php
    }
}

?>