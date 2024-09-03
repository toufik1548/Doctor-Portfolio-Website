<style>
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
    .table-container {
        overflow: auto; /* Make the container scrollable */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .table-container .table {
        width: 100%;
    }
    .table-container .table th,
    .table-container .table td {
        white-space: nowrap; /* Prevent line breaks in table cells */
    }
    .table-container .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
</style>


<?php

// Fetch and display timetable data
$fetch_query = "SELECT * FROM doctor_timetable WHERE status = 1";
$result = mysqli_query($con, $fetch_query);

?>

<h3 class="form-title text-center mb-3">Time Table</h3>
<p><font style="color:red;">*</font><font style="color:blueviolet;">Scroll more to see the table</font></p><br>
<div class="table-container">
    <table class="table table-hover">
        <tr>
            <th>Day of Week</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Notes</th>
            <th>Action</th> <!-- New column for action button -->
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['day_of_week']; ?></td>
            <td><?php echo $row['start_time']; ?></td>
            <td><?php echo $row['end_time']; ?></td>
            <td><?php echo $row['notes']; ?></td>
            <td>
                <a href="<?php echo $cp_url; ?>/timeline-edit/<?php echo $row["timetable_id"]; ?>" class="btn btn-primary">Edit</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
