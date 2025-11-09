<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check existing email
    $check = $conn->prepare("SELECT * FROM users WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if($result->num_rows > 0){
        echo "Email already registered! <a href='../register.php'>Go back</a>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name,email,phone,password_hash) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$name,$email,$phone,$password);
        if($stmt->execute()){
            echo "Registration successful! <a href='../login.php'>Login here</a>";
        } else {
            echo "Error: ".$stmt->error;
        }
    }
}
?>
