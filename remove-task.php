<?php
include_once 'includes/db.php';
if (isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $task_id = $_GET['id'];
        $upd = "UPDATE user_tasks SET status='Completed'WHERE id='$task_id'";
        mysqli_query($con, $upd);

?>
        <script>
            location.href = "list.php";
        </script>
<?php
    }
}
?>