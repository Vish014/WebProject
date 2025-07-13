<?php

$conn = mysqli_connect("localhost", "root", "", "gsl_database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$destination = $_POST['destination'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$travelDate = $_POST['travelDate'];
$duration = $_POST['duration'];
$specialRequests = $_POST['specialRequests'];


if (empty($fullName) || empty($email) || empty($destination) || empty($adults) || empty($travelDate) || empty($duration)) {
    echo "Please fill all required fields.";
    exit;
}


$sql = "INSERT INTO bookings (full_name, email, phone, destination, adults, children, travel_date, duration, special_requests)
        VALUES ('$fullName', '$email', '$phone', '$destination', '$adults', '$children', '$travelDate', '$duration', '$specialRequests')";

if (mysqli_query($conn, $sql)) {
    header("Location: view.php");
exit;

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
