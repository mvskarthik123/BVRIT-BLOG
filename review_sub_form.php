<?php
session_start();
require_once('database.php');


$is_logged_in = false;
$user_id = null;
if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];

    
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

   
    mysqli_stmt_bind_param($stmt, "s", $user_email);

    
    mysqli_stmt_execute($stmt);

    
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
       
        $user_id = $row['id'];
        $is_logged_in = true; // User is logged in
    } else {
        echo "No user found with email: " . $user_email;
    }

    
    mysqli_stmt_close($stmt);
    mysqli_free_result($result);
}


$sql_sections = "SELECT DISTINCT review_section FROM reviews";  // Use DISTINCT to get unique sections
$stmt_sections = mysqli_prepare($conn, $sql_sections);
mysqli_stmt_execute($stmt_sections);
$result_sections = mysqli_stmt_get_result($stmt_sections);

$sections = [];  
if (mysqli_num_rows($result_sections) > 0) {
    while ($row_section = mysqli_fetch_assoc($result_sections)) {
        $sections[] = $row_section['review_section'];
    }
}
mysqli_stmt_close($stmt_sections);
mysqli_free_result($result_sections);

// Selected section (default to all)
$selected_section = isset($_GET['section']) ? $_GET['section'] : "";

// Prepare SQL statement with section filtering (if selected)
$sql_reviews = "SELECT r.review_id AS review_id, r.rating, r.review_text, u.full_name, r.review_section AS section_name, r.id AS reviewer_id
                FROM reviews r
                INNER JOIN users u ON r.id = u.id";

if ($selected_section) {
    $sql_reviews .= " WHERE r.review_section = ?";
}

$stmt_reviews = mysqli_prepare($conn, $sql_reviews);


if ($selected_section) {
    mysqli_stmt_bind_param($stmt_reviews, "s", $selected_section);
}


mysqli_stmt_execute($stmt_reviews);


$result_reviews = mysqli_stmt_get_result($stmt_reviews);


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Blog Reviews</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
   
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f4f4f9;
      color: #333;
    }

    .navbar {
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .review-box {
      max-width: 900px;
      margin: 40px auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .review-heading {
      text-align: center;
      font-size: 36px;
      margin-bottom: 20px;
      color:#0056b3;
      font-family:'Playfair Display',serif;
    }

    .review {
      margin: 20px 0;
      padding: 20px;
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
    }

    .review-user {
      font-weight: bold;
      font-size: 18px;
    }

    .review-section {
      color: #555;
    }

    .review-rating {
      float: right;
      color: #ffc107;
    }

    .review-actions {
      display: inline-block;
      margin-top: 10px;
    }

    .form-control,
    .form-select {
      width: 100%;
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004085;
    }

    .filter-form {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .filter-form .btn-primary {
      width: 100%;
    }

    .reviews-container {
      max-width: 900px;
      margin: 20px auto;
    }

    .navbar-nav .nav-link.active {
      border-bottom: 2px solid #ff4500;
    }

    .review-text {
      margin-top: 10px;
    }
    .navbar-brand {
      font-family: 'Playfair Display',sans-serif;
      
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
    <h1>THE BV BLOG.</h1>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="front_page.php">Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quizinfo.html">A Little Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Your Profile</a>
        </li>
        <li class="nav-item explore">
          <a class="nav-link active" href="review_sub_form.php">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About Us</a>
        </li>
      
      </ul>
    </div>
  </nav>

  <div class="review-box">
    <h1 class="review-heading">College Blog Reviews</h1>
    <?php if ($is_logged_in): ?>
      <form action="submit_review.php" method="post">
        <input value="<?php echo $user_id; ?>" type="number" id="user_id" name="user_id" required hidden>

        <div class="form-group">
          <label for="review_section">Review Section:</label>
          <select id="review_section" name="review_section" class="form-control" required>
            <option value="">Select a section</option>
            <option value="library">Library</option>
            <option value="food">Food</option>
            <option value="hang-outs">Hangouts</option>
            <option value="hostel and transportation">Hostel and transportation</option>
            <option value="sports">Sports</option>
            <option value="placements">Placements</option>
            <option value="clubs">Clubs</option>
          </select>
        </div>

        <div class="form-group">
          <label for="rating">Rating </label>
          <input type="number" id="rating" name="rating" class="form-control" min="1" max="5"  required>
        </div>

        <div class="form-group">
          <label for="review_text">Review Text:</label>
          <textarea id="review_text" name="review_text" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
      </form>
     
    <?php else: ?>
      <p>Please <a href="login.php">login</a> to submit a review.</p>
      <script>
        alert('You need to login first to submit a review.');
      </script>
    <?php endif; ?>
  </div>

  <div class="filter-form">
    <h2>Filter by Section:</h2>
    <form id="filter-form" action="" method="get">
      <div class="form-group">
        <select id="section-select" name="section" class="form-control">
          <option value="">All Sections</option>
          <?php foreach ($sections as $section) : ?>
            <option value="<?php echo $section; ?>" <?php echo ($selected_section == $section) ? 'selected' : ''; ?>>
              <?php echo $section; ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Filter</button>
    </form>
  </div>

  <div class="reviews-container">
    <?php
    // Display reviews
    if (mysqli_num_rows($result_reviews) > 0) {
        while ($review = mysqli_fetch_assoc($result_reviews)) {
            echo '<div class="review">';
            echo '<div class="review-user">Reviewed by: ' . $review['full_name'] . '</div>';
            echo '<div class="review-section">Section: ' . $review['section_name'] . '</div>';
            echo '<div class="review-rating">Rating: ' . $review['rating'] . '</div>';
            echo '<div class="review-text">Review: ' . $review['review_text'] . '</div>';
            $id=$review["review_id"];
            // Display delete button only for reviews written by the logged-in user
            if ($is_logged_in && $review['reviewer_id'] == $user_id) {
                echo '<div class="review-actions">';
                echo '<form action="delete_review.php" method="post" style="display:inline;">';
                echo '<input type="hidden" name="review_id" value="' . $review['review_id'] . '">';
                echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this review?\');">Delete</button>';
                echo '</form>';
                echo '</div>';
            }
            echo '</div>';
        }
    } else {
        echo '<p>No reviews found.</p>';
    }
    mysqli_stmt_close($stmt_reviews);
    mysqli_free_result($result_reviews);
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
