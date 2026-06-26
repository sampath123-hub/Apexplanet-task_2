<?php
session_start();
include "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<link rel="stylesheet" href="style.css">

<h1>Add Student</h1>

<form method="POST">
    <input type="text" name="name" placeholder="Student Name" required><br><br>
    <input type="email" name="email" placeholder="Student Email" required><br><br>
    <input type="text" name="course" placeholder="Course" required><br><br>

    <button name="add">Add Student</button>
</form>

<br>
<a href="index.php">Back</a>