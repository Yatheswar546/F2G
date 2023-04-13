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
    $pro_name = "";
    $pro_id = "";
    $district = "";
    $sub_district = "";
    $price = "";

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        // GET Method : Show the Data
        if(!isset($_GET["id"])){
            header("location: index.php");
            exit;
        }
        $id = $_GET["id"];
        // Read the Data
        $result = mysqli_query($db,"SELECT * FROM `marketvalue` WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

        if(!$row){
            header("Location: index.php");
            exit;
        }

        $pro_name = $row['pro_name'];
        $pro_id = $row['pro_id'];
        $district = $row['district'];
        $sub_district = $row['subdistrict'];
        $price = $row['price'];
    }
    else{
        // POST Method : Update the data
        $id = $_POST['id'];
        $pro_name = $_POST['pro_name'];
        $pro_id = $_POST['pro_id'];
        $district = $_POST['district'];
        $sub_district = $_POST['sub_district'];
        $price = $_POST['price'];
        do{
            if(empty($id) || empty($pro_name) || empty($pro_id) || empty($district) || empty($sub_district) || empty($price)){
                $errormsg = "All fields are required";
            }
            else{
                $sql = mysqli_query($db,"UPDATE `marketvalue` SET `pro_name`='$pro_name',`pro_id`='$pro_id',`district`='$district',`subdistrict`='$sub_district',`price`='$price' WHERE id=$id");
                
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
    <title>F2G Dashboard</title>

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
                    <a href="#">
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

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="./create.php" class="admin-btn btn-blg">Add Product</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Products</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Products</h2>

                <?php 
                    if(!empty($errormsg)){
                        echo "
                            <div class='error_msg'>
                                <strong>$errormsg</strong>
                            </div>
                        ";
                    }
                ?>

                <form action="#" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div>
                        <label>Product Name</label>
                        <input type="text" name="pro_name" class="text-input" value="<?php echo $pro_name; ?>">
                    </div>
                    <div>
                        <label>Product ID</label>
                        <input type="text" name="pro_id" class="text-input" value="<?php echo $pro_id; ?>">
                    </div>
                    <div>
                        <label>District</label>
                        <select id="city" name="district" class="input" value="<?php echo $district; ?>">
                            <option value=""  style="font-size: 15px;font-family: Verdana, Geneva, Tahoma, sans-serif;">Select district</option>
                            <option value="Amalapuramu">Amalapuramu</option>
                            <option value="Anakapalli">Anakapalli</option>
                            <option value="West Godavari">West Godavari</option>
                            <option value="	Bapatla">Bapatla</option>
                            <option value="Srikakulam">Srikakulam</option>
                            <option value="Parvathipuram Manyam">Parvathipuram Manyam</option>
                            <option value="Vizianagaram">Vizianagaram</option>
                            <option value="Visakhapatnam">Visakhapatnam</option>
                            <option value="Alluri Sitharama Raju">Alluri Sitharama Raju</option>
                            <option value="	Kakinada">	Kakinada</option>
                            <option value="East Godavari">East Godavari</option>
                            <option value="Konaseema">Konaseema</option>
                            <option value="Eluru">Eluru</option>
                            <option value="NTR">NTR</option>
                            <option value="Krishna">Krishna</option>
                            <option value="Palnadu">Palnadu</option>
                            <option value="Guntur">Guntur</option>
                            <option value="Bapatla">Bapatla</option>
                            <option value="Prakasam">Prakasam</option>
                            <option value="Nellore">Nellore</option>
                            <option value="Kurnool">Kurnool</option>
                            <option value="Nandyala">Nandyala</option>
                            <option value="	Anantapuramu">	Anantapuramu</option>
                            <option value="	Sri Sathya Sai">	Sri Sathya Sai</option>
                            <option value="YSR Kadapa">YSR Kadapa</option>
                            <option value="Annamayya">Annamayya</option>
                            <option value="Tirupati">Tirupati</option>
                            <option value="Chittoor">Chittoor</option>
                        </select>
                    </div>
                    <div>
                        <label>Sub District</label>
                        <select id="city" name="sub_district" class="input" value="<?php echo $sub_district; ?>">
                            <option value=""  style="font-size: 15px;font-family: Verdana, Geneva, Tahoma, sans-serif;">Select </option>
                            <option value="Addanki">Addanki</option>
                            <option value="Adoni">Adoni</option>
                            <option value="Akasahebpet">Akasahebpet</option>
                            <option value="Akividu">Akividu</option>
                            <option value="Akkarampalle">Akkarampalle</option>
                            <option value="Amalapuram">Amalapuram</option>
                            <option value="Amudalavalasa">Amudalavalasa</option>
                            <option value="Anakapalle">Anakapalle</option>
                            <option value="Anantapur">Anantapur</option>
                            <option value="Atmakur">Atmakur</option>
                            <option value="Attili">Attili</option>
                            <option value="Avanigadda">Avanigadda</option>
                            <option value="Badvel">Badvel</option>
                            <option value="Banganapalle">Banganapalle</option>
                            <option value="Bapatla">Bapatla</option>
                            <option value="Betamcherla">Betamcherla</option>
                            <option value="Bhattiprolu">Bhattiprolu</option>
                            <option value="Bhimavaram">Bhimavaram</option>
                            <option value="Bhimunipatnam">Bhimunipatnam</option>
                            <option value="Bobbili">Bobbili</option>
                            <option value="Challapalle">Challapalle</option>
                            <option value="Chemmumiahpet">Chemmumiahpet</option>
                            <option value="Chilakalurupet">Chilakalurupet</option>
                            <option value="Chinnachowk">Chinnachowk</option>
                            <option value="Chipurupalle">Chipurupalle</option>
                            <option value="Chirala">Chirala</option>
                            <option value="Chittoor">Chittoor</option>
                            <option value="Chodavaram">Chodavaram</option>
                            <option value="Cuddapah">Cuddapah</option>
                            <option value="Cumbum">Cumbum</option>
                            <option value="Darsi">Darsi</option>
                            <option value="Dharmavaram">Dharmavaram</option>
                            <option value="Dhone">Dhone</option>
                            <option value="Diguvametta">Diguvametta</option>
                            <option value="East Godavari">East Godavari</option>
                            <option value="Elamanchili">Elamanchili</option>
                            <option value="Ellore">Ellore</option>
                            <option value="Emmiganur">Emmiganur</option>
                            <option value="Erraguntla">Erraguntla</option>
                            <option value="Etikoppaka">Etikoppaka</option>
                            <option value="Gajuwaka">Gajuwaka</option>
                            <option value="Ganguvada">Ganguvada</option>
                            <option value="Gannavaram">Gannavaram</option>
                            <option value="Giddalur">Giddalur</option>
                            <option value="Gokavaram">Gokavaram</option>
                            <option value="Gorantla">Gorantla</option>
                            <option value="Govindapuram,Chilakaluripet,Guntur">Govindapuram,Chilakaluripet,Guntur</option>
                            <option value="Gudivada">Gudivada</option>
                            <option value="Gudlavalleru">Gudlavalleru</option>
                            <option value="Gudur">Gudur</option>
                            <option value="Guntakal Junction">Guntakal Junction</option>
                            <option value="Guntur">Guntur</option>
                            <option value="Hindupur">Hindupur</option>
                            <option value="Ichchapuram">Ichchapuram</option>
                            <option value="Jaggayyapeta">Jaggayyapeta</option>
                            <option value="Jammalamadugu">Jammalamadugu</option>
                            <option value="Kadiri">Kadiri</option>
                            <option value="Kaikalur">Kaikalur</option>
                            <option value="Kakinada">Kakinada</option>
                            <option value="Kalyandurg">Kalyandurg</option>
                            <option value="Kamalapuram">Kamalapuram</option>
                            <option value="Kandukur">Kandukur</option>
                            <option value="Kanigiri">Kanigiri</option>
                            <option value="Kankipadu">Kankipadu</option>
                            <option value="Kanuru">Kanuru</option>
                            <option value="Kavali">Kavali</option>
                            <option value="Kolanukonda">Kolanukonda</option>
                            <option value="Kondapalle">Kondapalle</option>
                            <option value="Korukollu">Korukollu</option>
                            <option value="Kosigi">Kosigi</option>
                            <option value="Kovvur">Kovvur</option>
                            <option value="Krishna">Krishna</option>
                            <option value="Kuppam">Kuppam</option>
                            <option value="Kurnool">Kurnool</option>
                            <option value="Macherla">Macherla</option>
                            <option value="Machilipatnam">Machilipatnam</option>
                            <option value="Madanapalle">Madanapalle</option>
                            <option value="Madugula">Madugula</option>
                            <option value="Mandapeta">Mandapeta</option>
                            <option value="Mandasa">Mandasa</option>
                            <option value="Mangalagiri">Mangalagiri</option>
                            <option value="Markapur">Markapur</option>
                            <option value="Nagari">Nagari</option>
                            <option value="Nagireddipalli">Nagireddipalli</option>
                            <option value="Nandigama">Nandigama</option>
                            <option value="Nandikotkur">Nandikotkur</option>
                            <option value="Nandyal">Nandyal</option>
                            <option value="Narasannapeta">Narasannapeta</option>
                            <option value="Narasapur">Narasapur</option>
                            <option value="Narasaraopet">Narasaraopet</option>
                            <option value="Narasingapuram">Narasingapuram</option>
                            <option value="Narayanavanam">Narayanavanam</option>
                            <option value="Narsipatnam">Narsipatnam</option>
                            <option value="Nayudupet">Nayudupet</option>
                            <option value="Nellore">Nellore</option>
                            <option value="Nidadavole">Nidadavole</option>
                            <option value="Nuzvid">Nuzvid</option>
                            <option value="Ongole">Ongole</option>
                            <option value="Pakala">Pakala</option>
                            <option value="Palakollu">Palakollu</option>
                            <option value="Palasa">Palasa</option>
                            <option value="Palkonda">Palkonda</option>
                            <option value="Pallevada">Pallevada</option>
                            <option value="Palmaner">Palmaner</option>
                            <option value="Parlakimidi">Parlakimidi</option>
                            <option value="Parvatipuram">Parvatipuram</option>
                            <option value="Pavuluru">Pavuluru</option>
                            <option value="Pedana">Pedana</option>
                            <option value="pedda nakkalapalem">pedda nakkalapalem</option>
                            <option value="Peddapuram">Peddapuram</option>
                            <option value="Penugonda">Penugonda</option>
                            <option value="Penukonda">Penukonda</option>
                            <option value="Phirangipuram">Phirangipuram</option>
                            <option value="Pippara">Pippara</option>
                            <option value="Pithapuram">Pithapuram</option>
                            <option value="Polavaram">Polavaram</option>
                            <option value="Ponnur">Ponnur</option>
                            <option value="Ponnuru">Ponnuru</option>
                            <option value="Prakasam">Prakasam</option>
                            <option value="Proddatur">Proddatur</option>
                            <option value="Pulivendla">Pulivendla</option>
                            <option value="Punganuru">Punganuru</option>
                            <option value="Puttaparthi">Puttaparthi</option>
                            <option value="Puttur">Puttur</option>
                            <option value="Rajahmundry">Rajahmundry</option>
                            <option value="Ramachandrapuram">Ramachandrapuram</option>
                            <option value="Ramanayyapeta">Ramanayyapeta</option>
                            <option value="Ramapuram">Ramapuram</option>
                            <option value="Rampachodavaram">Rampachodavaram</option>
                            <option value="Rayachoti">Rayachoti</option>
                            <option value="Rayadrug">Rayadrug</option>
                            <option value="Razam">Razam</option>
                            <option value="Razampeta">Razampeta</option>
                            <option value="Razole">Razole</option>
                            <option value="Renigunta">Renigunta</option>
                            <option value="Repalle">Repalle</option>
                            <option value="Salur">Salur</option>
                            <option value="Samalkot">Samalkot</option>
                            <option value="Sattenapalle">Sattenapalle</option>
                            <option value="Singarayakonda">Singarayakonda</option>
                            <option value="Sompeta">Sompeta</option>
                            <option value="Srikakulam">Srikakulam</option>
                            <option value="Srisailain">Srisailain</option>
                            <option value="Suluru">Suluru</option>
                            <option value="Tadepalle">Tadepalle</option>
                            <option value="Tadepallegudem">Tadepallegudem</option>
                            <option value="Tadpatri">Tadpatri</option>
                            <option value="Tanuku">Tanuku</option>
                            <option value="Tekkali">Tekkali</option>
                            <option value="Tirumala">Tirumala</option>
                            <option value="Tirupati">Tirupati</option>
                            <option value="Tuni">Tuni</option>
                            <option value="Uravakonda">Uravakonda</option>
                            <option value="vadlamuru">vadlamuru</option>
                            <option value="Vadlapudi">Vadlapudi</option>
                            <option value="Venkatagiri">Venkatagiri</option>
                            <option value="Vepagunta">Vepagunta</option>
                            <option value="Vetapalem">Vetapalem</option>
                            <option value="Vijayawada">Vijayawada</option>
                            <option value="Vinukonda">Vinukonda</option>
                            <option value="Visakhapatnam">Visakhapatnam</option>
                            <option value="Vizianagaram">Vizianagaram</option>
                            <option value="Vizianagaram District">Vizianagaram District</option>
                            <option value="Vuyyuru">Vuyyuru</option>
                            <option value="West Godavari">West Godavari</option>
                            <option value="Yanam">Yanam</option>
                            <option value="Yanamalakuduru">Yanamalakuduru</option>
                            <option value="Yarada">Yarada</option>
                        </select>
                    </div>
                    <div>
                        <label>Price per KG</label>
                        <input type="text" name="price" id="" class="text-input" value="<?php echo $price; ?>">
                    </div>
                    <div>
                        <button type="submit" class="admin-btn btn-blg">Add Product</button>
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