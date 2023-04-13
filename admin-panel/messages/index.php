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
                    <a href="#">
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
                    <a href="../sell-requests/sellrequests.php">
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

        <!-------------- Admin Content ------------------------------>
        <div class="admin-content">
            <!-- <div class="button-group">
                <a href="./create.html" class="admin-btn btn-blg">Add Teams</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Teams</a>
            </div> -->

            <div class="content">
                <h2 class="page-title">FARMER QUERIES/COMPLAINTS</h2>

                <table>
                    <thead>
                        <th>S no.</th>
                        <th>FULL NAME</th>
                        <th>FARMER ID</th>
                        <th>PHONE NO.</th>
                        <th>MESSAGE</th>
                        <th>Recieved At</th>
                        <!-- <th colspan="2">Action</th> -->
                    </thead>
                    <tbody>

                        <?php

                            // read data from messages tabel
                            $messages = mysqli_query($db,"SELECT * FROM `messages`");

                            if(!$messages){
                                die("Invalid Query !!!".mysqli_connect_error());
                            }
                            else{
                                // read data of each row
                                while($row = mysqli_fetch_assoc($messages)){
                                    echo "
                                        <tr>
                                            <td>$row[id]</td>
                                            <td>$row[fname]</td>
                                            <td>$row[farmerid]</td>
                                            <td>$row[phone]</td>
                                            <td>$row[message]</td>
                                            <td>$row[time]</td>
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