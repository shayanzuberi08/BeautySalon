<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shayan's Beauty Salon</title>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
    body {
      font-family: Arial, sans-serif;
    }
    /* ===== HEADER ===== */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 8%;
      background: #fff;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    header img {
      height: 50px;
    }

    header nav {
      display: flex;
      gap: 20px;
    }

    header nav a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: color 0.3s;
    }

    header nav a:hover {
      color: #e91e63;
    }
    /* ===== SEARCH BAR ===== */
    .search-form {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .search-form input {
      padding: 6px 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }
    .search-form button {
      padding: 6px 12px;
      border: none;
      background: #e91e63;
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
    }
    .search-form button:hover {
      background: #d81b60;
    }


    /* ===== TOGGLE BUTTON ===== */
    .menu-toggle {
      display: none;
      flex-direction: column;
      cursor: pointer;
      gap: 5px;
    }

    .menu-toggle span {
      height: 3px;
      width: 25px;
      background: #333;
      border-radius: 2px;
    }

    /* ===== MOBILE VIEW ===== */
    @media (max-width: 768px) {
      nav {
        position: absolute;
        top: 80px;
        right: 0;
        background: #fff;
        flex-direction: column;
        width: 220px;
        text-align: center;
        padding: 20px;
        gap: 15px;
        display: none;   /* 🔴 Default hidden */
        box-shadow: -2px 2px 8px rgba(0,0,0,0.1);
      }

      nav.active {
        display:none;   /* 🟢 Show when active */
      }

      .menu-toggle {
        display: flex;
      }
    }
  </style>
</head>
<body>
  <header>
    <img src="images/logo.png" alt="Logo" style="height:50px;">
    <div class="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <nav>
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="services.php">Services</a>
      <a href="booking.php">Booking</a>
      <a href="booking_history.php">Booking History</a>
      <a href="feedback.php">Feedback</a>
      <?php if(isset($_SESSION['user_id'])): ?>
        <a href="logout.php">Logout</a>
      <?php else: ?>

        <!-- 🔎 Search Bar -->
      <form class="search-form" method="GET" action="search_result.php">
        <input type="text" name="q" placeholder="Search services...">
        <button type="submit">Search</button>
      </form>

        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
      <?php endif; ?>
    </nav>
  </header>

  <!-- ✅ Working JS -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const menuToggle = document.querySelector(".menu-toggle");
      const nav = document.querySelector("header nav");

      menuToggle.addEventListener("click", () => {
        nav.classList.toggle("active");
      });
    });
  </script>
</body>
</html>
