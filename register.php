<?php
session_start();
require_once 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['reg_username']); 
    $email = trim($_POST['reg_email']);       
    $password = $_POST['reg_password'];
    $confirm_password = $_POST['reg_confirm_password'];

    
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['registration_error'] = "All fields are required.";
        header("Location: start.php?register_failed=true"); 
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registration_error'] = "Invalid email format.";
        header("Location: start.php?register_failed=true");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['registration_error'] = "Passwords do not match.";
        header("Location: start.php?register_failed=true");
        exit();
    }

    
    if (strlen($password) < 6) { 
        $_SESSION['registration_error'] = "Password must be at least 6 characters long.";
        header("Location: start.php?register_failed=true");
        exit();
    }

    
    $sql_check = "SELECT id FROM users WHERE username = ? OR email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ss", $username, $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $_SESSION['registration_error'] = "Username or Email already taken.";
        header("Location: start.php?register_failed=true");
        exit();
    }
    $stmt_check->close();

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $sql_insert = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt_insert->execute()) {
        
        $_SESSION['registration_success'] = "Registration successful! Please login.";
        header("Location: start.php?registration_success=true"); 
        exit();
    } else {
        
        $_SESSION['registration_error'] = "Registration failed. Please try again.";
        header("Location: start.php?register_failed=true");
        exit();
    }

    $stmt_insert->close();
}
$conn->close();
?>