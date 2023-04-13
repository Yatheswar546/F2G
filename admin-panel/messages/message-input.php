<?php

    // Database Connection
    require_once('../config.php');
    
    // Check Connection
    if(!$db){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        // echo "Connection Successful";
    }

    $fname = "";
    $farmerid = "";
    $email = "";
    $phone = "";
    $message = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = $_POST['FirstName'];
        $farmerid = $_POST['FarmerId'];
        $email = $_POST['Email'];
        $phone = $_POST['PhoneNumber'];
        $message = $_POST['message'];

        do{
            if(empty($fname) || empty($farmerid) || empty($email) || empty($phone) || empty($message)){
                echo "All Fields are Required !!!";
            }
            else{
                $sql = mysqli_query($db,"INSERT INTO `messages`(`fname`, `farmerid`, `email`, `phone`, `message`) VALUES ('$fname','$farmerid','$email','$phone','$message')");
                if($sql){
                    header("Location: ../../index.php");
                    exit;
                }
                else{
                    $errormsg = "Something went wrong";
                }
            }
        }while(false);
    }

?>


<!-- 9949247566 -  -->