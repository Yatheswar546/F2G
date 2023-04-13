<?php
    session_start();
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'){

    // Database Connection
    require_once('../config.php');
    
    // Check Connection
    if(!$db){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        // echo "Connection Successful";
    }

    $pro_id = "";
    $far_id = "";
    $report = "";
    $status = "";

    $errormsg = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $pro_id = $_POST['pro_id'];
        $far_id = $_POST['far_id'];
        $report = $_POST['report'];
        $status = $_POST['status'];

        $crop_details = mysqli_query($db,"SELECT * FROM `sell_crops` WHERE farmer_id='$far_id' AND product_id='$pro_id'");
        $row = mysqli_fetch_assoc($crop_details);
        
        $pro_name = $row['product_name'];
        $quantity = $row['quantity'];
        $price = $row['total_amount'];

        $farmername = mysqli_query($db,"SELECT * FROM `farmers` WHERE farmerid='$far_id'");       
        $row_farmername = mysqli_fetch_assoc($farmername);
        $far_name = $row_farmername['name'];


        $sql = mysqli_query($db,"INSERT INTO `quality_check`(`far_name`, `far_id`, `pro_name`, `pro_id`, `quantity`, `price`, 
        `report`, `status`) VALUES ('$far_name','$far_id','$pro_name','$pro_id','$quantity','$price','$report',
        '$status')");

        // print_r($row);
        $delete_sql = mysqli_query($db,"DELETE FROM `sell_crops` WHERE farmer_id='$far_id' AND product_id='$pro_id'");
    }   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F2G admin dashboard</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../admin.css">
    
    <!-- Box Icons Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>

    <!----------------------- SideBar ---------------------->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <div class="user">
                           
                            <img src="../images/logo.png">
                            <span class="title heading">F2G</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="../admin.php">
                        <span class="icon"><i class='bx bx-home' ></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="../messages/index.php">
                        <span class="icon"><i class='bx bx-message-rounded-dots' ></i></span>
                        <span class="title">COMPLAINTS</span>
                    </a>
                </li>
                <li>
                    <a href="../farmers/farmer.php">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">FARMERS LIST</span>
                    </a>
                </li>
                <li>
                    <a href="../volunteers/volunteer.php">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">VOLUNTEER LIST</span>
                    </a>
                </li>
                <li>
                    <a href="../marketvalue/index.php">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="title">MARKET VALUE</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="title">SELL REQUESTS</span>
                    </a>
                </li>
                <li>
                    <a href="../admins/index.php">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">ADMINS</span>
                    </a> 
                </li>
                <li>
                    <a href="../../logout.php">
                        <span class="icon"><i class='bx bx-log-out'></i></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
                <li>
                    <a href="../../index.php">
                        <span class="icon"><i class="fa-sharp fa-solid fa-house"></i></span>
                        <span class="title">Back to Home</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!----------------MAIN SECTION ----------------------------->
    <div class="main">
        <!------------- Top Search Bar ---------------------->
        <div class="topbar">
            <div class="toggle" style="display:none;">
                <i class='bx bx-menu'></i>
            </div>
            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <i class='bx bx-search' ></i>
                </label>
            </div>
            
        </div>

       <!-- Admin Content -->
       <div class="admin-content">
        <!-- <div class="button-group">
            <a href="./create.html" class="admin-btn btn-blg">Add </a>
            <a href="./index.php" class="admin-btn btn-blg">Manage Services</a>
        </div> -->

        <div class="content">
            <h2 class="page-title">SELL REQUESTS (QUALITY CHECK)</h2>

            <?php
                if(!$errormsg){
                    echo $errormsg;
                }

            ?>

            <table>
                <thead>
                    <th>S. No.</th>
                    <th>FARMER ID</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT ID</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                    <th>QUALITY OF CROP</th>
                    <th>STATUS</th>
                    <th></th>
                </thead>
                <tbody>

                    <?php

                        // read data from farmers table for farmer name
                        $farmername = mysqli_query($db,"SELECT * FROM `farmers`");
                        
                        $row_farmername = mysqli_fetch_assoc($farmername);

                        $product_details = mysqli_query($db,"SELECT * FROM `sell_crops`");
                        if(!$product_details){
                            die("Invalid Query !!!".mysqli_connect_error());
                        }
                        else{
                            // read data of each row
                            while($row = mysqli_fetch_assoc($product_details)){
                                echo " 
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[farmer_id]</td>
                                    <td>$row[product_name]</td>
                                    <td>$row[product_id]</td>
                                    <td>$row[quantity]</td>
                                    <td>$row[total_amount]/-</td>
                                    <form action='#' method='post'>
                                        <input type='hidden' name='pro_id' value='$row[product_id]'>     
                                        <input type='hidden' name='far_id' value='$row[farmer_id]'> 
                                        <TD class = 'select'>
                                            <select name='report'>    
                                                <option value=''>SELECT</option>     
                                                    <option value='1st QUALITY'>1st QUALITY</option>
                                                    <option value='2nd QUALITY'>2nd QUALITY</option>
                                                    <option value='3rd QUALITY'>3rd QUALITY</option>
                                            </select>
                                        </TD> 
                                        <TD class = 'select'>
                                            <select name='status'>
                                                <option value='volvo'>SELECT</option>        
                                                    <option class ='edit' value='ACCEPTED'>ACCEPTED</option>
                                                    <option class='delete' value='REJECTED'>REJECTED</option>
                                            </select>
                                        </TD> 
                                        <td><input type='submit' name='submit value='Send'></td>
                                    </form>
                                </tr>
                                ";
                            }
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>

    </div>

    </div>



    <script>
        //MenuToggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        
        toggle.onlick =  function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        // add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activelink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered')
        }
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it

        list.forEach((item) =>
        item.addEventListener('mouseover',activelink));
    </script>
</body>
</html>

<?php
    }
    else{
        header("Location: ../../index.php");
    }
?>