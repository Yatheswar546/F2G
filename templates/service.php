<?php  

  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
  <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
  <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
  <script type="text/javascript" src="../javascript/tms_presets.js"></script>
  <script type="text/javascript" src="../javascript/script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Services Section</title>
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
  <!-- Font Awesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <!-- Stylesheet -->
  <link rel="stylesheet" href="../css/service.css"/>
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
              <li   class="active"><a href="../templates/service.php">Services</a></li>
              <li><a href="../templates/mvtable.php">Market Value</a></li>
              <li><a href="../templates/contact.php">Contact</a></li>
              <li><a href="../templates/about.php table.html">About</a></li>
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
      </header>
    </div>
  </div><br><br>
  <center>
  <h2 style="color: green;font-size: 40px;">Services</h2>
</center>
  
  <section>
    <div class="row">
      <h2 class="section-heading" style="color: rgb(251, 249, 249);">Our Services</h2>
    </div>
    <div class="row">
      <div class="column">
        <div class="card">
          <div class="icon-wrapper">
            <i class="fas fa-hammer"></i>
          </div>
          <h3>Quick Response</h3>
          <p>
            When a farmer sends a request to sell his crops then the work will be done in a time span of 1-2 days
          </p>
        </div>
      </div>
      <div class="column">
        <div class="card">
          <div class="icon-wrapper">
            <i class="fas fa-brush"></i>
          </div>
          <h3>Transparent transactions
          </h3>
          <p>
            Transparent transaction will be done there and the transportation of the product will be done at the same
            time .
          </p>
        </div>
      </div>
      <div class="column">
        <div class="card">
          <div class="icon-wrapper">
            <i class="fas fa-wrench"></i>
          </div>
          <h3>Profits to farmers</h3>
          <p>
            Farmers will get more profit and their burden will also be reduced . By developing a structural and
            functional E-platform where farmers can sell their crops to the government directly with transparent
            transactions and remunerative prices .
          </p>
        </div>
      </div>
      <div class="column">
        <div class="card">
          <div class="icon-wrapper">
            <i class="fas fa-truck-pickup"></i>
          </div>
          <h3>Remunerative Prices</h3>
          <p>
            A platform where we can remove the middle men , by which the farmer will get benefited without any loss and
            can sell their crops to government directly with reasonable prices .
          </p>
        </div>
      </div>
      <div class="column">
        <div class="card">
          <div class="icon-wrapper">
            <i class="fas fa-broom"></i>
          </div>
          <h3>Platform to connect F2G</h3>
          <p>
            Farmers registers on this platform and gets an unique ID, later chooses the type of product which he wants
            to sell from the platform. He can also checks the price of the product in MARKET VALUE PAGE according to
            their location .


          </p>
        </div>
      </div>
      <div class="column">
        <div class="card">
          <div class="icon-wrapper">
            <i class="fas fa-plug"></i>
          </div>
          <h3>Reduces importing charges</h3>
          <p>
            During Scarcity of food we import food from other countries due to which importing charges increases in
            order to overcome this the governtment buys and stores the products.
          </p>
        </div>
      </div>
    </div>
  </section>
</body>

</html>