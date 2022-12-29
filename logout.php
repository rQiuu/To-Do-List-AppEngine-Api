<?php

include_once ('includes/db.php');

if(isset($_SESSION['email'])){
    session_destroy();
}
header('location: index.php');
?>
