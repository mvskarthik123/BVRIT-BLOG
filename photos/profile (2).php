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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<style>
    
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
    </style>
    <nav>
            <ul class="nav-bar" data-aos="fade-left" data-aos-duration="1500">
                <li><a href="index.html">HOME</a></li>
                <li><a href="explore.html">EXPLORE</a></li>
                <li><a href="quizinfo.html">A LITTLE QUIZ</a></li>
                <li><a href="profile.php">YOUR PROFILE</a></li>
                <li><a href="about.html">ABOUT US</a></li>
            </ul>
        </nav>
    <header data-aos="flip-up" data-aos-duration="600">
        <h1>THE BV BLOG.</h1>
    </header>
    <nav>
        <ul class="nav-bar" data-aos="fade-left" data-aos-duration="1500">
            <li><a href="#" onclick="showSection('personal-details')">Personal Info</a></li>
            <li><a href="#" onclick="showSection('my-reviews')">My Reviews</a></li>
            <li><a href="#" onclick="showSection('logout')">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <section id="personal-details" class="section glass">
            <h2>Personal Details</h2>
            <p>Name: <span id="name"><?php echo htmlspecialchars($user['full_name']); ?></span> <button onclick="editField('name')">Edit</button></p>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Phone: <span id="phone"><?php echo htmlspecialchars($user['Guardian_number']); ?></span> <button onclick="editField('phone')">Edit</button></p>
        </section>
        <!-- Other sections and scripts -->
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
            xhr.open('POST', 'update_profile.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const span = document.getElementById(field);
                    span.innerText = newValue;

                    const editButton = span.nextElementSibling;
                    editButton.innerText = 'Edit';
                    editButton.setAttribute('onclick', `editField('${field}')`);
                } else {
                    console.error('Failed to update profile.');
                }
            };
            xhr.send(`field=${field}&value=${newValue}`);
        }
    </script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>