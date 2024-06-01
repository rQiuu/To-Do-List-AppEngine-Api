<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $data = array(
        "email" => $email,
        "password" => $password
    );

    $url = 'https://backend-dot-e-03-417104.uc.r.appspot.com/users/login';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode == 200) {
        $response_data = json_decode($response, true);
        $token = $response_data['token'];
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;
?>
        <script>
            var token = "<?php echo $token; ?>";
            alert("You have logged in successfully! Your token is: " + token);
            location.href = "list.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Incorrect Username or Password!");
            location.href = 'login.php';
        </script>
<?php
    }
}
?>