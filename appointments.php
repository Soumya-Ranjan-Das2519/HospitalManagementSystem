<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HospitalMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctor.php">Doctor</a></li>
                    <li class="nav-item"><a class="nav-link" href="patient.php">Patient</a></li>
                    <li class="nav-item"><a class="nav-link" href="appointments.php">Appointments</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center mb-4">Manage Appointments</h2>

        <!-- Appointment Form -->
        <div class="card shadow-sm mb-5">
            <div class="card-body">
                <h5 class="card-title">Book an Appointment</h5>
                <form action="book_appointment.php" method="POST">
                    <div class="mb-3">
                        <label for="patient_name" class="form-label">Patient Name</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="doctor_name" class="form-label">Doctor Name</label>
                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointment_date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="appointment_time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="appointment_time" name="appointment_time" required>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason for Appointment</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Appointment</button>
                </form>
            </div>
        </div>

        <!-- Appointment List -->
        <h5>Existing Appointments</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Patient Name</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM appointments ORDER BY appointment_date, appointment_time";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['patient_name']}</td>
                                <td>{$row['doctor_name']}</td>
                                <td>{$row['appointment_date']}</td>
                                <td>{$row['appointment_time']}</td>
                                
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No Appointments Found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
