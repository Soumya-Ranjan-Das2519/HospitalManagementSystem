<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_name = $_POST['patient_name'];
    $doctor_name = $_POST['doctor_name'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    $query = "INSERT INTO appointments (patient_name, doctor_name, appointment_date, appointment_time) 
              VALUES ('$patient_name', '$doctor_name', '$appointment_date', '$appointment_time')";

    if (mysqli_query($conn, $query)) {
        header("Location: appointments.php?message=Appointment booked successfully");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
