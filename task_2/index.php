<?php
session_start();
include "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<link rel="stylesheet" href="style.css">

<h1>Student Management System</h1>

<p>Welcome, <?php echo $_SESSION['user']; ?></p>

<a href="add_student.php">Add Student</a> |
<a href="logout.php">Logout</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td>
            <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete_student.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>