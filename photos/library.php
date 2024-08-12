<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link href="library.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <div class="tittle0"></div>
                <p class="tittle"><b><i>Library is not a Luxury but one of the</i></b></p><br>
                <p class="tittle2">necessities of</p>
                <p class="tittle3">life.</p>
            </div>
        </div>

        <h1 class="text-center mt-5">LIBRARY  <img class="ti"  src="photos/lib ani.jpeg"></h1>

        <p>B V Raju Institute of Technology Central Library, which is the heart of the Institute, was established in the year 1997. The Library provides important academic services to the institute. It is a well-equipped library, located in a green and silent environment with easy access and provides the right impetus for the intellectual growth of the students, faculty, and research scholars. The Library is located in Saraswati Block with around 12,116 titles and 76,142 volumes in the library. The library subscribes to approximately 267 print journals/magazines, including National and International publications, which cover a wide range of Science and Engineering Technology, Bio-Medical Engineering, Pharmaceutical Engineering, Chemical Engineering, Humanities & Social Sciences, Management, and other allied subjects. The library has the archives of the complete sets of most prestigious journals in the field of Engineering and Technology. Adequate document collections of general reading, newspapers, and technical magazines too.</p>

        <div class="photo-container text-center my-5">
            <img class="photo hidden" src="photos/lib2.avif" alt="Photo 1">
            <img class="photo hidden" src="photos/lib3.avif" alt="Photo 2">
            <img class="photo hidden" src="photos/lib5.jpg" alt="Photo 3">
        </div>

        <h3>Digital Library</h3>
        <p>BVRIT Digital Library works on LAN connectivity with fiber optic cable through the Computer Center and it is connected to the web server. 30 systems providing network facilities are installed for accessing/browsing Online e-content of e-journals and e-databases in the library.</p>

        <h3>Periodical Section</h3>
        <p>Subscribing to more than 267 Indian & International Journals & Magazines.
            Providing Access to 30,701+ Online Journals.
            Current Journals will be displayed in the Periodical Section.
            Back Volumes of the Journals will be available inside the racks of pigeon holes of periodical display racks.
            Library subscribed online e-resources are accessible throughout the campus on IP-based access and some of them on URL-based.</p>

            <h3>Audio-Visual (AV):</h3>
            <p>The Central Library provides an audio-visual section with one set of 55” Android TV. A good collection of Educational Videos (DTH 32 Swayam Prabha, NPTEL, SONET) are available on varied subjects.</p>

            <div class="photo-container text-center my-5">
                <img class="photo hidden" src="photos/lib7.jpg" alt="Photo 1">
                <img class="photo hidden" src="photos/lib6.jpg" alt="Photo 2">
                
            </div>

            <button style="background-color: blanchedalmond;font-size:25px;margin:50px; margin-left:600px;border-radius:1rem;padding:20px;text-decoration:none"><a href="review_sub_form.php" class="button">Submit a Review</a></button>
</body>

            <footer>
                <div class ="foot"> <p class="o">for more deeper info you can reach out</p>
                 <a href="https://bvrit.ac.in/">BVRIT official </a>
               </div>
               </footer>
            
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="library.js"></script>
</body>
</html>
