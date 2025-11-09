<?php
session_start();

// Only admin access
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../login.php");
    exit();
}

include '../php/config.php'; // correct path

// Get booking by ID safely
$id = intval($_GET['id']);
$booking = $conn->query("SELECT * FROM bookings WHERE id=$id")->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $status = $_POST['status'];
    $conn->query("UPDATE bookings SET status='$status' WHERE id=$id");
    header("Location: booking.php");
    exit();
}
?>
<style>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #0f0f0f;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: #1a1a1a;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(213,0,249,0.2);
        width: 400px;
        text-align: center;
    }

    h2 {
        margin-bottom: 1.5rem;
        color: #fff;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        text-align: left;
        font-weight: bold;
    }

    select {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 6px;
        background: #0f0f0f;
        color: #fff;
        margin-bottom: 1.5rem;
        font-size: 1rem;
        outline: none;
    }

    select:focus {
        border: 1px solid #ff4081;
    }

    button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        background: #007BFF;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        font-size: 1rem;
    }

    button:hover {
        opacity: 0.8;
    }
</style>
</style>

<h2>Edit Booking</h2>
<form method="POST">
    <label>Status:</label>
    <select name="status">
        <option value="Pending"   <?= $booking['status']=='Pending'?'selected':'' ?>>Pending</option>
        <option value="Confirmed" <?= $booking['status']=='Confirmed'?'selected':'' ?>>Confirmed</option>
        <option value="Completed" <?= $booking['status']=='Completed'?'selected':'' ?>>Completed</option>
    </select>
    <button type="submit">Update</button>
</form>
