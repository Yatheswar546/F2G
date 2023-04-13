<?php

    // Database Connection
    require_once('../config.php');
    
    // Check Connection
    if(!$db){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        echo "Connection Successful";
    }

    $name = "";
    $gender = "";
    $dob = "";
    $email = "";
    $password = "";
    $state = "";
    $district = "";
    $subdistrict = "";
    $phone = "";
    $aadhar = "";
    $bank = "";
    $ifsc = "";
    $address = "";
    $postal = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['date'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $state = $_POST['country-state'];
        $district = $_POST['city'];
        $subdistrict = $_POST['sub-district'];
        $phone = $_POST['phone'];
        $aadhar = $_POST['aadhar'];
        $bank = $_POST['bank']; 
        $ifsc = $_POST['ifsc'];
        $address = $_POST['address'] ;
        $postal = $_POST['postal'] ;

        $farmerid = substr($name,0,3)."11".substr($phone,0,6);

        do{
            if(empty($name) || empty($gender) || empty($dob) || empty($email) || empty($password) || empty($state) || empty($district) || empty($subdistrict) || empty($phone) || empty($aadhar) || empty($bank) || empty($ifsc) || empty($address) || empty($postal)){
                echo "All Fields are Required !!!";
            }
            else{
                $sql = mysqli_query($db,"INSERT INTO `farmers`(`name`, `gender`, `dob`, `email`, `password`, `state`, `district`, `subdistrict`, `phone`, `aadhar`, `bank_acc`, `ifsc`, `address`, `postal_code`, `farmerid`) VALUES ('$name', '$gender', '$dob', '$email', '$password', '$state', '$district', '$subdistrict', '$phone', '$aadhar', '$bank', '$ifsc', '$address', '$postal', '$farmerid')");
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