<?php
session_start();
include "config.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM students WHERE id=$id");

header("Location: index.php");
?>