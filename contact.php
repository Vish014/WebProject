<?php

$conn = mysqli_connect("localhost", "root", "", "gsl_database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$fullName = $_POST['contactFullName'];
$email = $_POST['contactEmail'];
$subject = $_POST['contactSubject'];
$message = $_POST['contactMessage'];


if (empty($fullName) || empty($email) || empty($subject) || empty($message)) {
    echo "Please fill in all required fields.";
    exit;
}


$fullName = mysqli_real_escape_string($conn, $fullName);
$email = mysqli_real_escape_string($conn, $email);
$subject = mysqli_real_escape_string($conn, $subject);
$message = mysqli_real_escape_string($conn, $message);

$sql = "INSERT INTO contacts (full_name, email, subject, message)
        VALUES ('$fullName', '$email', '$subject', '$message')";

$style = "
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 40px;
        text-align: center;
    }
    .message {
        padding: 20px;
        border-radius: 10px;
        width: 80%;
        max-width: 500px;
        margin: 40px auto;
        font-size: 18px;
    }
    .success {
        background-color: #d4edda;
        color: #155724;
        border: 2px solid #c3e6cb;
    }
    .error {
        background-color: #f8d7da;
        color: #721c24;
        border: 2px solid #f5c6cb;
    }
    a {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
";

if (mysqli_query($conn, $sql)) {
    echo "<!DOCTYPE html><html><head><title>Success</title>$style</head><body>
          <div class='message success'>
              Message sent successfully!<br><a href='start.php'>Back to Home</a>
          </div></body></html>";
} else {
    echo "<!DOCTYPE html><html><head><title>Error</title>$style</head><body>
          <div class='message error'>Error: " . mysqli_error($conn) . "</div></body></html>";
}

mysqli_close($conn);
?>
