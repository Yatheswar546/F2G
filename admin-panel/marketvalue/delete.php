<?php
    session_start();
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin'){
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        // Database Connection
        require_once('../config.php');
        $sql = mysqli_query($db,"DELETE FROM `marketvalue` WHERE id=$id");
    }
    header("location: index.php");
    exit;
    
    }
    else{
        header("Location: ../../index.php");
    }
?>