<?php include 'php/header.php'; ?>
<?php include 'php/config.php'; // DB connection ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="css/about.css">
</head>
<body>

  <!-- Hero Section -->
  <section class="hero">
    <img src="images/about.jpg" alt="Salon Image">
    <div class="hero-text">
      <h1>About <span>Us</span></h1>
    </div>
  </section>

  <!-- Banner -->
  <section class="banner">
    <h2>GET READY TO GLOW AGAIN!</h2>
    <a href="services.php" class="btn">CHECK OUT OUR SERVICES</a>
  </section>

  <!-- About Section -->
  <section class="about">
    <h2>The <span>Beginning</span></h2>
    <p>
      After picking up the best stylists in town, we opened the doors to our elegant and posh women’s salon in July of 2013.
      Located in multiple branches across Karachi, we strive to deliver timeless glamour.
    </p>

    <h2>Team of <span>Expert Stylists</span></h2>
    <p>
      Our staff is made up of trend-setting artists from all around the country who bring their creativity and expertise
      to make you glow with confidence.
    </p>
  </section>

  <!-- Testimonials -->
  <section class="testimonials">
    <h2>What Clients Say</h2>
    <div class="testimonial-grid">
      <div class="card">
        <p>"It was the BEST makeup experience I have had to date! Stylist was very kind and gave me tons of recommendations!"</p>
        <h4>- Aiman Fahad</h4>
      </div>
      <div class="card">
        <p>"Their blow-outs are the bomb. My hair always looks polished and shiny. Highly recommend!"</p>
        <h4>- Faiza Tahir</h4>
      </div>
      <div class="card">
        <p>"They gave me a haircut in layers quickly and professionally. Highly recommend them to others."</p>
        <h4>- Ramsha Faizan</h4>
      </div>
    </div>
  </section>

  <!-- Booking Section -->
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

        <!-- Date & Time -->
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
