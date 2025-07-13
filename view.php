<?php

$conn = mysqli_connect("localhost", "root", "", "gsl_database");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM bookings ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
            text-align: center;
        }

        .message {
            padding: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
            border-radius: 10px;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .details-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: left;
        }

        .details-container h2 {
            margin-bottom: 20px;
            color: #2a2c3a;
        }

        .details-container p {
            margin: 8px 0;
            font-size: 16px;
            color: #333;
        }

        .back-link {
            display: inline-block;
            margin-top: 25px;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<div class='message'>Booking request submitted successfully!</div>";
    echo "<div class='details-container'>
            <h2>Your Booking Details</h2>
            <p><strong>Full Name:</strong> " . htmlspecialchars($row['full_name']) . "</p>
            <p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>
            <p><strong>Phone:</strong> " . htmlspecialchars($row['phone']) . "</p>
            <p><strong>Destination:</strong> " . htmlspecialchars($row['destination']) . "</p>
            <p><strong>Adults:</strong> " . htmlspecialchars($row['adults']) . "</p>
            <p><strong>Children:</strong> " . htmlspecialchars($row['children']) . "</p>
            <p><strong>Travel Date:</strong> " . htmlspecialchars($row['travel_date']) . "</p>
            <p><strong>Duration:</strong> " . htmlspecialchars($row['duration']) . " days</p>
            <p><strong>Special Requests:</strong> " . nl2br(htmlspecialchars($row['special_requests'])) . "</p>
            <a class='back-link' href='start.php'>← Back to Home</a>
          </div>";
} else {
    echo "<div class='message' style='background-color:#f8d7da; color:#721c24;'>No booking records found.</div>";
}

mysqli_close($conn);
?>

</body>
</html>
