<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports</title>
    <link href="sports.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
   
</head>
<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <style>
        .explore a {
          color: rgb(247, 67, 18);
          border-bottom: 1px solid rgb(247, 67, 18);
        }
      </style>
     <?php

$is_logged_in = isset($_SESSION['email']);
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#" style="font-family: 'Playfair Display', sans-serif;">
<h1>THE BV BLOG.</h1>
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
        <div class="img tint">
            <div class="tittle0">
           <p class="tittle">  <i>Sports do not build a character </i></p><br>
        <b> <p class="tittle2">They "REVEAL" it </p></b>
      
    </div>
    </div>
    </div>

    <h1 class="head" style="margin-left:600px;margin-top: 50px;">Sports <i class="fa-solid fa-volleyball"></i></h1>
   <p class="des">Sports and physical activity are essential for a healthy, well-rounded life. Regular exercise improves cardiovascular health, muscle strength, and flexibility, reducing the risk of chronic diseases. It boosts energy levels, aids better sleep, and releases endorphins that enhance mood and alleviate stress. Participating in sports fosters teamwork, discipline, and social connections. It teaches valuable life skills like goal-setting, perseverance, and time management. Engaging in enjoyable physical pursuits provides a sense of accomplishment and boosts self-confidence. Developing an active lifestyle from an early age promotes lifelong physical and mental well-being, independence, and overall quality of life.</p>
    <div class="isport">
        <div class="img1 imgx"></div>
        <div class="img2 imgx"></div>
    </div>
    <h1 class="head" style="margin-left:500px;margin-top: 50px;">Sports in BVRIT</h1>
    <p class="des">
        BVRIT, located in Narsapur, Telangana, places a strong emphasis on sports and physical activities alongside academics. The institute boasts state-of-the-art sports facilities, including a well-equipped gymnasium, multiple playgrounds, and courts for various indoor and outdoor sports.
        Cricket is one of the most popular sports at BVRIT, with the college hosting annual inter-college and intra-college cricket tournaments. The college has produced several talented cricketers who have represented the institute at various levels. Basketball and volleyball are also widely played, with dedicated courts and regular competitions.
        BVRIT encourages its students to participate in a wide range of sports, including badminton, tennis, table tennis, and chess. The college organizes annual sports meets and events, providing a platform for students to showcase their athletic talents and compete in a healthy environment.</p>
<p style="text-align: center;">courts in bvrit include</p>
<ul class="hostelb">

    <li>football ground</li>
    <li>cricket nets</li>
    <li>kabbadhi court</li>
    <li>volley ball courts(2)</li>
    <li>handball courts(2)</li>
    <li>basket ball court</li>
    <li>indoor badminton court(3)</li>
    <li>chess && carroms</li>
</ul>
    <p class="des">BVRIT ensures equal opportunities and dedicated <b>facilities for girls</b> to engage in various sports. The institute promotes women's teams across disciplines like cricket, basketball, and badminton, providing coaching and guidance. Regular inter-college and intra-college competitions allow female students to showcase their talents competitively. BVRIT recognizes and incentivizes the achievements of its female athletes, motivating them. Awareness campaigns highlight the importance of sports for girls, challenging societal barriers. Successful female athletes serve as role models, inspiring and mentoring young women to pursue athletic dreams. By fostering an inclusive environment and empowering its female students through sports, BVRIT nurtures their confidence and overall development.</p>\

    <div class="isport" style="float:right; margin-top: 0px;">
        <div class="img1 imgx" style="background-image: url(photos/spo4.png);"></div>
        <div class="img2 imgx" style="background-image: url(photos/spo5.png);"></div>
    </div>

    <h1 class="head" style="margin-left:400px;margin-top: 50px;"> <i class="fa-solid fa-dumbbell"></i> GYM in BVRIT <i class="fa-solid fa-dumbbell"></i></h1>
    <p class="des">BVRIT boasts a state-of-the-art gymnasium, reflecting the institute's commitment to promoting physical fitness and an active lifestyle among its students. Spread across a spacious area, the gym is equipped with top-notch facilities to cater to diverse workout needs.
        At the heart of the gym lies the weight training section, featuring an extensive range of weight machines, free weights, and weight benches. Students can engage in strength training exercises targeting various muscle groups under the guidance of experienced trainers. Adjacent to this area is the cardio zone, where rows of treadmills, stationary bikes, elliptical machines, and rowing machines facilitate cardiovascular workouts.
        The gym also features a dedicated area for functional training, complete with battle ropes, slam balls, plyo boxes, and TRX suspension trainers, enabling students to challenge themselves with high-intensity interval training routines.
    
           while<b> girls have gym in their own hostel area</b></p>

           <div class="gymc">
            <div class="gym"></div>

           
</body>

           </div>
           <button style="background-color: blanchedalmond;font-size:25px;margin:50px; margin-left:600px;border-radius:1rem;padding:20px;text-decoration:none"><a href="review_sub_form.php" class="button">Submit a Review</a></button>
           <footer>
            <div class ="foot"> <p class="o">for more deeper info you can reach out</p>
             <a href="https://bvrit.ac.in/">BVRIT official </a>
           </div>
           </footer>


</body>
</html>