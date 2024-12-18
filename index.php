<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
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
                    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="doctor.php">Doctor</a></li>
                    <li class="nav-item"><a class="nav-link" href="patient.php">Patient</a></li>
                </ul>
            </div>
        </div>
    </nav>
      <!-- Hero Section -->
      <div class="bg-light text-center py-5">
        <h1 class="display-4 fw-bold">Welcome to Hospital Management System</h1>
        <p class="lead">Streamline your hospital operations with ease!</p>
        <a href="admin.php" class="btn btn-primary btn-lg mt-3">Get Started</a>
    </div>

    <!-- Features Section -->
    <div class="container my-5">
        <div class="row text-center">
            <h2 class="mb-5">Key Features</h2>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person-badge"></i> Manage Doctors</h5>
                        <p class="card-text">Easily add, edit, and manage doctor profiles and schedules.</p>
                        <a href="doctor.php" class="btn btn-outline-primary">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-person"></i> Manage Patients</h5>
                        <p class="card-text">Keep track of patient records, appointments, and histories.</p>
                        <a href="patient.php" class="btn btn-outline-primary">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-check"></i> Appointments</h5>
                        <p class="card-text">Schedule, manage, and track appointments efficiently.</p>
                        <a href="appointments.php" class="btn btn-outline-primary">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-dark text-white py-5">
        <div class="container text-center">
            <h2 class="mb-5">What Our Users Say</h2>
            <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <blockquote class="blockquote">
                            <p>"HospitalMS has simplified our operations significantly!"</p>
                            <footer class="blockquote-footer text-white">Dr. Sarah Johnson</footer>
                        </blockquote>
                    </div>
                    <div class="carousel-item">
                        <blockquote class="blockquote">
                            <p>"An excellent tool for managing patient records."</p>
                            <footer class="blockquote-footer text-white">John Doe, Administrator</footer>
                        </blockquote>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>
    <!-- <div class="container my-5">
        <h1 class="text-center">Welcome to Hospital Management System</h1>
        <p class="text-center">Manage patients, doctors, and appointments efficiently!</p>
    </div> -->
    <footer class="text-center bg-dark text-white py-3">
        © 2024 Hospital Management System
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
