<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Langing page</title>
  <!-- Import Favicon -->
  <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">
  <!-- Import Remix Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <!-- Import CSS file -->
  <link rel="stylesheet" href="./main.css">
</head>
<body>
  <!-- Header -->
  <header class="header" id="header">
    <nav class="nav container">
      <a href="./index.php" class="logo-box">
        
      </a>
      <div class="menu" id="mobile-menu">
        <ul class="nav-list">
        <li class="nav-item">
         <a href="#" class="nav-link">Equipment</a>
        </li>
        <li class="nav-item">
         <a href="#" class="nav-link">Contact us</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Blog</a>
        </li>
        <li class="nav-item lg-screen-hidden">
          <a href="./register.php" class="nav-link">Account</a>
        </li>
        </ul>

        <div class="menu-toggle-icon menu-toggle-close" id="menu-toggle-close">
        <i class="ri-close-line"></i>
        </div>
      </div>

        <a href="./register.php" class="nav-link account-link place-items-center sm-screen-hidden">
        <i class="ri-account-circle-line"></i> Account
        </a>

        <div class="menu-toggle-icon menu-toggle-open" id="menu-toggle-open">
          <i class="ri-menu-4-fill"></i>
        </div>
      
    </nav>

  </header>

  <!-- Main -->
  <main class="main">
    <section class="hero">
      <div class="hero-container container d-grid">
        <div class="hero-data" id="hero-data">
          <span class="tagline">A Travel Patner</span>
          <h1 class="title main-title">JUST LIKE A COMPANION WHO MAKES YOUR TRIP AMAZING</h1>
          <a href="#hiking-information" class="btn-scroll-down">
            scroll down <i class="ri-arrow-down-line"></i>
          </a>
        </div>
      </div>
      <img src="./hero-top.png" alt="" class="parallax-img parallax-top-img" id="sky">
      <img src="./hero-middle.png" alt="" class="parallax-img parallax-middle-img" id="mountains">
      <img src="./hero-bottom.png" alt="" class="parallax-img parallax-bottom-img" id="grassland">
    </section>

    <section class="hiking-information section" id="hiking-information">
      <div class="card-container conatiner">
        <div class="card d-grid">
          <img src="./01.png" alt="" class="card-image place-items-center">
          <div class="card-info">
            <span class="count">01</span> 
            <span class="tagline">Get started</span>
            <h2 class="title card-title">ABOUT US</h2>
            <p class="card-description">Our travel planner website seamlessly combines itinerary creation with budget estimation. Effortlessly plan your trips, explore destinations, and receive real-time budget estimates tailored to your preferences. Experience the perfect blend of convenience and financial insight as you embark on your journeys with confidence.</p> 
                    
          </div>
        </div>

        <div class="card d-grid">
          <img src="./02.png" alt="" class="card-image frame-position-center order-first">
          <div class="card-info">
            <span class="count">01</span> 
            <span class="tagline">Get started</span>
            <h2 class="title card-title">Provisions</h2>
            <p class="card-description">Creating a user-friendly travel planner website requires the integration of crucial features, including itinerary creation, budget estimation, accommodation booking, transportation information, and expense tracking. Beyond these essentials, the platform should offer additional elements such as detailed destination information, seamless weather integration, user reviews, and customization options to elevate the overall travel planning experience. To enhance practicality, offline access, real-time currency conversion, emergency information, collaboration capabilities, and mobile responsiveness are indispensable. This holistic approach ensures users can effortlessly navigate through their travel plans while enjoying a personalized and comprehensive travel planning journey.</p> 
                     
          </div>
        </div>

        <div class="card d-grid">
          <img src="./03.png" alt="" class="card-image frame-position-center">
          <div class="card-info">
            <span class="count">01</span> 
            <span class="tagline">Get started</span>
            <h2 class="title card-title">Come along</h2>
            <p class="card-description">Concluding our travel planner website's offerings, we bring together the art of itinerary creation and budget estimation for a truly streamlined experience. Immerse yourself in the joy of trip planning, allowing our platform to guide you through exploring diverse destinations while providing real-time budget estimates tailored precisely to your preferences. This harmonious blend of convenience and financial insight empowers you to embark on your journeys with unwavering confidence, ensuring not just seamless planning but also a deeper connection to the essence of your travels. Your adventure begins here, where meticulous planning meets the thrill of exploration.</p> 
                   
          </div>
        </div>


      </div>

    </section>
  </main>

  
      <!-- Hero -->

      <!-- Hiking-information -->

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container container d-grid">
      <div class="brand-information">
        <a href="./index.php" class="logo-box">
          
        </a>
        <p class="footer-blurb">Get out there & discover your next destination!</p>
        <span class="copyright">&copy; 2024  MPTP, Inc. All rights reserved.</span>
      </div>
  
    </div>

  </footer>
  
<!-- Import JS file   -->
<script src="./font.js"></script>
</body>
</html>