<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <style>
        /* Existing styles */
        body {
            background-image: url('https://mybvrit.com/wp-content/uploads/2015/03/bvritbldg.jpg');
            background-size: cover;
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

        /* Style for eye icons */
        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="container" data-aos="fade-right">
        <?php
        // Your existing PHP code for handling the form submission
        // Handle form submission and database insertion
        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $guardianName = $_POST["Guardian_name"];
            $guardianNumber = $_POST["Guardian_number"];
            $branchInterested = $_POST["branch_interested"];
            $place = $_POST["place"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();
            if (trim($fullName) === '') {
                array_push($errors, "Full name is required");
            }
            if (!preg_match("/^[a-zA-Z]+$/", $fullName)) {
                $errors[] = "Name can only contain letters without spaces.";
            }
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])/", $password)) {
                $errors[] = "Password must contain at least one uppercase letter and one lowercase letter.";
            }

            if (trim($email) === '') {
                array_push($errors, "Email is required");
            }

            if (trim($password) === '') {
                array_push($errors, "Password is required");
            }

            if (trim($passwordRepeat) === '') {
                array_push($errors, "Password repeat is required");
            }

            if (trim($guardianName) === '') {
                array_push($errors, "Guardian name is required");
            }

            if (trim($guardianNumber) === '') {
                array_push($errors, "Guardian number is required");
            }

            if (trim($branchInterested) === '') {
                array_push($errors, "Branch interested is required");
            }

            if (trim($place) === '') {
                array_push($errors, "Place is required");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters long");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Password does not match");
            }
            if (!preg_match("/^[a-zA-Z]+$/", $guardianName)) {
                $errors[] = "Guardian name can only contain letters without spaces.";
            }

            if (!preg_match("/^[a-zA-Z]+$/", $place)) {
                $errors[] = "Place can only contain letters without spaces.";
            }

            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($errors, "Email already exists!");
                }
            }

            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                $sql = "INSERT INTO users (full_name, email, passwords, guardian_name, guardian_number, branch_interested, place) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, "sssssss", $fullName, $email, $passwordHash, $guardianName, $guardianNumber, $branchInterested, $place);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                } else {
                    die("Something went wrong");
                }
            }
        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <!-- Password input with eye icon -->
            <div class="form-group password-container">
                <input type="password" class="form-control" name="password" id="password-input" placeholder="Password">
                <i class="fa fa-eye eye-icon" id="toggle-password-icon"></i>
            </div>

            <!-- Repeat Password input with eye icon -->
            <div class="form-group password-container">
                <input type="password" class="form-control" name="repeat_password" id="repeat-password-input" placeholder="Repeat Password">
                <i class="fa fa-eye eye-icon" id="toggle-repeat-password-icon"></i>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="Guardian_name" placeholder="Guardian Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Guardian_number" placeholder="Guardian Number">
            </div>

            <div class="form-group">
                <select class="form-control" name="branch_interested">
                    <option value="">Select Branch Interested</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="CHEM">Chem</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="place" placeholder="Place">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
            <p>Already Registered? <a href="login.php">Login Here</a></p>
        </div>
    </div>

    <!-- JavaScript to handle eye icons -->
    <script>
        // Function to toggle password visibility
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

            toggleIcon.addEventListener("click", function () {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleIcon.classList.remove("fa-eye");
                    toggleIcon.classList.add("fa-eye-slash");
                } else {
                    passwordInput.type = "password";
                    toggleIcon.classList.remove("fa-eye-slash");
                    toggleIcon.classList.add("fa-eye");
                }
            });
        }

        // Initialize password visibility toggling
        togglePasswordVisibility("password-input", "toggle-password-icon");
        togglePasswordVisibility("repeat-password-input", "toggle-repeat-password-icon");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Initialize AOS -->
<script>
    AOS.init({
        duration : 1000
    });
    </script>
</body>
</html>
