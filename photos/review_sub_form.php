<?php
session_start();
require_once('database.php');

// Check if email is set in the session
$is_logged_in = false;
$user_id = null;
if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];

    // Prepare the SQL statement with parameter binding for security
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the email parameter to prevent SQL injection
    mysqli_stmt_bind_param($stmt, "s", $user_email);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Get the result (assuming a single user with that email)
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Store the retrieved ID
        $user_id = $row['id'];
        $is_logged_in = true; // User is logged in
    } else {
        echo "No user found with email: " . $user_email;
    }

    // Close the result and statement (optional, but recommended for resource management)
    mysqli_stmt_close($stmt);
    mysqli_free_result($result);
}

// Get all review sections
$sql_sections = "SELECT DISTINCT review_section FROM reviews";  // Use DISTINCT to get unique sections
$stmt_sections = mysqli_prepare($conn, $sql_sections);
mysqli_stmt_execute($stmt_sections);
$result_sections = mysqli_stmt_get_result($stmt_sections);

$sections = [];  // Array to store section names
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

// Bind parameter for section filtering (if used)
if ($selected_section) {
    mysqli_stmt_bind_param($stmt_reviews, "s", $selected_section);
}

// Execute the prepared statement for reviews
mysqli_stmt_execute($stmt_reviews);

// Get the result set for reviews
$result_reviews = mysqli_stmt_get_result($stmt_reviews);

// Remember to close the database connection after use
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Blog Reviews</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .review-box {
      width: 80%;
      margin: 20px auto;
      border: 1px solid light grey;
      border-radius: 2rem;
      padding: 20px;
      box-shadow: 0 0px 8px rgba(0, 0, 0, 0.5);
      background-color: #f9f9f9;
    }

    .review-heading {
      text-align: center;
      text-decoration: underline;
    }

    .review {
      margin: 20px 0;
      padding: 10px;
      border: 1px solid black;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0px 0px 15px grey;
    }

    .review-user {
      font-weight: bold;
      font-size: 17px;
    }

    .review-rating {
      float: right;
    }

    .review-actions {
      display: inline-block;
    }

    .review-actions button {
      margin-left: 10px;
    }

    .form-control,
    .form-select {
      width: 85%;
      margin: 0 auto;
    }

    #section-select {
      margin: 1px solid black;
    }

    .explore a {
      border-bottom: 1px solid rgb(247, 67, 18);
    }

    .navbar-nav .nav-link:hover {
      border-bottom: 1px solid rgb(247, 67, 18);
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="photos/BVRIT_LOGO-removebg-preview.png" width="210">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="front_page.php">Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Take Advice</a>
        </li>
        <li class="nav-item explore">
          <a class="nav-link" href="review_sub_form.php" style="color: rgb(247, 67, 18);">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <?php if ($is_logged_in): ?>
            <a class="nav-link" href="logout.php">Logout</a>
          <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
          <?php endif; ?>
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
          <textarea id="review_text" name="review_text" class="form-control" rows="10" required></textarea>
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
    <button type="submit" class="btn btn-primary" style="margin-left: 120px;">Filter</button>
  </form>

  <div id="reviews-container">
    <?php
    // Display reviews
    if (mysqli_num_rows($result_reviews) > 0) {
        while ($review = mysqli_fetch_assoc($result_reviews)) {
            //var_dump($review);
            echo '<div class="review" style="width:80%;margin-left:140px">';
            echo '<div class="review-user">Reviewed by: ' . $review['full_name'] . '</div>';
            echo '<div class="review-section">Section: ' . $review['section_name'] . '</div>';
            echo '<div class="review-rating">Rating: ' . $review['rating'] . '</div>';
            echo '<div class="review-text"> Review: ' . $review['review_text'] . '</div>';
            $id=$review["review_id"];
            // Assuming $user_id is the logged-in user's ID and $review['id'] is the review's user ID
            if ($is_logged_in) {
                echo '<div class="review-actions">';
                echo '<form action="delete_review.php" method="post" style="display:inline;">';
                echo '<input type="hidden" name="review_id" value="' . $review['review_id'] . '">'; // Assuming 'review_id' is the column name for the review's ID
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

