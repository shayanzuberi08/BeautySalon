<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id = $_SESSION['user_id'];
    $service_id = $_POST['service_id'];
    $branch = $_POST['branch'];
    $booking_date = $_POST['booking_date']; // datetime-local field
    
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, service_id, branch, booking_date) VALUES (?,?,?,?)");
    $stmt->bind_param("iiss", $user_id, $service_id, $branch, $booking_date);

    if($stmt->execute()){
        header("Location: ../services.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
