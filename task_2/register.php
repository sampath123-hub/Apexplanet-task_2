<?php
include "config.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $sql);

    echo "Registered Successfully";
}
?>

<link rel="stylesheet" href="style.css">

<h1>Register</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="register">Register</button>
</form>

<br>
<a href="login.php">Login</a>