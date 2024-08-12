<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('https://mybvrit.com/wp-content/uploads/2015/03/beautifulcampus1.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
    text-align: center;
    padding: 20px;
    background-color: rgba(192, 192, 192, 0.5); /* Grey with transparency */
    border-radius: 10px;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.5); /* Add box shadow for depth */
    position: relative;
}

.container h1 {
    margin-bottom: 20px;
    font-size: 2.5rem;
    color: #fff; /* White color for text to contrast with grey background */
    font-family: 'Arial', sans-serif; /* Choose a suitable font */
    font-weight: 600;
}

        .btn-logout {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ffc107; /* Yellow color for logout button */
            border-color: #ffc107;
            color: #fff; /* White color for text */
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-logout:hover {
            background-color: #e0a800; /* Darker yellow color on hover */
            border-color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Dashboard</h1>
        <a href="logout.php" class="btn btn-logout">Logout</a>
    </div>
</body>
</html>
