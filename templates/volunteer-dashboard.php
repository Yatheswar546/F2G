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
    <title>F2G'Volunteer Dashboard</title>
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
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: rgb(15, 15, 15);
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        /* Add Buttons */
        .add-buttons {
            position: fixed;
            top: 10px;
            left: 10px;
        }

        .add-buttons button {
            margin-right: 10px;
            padding: 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            background-color: #4CAF50;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
        }

        .add-buttons button:hover {
            background-color: #45a049;
        }

        td.status {
            font-weight: bold;
        }

        td.status.pending {
            color: orange;
        }

        td.status.completed {
            color: green;
        }
    </style>
</head>

<body>

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
        
          <div class="add-buttons">
            <!-- Button 1 -->
    
            <button><a href="./farmer-register.html" style="color: #fbf7f7; text-decoration: none;">Add
                    Farmer</a> </button>
    
            <!-- Button 2 -->
            <button><a href="./volunteer-register.html" style="color: #fffcfc;text-decoration: none;">Add
                    Volunteer</a></button>
        </div><br><br><br>
        <table>
            <thead>
                <tr>
                    <th>Farmer Name</th>
                    <th>Farmer ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php


                    // read data from sell_crops table
                    $product_details = mysqli_query($db,"SELECT * FROM `quality_check`");

                    if(!$product_details){
                        die("Invalid Query !!!".mysqli_connect_error());
                    }
                    else{
                        // read data from farmers table for district
                        // $row = mysqli_fetch_assoc($product_details);
                        // $far_id = $row['far_id'];

                        // $farmer_details = mysqli_query($db,"SELECT * FROM `farmers` WHERE farmerid='$far_id'");
                        // $row_farmer_details = mysqli_fetch_assoc($farmer_details);
                        // print_r($row_farmer_details);
                        // $farmer_district = $row_farmer_details['district'];
                        // print($farmer_district);
                    
                        while($row = mysqli_fetch_assoc($product_details)){
                            echo "
                                <tr>
                                    <td>$row[far_name]</td>
                                    <td>$row[far_id]</td>
                                    <td>$row[pro_id]</td>
                                    <td>$row[pro_name]</td>
                                    <td>$row[quantity]kg</td>
                                    <td>$row[price]/-</td>
                                    <td class='status completed'>Pending</td>
                                </tr>   
                            ";
                        }
                    }
                ?>
                
                <!-- Add more rows here -->
            </tbody>
        </table>  

    </div>



</body>

</html>