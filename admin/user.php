<?php
include '../php/config.php';
session_start();

// Only allow admin
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../login.php");
    exit();
}

include './sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Users</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    margin: 0;
}

.main-content {
    margin-left: 220px; /* Sidebar width */
    padding: 20px;
}

h1 {
    color: #333;
    text-align: center;
}

table {
    width: 100%;
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
</head>
<body>
<div class="main-content">
    <h1>Users</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        $users = $conn->query("SELECT * FROM users WHERE is_admin=0");
        if($users->num_rows > 0){
            while($row = $users->fetch_assoc()){
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td class='actions'>
                            <a href='edit_user.php?id={$row['id']}'>Edit</a> | 
                            <a href='delete_user.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No users found.</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
