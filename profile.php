<?php
session_start();
require_once "database.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user data from the database
$user_id = $_SESSION['user_id'];
$query = "SELECT full_name, email, Guardian_number FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch user reviews from the database
$query_reviews = "SELECT review_section, review_text FROM reviews WHERE id = ?";
$stmt_reviews = $conn->prepare($query_reviews);
$stmt_reviews->bind_param("i", $user_id);
$stmt_reviews->execute();
$result_reviews = $stmt_reviews->get_result();
$reviews = [];
while ($row = $result_reviews->fetch_assoc()) {
    $reviews[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        :root {
            --primary-color: #6ac5fe; /* Light blue */
            --secondary-color: #e0f7e0; /* Light green */
            --highlight-color: #ffcc00; /* Bright yellow */
            --text-color: black;
            --nav-font-family: 'Playfair Display', serif; /* Custom font */
        }

        header {
            background-image: url('Beige\ Modern\ Flat\ Lay\ Personal\ LinkedIn\ Banner.jpg');
            background-size: cover;
            background-position: center;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-family: 'Trebuchet MS';
            color: beige;
        }

        .nav-bar {
            display: flex;
            justify-content: left;
            list-style: none;
            margin: 5px;
            padding: 12px;
            background-color: transparent;
            border-top: 2px solid var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            margin-left: 20px;
            margin-right: 20px;
        }

        .nav-bar li {
            margin-right: 1px;
        }

        .nav-bar a {
            color: black;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: box-shadow 0.3s, border-color 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .nav-bar a:hover {
            border: 2px solid var(--highlight-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            background-color: #2196f3;
            color: white;
            border-radius: 4px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .nav-bar1 {
            display: flex;
            justify-content: center;
            list-style: none;
            margin: 20px 0;
            padding: 0;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .nav-bar1 li {
            margin: 0;
        }

        .nav-bar1 a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 12px 16px;
            transition: background-color 0.3s;
            font-weight: 500;
        }

        .nav-bar1 a:hover {
            background-color: #f5f5f5;
        }

        .section {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 16px;
            text-align: center;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .section p {
            margin: 12px 0;
            padding: 12px;
            background-color: #f5f5f5;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 16px;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        .section p span {
            font-weight: 500;
            color: #333;
        }

        .section p button {
            background-color: #2196f3;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 14px;
            font-weight: 500;
            margin-top: 8px;
        }

        .section p button:hover {
            background-color: #1976d2;
        }

        .nav-bar1 a.active {
            background-color: #2196f3;
            color: #fff;
        }

        .logout-container {
            text-align: center;
            margin-top: 50px;
        }

        .logout-container button {
            background-color: #2196f3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: 'Roboto', sans-serif;
            transition: background-color 0.3s;
        }

        .logout-container button:hover {
            background-color: #1976d2;
        }

        .reviews-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .review-item {
            flex: 1 1 calc(50% - 20px);
            background-color: var(--secondary-color);
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .review-item h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .review-item p {
            font-size: 16px;
            color: var(--text-color);
        }
    </style>
</head>
<body>
    <header data-aos="fade-down" data-aos-duration="600">
        <h1 style="text-align: center; font-size: 36px; font-weight: 700">Your Profile.</h1>
    </header>
    <nav>
        <ul class="nav-bar" data-aos="fade-left" data-aos-duration="1500">
            <li><a href="index.html">Home</a></li>
            <li><a href="front_page.php">Explore</a></li>
            <li><a href="quizinfo.html">A Little Quiz</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="about.html">About Us</a></li>
        </ul>
    </nav>
    <nav>
        <ul class="nav-bar1" data-aos="fade-right" data-aos-duration="1500">
            <li><a href="profile.php" onclick="showSection('personal-details')" class="active">Personal Info</a></li>
            <li><a href="#" onclick="showSection('my-reviews')">My Reviews</a></li>
            <li><a href="#" onclick="showSection('logout-section')">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <section id="personal-details" class="section">
            <h2>Personal Details</h2>
            <p>
                <span><strong>Name:</strong></span>
                <span id="full_name"><?php echo htmlspecialchars($user['full_name']); ?></span>
                <button onclick="editField('full_name')">Edit</button>
            </p>
            <p>
                <span><strong>Email:</strong></span>
                <span id="email"><?php echo htmlspecialchars($user['email']); ?></span>
            </p>
            <p>
                <span><strong>Phone Number:</strong></span>
                <span id="Guardian_number"><?php echo htmlspecialchars($user['Guardian_number']); ?></span>
                <button onclick="editField('Guardian_number')">Edit</button>
            </p>
        </section>
        <section id="my-reviews" class="section" style="display: none;">
            <h2>My Reviews</h2>
            <div class="reviews-container">
                <?php foreach ($reviews as $review) { ?>
                    <div class="review-item">
                        <h3><?php echo htmlspecialchars($review['review_section']); ?></h3>
                        <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>
        <section id="logout-section" class="section" style="display: none;">
            <h2>Logout</h2>
            <div class="logout-container">
                <button onclick="window.location.href='logout.php'">Logout</button>
            </div>
        </section>
    </div>
    <script>
        function editField(field) {
            const fieldValue = document.getElementById(field).innerText;
            const input = document.createElement('input');
            input.type = 'text';
            input.value = fieldValue;
            input.setAttribute('id', `${field}-input`);

            const span = document.getElementById(field);
            span.innerText = '';
            span.appendChild(input);

            const editButton = span.nextElementSibling;
            editButton.innerText = 'Save';
            editButton.setAttribute('onclick', `saveField('${field}')`);
        }

        function saveField(field) {
            const input = document.getElementById(`${field}-input`);
            const newValue = input.value;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_profile1.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        const span = document.getElementById(field);
                        span.innerText = response.newValue;

                        const editButton = span.nextElementSibling;
                        editButton.innerText = 'Edit';
                        editButton.setAttribute('onclick', `editField('${field}')`);
                    } else {
                        alert(response.message); // Show the response message if the update failed
                    }
                } else {
                    console.error('Failed to update profile.');
                }
            };
            xhr.send(`field=${field}&value=${encodeURIComponent(newValue)}`);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-bar1 a');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    navLinks.forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>