<?php
include "header.php";

$q = "SELECT parking_logs.*, slots.name
    FROM parking_logs
    INNER JOIN slots ON parking_logs.slot_id = slots.slot_id";
$result = mysqli_query($conn, $q);

?>
<main>
    <h2>Parking Logs</h2>
    <div style="text-align:left;">
        <label for="search">Search:</label>
        <input type="text" id="search" onkeyup="searchLogs()" placeholder="Enter search term...">
    </div>
    <table-container>
        <div class="table-wrapper">
            <table id="parking-logs-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ticket ID</th>
                        <th>Vehicle Number</th>
                        <th>Username</th>
                        <th>Slot Name</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['log_id'] . "</td>";
                        echo "<td>" . $row['ticket_id'] . "</td>";
                        echo "<td>" . $row['vehicle_number'] . "</td>";
                        echo "<td>" . $row['user_name'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['timestamp'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </table-container>
</main>

<script>
    function searchLogs() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("parking-logs-table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those that don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // Break the inner loop, no need to check further
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
