<?php
session_start();

if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_SESSION['token'];
    $email = $_SESSION['email'];

    $taskData = [
        'email' => $email,
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'date_added' => $_POST['date_added'],
        'deadline' => $_POST['deadline'],
        'category' => $_POST['category'],
        'status' => $_POST['status']
    ];

    $url = 'https://backend-dot-e-03-417104.uc.r.appspot.com/tasks';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($taskData));

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode == 200) {
        header('Location: list.php');
    } else {
        echo 'Failed to add task';
    }
} else {
    header('Location: list.php');
}
