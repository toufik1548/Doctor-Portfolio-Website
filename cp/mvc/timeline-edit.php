<style>
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-title {
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
    }
    .form-group label {
        font-weight: bold;
    }
    .submit-btn {
        background-color: #28a745;
        color: white;
    }
    .submit-btn:hover {
        background-color: #218838;
    }
    .message {
        margin-top: 20px;
    }
</style>

<?php

    $timetable_id = $slug2;

    // Fetch the timetable entry based on the ID
    $fetch_query = "SELECT * FROM doctor_timetable WHERE timetable_id = $timetable_id";
    $result = mysqli_query($con, $fetch_query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='message alert alert-danger'>Timetable entry not found.</div>";
        exit();
    }


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day_of_week = $_POST['day_of_week'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $notes = $_POST['notes'];

    // Update the timetable entry in the database
    $update_query = "UPDATE doctor_timetable SET day_of_week = '$day_of_week', start_time = '$start_time', end_time = '$end_time', notes = '$notes' WHERE timetable_id = $timetable_id";

    if (mysqli_query($con, $update_query)) {
        echo "<div class='message alert alert-success'>Timetable entry updated successfully.</div>";
    } else {
        echo "<div class='message alert alert-danger'>Error updating timetable entry: " . mysqli_error($con) . "</div>";
    }
}

?>

<div class="form-container">
    <h3 class="form-title text-center mb-3">Edit Timetable</h3>
    <form method="post" action="">
        <div class="form-group">
            <label for="day_of_week">Day of Week</label>
            <input type="text" id="day_of_week" name="day_of_week" class="form-control" value="<?php echo $row['day_of_week']; ?>" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="time" id="start_time" name="start_time" class="form-control" value="<?php echo $row['start_time']; ?>" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="time" id="end_time" name="end_time" class="form-control" value="<?php echo $row['end_time']; ?>" required>
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes" class="form-control"><?php echo $row['notes']; ?></textarea>
        </div>
        <button type="submit" class="btn submit-btn">Update</button>
    </form>
</div>
