<?php
include 'php/config.php'; 
include 'php/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services</title>
  <link rel="stylesheet" href="css/services.css">
</head>
<body>

  <!-- Hero Section -->
  <section class="hero">
    <img src="images/ourservices.jpg" alt="Salon Image">
    <div class="hero-text">
      <h1>Our <span>Services</span></h1>
    </div>
  </section>

  <div class="container">
    <h2 class="section-title">Services We Offer</h2>
    <div class="services-grid">
      <?php
      // Fetch services
      $result = $conn->query("SELECT * FROM services ORDER BY created_at DESC");
      if($result && $result->num_rows > 0){
          while($service = $result->fetch_assoc()){
              echo "
              <div class='service-card'>
                <img src='./images/{$service['image']}' alt='{$service['name']}'>
                <div class='service-info'>
                  <h3>{$service['name']}</h3>
                  <span class='category'>{$service['category']}</span>
                  <p class='description'>{$service['description']}</p>
                  <p class='price'>Rs. {$service['price']}</p>
                </div>
              </div>";
          }
      } else {
          echo "<p>No services available right now.</p>";
      }
      ?>
    </div>
  </div>

</body>
</html>

<?php include 'php/footer.php'; ?>
