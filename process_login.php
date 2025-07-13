<?php
session_start(); 

require_once 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_or_email = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username_or_email) || empty($password)) {
        $_SESSION['login_error'] = "Both username/email and password are required.";
        header("Location: start.php?login_failed=true"); 
        exit();
    }



    $sql = "SELECT id, username, email, password FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username_or_email, $username_or_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

          
            header("Location: destination.php"); 
            exit();
        } else {
            
            $_SESSION['login_error'] = "Invalid username/email or password.";
            header("Location: start.php?login_failed=true");
            exit();
        }
    } else {
        
        $_SESSION['login_error'] = "Invalid username/email or password.";
        header("Location: start.php?login_failed=true");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    
    header("Location: start.php");
    exit();
}
?>