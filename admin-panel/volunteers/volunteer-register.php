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
    $volid = "";
    $aadhar = "";
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
        $volid = $_POST['volid'];
        $aadhar = $_POST['aadhar'];
        $address = $_POST['address'] ;
        $postal = $_POST['postal'] ;
 
        do{
            if(empty($name) || empty($gender) || empty($dob) || empty($email) || empty($password) || empty($state) || empty($district) || empty($subdistrict) || empty($phone) || empty($volid) || empty($aadhar) || empty($address) || empty($postal)){
                echo "All Fields are Required !!!";
            }
            else{
                $sql = mysqli_query($db,"INSERT INTO `volunteers`(`name`, `gender`, `dob`, `email`, `password`, `state`, `district`, `subdistrict`, `phone`, `volunteer_id`, `aadhar`, `address`, `postal_code`) VALUES ('$name', '$gender', '$dob', '$email', '$password', '$state', '$district', '$subdistrict', '$phone', '$volid', '$aadhar', '$address', '$postal')");
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