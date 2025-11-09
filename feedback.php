<?php
include 'php/header.php';
include 'php/config.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>
<body>
<h1>Feedback</h1>

<?php if(!isset($_SESSION['user_id'])): ?>
    <p>Please <a href="login.php">login</a> to submit feedback.</p>
<?php else: ?>
    <form action="php/feedback_process.php" method="POST">
        <label>Your Feedback:</label>
        <textarea name="message" rows="5" required></textarea>
        <button type="submit">Submit Feedback</button>
    </form>
<?php endif; ?>

<h2>Previous Feedback</h2>
<ul>
<?php
$feedbacks = $conn->query("SELECT f.message, u.name as user_name, f.created_at 
                           FROM feedback f 
                           JOIN users u ON f.user_id=u.id
                           ORDER BY f.created_at DESC");

while($f = $feedbacks->fetch_assoc()){
    echo "<li class='feedback-msg'><strong>{$f['user_name']}:</strong> {$f['message']} <em>({$f['created_at']})</em></li>";
}
?>
</ul>

</body>
</html>
<?php include 'php/footer.php'; ?>
