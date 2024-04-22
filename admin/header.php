<?php
session_start();
include "../db.php";
// check valid user or not
if(!isset($_SESSION["admin"])) {
    $_SESSION['msg']='You are not valid user, Please login to continue...';
    echo "<script>
             window.location.href='../admin-login.php';
        </script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator- Parking Management System</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id='logo'>
            <img src="../images/logo.png" alt="">
            <h2>Park Here</h2>
        </div>
        <nav>
        <a href="admin-home.php">Home</a>
        <a href="user-details.php">User Details</a>
        <a href="parking-cost.php">Parking Cost</a>
        <a href="bookings.php">Bookings</a>
        <a href="parking-logs.php">Parking Logs</a>
        <a href="revenue-report.php">Report Generation</a>
        <a href="../logout.php">Logout</a>
        </nav>
        <div id="hamburger-icon">&#9776;</div>
        <div id="mobile-nav">
            <a href="admin-home.php">Home</a>
            <a href="user-details.php">User Details</a>
            <a href="parking-cost.php">Parking Cost</a>
            <a href="bookings.php">Bookings</a>
            <a href="parking-logs.php">Parking Logs</a>
            <a href="revenue-report.php">Report Generation</a>
            <a href="../logout.php">Logout</a>
        </div>

    </header>
    