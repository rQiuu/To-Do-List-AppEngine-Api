<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname . " " . $lname;
    $email = $_POST['email'];
    $phone = $_POST['phno'];
    $password = $_POST['pass'];

    $data = array(
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "password" => $password
    );

    $url = 'https://backend-dot-e-03-417104.uc.r.appspot.com/users/register';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpcode == 200) {
?>
        <script>
            alert("You have successfully signed up!");
            location.href = "login.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("An error occurred. Try again later!");
            location.href = "signup.php";
        </script>
<?php
    }
}
?>