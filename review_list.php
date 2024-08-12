<?php
// Display reviews
if (mysqli_num_rows($result_reviews) > 0) {
  while ($row_review = mysqli_fetch_assoc($result_reviews)) {
    $review_id = $row_review['review_id'];
    $reviewer_name = $row_review['full_name'];
    $rating = $row_review['rating'];
    $review_text = $row_review['review_text'];
    $section_name = $row_review['section_name'];

    echo "<div class='review'>";
    echo "<p><b>Section:</b> " . $section_name . "</p>";
    echo "<p><b>Reviewed by:</b> " . $reviewer_name . "</p>";
    echo "<p>Rating: " . ($rating ? $rating : "Not Rated") . "</p>";
    echo "<p>Review Text: " . $review_text . "</p>";
    echo "</div>";
  }
} else {
  echo "<p>No reviews found.</p>";
}
?>

