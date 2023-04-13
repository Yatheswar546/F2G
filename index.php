<?php

  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>F2G | Home</title>
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="./css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="./css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="./css/index.css" type="text/css" media="all">
  <script type="text/javascript" src="./javascript/jquery-1.6.js"></script>
  <script type="text/javascript" src="./javascript/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="./javascript/tms-0.3.js"></script>
  <script type="text/javascript" src="./javascript/tms_presets.js"></script>
  <script type="text/javascript" src="./javascript/script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <linkrel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


  
</head>
<body id="page1">
  <div class="body1">
    <div class="main">
      <!--header -->
      <header>
        <div class="wrapper">
          <h1><a href="./index.php" id="logo"></a></h1>
          <nav style="width:100%;">
            <ul id="menu">
              <li class="active"><a href="./index.php">Home</a></li>
              <li><a href="./templates/commodities.php">Commodities</a></li>
              <li><a href="./templates/service.php">Services</a></li>
              <li><a href="./templates/mvtable.php">Market Value</a></li>
              <li><a href="./templates/contact.php">Contact</a></li>
              <li><a href="./templates/about.php">About</a></li>
              <?php if(isset($_SESSION['farmer']) && $_SESSION['farmer'] == 'farmer'): ?>
                <li><a href="./templates/crophistory.php">History</a></li>  
                <li><a href="./logout.php">Logout</a></li>
              <?php elseif(isset($_SESSION['volunteer']) && $_SESSION['volunteer'] == 'volunteer'): ?>
                <li><a href="./templates/volunteer-dashboard.php">Dashboard</a></li>  
                <li><a href="./logout.php">Logout</a></li>
              <?php elseif(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'): ?>
                <li><a href="./admin-panel/admin.php">Admin</a></li>  
                <li><a href="./logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="./templates/login-as.php">Login</a></li>
              <?php endif; ?>
              
            </ul>
          </nav>
        </div>

       <div class="slider_bg">
          <div class="slider">
            <ul class="items">
              <li><img src="./images/img1.jpg" alt=""></li>
              <li><img src="./images/img2.jpg" alt=""></li>
              <li><img src="./images/img3.jpg" alt=""></li>
              <li><img src="./images/img4.jpg" alt=""></li>
              <li><img src="./images/img5.jpg" alt=""></li>
              <li><img src="./images/img6.jpg" alt=""></li>
              <li><img src="./images/img7.jpg" alt=""></li>
              <li><img src="./images/img8.jpg" alt=""></li>
              <li><img src="./images/img9.jpg" alt=""></li>
              <li><img src="./images/img10.jpg" alt=""></li>
            </ul>
          </div>
        </div>
      </header>
    


     
      <!-- / header -->
      <div class="wrapper">
        <div class="background-container">
          <div class="bg-1"></div>
          <div class="bg-2"></div>
        </div>
        <div class="about-container">
          <div class="image-container">
            <ul class="items" style="width: 100%; height: 100%;"></ul>
            <li>
              <img src="./images/pexels-rattasat-2804327.jpg" alt="" width="100%">
            </li>
          </div><br>
          <div class="text-container">
            <h1 style="color: darkgreen; font-family: georgia;">About us</h1>
            <p style="font-family: 'Times New Roman', Times, serif; color: rgb(16, 16, 16);">
              Farming is a profession of hope. We the team of F2G has come up with the vision to connect the farmers to
              the government, so that the farmers can sell their Crops
              and get paid for their hardwork. F2G is a platform which connects the farmers and the government is a
              e-commerce website.Which provides
              the provides the farmers with different kinds of Services.<br>
              As we Know agriculture is a top priority in India.In India about 15% of GDP comes from agriculture.This
              websites contains an end-end-services across the agriculture marketvalue to the farmers.
            </p>
            <button style="font-size: 20px; background-color: rgb(6, 83, 6);">
              <a href="about.php">Read More</a>
            </button>
          </div>
        </div>
      </div>
      <article id="content"  style="background-color: white;">
        <div class="wrapper">
          <div class="wrapper">
            <section class="col1 pad_left1"> <span class="dropcap1"><span>F</span></span>
              <div class="cols">
                <p class="pad_bot1 color1" style="color: rgb(228, 74, 13);">
                  To provide uniformity in crop selling system by streamlining of procedures across India.
                </p>
                <p class="quot" style="color: rgb(80, 86, 92); width: 100%;">
                  Removing information asymmetry b/w the farmers and the government.Loss of crops and loans are the main
                  causes of suicides.
                  <img src="./images/quot2.png" alt="">
                </p>
                <a href="#" class="link1" style="color: darkgreen;">
                  Read More
                </a>
              </div>
            </section>
            <section class="col1 pad_left1"> <span class="dropcap1"><span class="color1">2</span></span>
              <div class="cols">
                <p class="pad_bot1 color1" style="color: rgb(42, 38, 242);">
                  Promoting a good quality crops to the government directly and to reduce the importing charges.
                </p>
                <p class="quot" style="color: rgb(80, 85, 89);">
                  In this system the farmers and volunteer have their own profile in this website, so that they can send
                  request to sell their crops with tranparent transactions.
                  <img src="./images/quot2.png" alt="">
                </p>
                <a href="#" class="link1" style="color: darkgreen;">
                  Read More
                </a>
              </div>
            </section>
            
            <section class="col1 pad_left1"> <span class="dropcap1"><span class="color2">G</span></span>
              <div class="cols">
                <p class="pad_bot1 color1" style="color: rgb(8, 102, 8);">
                  This F2G website has several pages with different types of functionalities included in them .
                </p>
                <p class="quot" style="color: rgb(81, 88, 96);">
                  <a href="index.php" class="link2">Home Page</a>, <a href="comm.html" class="link2">Commodity
                    Page</a>, <a href="service.php" class="link2">Service Page</a>, <a href="marketvalue.html"
                    class="link2">Market Value Page</a>, <a href="about.php" class="link2">About Page</a> , <a
                    href="login.html" class="link2">Login Page</a><a href="contact.php" class="link2">Contact Us</a>
                  (note that contact us form – doesn’t work).<img src="./images/quot2.png" alt="">
                </p>
                <a href="#" class="link1" style="color: darkgreen;">Read More
                </a>
              </div>
            </section>
          </div>
        </div>
      </article>
    </div>
  </div>


  
  <div class="body2" style="background-color:whitesmoke">
    <div class="main">
      <article id="content2">
        <div class="wrapper">
          <section class="col2">
            <h2 style="color: green;">Bringing growth, ingenuity and <span>experience to market.!</span>
            </h2>
            <div class="testimonials">
              <p class="quot" style="color: rgb(76, 79, 82);">Farmers are the founders of human civilization. Farming
                Is A Profession Of Hope.
                Farming looks mighty easy when your plow is a pencil and you're a
                thousand miles from the corn field. Farming with live animals is a 7 day a week, legal form of slavery.
                <img src="./images/quot2.png" alt="">
              </p>
            </div>
          </section>
          <article id="content2">
            <section class="col2">
              <h2 style="color: darkgreen;">
                Producing More. Conserving More.Improving Lives.!
              </h2>
              <div class="testimonials">
                <p class="quot" style="color: rgb(80, 85, 89);">
                  Farmers are the ones who keep us alive by supplying us with food. We owe them an eternal debt of
                  gratitude.
                  If someone is interested in farming, it can be considered a successful potential business.
                  Farming is one of the world’s oldest professions. It began with human civilization and has continued
                  to evolve ever since.
                  <img src="./images/quot2.png" alt="">
                </p>
              </div>
            </section>
        </div>
      </article>
    </div>
  </div>
  <div class="box-area">
    <center>
      <h2 style="font-size: 50px;color: darkgreen; padding-top: 10px;">
        Gallery
      </h2>
    </center>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="single-box">
            <div class="box-content">
              <div class="front">
                <img
                  src="./images/1174720-food-grass-field-green-grain-wheat-Rye-cereal-barley-grassland-plant-agriculture-prairie-crop-land-plant-flowering-plant-grass-family-plant-stem-food-grain-commodity-ei.jpg"
                  alt="">
              </div>
              <div class="back" style="background-color: rgb(8, 8, 8);">
                <h1 style="font-size: 15px;">
                  "Life on a farm is a school of patience; you can't hurry the crops or make an ox in two days." - Henri
                  Alain
                </h1>
                <p class="socials">
                  <i class="fa fa-facebook"></i>
                  <i class="fa fa-twitter"></i>
                  <i class="fa fa-dribbble"></i>
                  <i class="fa fa-pinterest"></i>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-box">
            <div class="box-content">
              <div class="front">
                <img src="./images/pexels-omotayo-tajudeen-3152331.jpg" alt="Avatar">
              </div>
              <div class="back" style="background-color: rgb(8, 8, 8);">
                <h1 style="font-size: 15px;">
                  "Agriculture is the most healthful, most useful and most noble employment of man." - George Washington
                </h1>
                <p class="socials">
                  <i class="fa fa-facebook"></i>
                  <i class="fa fa-twitter"></i>
                  <i class="fa fa-dribbble"></i>
                  <i class="fa fa-pinterest"></i>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="single-box">
            <div class="box-content">
              <div class="front">
                <img src="./images/img5.jpg" alt="">
              </div>
              <div class="back" style="background-color: rgb(8, 8, 8);">
                <h1 style="font-size: 15px;">"If agriculture goes wrong, nothing else will have a chance to go right in
                  the country." - M. S. Swaminathan</h1>

                <p class="socials">
                  <i class="fa fa-facebook"></i>
                  <i class="fa fa-twitter"></i>
                  <i class="fa fa-dribbble"></i>
                  <i class="fa fa-pinterest"></i>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="main">
  <div>
    <center>
      <h2 style="color: darkgreen; font-size: 50px;">
        Contact Us
      </h2>
    </center>
  </div>
</div>
<footer>
  <div class="wrapper">
      <section class="col2">
        <div class="wrapper">
          <section class="col4">
            <h3>Follow Us </h3>
            <ul id="icons">
              <li><a href="#"><img src="./images/icon1.jpg" alt=""><span>Facebook</span></a></li>
              <li><a href="#"><img src="./images/icon2.jpg" alt=""><span>Twitter</span></a></li>
              <li><a href="#"><img src="./images/icon3.jpg" alt=""><span>Linked In</span></a></li>
            </ul>
          </section>
          <section class="col4 pad_left1">
            <h3>Why Us </h3>
            <ul id="why_us">
              <li><a href="#">Sed perspiciatis unde </a></li>
              <li><a href="#">Omnis natus error</a></li>
              <li><a href="#">Voluptatem accusantium </a></li>
            </ul>
          </section>
        </div>
        <div id="footer_link">Copyright &copy; <a href="#">F2G</a> All Rights Reserved<br>
          Design by <a target="_blank" href="#">Manisha Singh</a></div>
      </section>
      <section class="col3 pad_left2">
        <h3>Email Us</h3>
        <form id="ContactForm" action="#">
          <div>
            <div class="wrapper"> <span>Your Name:</span>
              <div class="bg">
                <input type="text" class="input">
              </div>
            </div>
            <div class="wrapper"> <span>Your E-mail:</span>
              <div class="bg">
                <input type="text" class="input">
              </div>
            </div>
            <div class="wrapper" style="height: 10px;"> <span>Your Message:</span><br>
              <div class="bg">
                <input type="text" class="input">
              </div>
            </div>
          </div><br>
          <center>
            <button>
              <a href="#">Submit</a>
            </button>
            <center>
        </form>
      </section>
    </div>
  </footer>
</div>
</div>
<script src="./javascript/about.js"></script>
</body>
</html>