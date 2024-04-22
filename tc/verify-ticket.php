<?php
include "header.php";
$ticket_id=$_POST['ticket_id'];

// vefifying ticket in the bookings table if it is valid booking or not
$verify_ticket="select * from bookings where ticket_id='$ticket_id'";
$result=mysqli_query($conn,$verify_ticket);

//if ticket id present in bookings then
if(mysqli_num_rows($result)==1){
    $q="select * from parking_logs where ticket_id ='$ticket_id'";
    $result1=mysqli_query($conn,$q);

    if(mysqli_num_rows($result1)== 1){
        $row1=mysqli_fetch_array($result1);

        //NOTE:-  check-out: 0 , used:1
        
        if($row1["status"]== 0){
            //for check out set value of status to 1
            $q2= "update parking_logs set status=1 where ticket_id='$ticket_id'";
            $result3=mysqli_query($conn,$q2);
            echo "
            <script> 
            alert('Check Out Successfull.'); 
            window.location.href='check-parking-ticket.php';
            </script>
            ";
        }
        else
        {
            //for used ticket
            echo "
            <script> 
            alert('Ticket Already Used Or Expired'); 
            window.location.href='check-parking-ticket.php';
            </script>
            ";
        }
    }
    
    //if ticket is verified in bookings
    echo"
    <script> 
        alert('Ticket Verified For Check In.'); 
    </script>
    ";
}
else{
    echo "<script>
    alert('invalid ticket!');
    window.location.href = 'check-parking-ticket.php';
    </script>";
}
?>

<main>
    <h2 class="heading">Please Fill the Vehicle Number</h2>
    <form action="add-parking-log.php" method="post">
        <input type="hidden" name='ticket_id' value="<?php echo $ticket_id; ?>" >
        <label for="vehicleNumber">Vehicle Number:</label>
        <input type="text" id="vehicleNumber" name="vehicle_number" required>

        <button type="submit" name='submit'>Submit</button>
    </form>
</main>

<?php
include "footer.php";
?>