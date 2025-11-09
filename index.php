<?php include 'php/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shayan's Beauty Salon</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Custom CSS (always last) -->
  <link rel="stylesheet" href="css/home.css">
</head>
<body>

  <!-- Banner Carousel Start -->
  <div id="salonCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/1.jpg" class="d-block w-100" alt="Salon Banner 1" style="max-height:500px; object-fit:cover;">
        <div class="carousel-caption">
          <h2>Welcome to Shayan's Beauty Salon</h2>
          <p>Get the best salon & spa services in town!</p>
          <a href="booking.php" class="btn btn-primary">Book Now</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/2.jpg" class="d-block w-100" alt="Salon Banner 2" style="max-height:500px; object-fit:cover;">
        <div class="carousel-caption">
          <h2>Relax with Our Spa Treatments</h2>
          <p>Pamper yourself with premium spa experiences.</p>
          <a href="services.php" class="btn btn-warning">View Services</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/3.jpg" class="d-block w-100" alt="Salon Banner 3" style="max-height:500px; object-fit:cover;">
        <div class="carousel-caption">
          <h2>Professional Hair Styling</h2>
          <p>Look fabulous with our expert stylists.</p>
          <a href="booking.php" class="btn btn-success">Get Appointment</a>
        </div>
      </div>
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#salonCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#salonCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>

    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#salonCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#salonCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#salonCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
  </div>
  <!-- Banner Carousel End -->


  <!-- Services start -->
  <section class="services">
    <h2>OUR SERVICES</h2>
    <div class="service-boxes">
      <div class="service">
        <div class="icon"><i class="fa-solid fa-scissors"></i></div>
        <h3>Hair Cut</h3>
        <p>Our Stylists Can Recommend What Will Work Excellent For Your Hair.</p>
      </div>
      <div class="service">
        <div class="icon"><i class="fa-solid fa-user"></i></div>
        <h3>Hair Styling</h3>
        <p>Top-Rated Salon With Talented Stylists For The Best In Customer Service.</p>
      </div>
      <div class="service">
        <div class="icon"><i class="fa-solid fa-spa"></i></div>
        <h3>Skin Care</h3>
        <p>Want To Spice Up Your Look With A New Color? Allow Us To Customize!</p>
      </div>
      <div class="service">
        <div class="icon"><i class="fa-solid fa-star"></i></div>
        <h3>Amazing Makeup</h3>
        <p>Look & Feel Your Best With Our Top-Rated Women's Salon.</p>
      </div>
      <div class="service">
        <div class="icon"><i class="fa-solid fa-wind"></i></div>
        <h3>Hair Blowout</h3>
        <p>Special Stylists For Women Who Just Wants Their Hair Blowout Done.</p>
      </div>
      <div class="service">
        <div class="icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
        <h3>Hair Colors</h3>
        <p>The Right Hair & Skincare With High-Quality Products.</p>
      </div>
    </div>
  </section>
  <!-- Services end -->


  <!-- Deals Carousel Start -->
  <section class="deals-section">
    <h2>Hot Deals</h2>
    <p class="whatsapp-p">MAKE YOUR APPOINTMENT THROUGH WHATSAPP</p>

    <div id="dealCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-6">
              <img src="images/deal_1.jpeg" class="d-block w-100" alt="Deal 1">
            </div>
            <div class="col-md-6">
              <img src="images/deal_2.jpeg" class="d-block w-100" alt="Deal 2">
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-6">
              <img src="images/deal_3.jpeg" class="d-block w-100" alt="Deal 3">
            </div>
            <div class="col-md-6">
              <img src="images/deal_4.jpeg" class="d-block w-100" alt="Deal 4">
            </div>
          </div>
        </div>

      </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#dealCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#dealCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </section>
  <!-- Deals Carousel End -->


  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php include 'php/footer.php'; ?>
