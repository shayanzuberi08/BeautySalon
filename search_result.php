<?php
include 'php/config.php';
include 'php/header.php';

$keyword = "";
$result = null;

if(isset($_GET['q'])){
    $keyword = trim($_GET['q']);
    $sql = "SELECT * FROM services 
            WHERE name LIKE ? OR category LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$keyword%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results</title>
  <style>
    /* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
    body {
      font-family: Arial, sans-serif;
    }
    h2 { text-align: center; margin-bottom: 20px; }

    .search-bar {
      text-align: center;
      margin-bottom: 20px;
    }
    .search-bar input[type="text"] {
      padding: 10px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .search-bar button {
      padding: 10px 15px;
      border: none;
      background: #e91e63;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }
    .search-bar button:hover {
      background: #d81b60;
    }

    .services-grid {
        
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  max-width: 1100px;   /* 🔹 Grid width fix */
  margin: 0 auto;      /* 🔹 Center align grid */
  padding: 20px;
}

.service-card {
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  transition: transform 0.3s, box-shadow 0.3s;
  text-align: center;   /* 🔹 Card content center */
}

.service-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 18px rgba(0,0,0,0.15);
}

.service-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.service-info {
  padding: 15px;
}

.service-info h3 {
  margin: 0;
  font-size: 20px;
  color: #333;
}

.service-info .category {
  display: block;
  margin-top: 5px;
  color: #777;
  font-size: 14px;
}

.description {
  margin: 10px 0;
  font-size: 14px;
  color: #555;
}

.price {
  color: #e91e63;
  font-weight: bold;
  margin-top: 10px;
  font-size: 16px;
}

    .no-result {
      text-align: center;
      color: #777;
      font-size: 18px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

  <h2>Search Results for "<?= htmlspecialchars($keyword) ?>"</h2>

  <!-- Search bar again for convenience -->
  <div class="search-bar">
    <form method="GET" action="">
      <input type="text" name="q" placeholder="Search again..." value="<?= htmlspecialchars($keyword) ?>">
      <button type="submit">Search</button>
    </form>
  </div>

  <!-- Results -->
  <div class="services-grid">
    <?php if($result && $result->num_rows > 0): ?>
      <?php while($service = $result->fetch_assoc()): ?>
        <div class="service-card">
          <img src="./images/<?= $service['image'] ?>" alt="<?= $service['name'] ?>">
          <div class="service-info">
            <h3><?= $service['name'] ?></h3>
            <span class="category"><?= $service['category'] ?></span>
            <p class="description"><?= $service['description'] ?></p>
            <p class="price">Rs. <?= $service['price'] ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="no-result">No results found for "<b><?= htmlspecialchars($keyword) ?></b>"</p>
    <?php endif; ?>
  </div>
<?php include 'php/footer.php'; ?>
</body>
</html>
