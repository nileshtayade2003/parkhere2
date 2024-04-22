<?php
session_start();
include "../db.php";
extract($_POST);

$payment_id = $razorpay_payment_id;
$user_id=$_SESSION['user']['user_id'];




// generating ticket_id using phpqrcode and store the image in QR-codes folder
// variables: $ticket_id contains id and $file contains path
// generating 8 digit random ticket_id using php
$n = 8;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}
$ticket_id = getName($n);

// Include the qrlib file
include 'phpqrcode/qrlib.php';

// $path variable store the location where to
// store image and $file creates directory name
// of the QR code file by using 'uniqid'
// uniqid creates unique id based on microtime
$path = '../QR-codes/';
$file = $path . $ticket_id . ".png";

// $ecc stores error correction capability('L')
$ecc = 'L';
$pixel_Size = 10;
$frame_size = 10;

// Generates QR Code and Stores it in directory given
QRcode::png($ticket_id, $file, $ecc, $pixel_Size, $frame_size);

// Displaying the stored QR code from directory
// echo "<center><img src='".$file."'></center>"; 

$q = "insert into bookings 
(user_id,parking_date,booking_time,start_time,end_time,slot_id,parking_cost,payment_mode,payment_id,ticket_id,qr_image)
values
('$user_id','$parking_date',NOW(),'$start_time','$end_time','$slot_id','$parking_cost','$payment_mode','$payment_id','$ticket_id','$file')";

$result = mysqli_query($conn, $q);




// if booked successfully
if ($result) {
    $q1 = "update slots set is_occupied = 1 where slot_id='$slot_id'";
    $result1 = mysqli_query($conn, $q1); // corrected variable name
    if ($result1) {
        echo '<script> 
                alert("Slot Booked"); 
                window.location.href="book-parking-slot.php";
              </script>';
    } else {
        echo '<script> 
                alert("Something Went Wrong With Booking"); 
                window.location.href="book-parking-slot.php";
              </script>';
    }
} else {
    echo '<script> 
                alert("Something Went Wrong With Booking"); 
                window.location.href="book-parking-slot.php";
         </script>';
}
?>
