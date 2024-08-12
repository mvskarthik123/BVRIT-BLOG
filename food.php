<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>food</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link href="food.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="food.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
   
      
<?php

$is_logged_in = isset($_SESSION['email']);
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#" style="font-family: 'Playfair Display', sans-serif;">
    <h1>THE BV BLOG.</h1>
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


    <div class="container">
        <img src="photos/berries bg.png" alt="Background Image" class="background-image">
        <div class="overlay-video">
            <video src="photos/lottie food mp4.mp4" autoplay loop muted playsinline></video>
        </div>
    </div>

                      <!-- <div class="head" style="color: rgb(245, 245, 244)";><h1><pre>BVRIT FOOD HUBS</pre></h1> 
                   </div> -->
                      

                   
                       <div data-aos="fade-right" >
      <div ><img src="photos/juice_ani-removebg-preview.png" width="200px" style="padding-left: 90px;">
    <div id="fod" style="color: white;"><h1>Juice Point</h1>The College encourages communal dining at two places– it’s a chance to have a break, catch up with friends, and meet new people. Canteen provides the traditional meals along with the tiffin at breakfast. The Food Court is more of a Bakery where you get snacks, some north Indian dishes, ice creams, etc. All students have access to College dining facilities where you can buy cafeteria-style meals as well as more formal dinners at a reasonable price.
      <br><br> <img src="photos/juice_shope bvrit.jpg" alt="jp" width="200px" >
    
      </div></div>
    
    
                        <div data-aos="fade-left" >
    <div ><img src="photos/tea_ani-removebg-preview.png" width="100px" style="margin-left: 1190px;">
        <div id="fod2" style="color: white;"><h1>Cafe Point</h1>The College encourages communal dining at two places– it’s a chance to have a break, catch up with friends, and meet new people. Canteen provides the traditional meals along with the tiffin at breakfast. The Food Court is more of a Bakery where you get snacks, some north Indian dishes, ice creams, etc. All students have access to College dining facilities where you can buy cafeteria-style meals as well as more formal dinners at a reasonable price.
        <br><br> <img src="photos/cafe_shope bvrit.jpg" alt="jp" width="200px">
          </div>
        
    </div></div>

    <div data-aos="fade-right">
    <div ><img src="photos/naruto eating.png" width="200px" style="padding-left: 90px;">
        <div id="fod" style="color: white;"><h1>D2 daffodils </h1>The College encourages communal dining at two places– it’s a chance to have a break, catch up with friends, and meet new people. Canteen provides the traditional meals along with the tiffin at breakfast. The Food Court is more of a Bakery where you get snacks, some north Indian dishes, ice creams, etc. All students have access to College dining facilities where you can buy cafeteria-style meals as well as more formal dinners at a reasonable price.
       <br><br>  <img src="photos/general_canteen bvrit.jpg" alt="jp" width="200px">
       </div>
    </div></div>

    <div data-aos="fade-left">
    <div ><img src="photos/pp_ani-removebg-preview.png" width="100px"   style="margin-left: 1190px;">
        <div id="fod2" style="color: white;"><h1>Pani Puri Point</h1>The College encourages communal dining at two places– it’s a chance to have a break, catch up with friends, and meet new people. Canteen provides the traditional meals along with the tiffin at breakfast. The Food Court is more of a Bakery where you get snacks, some north Indian dishes, ice creams, etc. All students have access to College dining facilities where you can buy cafeteria-style meals as well as more formal dinners at a reasonable price.
        <br><br> <img src="photos/phani_puri bvrit.jpg" alt="jp" width="200px">
        </div>
    </div></div>

    <div data-aos="fade-right" >
    <div ><img src="photos/luffy_eat-removebg-preview.png" width="200px"   style="padding-left: 90px;">
        <div id="fod" style="color: white;"><h1>Food Court </h1>The College encourages communal dining at two places– it’s a chance to have a break, catch up with friends, and meet new people. Canteen provides the traditional meals along with the tiffin at breakfast. The Food Court is more of a Bakery where you get snacks, some north Indian dishes, ice creams, etc. All students have access to College dining facilities where you can buy cafeteria-style meals as well as more formal dinners at a reasonable price.
       <br><br>  <img src="photos/general_canteen bvrit.jpg" alt="jp" width="200px">
      </div>
    </div> </div>

   
    <button style="background-color: blanchedalmond;font-size:25px;margin:50px; margin-left:600px;border-radius:1rem;padding:20px;text-decoration:none"><a href="review_sub_form.php" class="button">Submit a Review</a></button>
</body>

   
    <footer>
        <div class ="foot"> <p class="o">for more deeper info you can reach out</p>
         <a href="https://bvrit.ac.in/">BVRIT official </a>
       </div>
       </footer>
    
    
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
    
    
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>