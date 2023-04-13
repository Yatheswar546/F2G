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

    $id = "";
    $username = "";
    $email = "";
    $phone = "";
    $password = "";

    $errormsg = "";
    $successmsg = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // GET Method : Show the Data
        if(!isset($_GET["id"])){
            header("location: index.php");
            exit;
        }
        $id = $_GET["id"];
        // Read the Data
        $result = mysqli_query($db,"SELECT * FROM `admins` WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

        if(!$row){
            header("Location: index.php");
            exit;
        }
        $username = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
    }
    else{
        // POST Method : Update the data
        $id = $_POST['id'];
        $username = $_POST['username'];
	    $email = $_POST['email'];
        $phone = $_POST['phone'];

        $adminid = md5(substr($username,0,3).substr($email,0,3).random_int(10000,99999));

        do{
            if(empty($id) || empty($username) || empty($email) || empty($phone)){
                $errormsg = "All fields are required";
                break;
            }
            else{
                $sql = mysqli_query($db,"UPDATE `admins` SET `name`='$username',`email`='$email',`phone`='$phone',`adminid`='$adminid' WHERE id=$id");
                
                if(!$sql){
                    $errormsg = "Invalid Query...".mysqli_connect_error();
                    break;
                }
                else{
                    header("Location: index.php");
                    exit;
                }
            }
        }while(false);
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
                    <a href="../sell-requests/sellrequests.php">
                        <span class="icon"><i class="fa-solid fa-briefcase"></i></span>
                        <span class="title">SELL REQUESTS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
            <div class="user">
                <img src="../images/p1.png">
            </div>
        </div>

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="./create.php" class="admin-btn btn-blg">Edit Admin</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Admins</a>
            </div>

            <div class="content">
                <h2 class="page-title">Edit Admin</h2>
 
                <?php 
                    if(!empty($errormsg)){
                        echo "
                            <div class='error_msg'>
                                <strong>$errormsg</strong>
                            </div>
                        ";
                    }
                ?>

                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value = "<?php echo $id; ?>">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" class="text-input" value = "<?php echo $username; ?>" >
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" class="text-input" value = "<?php echo $email; ?>">
                    </div>
                    <div>
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="text-input" value = "<?php echo $phone; ?>">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <div>
                        <label>Confirm Password</label>
                        <input type="password" name="passwordConf" class="text-input">
                    </div>
                    <div>
                        <button type="submit" class="admin-btn btn-blg">Edit Admin</button>
                    </div>
                </form>

            </div>

        </div>
    </div>


    <!----- CkEditor 5 Script -------------------->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <script src="../js/script.js"></script>
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