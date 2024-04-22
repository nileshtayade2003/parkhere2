<?php
include "../db.php";
extract($_POST); //create variables $ticket_id and $vehicle_number

$q="SELECT   `bookings`.*, `users`.`name` 
    FROM  `bookings` , `users`
    where bookings.user_id=users.user_id AND
 		  ticket_id='$ticket_id'";

$result=mysqli_query($conn,$q);
$row=mysqli_fetch_array($result);
extract($row);

// print_r($row);

// echo $ticket_id; echo "<br>";
// echo $vehicle_number; echo "<br>";
// echo $row['name']; echo "<br>";
// echo $row['slot_name']; echo "<br>";


// setting detfault timezone in india
date_default_timezone_set('Asia/Kolkata');
// echo date("Y-m-d H:i:s", time());;

$q1= "insert into parking_logs
     (ticket_id,vehicle_number,user_name,slot_id,timestamp)
     values
     ('$ticket_id','$vehicle_number','$name','$slot_id',NOW())";
$result1=mysqli_query($conn,$q1);
if($result1){

    // setting parking status to 1 means yes
    $q2="update bookings set parking_status=1 where ticket_id='$ticket_id'";
    $result2=mysqli_query($conn,$q2);

    echo "<script>
          alert('log added');
          window.location.href='check-parking-ticket.php';
          </script>";
}
else{
    echo "<script>
          alert('something went wrong.');
          window.location.href='check-parking-ticket.php';
          </script>";
}
?>