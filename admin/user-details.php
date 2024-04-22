<?php
include "header.php";

// Select all data from users table to display
$q = "SELECT * FROM users";
$result = mysqli_query($conn, $q);

?>
<main>
    <h2>User Details</h2>
    <div>
        <label for="search">Search:</label>
        <input type="text" id="search" onkeyup="searchTable()" placeholder="Enter search term...">
    </div>
    <table-container>
        <div class="table-wrapper">
            <table id="user-details-table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Phone No</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Displaying user Details from database -->
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
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
        table = document.getElementById("user-details-table");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
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
