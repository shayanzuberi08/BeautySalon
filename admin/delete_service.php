<?php
session_start();
include '../php/config.php';

if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../login.php");
    exit();
}

$id = intval($_GET['id']);

// Check if service is used in bookings
$stmt = $conn->prepare("SELECT COUNT(*) as count FROM bookings WHERE service_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if($row['count'] > 0){
    // Cannot delete
    echo "<script>alert('Cannot delete service! It is used in existing bookings.'); window.location.href='services.php';</script>";
    exit();
}

// Safe to delete
$stmt = $conn->prepare("DELETE FROM services WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: services.php");
exit();
?>
