<?php
include "header.php";

$user_id=$_SESSION['user']['user_id'];
$q="select bookings.*,slots.name from bookings natural join slots where user_id='$user_id'";
$result=mysqli_query($conn,$q);

?>
    <main>
        <h2>Your Bookings</h2>
        <table-container>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Parking Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Slot Name</th>
                            <th>Booking Time</th>
                            <th>Parking Cost</th>
                            <th>Download Ticket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your booking details here -->
                        <?php

                            while($row=mysqli_fetch_array($result)){
                                echo "<tr>";
                                echo "<td>".$row['parking_date']."</td>";


                                //convert 24 hour to 12 hour and display it
                                $start_time=date("g:i A",strtotime($row["start_time"]));
                                $end_time=date("g:i A",strtotime($row["end_time"]));
                                echo "<td>".$start_time."</td>";
                                echo "<td>".$end_time."</td>";
                                
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['booking_time']."</td>";
                                echo "<td>RS.".$row['parking_cost'].".00</td>";
                                echo '<td class="download-button"><a href="download-ticket.php?booking_id='.$row['booking_id'].'">Download</a></td>';
                                echo "</tr>";
                            }
                        ?>
                        <!-- <tr>
                            <td>2024-01-30</td>
                            <td>15:00</td>
                            <td>17:00</td>
                            <td>Slot A</td>
                            <td>2024-01-30 14:30</td>
                            <td>Rs. 20.00</td>
                            <td class="download-button"><a href="download-ticket.php">Download</a></td>
                        </tr> -->
                        <!-- Add more rows as needed -->
                    </tbody>
                 </table>
            </div>
        </table-container>
    </main>
<?php
include "footer.php";
?>