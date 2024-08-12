<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

require_once "database.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $passwordRepeat = trim($_POST["repeat_password"]);
    $guardianName = trim($_POST["Guardian_name"]);
    $guardianNumber = trim($_POST["Guardian_number"]);
    $branchInterested = trim($_POST["branch_interested"]);
    $place = trim($_POST["place"]);

    if ($fullName === '') {
        $errors[] = "Full name is required";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $fullName)) {
        $errors[] = "Name can only contain letters without spaces.";
    }

    if ($email === '') {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }

    if ($password === '') {
        $errors[] = "Password is required";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }

    if ($passwordRepeat === '') {
        $errors[] = "Password repeat is required";
    } elseif ($password !== $passwordRepeat) {
        $errors[] = "Passwords do not match";
    }

    if ($guardianName === '') {
        $errors[] = "Guardian name is required";
    } elseif (!preg_match("/^[a-zA-Z]+$/", $guardianName)) {
        $errors[] = "Guardian name can only contain letters without spaces.";
    }

    if ($guardianNumber === '') {
        $errors[] = "Phone number is required";
    } elseif (!preg_match("/^\d{10}$/", $guardianNumber)) {
        $errors[] = "Phone number must be exactly 10 digits long.";
    }

    if ($branchInterested === '') {
        $errors[] = "Branch interested is required";
    }

    if ($place === '') {
        $errors[] = "Place is required";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $place)) {
        $errors[] = "Place can only contain letters and spaces.";
    }

    if (count($errors) === 0) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $errors[] = "Email already exists!";
            }
        }

        if (count($errors) === 0) {
            $sql = "INSERT INTO users (full_name, email, passwords, guardian_name, guardian_number, branch_interested, place) VALUES (?, ?, ?, ?, ?, ?, ?)";
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssssss", $fullName, $email, $passwordHash, $guardianName, $guardianNumber, $branchInterested, $place);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            } else {
                die("Something went wrong");
            }
        }
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
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

        .password-container {
            position: relative;
        }

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
        <form action="registration.php" method="post" id="registration-form">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name" id="fullname">
                <div class="invalid-feedback" id="fullname-error"></div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" id="email">
                <div class="invalid-feedback" id="email-error"></div>
            </div>
            <div class="form-group password-container">
                <input type="password" class="form-control" name="password" id="password-input" placeholder="Password">
                <i class="fa fa-eye eye-icon" id="toggle-password-icon"></i>
                <div class="invalid-feedback" id="password-error"></div>
            </div>
            <div class="form-group password-container">
                <input type="password" class="form-control" name="repeat_password" id="repeat-password-input" placeholder="Repeat Password">
                <i class="fa fa-eye eye-icon" id="toggle-repeat-password-icon"></i>
                <div class="invalid-feedback" id="repeat-password-error"></div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Guardian_name" placeholder="Guardian Name" id="guardian-name">
                <div class="invalid-feedback" id="guardian-name-error"></div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Guardian_number" placeholder="Phone Number" id="guardian-number">
                <div class="invalid-feedback" id="guardian-number-error"></div>
            </div>
            <div class="form-group">
                <select class="form-control" name="branch_interested" id="branch-interested">
                    <option value="">Select Branch Interested</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="ECE">ECE</option>
                    <option value="EEE">EEE</option>
                    <option value="CHEM">Chem</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="other">Other</option>
                </select>
                <div class="invalid-feedback" id="branch-interested-error"></div>
            </div>
            <div class="form-group">
                <select class="form-control" name="place" id="place">
                    <option value="">Select Place</option>
                    <option value="Kukatpally">Kukatpally</option>
                    <option value="Madhapur">Madhapur</option>
                    <option value="Gachibowli">Gachibowli</option>
                    <option value="Hitec City">Hitec City</option>
                    <option value="Banjara Hills">Banjara Hills</option>
                    <option value="Jubilee Hills">Jubilee Hills</option>
                    <option value="other">Other</option>
                </select>
                <div class="invalid-feedback" id="place-error"></div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
            <p>Already have an account? <a href="login.php">Log In Here</a></p>
        </form>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const fullname = document.getElementById("fullname");
    const email = document.getElementById("email");
    const password = document.getElementById("password-input");
    const repeatPassword = document.getElementById("repeat-password-input");
    const guardianName = document.getElementById("guardian-name");
    const guardianNumber = document.getElementById("guardian-number");
    const branchInterested = document.getElementById("branch-interested");
    const place = document.getElementById("place");

    const fullnameError = document.getElementById("fullname-error");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");
    const repeatPasswordError = document.getElementById("repeat-password-error");
    const guardianNameError = document.getElementById("guardian-name-error");
    const guardianNumberError = document.getElementById("guardian-number-error");
    const branchInterestedError = document.getElementById("branch-interested-error");
    const placeError = document.getElementById("place-error");

    const form = document.getElementById("registration-form");

    fullname.addEventListener("input", () => {
        if (!/^[a-zA-Z]+$/.test(fullname.value)) {
            fullname.classList.add("is-invalid");
            fullnameError.textContent = "Name can only contain letters without spaces.";
        } else {
            fullname.classList.remove("is-invalid");
            fullnameError.textContent = "";
        }
    });

    email.addEventListener("input", () => {
        if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email.value)) {
            email.classList.add("is-invalid");
            emailError.textContent = "Email is not valid";
        } else {
            email.classList.remove("is-invalid");
            emailError.textContent = "";
        }
    });

    password.addEventListener("input", () => {
        if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password.value)) {
            password.classList.add("is-invalid");
            passwordError.textContent = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        } else {
            password.classList.remove("is-invalid");
            passwordError.textContent = "";
        }
        // Re-check confirm password
        if (repeatPassword.value !== '' && repeatPassword.value !== password.value) {
            repeatPassword.classList.add("is-invalid");
            repeatPasswordError.textContent = "Passwords do not match";
        } else {
            repeatPassword.classList.remove("is-invalid");
            repeatPasswordError.textContent = "";
        }
    });

    repeatPassword.addEventListener("input", () => {
        if (repeatPassword.value !== password.value) {
            repeatPassword.classList.add("is-invalid");
            repeatPasswordError.textContent = "Passwords do not match";
        } else {
            repeatPassword.classList.remove("is-invalid");
            repeatPasswordError.textContent = "";
        }
    });

    guardianName.addEventListener("input", () => {
        if (!/^[a-zA-Z]+$/.test(guardianName.value)) {
            guardianName.classList.add("is-invalid");
            guardianNameError.textContent = "Guardian name can only contain letters without spaces.";
        } else {
            guardianName.classList.remove("is-invalid");
            guardianNameError.textContent = "";
        }
    });

    guardianNumber.addEventListener("input", () => {
        if (!/^\d{10}$/.test(guardianNumber.value)) {
            guardianNumber.classList.add("is-invalid");
            guardianNumberError.textContent = "Phone number must be exactly 10 digits long.";
        } else {
            guardianNumber.classList.remove("is-invalid");
            guardianNumberError.textContent = "";
        }
    });

    branchInterested.addEventListener("change", () => {
        if (branchInterested.value === '') {
            branchInterested.classList.add("is-invalid");
            branchInterestedError.textContent = "Branch interested is required";
        } else {
            branchInterested.classList.remove("is-invalid");
            branchInterestedError.textContent = "";
        }
    });

    place.addEventListener("change", () => {
        if (place.value === '') {
            place.classList.add("is-invalid");
            placeError.textContent = "Place is required";
        } else if (!/^[a-zA-Z\s]+$/.test(place.value)) {
            place.classList.add("is-invalid");
            placeError.textContent = "Place can only contain letters and spaces.";
        } else {
            place.classList.remove("is-invalid");
            placeError.textContent = "";
        }
    });

    form.addEventListener("submit", (event) => {
        let isValid = true;

        if (!/^[a-zA-Z]+$/.test(fullname.value)) {
            fullname.classList.add("is-invalid");
            fullnameError.textContent = "Name can only contain letters without spaces.";
            isValid = false;
        }

        if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email.value)) {
            email.classList.add("is-invalid");
            emailError.textContent = "Email is not valid";
            isValid = false;
        }

        if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password.value)) {
            password.classList.add("is-invalid");
            passwordError.textContent = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
            isValid = false;
        }

        if (repeatPassword.value !== password.value) {
            repeatPassword.classList.add("is-invalid");
            repeatPasswordError.textContent = "Passwords do not match";
            isValid = false;
        }

        if (!/^[a-zA-Z]+$/.test(guardianName.value)) {
            guardianName.classList.add("is-invalid");
            guardianNameError.textContent = "Guardian name can only contain letters without spaces.";
            isValid = false;
        }

        if (!/^\d{10}$/.test(guardianNumber.value)) {
            guardianNumber.classList.add("is-invalid");
            guardianNumberError.textContent = "Phone number must be exactly 10 digits long&no letters.";
            isValid = false;
        }

        if (branchInterested.value === '') {
            branchInterested.classList.add("is-invalid");
            branchInterestedError.textContent = "Branch interested is required";
            isValid = false;
        }

        if (place.value === '') {
            place.classList.add("is-invalid");
            placeError.textContent = "Place is required";
            isValid = false;
        } else if (!/^[a-zA-Z\s]+$/.test(place.value)) {
            place.classList.add("is-invalid");
            placeError.textContent = "Place can only contain letters and spaces.";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    document.getElementById('toggle-password-icon').addEventListener('click', function () {
        const passwordInput = document.getElementById('password-input');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    document.getElementById('toggle-repeat-password-icon').addEventListener('click', function () {
        const repeatPasswordInput = document.getElementById('repeat-password-input');
        if (repeatPasswordInput.type === 'password') {
            repeatPasswordInput.type = 'text';
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            repeatPasswordInput.type = 'password';
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
});
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            offset: 100,
        });
    </script>
</body>

</html>
