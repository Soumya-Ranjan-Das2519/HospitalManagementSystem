<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2>Book an Appointment</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="patient_id" class="form-label">Patient</label>
                <select name="patient_id" class="form-select" required>
                    <?php
                    $result = $conn->query("SELECT id, name FROM patients");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor</label>
                <select name="doctor_id" class="form-select" required>
                    <?php
                    $result = $conn->query("SELECT id, name FROM users WHERE role='doctor'");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date</label>
                <input type="date" name="appointment_date" class="form-control" required>
            </div>
            <button type="submit" name="book" class="btn btn-success">Book Appointment</button>
        </form>
        <?php
        if (isset($_POST['book'])) {
            $patient_id = $_POST['patient_id'];
            $doctor_id = $_POST['doctor_id'];
            $appointment_date = $_POST['appointment_date'];
            $conn->query("INSERT INTO appointments (patient_id, doctor_id, appointment_date, status) 
                          VALUES ($patient_id, $doctor_id, '$appointment_date', 'Scheduled')");
            echo "<div class='alert alert-success mt-3'>Appointment booked successfully!</div>";
        }
        ?>
    </div>
</body>
</html>
