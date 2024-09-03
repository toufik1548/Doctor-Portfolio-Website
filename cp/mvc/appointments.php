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

// Handle form submission for status update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['patient_id']) && isset($_POST['status'])) {
    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE doctor_appointment SET status = '$status' WHERE patient_id = '$patient_id'";
    mysqli_query($con, $query);
}

// Fetch appointments from database
$result = mysqli_query($con, "SELECT patient_id, patient_name, patient_email, patient_phone, add_date, patient_details, status FROM doctor_appointment WHERE status=1 ORDER BY patient_id DESC LIMIT 100");
?>

<h3 class="form-title text-center mb-3">Appointments</h3>
<p><font style="color:red;">*</font><font style="color:blueviolet;">Scroll more to see the table</font></p><br>
    <div class="table-container">
        <table class="table table-hover bg-white">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Patient ID</th>
                    <th scope="col" class="text-center">Patient Name</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Phone</th>
                    <th scope="col" class="text-center">Date</th>
                    <th scope="col" class="text-center">Details</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $patient_id         = $row['patient_id'];
                    $patient_name       = $row['patient_name'];
                    $patient_email      = $row['patient_email'];
                    $patient_phone      = $row['patient_phone'];
                    $add_date           = $row['add_date'];
                    $patient_details    = $row['patient_details'];
                    $status             = $row['status'];
                ?>
                <tr>
                    <td class="text-center"><?php echo htmlspecialchars($patient_id); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($patient_name); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($patient_email); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($patient_phone); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($add_date); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($patient_details); ?></td>
                    <td class="text-center">
                        <form action="" method="post">
                            <input type="hidden" name="patient_id" value="<?php echo htmlspecialchars($patient_id); ?>">
                            <div>
                                <input type="radio" name="status" value="1" <?php echo $status == '1' ? 'checked' : ''; ?>> Active
                            </div>
                            <div>
                                <input type="radio" name="status" value="0" <?php echo $status == '0' ? 'checked' : ''; ?>> Inactive
                            </div>
                            <div class="button-container">
                                <button type="submit" class="submit-btn">Update</button>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
