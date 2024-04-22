<?php
include "header.php";


?>
    <main>
        <h2>Slot Booking</h2>
        <form action="book-slot.php" method="post">
            <label for="date">Select Date:</label>
            <input type="date" id="date" name="parking_date" required>

            <label for="time">Select Parking Time:</label>
            <select id="time"  name="start_time" required>
                <option value="06:00">06:00</option>
                <option value="07:00">07:00</option>
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
            </select>

            <label for="hours">Enter Parking Hours:</label>
            <select id="hours" name="hours" required>
                <option value="1">1 Hour</option>
                <option value="2">2 Hours</option>
                <option value="3">3 Hours</option>
                <option value="4">4 Hours</option>
                <option value="5">5 Hours</option>
                <option value="6">6 Hours</option>
            </select>

            <button type="submit" name='submit'>Select Slot</button>
        </form>
    </main>
<?php
include "footer.php";
?>