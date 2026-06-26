<?php
session_start();
include "config.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $username;
            header("Location: index.php");
        } else {
            echo "Wrong Password";
        }
    } else {
        echo "User Not Found";
    }
}
?>

<link rel="stylesheet" href="style.css">

<h1>Login</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="login">Login</button>
</form>

<br>
<a href="register.php">Register</a>