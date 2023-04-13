<?php   

    session_start();

    // Database Connection
    require_once('../config.php');
    
    // Check Connection
    if(!$db){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        // echo "Connection Successful";
    }

    $username = "";
    $phone = "";
    $password = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        
        $result  = mysqli_query($db,"SELECT * FROM admins WHERE name = '$username'");
		$row = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result) > 0){
			if($password == $row["password"]){
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['admin'] = 'admin';
				header("location: ../admin-panel/admin.php");
			}
			else{
                $errormsg = "Wrong Password";
            }
		} 
		else{
            $errormsg = "User Not Resgister";
        } 
    }
    


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">

    <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
    <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
    <script type="text/javascript" src="../javascript/tms_presets.js"></script>
    <script type="text/javascript" src="../javascript/script.js"></script>
    <link rel="stylesheet" href="../css/farmer-login.css">

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
                  <li ><a href="../templates/contact.php">Contact</a></li>
                  <li  class="active"><a href="../templates/about.php">About</a></li>
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
    
    <form action="#" method="post">

        <div class="container">
            <div class="box">
                <h3 >ADMIN LOGIN</h3>
                
                <div class="input_box">
                    <input type="text" name="username" class="name" id="usrid" required>
                    <label style="color: #0000009e;">USERNAME</label>

                </div>

                <div class="input_box">

                    <input type="text" name="phone" class="input" id="phnnum" required>
                    <label style="color: #0000009e;">Phone Number</label>
                </div>
                
                <div class="input_box">
                    <input type="password" name="password" class="password" id="pwd1" required>
                    <label style="color: #0000009e;">Password</label>

                    <input type="submit" class="signup_button" id="logon" value="Submit">
                </div>
                

            </div>
        </div>
        
    </form>
</body>

</html>