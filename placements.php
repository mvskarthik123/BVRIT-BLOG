<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placements</title>
    <link href="placements.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            <div class="tittle0">
           <p class="tittle">  <i>let's talk about the most important thing now</i></p><br>
        <b> <p class="tittle2">"Placements"</p></b>
      
    </div>
</div>
</div>

<h1 class="head" style="margin-left:600px;margin-top: 50px;">Placements </h1>

<div class="photo-container">
    <img class="photo hidden" src="photos/placement_ani-removebg-preview.png" alt="Photo 1">
    <img class="photo hidden" src="photos/career_guidance_cell BVRIT - Copy.jpg" alt="Photo 2">
    <img class="photo hidden" src="photos/place.jpg" alt="Photo 3">
   
  </div>

  <h1 style="text-align: center;">Description</h1>
  <p class="des" style="text-align: center;">The Training and placement Cell is committed to provide all possible assistance to its students in their efforts to find employment. This commitment is demonstrated by the existence of a full time professor in charge. The benefits of this assistance are reflected in the preparation of students who were able to secure lucrative and esteemed positions in recent years. The Training & Placement service operates year round to facilitate contacts between companies and graduates. Staffs are available to respond to student’s question and concern of all kinds. The aim is to ensure that students have the information and skills necessary for an effective job search.</p>

   <u><h1 class="tp"style="margin-left:600px;margin-top: 50px;margin-bottom: 20px;">Placement Facilities</h1> </u>
    
    <p>
    <ul >
        <li class="pq">Separate cell has been established with one full time staff In-charge for placement in order to guide students to approach companies.</li>
        <li class="pq" >Conduct a survey on recruiters’ expectations from students.</li>
        <li class="pq">Obtain feedback from employers of past batches.</li>
        <li class="pq">Enable networking with alumni.</li>
        <li  class="pq">Organize training sessions on soft skills development.</li>
    </ul>
</p>
    
   <u><h1 class="tp"style="margin-left:600px;margin-top: 50px;margin-bottom: 20px;"> Summer Training</h1></u>
    <p>Each student has to undertake summer training in companies of repute for duration of 6-8 weeks. Students are required to work on projects given to them either by the sponsoring organization or selected by the students themselves. The project report/thesis is an intensive learning exercise for students to apply particular theoretical concepts into practical situations as experienced in an industrial milieu. The final placement of students is a strategic activity for BVRIT and all the processes are towards the same. Keeping in mind the existing and expected job opportunities, we plan to provide placement services to our participants. For effective placements, we establish close ties with the companies, which are in the process of providing jobs to our students. The existing placement cell keeps intensive interface with leading corporate/ consultants.</p>
   
    <div class="photo-container">
        <img class="photo hidden" src="photos/place2.jpg" alt="Photo 1">
        <img class="photo hidden" src="photos/place3.jpg" alt="Photo 2">
        
       
      </div>
    
    <u><h1 class="tp"style="margin-left:500px;margin-top: 50px;margin-bottom: 20px;"> PRE-PLACEMENT TALK (PPT)</h1></u>
    <p>PPT provides an opportunity to the recruiting company and the students to interact with each other. The company gives the presentation regarding the history, growth potential, future opportunities, and jobs available (content, compensation package, location, etc.) PPT also provides a company with opportunity to recruit BVRIT students for summer training assignments.</p>
    
    <u><h1 class="tp"style="margin-left:600px;margin-top: 50px;margin-bottom: 20px;"> Final Placement</h1></u>
    <p style="margin-bottom: 90px;">Campus recruitment drives are undertaken by inviting companies from the private, public and government sectors to place Institute’s students at entry level positions. Placement assistance is provided industry/sector/Vertical-wise as well as by functional area wise. </p>
    
    <button style="background-color: blanchedalmond;font-size:25px;margin:50px; margin-left:600px;border-radius:1rem;padding:20px;text-decoration:none"><a href="review_sub_form.php" class="button">Submit a Review</a></button>
</body>

<footer>
    <div class ="foot"> <p class="o">for more deeper info you can reach out</p>
     <a href="https://bvrit.ac.in/">BVRIT official </a>
   </div>
   </footer>

  <script src="hostel.js"></script>
</body>



</body>
</html>