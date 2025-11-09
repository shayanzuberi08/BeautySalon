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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
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
    margin-bottom: 20px;
}

.table-container {
    overflow-x: auto; /* horizontal scroll for small screens */
    margin-left: 220px; 
    margin-right: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
    min-width: 600px; /* ensures table doesn't shrink too much */
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

/* Responsive adjustments */
@media (max-width: 768px) {
    .main-content {
        margin-left: 0; /* remove sidebar margin */
        padding: 10px;
    }

    .table-container {
        margin-left: 0;
        margin-right: 0;
    }

    table {
        font-size: 14px;
    }

    table th, table td {
        padding: 8px 10px;
    }
}

@media (max-width: 480px) {
    table th, table td {
        padding: 6px 8px;
    }

    h1 {
        font-size: 20px;
    }
}
  </style>
</head>
<body>

<div class="main-content">
<h1>Feedback</h1>

<div class="table-container">
  <table>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Message</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    <?php
    $feedbacks = $conn->query("SELECT f.id, u.name as user_name, f.message, f.created_at 
                               FROM feedback f 
                               JOIN users u ON f.user_id=u.id");
    while($f = $feedbacks->fetch_assoc()){
        echo "<tr>
                <td>{$f['id']}</td>
                <td>{$f['user_name']}</td>
                <td>{$f['message']}</td>
                <td>{$f['created_at']}</td>
                <td class='actions'>
                    <a href='delete_feedback.php?id={$f['id']}' onclick=\"return confirm('Are you sure you want to delete this feedback?');\">Delete</a>
                </td>
              </tr>";
    }
    ?>
  </table>
</div>
</div>

</body>
</html>
