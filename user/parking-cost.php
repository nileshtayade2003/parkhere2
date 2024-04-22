<?php
include "header.php";

// selecting parking cost from parking_cost table
$q="select * from parking_cost";
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_array($result);

?>
    <main >
        <h2 >Slot Booking Cost</h2>
        <div class="cost-card">
            <img src="clock.png" alt="Clock Logo">
            <h3>Ticket Cost per Hour</h3>
            <p>Rs. <?php echo $row['rate'] ?>.00</p>
        </div>
    </main>
<?php
include "footer.php";
?>