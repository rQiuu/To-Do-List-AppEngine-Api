<?php
session_start(); // Memulai sesi

if (isset($_SESSION['email'])) { 
    session_destroy(); 
    unset($_SESSION['email']); 
    unset($_SESSION['token']); 
}
header('Location: index.php'); 
exit(); 
