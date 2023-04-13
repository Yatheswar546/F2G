<?php

    session_start();
    // echo $_SESSION['volunteer'];

    // Database Connection
    require_once('../config.php'); 
    
    // Check Connection
    if(!$db){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        // echo "Connection Successful";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  href="../css/mvtable.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
    <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
    <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
    <script type="text/javascript" src="../javascript/tms_presets.js"></script>
    <script type="text/javascript" src="../javascript/script.js"></script>

    <style>
      td a{
        display: block;
        text-decoration: none;
        background-color: #ae030e;
        padding: 5px;
        width: 100%;
        border-radius: 10px;
      }
    </style>


</head>

<body>
  <body id="page1">
    <div class="body1">
      <div class="main">
        <!--header -->
        <header>
          <div class="wrapper">
            <h1><a href="../index.php" id="logo"></a></h1>
            <nav>
              <ul id="menu">
                <li class="active"><a href="../index.php">Home</a></li>
                <li><a href="../templates/commodities.php">Commodities</a></li>
                <li><a href="../templates/service.php">Services</a></li>
                <li><a href="../templates/mvtable.php">Market Value</a></li>
                <li><a href="../templates/contact.php">Contact</a></li>
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
<center> <h2 style="color: green;font-size: 40px;margin-bottom: 20px;">MARKET VALUES</h2></center> 
<br><br>
    <section class="section3">
        <div class="flex-container">
          <div class="member">
            <div class="delete">
              <div class="overplay"></div>
              <div class="choice-delete">
                  <i class="fas fa-times"></i>
              </div>
            </div>
      
                
            <table class="content-member" >
              <thead>
                  <tr class="name-row">
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>District</th>
                      <th>Subdistrict</th>
                      <th>Today's Price Per KG</th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>

                <?php
                  // Fetch data from admins table
                  $products = mysqli_query($db,"SELECT * FROM `marketvalue`");
                  if(!$products){
                      die("Invalid Query !!!".mysqli_connect_error());
                  } 
                  else{
                      // read data of each row
                      while($row = mysqli_fetch_assoc($products)){
                        echo "
                        <tr>
                        <td class='edit'>$row[pro_id]</td>
                        <td class='edit'>$row[pro_name]</td>
                    
                        <TD>  
                          <select id='city' name='city' class='input'>
                            <option value=''  style='font-size: 15px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Select district</option>
                            <option value='Amalapuramu>Amalapuramu</option>
                            <option value='Anakapalli'>Anakapalli</option>
                            <option value='West Godavari'>West Godavari</option>
                            <option value='Bapatla'>Bapatla</option>
                            <option value='Srikakulam>Srikakulam</option>
                            <option value='Parvathipuram Manyam'>Parvathipuram Manyam</option>
                          </select>
                        </TD>
                  
                        <TD>
                          <select id='city' name='city' class='input'>
                            <option value=''  style='font-size: 15px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Select </option>
                            <option value='Addanki'>Addanki</option>
                            <option value'Adoni'>Adoni</option>
                            <option value='Akasahebpet'>Akasahebpet</option>
                            <option value='Akividu'>Akividu</option>
                            <option value='Akkarampalle'>Akkarampalle</option>
                          </select>
                        </TD>
                        <!-- <td class='edit'>123456789</td> -->
                        <td>$row[price]</td> 
                        <td>
                          <a href='./sellcrop.php?id=$row[id]' class='edit'>SELL</a>
                        </td>
                      </tr>
                        ";
                      }
                  }
                ?>    

              </tbody>
            </table>
          </div>
        </div>
    </section>
</body>

</html>