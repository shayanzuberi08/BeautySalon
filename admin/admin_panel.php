<?php
include '../php/config.php';
session_start();

// Only allow admin
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: login.php");
    exit();
}


include './sidebar.php';
?>

<h1>Admin Panel</h1>
<p>Welcome, <?php echo $_SESSION['user_name']; ?>!</p>







