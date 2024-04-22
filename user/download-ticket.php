<?php
include "header.php";

$booking_id=$_GET['booking_id'];
$q="select * from bookings where booking_id='$booking_id'";
$result=mysqli_query($conn,$q);
$row=mysqli_fetch_array($result);
?>
    <main>
        <h2>Booking Ticket</h2>
        <div class="ticket-container" id="ticket_container">
            <div class="ticket-details">
                <p style="color: #007BFF; font-weight: bold;">Parking Ticket</p>
                <p>Date: <?php echo $row['parking_date']; ?></p>

                <!-- convert start time from 24 to 12 and display it -->
                <?php
                   $start_time=date ('g:i A',strtotime($row['start_time']));
                   $end_time=date ('g:i A',strtotime($row['end_time']));
                ?>
                <p>Time: <?php echo $start_time; ?> - <?php echo $end_time; ?></p>

                <?php
                     $slot_id=$row['slot_id'] ;
                     $q1= "select name from slots where slot_id='$slot_id'";
                     $result1=mysqli_query($conn,$q1);
                     $row1=mysqli_fetch_array($result1);
                ?>

                <p>Location: <?php echo $row1['name'] ?></p>
                <p>Cost: Rs. <?php echo $row['parking_cost']; ?>.00</p>
            </div>
            <div class="qr-code">
                <!-- Add your QR code here or placeholder content -->
                <img src="<?php echo $row['qr_image']; ?>" alt="QR code here">
            </div>
        </div>

        

        
        <!-- code for saving ticket as png -->
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script> <!--html to canvas library including -->


        <div class="download-button" onclick="saveAsImage()">
            <a href="#" >Download Ticket</a>
        </div>

        <script>
            function saveAsImage() {
            html2canvas(document.getElementById('ticket_container')).then(function(canvas) {
                var link = document.createElement('a');
                link.href = canvas.toDataURL('image/png');
                link.download = 'div_image.png';
                link.click();
            });
            }
        </script>
    </main>
<?php
include "footer.php";
?>