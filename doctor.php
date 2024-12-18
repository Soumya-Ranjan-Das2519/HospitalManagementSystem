<?php
include('db.php');

// Fetch appointments
$query = "SELECT a.id AS appointment_id, 
                 p.name AS patient_name, 
                 d.name AS doctor_name, 
                 a.appointment_date, 
                 a.appointment_time 
          FROM appointments a 
          JOIN patients p ON a.patient_id = p.id 
          JOIN doctors d ON a.doctor_id = d.id";

$result = $conn->query($query);

if (!$result) {
    die("Query Error: " . $conn->error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link active" href="doctor.php">Doctor</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center">Doctor Dashboard</h1>
        <p class="text-center">View and manage your appointments efficiently.</p>

        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search appointments by patient or doctor name">
            <span class="input-group-text" id="basic-addon2">Search</span>
        </div>

        <!-- Appointments Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Patient Name</th>
                        <th>Doctor Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody id="appointmentsTable">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['appointment_id']; ?></td>
                                <td><?= htmlspecialchars($row['patient_name']); ?></td>
                                <td><?= htmlspecialchars($row['doctor_name']); ?></td>
                                <td><?= $row['appointment_date']; ?></td>
                                <td><?= $row['appointment_time']; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">View</button>
                                    <button class="btn btn-sm btn-success">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No appointments found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center bg-dark text-white py-3">
        &copy; 2024 Hospital Management System
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript for search functionality
        const searchInput = document.getElementById('searchInput');
        const appointmentsTable = document.getElementById('appointmentsTable');

        searchInput.addEventListener('keyup', () => {
            const filter = searchInput.value.toLowerCase();
            const rows = appointmentsTable.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                const columns = rows[i].getElementsByTagName('td');
                if (columns.length > 0) {
                    const patientName = columns[1].textContent.toLowerCase();
                    const doctorName = columns[2].textContent.toLowerCase();
                    if (patientName.includes(filter) || doctorName.includes(filter)) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        });
    </script>
</body>
</html>
