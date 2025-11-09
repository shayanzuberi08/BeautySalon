<?php
session_start();
include '../php/config.php';

// Only allow admin
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../login.php");
    exit();
}

include './sidebar.php'; // Sidebar file
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Services</title>
<style>
/* Sidebar adjustment */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    background: #f4f4f4;
}

.main-content {
    margin-left: 220px; /* sidebar width */
    padding: 20px;
}

h1 {
    color: #333;
}

a.button {
    display: inline-block;
    padding: 8px 15px;
    margin-bottom: 15px;
    background: #007BFF;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

a.button:hover {
    background: #0056b3;
}

/* Table styling */
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
    <h1>Manage Services</h1>
    <a class="button" href="add_service.php">Add New Service</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Image</th> <!-- New column -->
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        <?php
        $services = $conn->query("SELECT * FROM services ORDER BY created_at DESC");
        if($services){
            while($s = $services->fetch_assoc()){
                echo "<tr>
                        <td>{$s['id']}</td>
                        <td>{$s['name']}</td>
                        <td>{$s['category']}</td>
                        <td>Rs{$s['price']}</td>
                        <td>";
                        
                if(!empty($s['image'])){
                    echo "<img src='../images/{$s['image']}' alt='{$s['name']}' style='width:100px; height:auto;'>";
                } else {
                    echo "No Image";
                }

                echo "</td>
                        <td>{$s['description']}</td>
                        <td>{$s['created_at']}</td>
                        <td class='actions'>
                            <a href='edit_service.php?id={$s['id']}'>Edit</a> | 
                            <a href='delete_service.php?id={$s['id']}' onclick=\"return confirm('Are you sure?');\">Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No services found.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
