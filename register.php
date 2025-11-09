<?php include 'php/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="css/register.css">

<h2>Register</h2>
<form action="php/register_process.php" method="POST" id="registerForm">
    <label>Full Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Phone:</label>
    <input type="text" name="phone" required pattern="[0-9]{10}">

    <label>Password:</label>
    <input type="password" name="password" required>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required>

    <button type="submit">Register</button>
</form>
    
</body>
</html>

<?php include 'php/footer.php'; ?>
