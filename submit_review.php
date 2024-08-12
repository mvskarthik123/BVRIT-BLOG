<?php

require_once('database.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = (int)$_POST['user_id']; // Sanitize user ID
  $review_text = mysqli_real_escape_string($conn, $_POST['review_text']); // Escape special characters
  $review_section = mysqli_real_escape_string($conn, $_POST['review_section']);
  $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : null; // Handle optional rating

  $sql = "INSERT INTO reviews (id, review_text, review_section, rating)
          VALUES (?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql); // Prepare statement for security

  mysqli_stmt_bind_param($stmt, 'issi', $user_id, $review_text, $review_section, $rating);

  if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert(' Review submitted successfully!') ; 
    window.location.href = 'review_sub_form.php';
    </script>";
   

  } else {
    echo "Error submitting review: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);
}

mysqli_close($conn); 
 ?>
