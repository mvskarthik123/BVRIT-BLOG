<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- Inline CSS for background image -->
    <style>
        body {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/BVRIT_VInayak_Temple.jpg/1200px-BVRIT_VInayak_Temple.jpg');
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
    <div class="container" data-aos="fade-up">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group password-container">
                <!-- Password input with eye icon -->
                <input type="password" placeholder="Enter Password:" name="password" id="password-input" class="form-control">
                <i class="fa fa-eye eye-icon" id="toggle-password-icon"></i>
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
            <div>
    <p>Forgot your password? <a href="forgotpassword.php">Reset Password</a></p>
</div>
        </form>

        <?php if (isset($error)) { ?>
            <div class="text-danger"><?php echo $error; ?></div>
        <?php } ?>

        <div>
            <p>Not registered yet? <a href="registration.php">Register Here</a></p>
        </div>
    </div>

    <!-- JavaScript to handle eye icon -->
    <script>
        // Select the password input and eye icon elements
        const passwordInput = document.getElementById("password-input");
        const toggleIcon = document.getElementById("toggle-password-icon");

        // Add a click event listener to the eye icon
        toggleIcon.addEventListener("click", function () {
            // Check the current type of the password input
            if (passwordInput.type === "password") {
                // If it's hidden, show the password and change icon to eye-slash
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                // If it's visible, hide the password and change icon to eye
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        });
    </script>

    <!-- AOS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration : 1000
        });
        </script>
</script>
</body>
</html>
