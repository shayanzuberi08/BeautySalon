<?php
session_start();
include '../php/config.php'; // Check path

// Only admin access
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../login.php");
    exit();
}

$id = intval($_GET['id']);
$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();

if(!$user){
    echo "User not found!";
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);

    $conn->query("UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id");
    header("Location: user.php");
    exit();
}
?>

<style>
    body {font-family: Arial; background:#f4f4f4;}
    .box {width:350px; margin:80px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2);}
    input, button {width:100%; padding:10px; margin:10px 0;}
    button {background:#007BFF; color:#fff; border:none; cursor:pointer;}
    button:hover {opacity:0.8;}
    .error {color:red;}
</style>
<h2>Edit User</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $user['phone']; ?>" required><br>

    <button type="submit">Update User</button>
</form>
