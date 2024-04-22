<?php
include "header.php";

extract($_POST);
$q="select * from parking_cost";
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_array($result);

?>
    <main>
        <h2>Slot Booking</h2>
        <form class="book-slot-form" action="../Payments/razorpay-php/Razorpay.php" method="post">
            <div class="booking-info">
                <div>Date: <?php echo $parking_date ?></div>
                <div>Start Time: <?php echo $start_time ?></div>
                <div>Parking Hours: <?php echo $hours ?></div>
                <div>Parking Cost: Rs. <?php echo $hours*$row['rate'] ?></div>
            </div>

            <!-- passing inputs  -->
            <input type="hidden" name='parking_date' value='<?php echo $parking_date ?>'>
            <input type="hidden" name='start_time' value='<?php echo $start_time ?>'>

            <?php
                // Calculate end time
                $end_time = date('H:i', strtotime($start_time . ' + ' . $hours . ' hours'));
            ?>
            <input type="hidden" name='end_time' value='<?php echo $end_time ?>'>

            <input type="hidden" name='parking_cost' value=' <?php echo $hours*$row['rate'] ?>'>
          
           <!-- ***** show options of slots -->
            <div class="seat-selection">
                <label>Select your slot:</label>
                <?php  
                    $q= "select * 
                         from slots 
                         where slot_id not in
                            (
                                select slots.slot_id
                                from bookings,slots
                                where (bookings.slot_id=slots.slot_id) and
                                      ('$parking_date'=bookings.parking_date) and
                                      (
                                        ('$start_time' between start_time and end_time)or
                                        ('$end_time' between start_time and end_time)
                                       )
                            )
                        ";
                    $result=mysqli_query($conn,$q);
                ?>
                <select name="slot_id" id="slot_id">
                    <?php
                          while($row=mysqli_fetch_array($result))
                          {
                            echo "<option value=".$row['slot_id'].">".$row['name']."</option>";
                          }
                    ?>
                </select>
                
            </div>

            <div class="payment-mode">
                <label for="paymentMode">Select Payment Mode:</label>
                <select id="paymentMode" name="payment_mode" required>
                    <option value="creditCard">Credit Card</option>
                    <option value="debitCard">Debit Card</option>
                    <option value="netBanking">Net Banking</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="book-button">
                <button type="submit" name='submit'>Pay Now</button>
            </div>
        </form>
    </main>

<?php
include "footer.php";
?>
