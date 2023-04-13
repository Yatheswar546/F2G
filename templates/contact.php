<?php  

  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
  <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
  <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
  <script type="text/javascript" src="../javascript/tms_presets.js"></script>
  <script type="text/javascript" src="../javascript/script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>F2G - Contact Us</title>

  <link rel="stylesheet" href="../css/contact.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.6.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="js/tms-0.3.js"></script>
  <script type="text/javascript" src="js/tms_presets.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
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
              <li class="active"><a href="../templates/contact.php">Contact</a></li>
              <li><a href="../templates/about.php">About</a></li>
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
        </div><br><br>
        <div class="landing_page" style="background-color: white;">
          <div class="responsive-container-block big-container">

            <div class="responsive-container-block container">
              <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12 left-one">
                <div class="content-box">
                  <p class="text-blk section-head" style="color: #047906;">

                    Contact Us
                  </p>

                  <p style="color: rgb(16, 15, 15);font-size: medium;">
                    <b>Phone number : </b>+1258 3258 5679
                  </p>

                  <p style="color: rgb(14, 14, 14);font-size: medium;">
                    <b>Email :</b> F2G@gmail.com
                  </p>
                  <p style="color: rgb(13, 13, 13);font-size: medium;">
                    <b>Address :</b> street 20 , vskp,530026
                  </p>


                  <div class="icons-container">
                    <a class="share-icon">
                      <img class="img"
                        src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-twitter.png">
                    </a>
                    <a class="share-icon">
                      <img class="img"
                        src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-facebook.png">
                    </a>
                    <a class="share-icon">
                      <img class="img"
                        src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-google.png">
                    </a>
                    <a class="share-icon">
                      <img class="img"
                        src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-instagram.png">
                    </a>
                  </div>
                </div>
              </div>
              <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6 right-one" id="i1zj">

                <form action="../admin-panel/messages/message-input.php" method="post" class="form-box">
                  <div class="container-block form-wrapper">
                    <p class="text-blk contactus-head" style="color: rgb(4, 86, 19);">
                      <a class="link" href="">
                      </a>
                      Raise a Request
                    </p>
                    <p class="text-blk contactus-subhead" style="color: crimson;">
                      We will get back to you in 24 hours
                    </p>
                    <div class="responsive-container-block">
                      <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i10mt-7">
                        <input class="input" id="ijowk-7" name="FirstName" placeholder="Full Name">
                      </div>
                      <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i1ro7">
                        <input class="input" id="indfi-5" name="FarmerId" placeholder="FarmerId">
                      </div>
                      <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-6 wk-ipadp-6 emial" id="ityct">
                        <input class="input" id="ipmgh-7" name="Email" placeholder="Email">
                      </div>

                      <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                        <input class="input" id="imgis-6" name="PhoneNumber" placeholder="Phone Number">
                      </div>
                      <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i-7">
                        <textarea aria-placeholder="Type message here" class="textinput" name="message" id="i5vyy-7"
                          placeholder="Type message here"></textarea>
                      </div>
                    </div>
                    <button type="submit" class="submit-btn">
                      REQUEST
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
</body>

</html>