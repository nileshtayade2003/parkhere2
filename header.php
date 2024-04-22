<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Management System</title>
    
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div id='logo'>
            <img src="images/logo.png" alt="">
            <h2>Park Here</h2>
        </div>
        <nav>
        <a href="index.php">Home</a>
        <a href="admin-login.php">Administrator</a>
        <a href="tclogin.php">Ticket Checker</a>
        <a href="userlogin.php">Users</a>
        </nav>
        <div id="hamburger-icon">&#9776;</div>
        <div id="mobile-nav">
            <a href="index.php">Home</a>
            <a href="admin-login.php">Administrator</a>
            <a href="tclogin.php">Ticket Checker</a>
            <a href="userlogin.php">Users</a>
        </div>
    </header>
    
