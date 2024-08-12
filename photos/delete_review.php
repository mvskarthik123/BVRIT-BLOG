<?php
session_start();
require_once('database.php');

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}


// Check if review_id and user_id are set
if (isset($_POST['review_id']) && isset($_POST['user_id'])) {
    
    $review_id = $_POST['review_id'];
    $user_id = $_POST['user_id'];

    // Prepare the SQL statement to delete the review
    $sql = "DELETE  FROM reviews WHERE review_id = ? AND id = ?";
    echo "user id ". $user_id;
    echo "review id ".$review_id;
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $review_id, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['message'] = "Review deleted successfully.";
    } else {
        $_SESSION['message'] = "Error deleting review: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['message'] = "Invalid request.";
}

// Close the database connection
mysqli_close($conn);

// Redirect to the review page with a message
header("Location: review_sub_form.php");
exit();
?>
