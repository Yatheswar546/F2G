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

    $farmerid = "";
    $phone = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $farmerid = $_POST['farmerid'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $result  = mysqli_query($db,"SELECT * FROM farmers WHERE farmerid = '$farmerid'");
		$row = mysqli_fetch_assoc($result);
		if(mysqli_num_rows($result) > 0){
			if($password == $row["password"]){
                session_start();

                $_SESSION['login']='true';
                $_SESSION['id'] = $row['id'];
                $_SESSION['farmer'] = 'farmer'; 
                $_SESSION['farmer_id'] = $row['farmerid'];
				header("location: ../index.php");
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

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="../css/farmer-login.css">

    <script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>

<body>
   
    
    <form action="#" method="post">
        <div class="container">
            <div class="box">
                <h3 >FARMER LOGIN</h3>

                <div class="para-3">
                    Volunteer click here 
                     <a href="../templates/volunteer-login.php" style="color: blue;">Login here</a>
                </div> 

                <div class="input_box">
                    <input type="text" class="name" id="usrid" name="farmerid" required>
                    <label style="color: #0000009e;">FarmerID</label>
                </div>

                <div class="input_box">
                    <input type="text" class="input" id="phnnum" name="phone" required>
                    <label style="color: #0000009e;">Phone Number</label>
                </div>

                <div class="input_box">
                    <input type="text" class="otp" id="otp" name="otp">
                    <label style="color: #0000009e;">OTP</label>
                </div>

                <div class="input_box">
                    <input type="password" class="password" id="pwd1" name="password" required>
                    <label style="color: #0000009e;">Password</label>

                    <input type="submit" name="submit" class="signup_button" id="logon" value="Submit">
                </div>

                <p class="para-2">
                    Does not have an account? <a href="../templates/farmer-register.html" style="color: blue;">Register here</a>
                </p>

            </div>
        </div>
        
    </form>
</body>

</html>