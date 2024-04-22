<?php
session_start();
include "../db.php";
if(!isset($_SESSION["user"]))
{
    $_SESSION['msg']='You are not valid user, Please Login to Continue';
    echo "<script>
                 window.location.href='../userlogin.php';
            </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Parking Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id='logo'>
            <img src="../images/logo.png" alt="">
            <h2>Park Here</h2>
        </div>
        <nav>
        <a href="user-home.php">Home</a>
        <a href="parking-cost.php">Parking Cost</a>
        <a href="book-parking-slot.php">Book Parking Slot</a>
        <a href="your-bookings.php">Your Bookings</a>
        <a href="../logout.php">Logout</a>
        </nav>
        <div id="hamburger-icon">&#9776;</div>
        <div id="mobile-nav">
            <a href="user-home.php">Home</a>
            <a href="parking-cost.php">Parking Cost</a>
            <a href="book-parking-slot.php">Book Parking Slot</a>
            <a href="your-bookings.php">Your Bookings</a>
            <a href="../logout.php">Logout</a>
        </div>
    </header>
    