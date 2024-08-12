<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_GET['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Password validation
    $min_length = 8;
    $has_uppercase = preg_match('/[A-Z]/', $new_password);
    $has_lowercase = preg_match('/[a-z]/', $new_password);
    $has_number = preg_match('/[0-9]/', $new_password);
    $has_special_char = preg_match('/[\W]/', $new_password);

    if ($new_password !== $confirm_password) {
        $error_message = 'New password and confirm password do not match.';
    } elseif (strlen($new_password) < $min_length) {
        $error_message = 'Password must be at least ' . $min_length . ' characters long.';
    } elseif (!$has_uppercase || !$has_lowercase || !$has_number || !$has_special_char) {
        $error_message = 'Password must contain uppercase, lowercase, number, and special character.';
    } else {
        // If all checks pass, proceed with password update

        // Database connection
        $servername = 'localhost';
        $username = 'root';
        $dbpassword = '';
        $dbname = 'blog_wad';

        $conn = new mysqli($servername, $username, $dbpassword, $dbname, 3307);

        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        }

        // Update the password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET passwords = ? WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $hashed_password, $email);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success_message = 'Password reset successful. You can now log in with your new password.';
        } else {
            $error_message = 'Failed to reset password. Please try again.';
        }

        mysqli_stmt_close($stmt);
        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">


    <!-- Inline CSS for background image -->
    <style>
        body {
            background-image: url('https://bvrit.ac.in/wp-content/uploads/2023/06/IndoorSportsCom.webp');
            background-position: center;
            padding: 0;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 50px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            background-color: rgba(255, 255, 255, 0.7);
        }
        .form-group {
            margin-bottom: 30px;
        }

        /* Style for password container */
        .password-container {
            position: relative;
        }

        /* Style for the eye icon */
        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container" data-aos="zoom-in-up">
        <h2>Reset Password</h2>
        <form action="resetpass.php?email=<?php echo urlencode($_GET['email']); ?>" method="post">
            <div class="form-group password-container">
                <input type="password" placeholder="New Password" name="new_password" id="new-password-input" class="form-control" required>
                <i class="fa fa-eye eye-icon" id="toggle-new-password-icon"></i>
            </div>
            <div class="form-group password-container">
                <input type="password" placeholder="Confirm New Password" name="confirm_password" id="confirm-password-input" class="form-control" required>
                <i class="fa fa-eye eye-icon" id="toggle-confirm-password-icon"></i>
            </div>
            <div class="form-btn">
                <input type="submit" value="Reset Password" class="btn btn-primary">
            </div>

            <?php
            // Display success or error messages
            if (isset($success_message)) {
                echo "<div class='text-success'>{$success_message}</div>";
            }

            if (isset($error_message)) {
                echo "<div class='text-danger'>{$error_message}</div>";
            }
            ?>
        </form>
        <div>
            <p>Remember your password? <a href="login.php">Login Here</a></p>
        </div>
    </div>

    <!-- JavaScript to handle eye icons for password fields -->
    <script>
        // Toggle password visibility for new password field
        const newPasswordInput = document.getElementById("new-password-input");
        const toggleNewPasswordIcon = document.getElementById("toggle-new-password-icon");

        toggleNewPasswordIcon.addEventListener("click", function () {
            if (newPasswordInput.type === "password") {
                newPasswordInput.type = "text";
                toggleNewPasswordIcon.classList.remove("fa-eye");
                toggleNewPasswordIcon.classList.add("fa-eye-slash");
            } else {
                newPasswordInput.type = "password";
                toggleNewPasswordIcon.classList.remove("fa-eye-slash");
                toggleNewPasswordIcon.classList.add("fa-eye");
            }
        });

        // Toggle password visibility for confirm password field
        const confirmPasswordInput = document.getElementById("confirm-password-input");
        const toggleConfirmPasswordIcon = document.getElementById("toggle-confirm-password-icon");

        toggleConfirmPasswordIcon.addEventListener("click", function () {
            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                toggleConfirmPasswordIcon.classList.remove("fa-eye");
                toggleConfirmPasswordIcon.classList.add("fa-eye-slash");
            } else {
                confirmPasswordInput.type = "password";
                toggleConfirmPasswordIcon.classList.remove("fa-eye-slash");
                toggleConfirmPasswordIcon.classList.add("fa-eye");
            }
        });
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
     <script>
        AOS.init({
            duration : 1000
        });
        </script>
</body>
</html>





    
    <?php if (isset($success_message)) { ?>
        <div class="success"><?php echo $success_message; ?></div>
    <?php } ?>

    <?php if (isset($error_message)) { ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php } ?>
</body>
</html>
