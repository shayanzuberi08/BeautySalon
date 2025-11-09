<?php
include 'php/header.php';
include 'php/config.php'; // DB connection

if (!isset($_SESSION['user_id'])) {
    echo "<p style='text-align:center; margin-top:50px;'>Please <a href='login.php'>login</a> to see your booking history.</p>";
    include 'php/footer.php';
    exit; // ✅ Stop further execution
}

$user_id = $_SESSION['user_id']; // Ab safe hai

// Query for booking history
$sql = "SELECT b.id, s.name AS service_name, b.branch, b.booking_date, b.status, b.created_at 
        FROM bookings b
        JOIN services s ON b.service_id = s.id
        WHERE b.user_id = ?
        ORDER BY b.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking History</title>
  <link rel="stylesheet" href="css/booking_history.css"> 
  
</head>
<body>

  <h2>Your Booking History</h2>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Service</th>
        <th>Branch</th>
        <th>Booking Date</th>
        <th>Status</th>
        <th>Booked On</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['service_name'] ?></td>
          <td><?= $row['branch'] ?></td>
          <td><?= date("d M Y", strtotime($row['booking_date'])) ?></td>
          <td><span class="status <?= strtolower($row['status']) ?>"><?= ucfirst($row['status']) ?></span></td>
          <td><?= date("d M Y H:i", strtotime($row['created_at'])) ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php include 'php/footer.php'; ?>
</body>
</html>
