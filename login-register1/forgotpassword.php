
<?php
session_start();

// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Database connection
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'blog_wad';

    $conn = new mysqli($servername, $username, $password, $dbname, 3307);

    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    // Check if the email exists in the database
    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // Email exists, send reset password email
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'thebvblog0@gmail.com'; // Replace with your email address
            $mail->Password = 'crhu ialu sgvt extk'; // Replace with your email password
            $mail->SMTPSecure = 'tls'; // or 'ssl'
            $mail->Port = 587; // or 465 for SSL

            // Recipients
            $mail->setFrom('thebvblog0@gmail.com', 'My Blog'); // Replace with your email address and name
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $resetLink = "http://localhost/login-register1/resetpass.php?email=" . urlencode($email);
           
            $mail->Body = 'Click on the following link to reset your password: <a href="' . $resetLink . '">Reset Password</a>';

           

            $mail->send();
            $success_message = 'Password reset link has been sent to your email.';
        } catch (Exception $e) {
            $error_message = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        $error_message = 'Email not found, please check';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    </style>
</head>
<body>
    <div class="container"  data-aos="flip-right">
        <h2>Forgot Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control" required>
            </div>
            <div class="form-btn">
                <input type="submit" value="Submit" name="submit" class="btn btn-primary">
            </div>
        </form>

        <?php if (isset($success_message)) { ?>
            <div class="text-success"><?php echo $success_message; ?></div>
        <?php } ?>

        <?php if (isset($error_message)) { ?>
            <div class="text-danger"><?php echo $error_message; ?></div>
        <?php } ?>

        <div>
            <p>Remember your password? <a href="login.php">Login Here</a></p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration : 1000
        });
        </script>
</body>
</html>