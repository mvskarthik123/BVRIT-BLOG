<?php
session_start();
require_once "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$errors = [];
$success_msg = "";

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT full_name, email, guardian_number, profile_pic FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($fullName, $email, $guardianNumber, $profilePic);
$stmt->fetch();
$stmt->close();

if (isset($_POST["update"])) {
    $newFullName = trim($_POST["fullname"]);
    $newEmail = trim($_POST["email"]);
    $newGuardianNumber = trim($_POST["guardian_number"]);
    $profilePicPath = $profilePic;  // Keep the current profile pic path

    if (isset($_FILES["profile_pic"]) && $_FILES["profile_pic"]["error"] == 0) {
        $profilePicPath = "uploads/" . basename($_FILES["profile_pic"]["name"]);
        move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profilePicPath);
    }

    if ($newFullName === '') {
        $errors[] = "Full name is required";
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $newFullName)) {
        $errors[] = "Full name can only contain letters and spaces.";
    }
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }
    if (!preg_match("/^[0-9]{10}$/", $newGuardianNumber)) {
        $errors[] = "Guardian number should be a 10-digit phone number.";
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("UPDATE users SET full_name = ?, email = ?, guardian_number = ?, profile_pic = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $newFullName, $newEmail, $newGuardianNumber, $profilePicPath, $userId);
        if ($stmt->execute()) {
            $_SESSION['full_name'] = $newFullName;
            $success_msg = "Profile updated successfully.";
        } else {
            $errors[] = "Something went wrong, please try again.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>



    <div class="container">
        <?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        }
        if ($success_msg) {
            echo "<div class='alert alert-success'>$success_msg</div>";
        }
        ?>
        <form action="edit_profile.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" name="fullname" value="<?php echo htmlspecialchars($fullName); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="form-group">
                <label for="guardian_number">Guardian Number</label>
                <input type="text" class="form-control" name="guardian_number" value="<?php echo htmlspecialchars($guardianNumber); ?>">
            </div>
            <div class="form-group">
                <label for="profile_pic">Profile Picture</label>
                <input type="file" class="form-control" name="profile_pic">
                <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile Picture" class="profile-pic mt-2">
            </div>
            <div class="form-btn mt-3">
                <input type="submit" class="btn btn-primary" value="Update Profile" name="update">
            </div>
        </form>
    </div>
</body>
</html>
