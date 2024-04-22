<?php
session_start();
include "../db.php";

// check valid user or not
if(!isset($_SESSION["tc"])) {
    $_SESSION['msg']='Your not valid user, Please login to continue..';
    echo "<script>
             window.location.href='../tclogin.php';
        </script>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Checker - Parking Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id='logo'>
            <img src="../images/logo.png" alt="">
            <h2>Park Here</h2>
        </div>
        <nav>
        <a href="tc-home.php">Home</a>
        <a href="check-parking-ticket.php">Check Parking Ticket</a>
        <a href="parking-logs.php">Parking Logs</a>
        <a href="../logout.php">Logout</a>
        </nav>
        <div id="hamburger-icon">&#9776;</div>
        <div id="mobile-nav">
            <a href="tc-home.php">Home</a>
            <a href="check-parking-ticket.php">Check Parking Ticket</a>
            <a href="parking-logs.php">Parking Logs</a>
            <a href="../logout.php">Logout</a>
        </div>
    </header>
    