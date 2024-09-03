<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST["patient_name"];
    $user_name = $_POST["user_name"];
    $medication = $_POST["medication"];
    
    // You can generate prescription here as per your requirements
    // For demonstration, I'll just print the details
    echo "<h2>Prescription</h2>";
    echo "<p><strong>Patient Name:</strong> $patient_name</p>";
    echo "<p><strong>Doctor Name:</strong> $user_name</p>";
    echo "<p><strong>Medication:</strong> $medication</p>";
}
?>


    <div class="container mt-5">
        <h2 class="mb-4">Prescription Form</h2>
        <form action="process_prescription.php" method="POST">
            <div class="form-group">
                <label for="patient_name">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" required>
            </div>
            <div class="form-group">
                <label for="user_name">Doctor Name</label>
                <input type="text" class="form-control" id="user_name" name="user_name" required>
            </div>
            <div class="form-group">
                <label for="medication">Medication</label>
                <textarea class="form-control" id="medication" name="medication" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Generate Prescription</button>
        </form>
    </div>