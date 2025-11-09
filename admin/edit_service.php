<?php
session_start();
include '../php/config.php';

if(!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1){
    header("Location: ../login.php");
    exit();
}

$id = intval($_GET['id']);
$service = $conn->query("SELECT * FROM services WHERE id=$id")->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $conn->real_escape_string($_POST['name']);
    $category = $conn->real_escape_string($_POST['category']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    // Image handling
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $targetDir = "../images/";
        $targetFile = $targetDir . $imageName;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)){
            if(!empty($service['image']) && file_exists("../images/".$service['image'])){
                unlink("../images/".$service['image']);
            }
            $conn->query("UPDATE services 
                          SET name='$name', category='$category', price='$price', description='$description', image='$imageName' 
                          WHERE id=$id");
        }
    } else {
        $conn->query("UPDATE services 
                      SET name='$name', category='$category', price='$price', description='$description' 
                      WHERE id=$id");
    }

    header("Location: services.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Service</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .container {
        background: #1a1a1a;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(213,0,249,0.2);
        width: 500px;
    }

    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #fff;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    input, textarea, select {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 6px;
        background: #0f0f0f;
        color: #fff;
        margin-bottom: 1rem;
        font-size: 1rem;
        outline: none;
    }

    input:focus, textarea:focus, select:focus {
        border: 1px solid #ff4081;
    }

    textarea {
        min-height: 80px;
        resize: vertical;
    }

    .current-img {
        margin-bottom: 1rem;
        text-align: center;
    }

    .current-img img {
        width: 120px;
        border-radius: 8px;
        margin-top: 0.5rem;
        border: 2px solid #333;
    }

    button {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 6px;
        background: #007BFF;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        font-size: 1rem;
    }

    button:hover {
        opacity: 0.85;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Edit Service</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $service['name']; ?>" required>

        <label>Category:</label>
        <input type="text" name="category" value="<?php echo $service['category']; ?>" required>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $service['price']; ?>" required>

        <div class="current-img">
            <label>Current Image:</label><br>
            <?php if(!empty($service['image'])): ?>
                <img src="../images/<?php echo $service['image']; ?>" alt="Service Image">
            <?php else: ?>
                <p>No image uploaded.</p>
            <?php endif; ?>
        </div>

        <label>Change Image:</label>
        <input type="file" name="image" accept="image/*">

        <label>Description:</label>
        <textarea name="description"><?php echo $service['description']; ?></textarea>

        <button type="submit">Update Service</button>
    </form>
</div>

</body>
</html>
