<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2>Doctor Dashboard</h2>
        <h4>Your Appointments</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Appointment Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $doctor_id = 1; // Assume logged-in doctor ID
                $result = $conn->query("SELECT a.id, p.name AS patient_name, a.appointment_date, a.status 
                                        FROM appointments a 
                                        JOIN patients p ON a.patient_id = p.id 
                                        WHERE a.doctor_id = $doctor_id");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['patient_name']}</td>
                        <td>{$row['appointment_date']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <form action='' method='POST' class='d-inline'>
                                <input type='hidden' name='appointment_id' value='{$row['id']}'>
                                <select name='status' class='form-select form-select-sm d-inline w-auto'>
                                    <option value='Scheduled'>Scheduled</option>
                                    <option value='Completed'>Completed</option>
                                    <option value='Cancelled'>Cancelled</option>
                                </select>
                                <button type='submit' name='update' class='btn btn-sm btn-success'>Update</button>
                            </form>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <?php
        if (isset($_POST['update'])) {
            $appointment_id = $_POST['appointment_id'];
            $status = $_POST['status'];
            $conn->query("UPDATE appointments SET status='$status' WHERE id=$appointment_id");
            echo "<div class='alert alert-success'>Appointment updated successfully!</div>";
        }
        ?>
    </div>
</body>
</html>
