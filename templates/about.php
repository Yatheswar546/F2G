<?php  

  session_start();

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
  <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
  <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
  <script type="text/javascript" src="../javascript/tms_presets.js"></script>
  <script type="text/javascript" src="../javascript/script.js"></script>
  <meta charset="utf-8">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/about.css">
</head>

<body>
  <div class="body1">
    <div class="main">
      <!--header -->
      <header>
        <div class="wrapper">
          <h1><a href="../index.php" id="logo">F2G</a></h1>
          <nav>
            <ul id="menu">
              <li><a href="../index.php">Home</a></li>
              <li><a href="../templates/commodities.php">Commodities</a></li>
              <li><a href="../templates/service.php">Services</a></li>
              <li><a href="../templates/mvtable.php">Market Value</a></li>
              <li><a href="../templates/contact.php">Contact</a></li>
              <li class="active"><a href="../templates/about.php">About</a></li>
              <?php if(isset($_SESSION['farmer']) && $_SESSION['farmer'] == 'farmer'): ?>
                <li><a href="./crophistory.php">History</a></li>  
                <li><a href="../logout.php">Logout</a></li>
              <?php elseif(isset($_SESSION['volunteer']) && $_SESSION['volunteer'] == 'volunteer'): ?>
                <li><a href="./volunteer-dashboard.php">Dashboard</a></li>  
                <li><a href="../logout.php">Logout</a></li>
              <?php elseif(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'): ?>
                <li><a href="../admin-panel/admin.php">Admin</a></li>  
                <li><a href="../logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="./login-as.php">Login</a></li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
        
        <br><br><br><br>
        <h3 class="tittle" style="color: #065d11; font-size: 40px; font-family:casual; margin: top 0;">
          ABOUT US
        </h3><br><br><br><br><br>
        <div class="slider owl-carousel">
          <div class="card">
            <div class="img">
              <img src="../images/fruits.jpeg" alt="">
            </div>
            <div class="content">
              <div class="title">
                What is F2G </div>
              <div class="sub-title">
                No Middle Men</div>
              <p style="color: black;">
                F2G platform connects farmers with governments without any involment of the middlemens.So that farmers
                can
                sell their crops easily at renumerative prices.</p>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="../images/pexels-picjumbocom-196643.jpg" alt="">
            </div>
            <div class="content">
              <div class="title">
                Why F2G </div>
              <div class="sub-title">To benefit Farmers
              </div>
              <p style="color: black;">
                To provide profits to farmers,to reduce suicide rates and importing charges,to reduce loss of crops,to
                provide
                healthy food items to people during pandemic.</p>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="../images/pexels-quang-nguyen-vinh-2135677.jpg" alt="">
            </div>
            <div class="content">
              <div class="title">
                How it's boon to Farmers</div>
              <div class="sub-title">
                Obtain renumerative prices </div>
              <p style="color: black;">
                By developing a structural and functional E-platform where farmers can sell their crops to the
                government
                directly.</p>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="../images/bg24.jpg " alt="">
            </div>
            <div class="content">
              <div class="title">
                Objectives of F2G</div>
              <div class="sub-title">Reduce transpotation cost, crop loss,etc
              </div>
              <p style="color: black;">
                Many farmer’s prone to huge loss in their agriculture due to some major factors.To overcome those this
                platform was helpful.
              </p>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="../images/pexels-rattasat-2804327.jpg" alt="">
            </div>
            <div class="content">
              <div class="title">
                How F2G Works</div>
              <div class="sub-title">
                working of F2G</div>
              <p style="color: black;">
                Farmers registers on this platform and gets an unique ID, later chooses the type of product which he
                wants to
                sell from the platform. He can also checks the price of the product.</p>
            </div>
          </div>
        </div>
        <script src="../javascript/about.js"></script>

</body>

</html>