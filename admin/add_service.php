<?php
session_start();
include '../php/config.php';

// Only allow admin
if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../login.php");
    exit();
}

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $conn->real_escape_string($_POST['name']);
    $category = $conn->real_escape_string($_POST['category']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    // Handle image upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $img_name = time() . "_" . $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $img_folder = "../images/" . $img_name;
        move_uploaded_file($img_tmp, $img_folder);
    } else {
        $img_name = "";
    }

    // Insert into database
    $conn->query("INSERT INTO services (name, category, price, description, image) 
                  VALUES ('$name', '$category', '$price', '$description', '$img_name')");

    header("Location: services.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Service</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        width: 400px;
    }
    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    label {
        font-weight: bold;
        display: block;
        margin: 10px 0 5px;
    }
    input[type="text"], input[type="number"], input[type="file"], textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
        outline: none;
    }
    input:focus, textarea:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }
    textarea {
        height: 80px;
        resize: none;
    }
    button {
        background: #007bff;
        color: #fff;
        padding: 12px;
        width: 100%;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }
    button:hover {
        background: #0056b3;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Add New Service</h2>
  <form method="POST" enctype="multipart/form-data">
      <label>Name:</label>
      <input type="text" name="name" required>

      <label>Category:</label>
      <input type="text" name="category" required>

      <label>Price:</label>
      <input type="number" step="0.01" name="price" required>

      <label>Image:</label>
      <input type="file" name="image" accept="image/*">

      <label>Description:</label>
      <textarea name="description"></textarea>

      <button type="submit">Add Service</button>
  </form>
</div>

</body>
</html>
