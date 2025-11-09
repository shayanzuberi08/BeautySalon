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
  <style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    margin: 0;
}

.main-content {
    margin-left: 15px; /* Sidebar width */
    padding: 20px;
}

h1 {
    color: #333;
    text-align: center;
}

table {
    width: 80%;
    margin-left: 220px; 
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background: #007BFF;
    color: #fff;
}

table tr:nth-child(even) {
    background: #f9f9f9;
}

table tr:hover {
    background: #f1f1f1;
}

.actions a {
    color: #007BFF;
    text-decoration: none;
    margin-right: 10px;
}

.actions a:hover {
    text-decoration: underline;
}
</style>

<h1>Bookings</h1>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Service</th>
        <th>Date</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php
    $bookings = $conn->query("SELECT b.id, u.name as user_name, s.name as service_name, b.booking_date, b.status 
                              FROM bookings b 
                              JOIN users u ON b.user_id=u.id
                              JOIN services s ON b.service_id=s.id");
    while($b = $bookings->fetch_assoc()){
        echo "<tr>
                <td>{$b['id']}</td>
                <td>{$b['user_name']}</td>
                <td>{$b['service_name']}</td>
                <td>{$b['booking_date']}</td>
                <td>{$b['status']}</td>
                <td>
                    <a href='edit_booking.php?id={$b['id']}'>Edit</a> | 
                    <a href='delete_booking.php?id={$b['id']}'>Delete</a>
                </td>
              </tr>";
    }
    ?>
</table>