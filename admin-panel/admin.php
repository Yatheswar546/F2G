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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F2G admin dashboard</title>

    <!-- Custom CSS --> 
    <link rel="stylesheet" href="./admin.css">
    
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
                           
                            <img src="./images/logo.png">
                            <span class="title heading">F2G</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class='bx bx-home' ></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="./messages/index.php">
                        <span class="icon"><i class='bx bx-message-rounded-dots' ></i></span>
                        <span class="title">COMPLAINTS</span>
                    </a>
                </li>
                <li>
                    <a href="./farmers/farmer.php">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">FARMERS LIST</span>
                    </a>
                </li>
                <li>
                    <a href="./volunteers/volunteer.php">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">VOLUNTEER LIST</span>
                    </a>
                </li>
                <li>
                    <a href="./marketvalue/index.php">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="title">MARKET VALUE</span>
                    </a>
                </li>
                <li>
                    <a href="./sell-requests/sellrequests.php">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="title">SELL REQUESTS</span>
                    </a>
                </li>
                <li>
                    <a href="./admins/index.php">
                        <span class="icon"><i class="fa-solid fa-people-group"></i></span>
                        <span class="title">ADMINS</span>
                    </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <span class="icon"><i class='bx bx-log-out'></i></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
                <li>
                    <a href="../index.php">
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

        <!------------- COUNTING AREA ------------------->
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">1,504</div>
                    <div class="cardName">Farmers registered</div>
                </div>
                
            </div>
            <div class="card">
                <div>
                    <div class="numbers">150</div>
                    <div class="cardName">Volunteers registered</div>
                </div>
                
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1000</div>
                    <div class="cardName">Sell crop requests</div>
                </div>
               
            </div>
            
        </div>

        <!------------------------- ORDERS DETAILS------------------->
        <div class="details">
            <!------------ RECENT ORDERS ---------------->
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Details</h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>FARMER NAME</td>
                            <td>FARMER ID</td>
                            <td>PRODUCT NAME</td>
                            <td>PRODUCT ID</td>
                            <td>QUANTITY</td>
                            <td>PRICE</td>
                            <td>REPORT</td>
                            <td colspan="2">Action</td>
                            <td>STATUS</td>                            
                        </tr>
                    </thead>
                    <thead>
                        <tbody>

                            <?php
                                // read data from qualitycheck table
                                $sql = mysqli_query($db,"SELECT * FROM `quality_check`");

                                if(!$sql){
                                    die("Invalid Query !!!".mysqli_connect_error());
                                }
                                else{
                                    // read data of each row
                                    while($row = mysqli_fetch_assoc($sql)){
                                        echo "
                                            <tr> 
                                                <td>$row[far_name]</td> 
                                                <td>$row[far_id]</td> 
                                                <td>$row[pro_name]</td>
                                                <td>$row[pro_id]</td>
                                                <td>$row[quantity]</td>
                                                <td>$row[price]</td>
                                                <td>$row[status]</td>
                                                <td><a href='../templates/TxnTest.php?id=$row[far_id]' class='edit'>Buy</a></td>
                                                <td><a href='./deleteproduct.php?id=$row[id]' class='delete'>Reject</a></td>
                                                <td><span class='status delivered'>Pending</span></td>
                                            </tr>   
                                        "; 
                                    }
                                } 
                            ?> 

                            <!-- <tr>
                                <td>Reject</td>
                                <td>Niharika Manisha</td>
                                <td>001</td> 
                                <td>BRINJAL</td>
                                <td>B23EE5</td>
                                <td>50</td>
                                <td>120</td>
                                <td>Accept</td>
                                <td>Buy</td>
                                <td>Reject</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Niharika Manisha</td>
                                <td>001</td> 
                                <td>BRINJAL</td>
                                <td>B23EE5</td>
                                <td>50</td>
                                <td>120</td>
                                <td>Accept</td>
                                <td>Buy</td>
                                <td>Reject</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Niharika Manisha</td>
                                <td>001</td> 
                                <td>BRINJAL</td>
                                <td>B23EE5</td>
                                <td>50</td>
                                <td>120</td>
                                <td>Accept</td>
                                <td>Buy</td>
                                <td>Reject</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Niharika Manisha</td>
                                <td>001</td> 
                                <td>BRINJAL</td>
                                <td>B23EE5</td>
                                <td>50</td>
                                <td>120</td>
                                <td>Accept</td>
                                <td>Buy</td>
                                <td>Reject</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Niharika Manisha</td>
                                <td>001</td> 
                                <td>BRINJAL</td>
                                <td>B23EE5</td>
                                <td>50</td>
                                <td>120</td>
                                <td>Accept</td>
                                <td>Buy</td>
                                <td>Reject</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr> -->
                            
                        </tbody>
                    </thead>
                </table>
            </div>

            <!-------------------- RECENT CUSTOMERS --------------------------->
            
            
            
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
        list.forEach((item) =>
        item.addEventListener('mouseover',activelink));
    </script>
</body>
</html>

<?php
    }
    else{
        header("Location: ../index.php");
    }
?>