<?php
session_start();
require_once "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT review_text, review_topic FROM reviews WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($reviewText, $reviewTopic);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>My Reviews</h2>
        <?php while ($stmt->fetch()): ?>
            <div class="review">
                <h4><?php echo htmlspecialchars($reviewTopic); ?></h4>
                <p><?php echo nl2br(htmlspecialchars($reviewText)); ?></p>
            </div>
            <hr>
        <?php endwhile; ?>
        <?php $stmt->close(); ?>
    </div>
</body>
</html>
