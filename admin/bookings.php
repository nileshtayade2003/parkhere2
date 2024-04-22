<?php
include "header.php";

$q = "select bookings.*, slots.name from bookings natural join slots";
$result = mysqli_query($conn, $q);

?>
<main>
    <h2>Booking Details</h2>
    <div>
        <label for="search">Search:</label>
        <input type="text" id="search" onkeyup="searchTable()" placeholder="Enter search term...">
    </div>
    <table-container>
        <div class="table-wrapper">
            <table id="booking-table">
                <thead>
                    <tr>
                        <th>Parking Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Slot Name</th>
                        <th>Booking Time</th>
                        <th>Parking Cost</th>
                        <th>Parking Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['parking_date'] . "</td>";

                        //converting 24 hour time to 12 hour and display it
                        $start_time = date("g:i A", strtotime($row["start_time"]));
                        $end_time = date("g:i A", strtotime($row["end_time"]));
                        echo "<td>" . $start_time . "</td>";
                        echo "<td>" . $end_time . "</td>";
                        echo "<td>" . $row['name'] . "</td>";


                        echo "<td>" . $row['booking_time'] . "</td>";
                        echo "<td>" . $row['parking_cost'] . "</td>";

                        if ($row["parking_status"] == 1) {
                            echo "<td> Yes </td>";
                        } else {
                            echo "<td>No</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </table-container>
</main>

<script>
    function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("booking-table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // break the inner loop, no need to check further
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }
</script>

<?php
include "footer.php";
?>
