<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostels</title>
    <link href="hostel.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
<style>
  .navbar-brand {
      font-family: 'Playfair Display',sans-serif;
      
    }

</style>
  </head>
<body>
   
    
      
<?php

$is_logged_in = isset($_SESSION['email']);
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">
    <h1>THE BV BLOG.</h1>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.html">Home</a>
        </li>
        <li class="nav-item explore">
          <a class="nav-link" href="front_page.php" style='color: rgb(247, 67, 18)';>Explore</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quizinfo.html">A Little Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Your Profile</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="review_sub_form.php" >Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">About Us</a>
        </li>
        
      </ul>
    </div>
  </nav>

    <div class="f-image">
        <div class="img">
           <p class="tittle"> <b> <i>Home Away from </b></i></p><br>
           <p class="tittle2">Home</p>
        
        <div class="lotbg">
            <div class="lotti">
                <img  class="ved" src="photos/hostel_ani-removebg-preview.png" ></img>
            </div>
        </div>
    </div>
</div>


<h1 class="head" style="margin-left:600px;margin-top: 50px;">BVRIT hostels </h1>

<div class="photo-container">
    <img class="photo hidden" src="photos/vivak_boys_hostel bvrit.webp" alt="Photo 1">
    <img class="photo hidden" src="photos/cvraman_hostel bvrit.webp" alt="Photo 2">
    <img class="photo hidden" src="photos/hoste_boys_dinning bvrit.jpg" alt="Photo 3">
   
  </div>

  <h1 style="text-align: center;">Description</h1>
  <pre class="des" style="text-align: center;">BVRIT, located in Narsapur, Telangana, 
    provides separate hostel facilities for both male and female students. 
    The hostels are designed to provide a comfortable and conducive living environment for
     students,enabling them to focus on their academic pursuits.

   <u><h1>Boys' Hostels:</h1> </u>
    
    BVRIT has several well-equipped boys' hostels on its campus.
    The hostels offer single, double, and triple-occupancy rooms, furnished with basic amenities like beds, study tables, and wardrobes.
    Each room is equipped with adequate lighting and ventilation, ensuring a comfortable living space for students.
    The hostels have common rooms or recreation areas where students can socialize and participate in various indoor activities.
    Facilities like mess halls, dining areas, and common kitchens are available within the hostel premises.
    Regular maintenance and housekeeping services are provided to maintain cleanliness and hygiene in the hostels.
    <ul class="hostelb">

        <li>C.V Raman Hostel</li>
        <li>Nalandha  Hostel</li>
        <li>Ramanujan  Hostel</li>
        <li>Batnagar  Hostel</li>
    </ul>
    <div class="photo-container">
        <img class="photob " src="photos/vivak_boys_hostel bvrit.webp" alt="Photo 1">
        <img class="photob" src="photos/cvraman_hostel bvrit.webp" alt="Photo 2">
        <img class="photob " src="photos/hoste_boys_dinning bvrit.jpg" alt="Photo 3">
       
      </div>
    
   <u><h1> Girls' Hostels:</h1></u>
    
    The girls' hostels at BVRIT are separate and well-secured, providing a safe and comfortable environment for female students.
    Similar to the boys' hostels, the girls' hostels offer single, double, and triple-occupancy rooms with basic amenities.
    The hostels have dedicated common rooms, recreation areas, and study rooms specifically for female students.
    Separate mess halls and dining areas are available within the girls' hostel premises.
    The hostels are equipped with appropriate security measures, including CCTV surveillance and dedicated security personnel.
    <ul class="hostelb">

        <li>Prathiba girls hostel</li>
        <li>Spoorthi girls hostel</li>
        
    </ul>
    <div class="photo-container">
        <img class="photob " src="photos/vivak_boys_hostel bvrit.webp" alt="Photo 1">
        <img class="photob" src="photos/cvraman_hostel bvrit.webp" alt="Photo 2">
       
       
      </div>
    
    
    Both the boys' and girls' hostels at BVRIT follow strict rules and regulations to maintain 
    discipline and ensure the safety and well-being of the students. 
    The hostel authorities strive to create a conducive environment for students to 
    thrive academically and socially.
    It's worth noting that the hostel facilities may be subject to updates and improvements over
     time, so it's recommended to check with the college 
    authorities or visit their website for the most up-to-date information.
</pre>
<p style="margin-left:100px">__________________________________________________________________________________________________________________________________________________________________________________________</p>
<b><u><div  style="margin-left:550px;margin-top: 50px;font-size:50px">Transportation</div></b></u>
<pre style="margin:15px;font-size:23px">BVRIT is located in Greater Hyderabad region, Narsapur in close proximity to Sangareddy and IIT Hyderabad. We 
  have a good network of busses to commute to campus from all parts of Hyderabad, Sangareddy and Medak. Anyone is 
  commuting by a TSRTC bus they have to board the buses at Jubilee Bus Station, bound for Narsapur, Medak and 
  Bodhan.</pre>
  <div class="photo-container">
        <img class="photob " src="photos/bus1.jpg" alt="Photo 1">
        <img class="photob" src="photos/bus2.jpg" alt="Photo 2">
       
       
      </div>
<iframe src="photos/BVRIT-BUS.pdf" frameborder="6" style="width:50%;height:600px;margin-left:400px;margin-top:100px"></iframe>
<!-- <embed src="BVRIT-BUS.pdf" type="application/pdf" width="100%" height="600px" /> -->

<button style="background-color: blanchedalmond;font-size:25px;margin:50px; margin-left:600px;border-radius:1rem;padding:20px;text-decoration:none"><a href="review_sub_form.php" class="button">Submit a Review</a></button>
</body>
<footer>
    <div class ="foot"> <p class="o">for more deeper info you can reach out</p>
     <a href="https://bvrit.ac.in/">BVRIT official </a>
   </div>
   </footer>

  <script src="hostel.js"></script>
</body>

</html>