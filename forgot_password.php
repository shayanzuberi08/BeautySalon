<?php
session_start();
include 'php/config.php';

$message = "";
$showForm = false;

// Step 1: Email check
if (isset($_POST['check_email'])) {
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['reset_email'] = $email;
        $showForm = true;
    } else {
        $message = "Email not found!";
    }
}

// Step 2: Update password
if (isset($_POST['update_password'])) {
    $newpass = $_POST['password'];
    $confirmpass = $_POST['confirm_password'];
    $email = $_SESSION['reset_email'] ?? '';

    if ($newpass === $confirmpass && !empty($email)) {
        $hashed = password_hash($newpass, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password_hash=? WHERE email=?");
        $stmt->bind_param("ss", $hashed, $email);

        if ($stmt->execute()) {
            $message = "Password updated successfully. <a href='login.php'>Login</a>";
            unset($_SESSION['reset_email']);
            $showForm = false;
        } else {
            $message = "Error updating password!";
        }
    } else {
        $message = "Passwords do not match!";
        $showForm = true;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style>
    body {font-family: Arial; background:#f4f4f4;}
    .box {width:350px; margin:80px auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2);}
    input, button {width:100%; padding:10px; margin:10px 0;}
    button {background:#e91e63; color:#fff; border:none; cursor:pointer;}
    button:hover {opacity:0.8;}
    .error {color:red;}
  </style>
</head>
<body>
  <div class="box">
    <h2>Forgot Password</h2>

    <?php if(!$showForm): ?>
    <!-- Step 1: Enter Email -->
    <form method="POST">
      <input type="email" name="email" placeholder="Enter your email" required>
      <button type="submit" name="check_email">Next</button>
    </form>
    <?php endif; ?>

    <?php if($showForm): ?>
    <!-- Step 2: Enter New Password -->
    <form method="POST">
      <input type="password" name="password" placeholder="Enter new password" required>
      <input type="password" name="confirm_password" placeholder="Confirm new password" required>
      <button type="submit" name="update_password">Update Password</button>
    </form>
    <?php endif; ?>

    <p class="error"><?= $message ?></p>
  </div>
</body>
</html>
