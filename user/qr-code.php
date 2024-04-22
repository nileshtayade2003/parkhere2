<?php 

// genrerating 8 digit random ticket_id using php
$n=8;
function getName($n) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';

	for ($i = 0; $i < $n; $i++) {
		$index = rand(0, strlen($characters) - 1);
		$randomString .= $characters[$index];
	}

	return $randomString;
}
$ticket_id= getName($n);


// Include the qrlib file 
include 'phpqrcode/qrlib.php'; 


// $path variable store the location where to 
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = '../QR-codes/'; 
$file = $path.$ticket_id.".png"; 

// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 10; 
$frame_size = 10; 

// Generates QR Code and Stores it in directory given 
QRcode::png($ticket_id, $file, $ecc, $pixel_Size, $frame_size); 

// Displaying the stored QR code from directory 
// echo "<center><img src='".$file."'></center>"; 
?> 
