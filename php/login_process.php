<?php
include 'config.php';
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password_hash'])){
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['is_admin'] = $user['is_admin']; // 1 = admin, 0 = normal user

            // Redirect based on role
            if($user['is_admin'] == 1){
                header("Location: ../admin/user.php"); // Admin panel
            } else {
                header("Location: ../index.php"); // Normal user home
            }
            exit();
        } else {
            echo "Incorrect password! <a href='../login.php'>Try again</a>";
        }
    } else {
        echo "Email not found! <a href='../register.php'>Register here</a>";
    }
}
?>
