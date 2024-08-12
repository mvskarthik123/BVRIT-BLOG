<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hangout</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link href="food.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="hangout.css" rel="stylesheet">
</head>
<body>
    
      
<?php

$is_logged_in = isset($_SESSION['email']);
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="photos/BVRIT_LOGO-removebg-preview.png" width="210">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item explore">
          <a class="nav-link" href="front_page.php" style='color: rgb(247, 67, 18)';>Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Take Advice</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="review_sub_form.php" >Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <?php if ($is_logged_in): ?>
            <a class="nav-link" href="logout.php">Logout</a>
          <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </nav>
    <div class="f-image">
        <div class="img">
           <p class="tittle"> <b> <i>Some times all you can do is <br>Hang-Out with friends</b></i></p>
        
        <div class="lotbg">
            <div class="lotti">
                <video  class="ved" src="photos/hangout lotti.mp4 " autoplay loop muted playsinline></video>
            </div>
        </div>
    </div>
</div>
<h1 class="head" style="margin-left:500px;margin-top: 50px;">All the hang-outs in the college</h1>

<div class="box">
<div class="container">
    <div class="card">
        <div class="front" style="background-image: url('photos/lake2.jpg')"></div>
        <div class="back">
            <h1 style="text-align: center;">Lakes</h1>
            <p>The lake at our college is a beloved hangout spot, offering a serene escape from academic life. Surrounded by lush greenery, it provides a picturesque setting for relaxation and reflection. Students gather here for picnics, study sessions, or simply to unwind with friends. The well-maintained paths and benches are perfect for leisurely strolls or quiet reading. Whether for thoughtful conversations or moments of peace, the lake fosters a sense of connection and tranquility that enhances our college community.</p>
        </div>
    </div>
 
</div>   <p class="disk">Lakes</p></div>

<div class="box">
    <p class="disk">Open-Minds</p>
<div class="container" style="margin-left: 300px">
    <div class="card">
        <div class="front" style="background-image: url('photos/open\ minds.png')"></div>
        <div class="back">
            <h1 style="text-align: center;">Open-Minds</h1>
            <p>"Open Minds" at BV Raju Institute of Technology (BVRIT) represents a dynamic and innovative space dedicated to fostering creativity, critical thinking, and collaborative learning. This initiative is designed to nurture the intellectual curiosity and entrepreneurial spirit of students, providing them with an environment that encourages exploration and discovery.</p>
        </div>
    </div>
</div>

</div>

<div class="box">
    
<div class="container">
    <div class="card">
        <div class="front" style="background-image: url('photos/bvraju\ staue.png')"></div>
        <div class="back">
            <h2 style="text-align: center">B.V.raju statue & garden</h2>
            <p>This harmonious blend of the statue and its verdant surroundings exemplifies the values of BV Raju, reflecting his vision for a balanced and holistic educational environment. It stands as a beautiful tribute to his contributions and a source of inspiration for all who walk the grounds of BVRIT.</p>
        </div>
    </div>
</div>
<p class="disk" style="margin-left: 10px ;margin-top:60px;">B.V.raju statue & garden</p>
</div>

<div class="box">
    <p class="disk">Temple</p>
<div class="container" style="margin-left: 400px;">
    <div class="card">
        <div class="front" style="background-image: url('photos/bvrit\ temple.png')"></div>
        <div class="back">
            <h1 style="text-align: center;">Temple</h1>
            <p>The temple within the College of BV Raju Institute of Technology (BVRIT) stands as a beacon of tranquility and spiritual solace amidst the vibrant academic environment. Its architecture, blending traditional design with modern elegance, offers a serene space for students, faculty, and visitors to pause and reflect.</p>
        </div>
    </div>
</div>

</div>

<button style="background-color: blanchedalmond;font-size:25px;margin:50px; margin-left:600px;border-radius:1rem;padding:20px;text-decoration:none"><a href="review_sub_form.php" class="button">Submit a Review</a></button>
</body>
<footer>
  <div class ="foot"> <p class="o">for more deeper info you can reach out</p>
   <a href="https://bvrit.ac.in/">BVRIT official </a>
 </div>
 </footer>


    </div>
    <script src="hangout.js"></script>
</body>
</html>