<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Explore page</title>
    <link rel="stylesheet" href="front_page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Poppins:400,300,700' rel='stylesheet' type='text/css'>
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
  
  <div class="f-image ">
    <div class="img">
      <div ><img class="bino"  src="photos/bino.png" alt="bino">
      </div>
        <div class="tittle0"></div>
        <p class="tittle"><b><i>Explotaion is curiosity </i></b></p><br>
        <p class="tittle2">put into</p>
        <p class="tittle3">ACTION.</p>
    </div>
</div>
      
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-BQ9Bo2H9S+Pm2wZ3Fe2Byk..."></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-svldgIt4fDp6enlJUpWC2j6PZu..."></script>
     

      <div class="second"><b>Thing you can explore in our college</b> </div> 

      <div class="ltc">
        
          <h2  class="o">library  </h2>
          <img src="photos/lib_ani-removebg-preview.png" width="70px" class="ani">
             <p class="o">The BVRIT Central Library gives the benefit of access to the modern collection of knowledge resources and innovative information support services for the students and faculty members. The Library is fully computerized with an integrated system connected to the campus network providing an e-resource facility to the institutional community. </p>
            <br>
             <a href="library.php">know more</a>
    </div> 

      <div class="rtc" id="img"><h2  class="o">Food</h2>
        <img src="photos/food_ani-removebg-preview.png" width="80px" class="aniri">
      <p class="o">The College encourages communal dining at two places– it’s a chance to have a break, catch up with friends, and meet new people. Canteen provides the traditional meals along with the tiffin at breakfast. The Food Court is more of a Bakery where you get snacks, some north Indian dishes, ice creams, etc.</p>
      <img src="photos/general_canteen bvrit.jpg" width="200px"class="o" ><br>
      <a href="food.php">know more</a>
    </div>

    <div class="ltc" id="img">
      <h2  class="o">hang-outs</h2>
      <img src="photos/hangout_ani-removebg-preview.png" width="80px" class="ani">
      <p class="o">Colleges have a wide range of facilities too – such as playing fields, courts, boathouse, lush green lawns, a Ganesh Temple, gyms, etc. For the musically–inclined, BVRIT has a practice room and performance venue. It also has a choir and orchestra and put on one or more concerts each year. </p>
        <img src="photos/bvrit lake.jpg"   width="300px" class="o"><br>
        <a href="hangout.php">know more</a>
    </div>  

    <div class="rtc" id="img"><h2 class="o">hostels and Transportation</h2>
      <img src="photos/hostel_ani-removebg-preview.png" width="90px" class="aniri">
      <p class="o">Vivekananda Boys Hostel , with 160 Accommodation Capacity,<br>Sri C V Raman Boys Hostel , with 216 Accommodation Capacity<br></p>
      <img src="photos/vivak_boys_hostel bvrit.webp" width="200px" class="o">
      <img src="photos/cvraman_hostel bvrit.webp" width="200px" class="o"><br>
      <a href="hostel.php">know more</a>
    </div>

    <div class="ltc" id="img">
      <h2  class="o">sports</h2>
      <img src="photos/sports_ani-removebg-preview.png" width="70px" class="ani">
      <p class="o">Colleges have a wide range of facilities too – such as playing fields, courts, boathouse, lush green lawns, a Ganesh Temple, gyms, etc. For the musically–inclined, BVRIT has a practice room and performance venue. It also has a choir and orchestra and put on one or more concerts each year. </p>
        <img src="photos/gym bvrit.webp" class="o"  width="200px" >
        <img src="photos/IndoorSports bvrit.webp" class="o"  width="300px" ><br>
        <a href="sports.php">know more</a>
    </div> 

    <div class="rtc" id="img"><h2  class="o">placements  and placements team</h2>
      <img src="photos/placement_ani-removebg-preview.png" width="80px" class="aniri">
      <p class="o">Campus recruitment drives are undertaken by inviting companies from the private, public and government sectors to place Institute’s students at entry level positions. Placement assistance is provided industry/sector/Vertical-wise as well as by functional area wise. </p>
      <img src="photos/career_guidance_cell BVRIT - Copy.jpg" class="o" width="200px" ><br>
      <a href="placements.php">know more</a>
    </div>

    <div class="ltc" id="img">
      <h2  class="o">clubs</h2>
      <img src="photos/club_ani-removebg-preview.png" width="80px" class="ani">
      <p class="o"> musically bvrit<br>ccb bvrit<br>natyanandana</p>
        <img src="photos/ccb.png"  class="o" width="200px" ><br>
        <a href="clubs.php">know more</a>
        <!-- <img src="IndoorSports bvrit.webp"   width="300px" > -->
    </div> 

    <button style="background-color: blanchedalmond;font-size:25px;margin:50px; margin-left:600px;border-radius:1rem;padding:20px;text-decoration:none"><a href="review_sub_form.php" class="button">Submit a Review</a></button>
</body>

    <footer>
     <div class ="foot"> <p class="o">for more deeper info you can reach out</p>
      <a href="https://bvrit.ac.in/">BVRIT official </a>
    </div>
    </footer>
   
      <script src="front_page.js"></script>
</body>
</html>