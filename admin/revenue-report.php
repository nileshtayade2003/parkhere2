<?php
include "header.php";

// Check if date filters are applied
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// Construct the SQL query
$q = "SELECT bookings.*, slots.name FROM bookings 
      NATURAL JOIN slots";

// Add date filtering if provided
if (!empty($start_date) && !empty($end_date)) {
    $q .= " WHERE parking_date BETWEEN '$start_date' AND '$end_date'";
}

$result = mysqli_query($conn, $q);

// Calculate total revenue and total number of bookings
$total_revenue = 0;
$total_bookings = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result)) {
    $total_revenue += $row['parking_cost'];
}
?>


<style>
    .summary-container {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .summary-item {
        text-align: center;
    }

    .summary-label {
        font-weight: bold;
    }

    .summary-value {
        font-size: 1.2em;
    }
</style>
<!-- form styling -->
<style>
    .revenue-form {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .revenue-form label,
    .revenue-form input,
    .revenue-form button {
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .revenue-form {
            flex-direction: column;
        }

        .revenue-form label,
        .revenue-form input,
        .revenue-form button {
            margin-bottom: 15px;
            width: 100%;
        }
    }
</style>

<main>

    <h2>Revenue Report</h2>
    <div class="filter-section">
        <form method="GET" class='revenue-form'>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="<?= $start_date ?>">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="<?= $end_date ?>">
            <button type="submit">Apply Filter</button>
        </form>
    </div>
    <div class="summary-container">
        <div class="summary-item">
            <span class="summary-label">Total Revenue:</span>
            <span class="summary-value">Rs. <?= number_format($total_revenue, 2) ?></span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Total Bookings:</span>
            <span class="summary-value"><?= $total_bookings ?></span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Start Date:</span>
            <span class="summary-value"><?= $start_date ?></span>
        </div>
        <div class="summary-item">
            <span class="summary-label">End Date:</span>
            <span class="summary-value"><?= $end_date ?></span>
        </div>
    </div>
    <div class="table-wrapper">
        <!-- Table code remains the same -->
    </div>

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
                // Reset result pointer
                mysqli_data_seek($result, 0);
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
  

</main>

<?php
include "footer.php";
?>