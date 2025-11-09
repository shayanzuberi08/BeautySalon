<?php
session_start();
include 'config.php'; // Database connection

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
    exit();
}

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['message'])){
    $user_id = $_SESSION['user_id'];
    $message = $conn->real_escape_string($_POST['message']); // Prevent SQL injection

    $sql = "INSERT INTO feedback (user_id, message, created_at) VALUES ($user_id, '$message', NOW())";

    if($conn->query($sql) === TRUE){
        // Successfully inserted
        header("Location: ../feedback.php?success=1");
        exit();
    } else {
        // Error
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: ../feedback.php");
    exit();
}
?>
