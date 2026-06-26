<?php
session_start();
include "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";
    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<link rel="stylesheet" href="style.css">

<h1>Edit Student</h1>

<form method="POST">
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    <input type="text" name="course" value="<?php echo $row['course']; ?>" required><br><br>

    <button name="update">Update Student</button>
</form>

<br>
<a href="index.php">Back</a>