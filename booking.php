<?php
include 'php/header.php';
include 'php/config.php'; // DB connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>
<section class="booking">
  <h2>Book a Service</h2>

  <?php if(!isset($_SESSION['user_id'])): ?>
      <p>Please <a href="login.php">login</a> to book a service.</p>

  <?php else: ?>
      <form action="php/booking_process.php" method="POST">
        
        <!-- Service -->
        <select name="service_id" required>
            <option value="">-- Select Service --</option>
            <?php
            $services = $conn->query("SELECT * FROM services");
            while($s = $services->fetch_assoc()){
                echo "<option value='{$s['id']}'>{$s['name']} - Rs. {$s['price']}</option>";
            }
            ?>
        </select>

        <!-- Branch -->
        <select name="branch" required>
            <option value="">-- Select Branch --</option>
            <option value="Malir">Malir</option>
            <option value="Gulshan">Gulshan</option>
            <option value="DHA">DHA</option>
        </select>

       <div class="datetime-group">
          <input type="date" name="booking_date" required>
          <input type="time" name="booking_time" required>
        </div>
        
        <button type="submit">Book Now</button>
      </form>
  <?php endif; ?>
</section>

    
</body>
</html>

<?php include 'php/footer.php'; ?>
