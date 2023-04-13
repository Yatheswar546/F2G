<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
    <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
    <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
    <script type="text/javascript" src="../javascript/tms_presets.js"></script>
    <script type="text/javascript" src="../javascript/script.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>volunteer</title>
    <link rel="stylesheet" href="../css/after-volunteer-login.css">
</head>

<body>
        <div class="body1">
          <div class="main">
            <!--header -->
            <header>
              <div class="wrapper">
                <h1><a href="../index.php" id="logo"></a></h1>
                <nav>
                  <ul id="menu">
                    <li ><a href="../index.php">Home</a></li>
                    <li><a href="../templates/commodities.php">Commodities</a></li>
                    <li><a href="../templates/service.php">Services</a></li>
                    <li><a href="../templates/mvtable.php">Market Value</a></li>
                    <li><a href="../templates/contact.php">Contact</a></li>
                    <li><a href="../templates/about.php">About</a></li>
                    <!-- <li class="active"><a href="../templates/login-as.php">Login</a></li> -->
                  </ul>
                </nav>
              </div>
            </header>
          </div>
        </div>
        
      
    <div class="wrapper1">
      <H2 class="title">LOGIN AS</H2>
        <form action="../templates/farmer-login.php">

            <div class="form">
                <div class="inputfield">
                   
                        <input type="submit" value="Farmer Login" id="logon" class="btn2">
                </div>
              </div> 
        </form>
        <form action="../templates/volunteer-login.php">

            <div class="form">
                <div class="inputfield">
                    
                        <input type="submit" value="Volunteer Login" id="logon" class="btn2">
                </div>
            </div>
        </form>
        <form action="../templates/admin-login.php">

          <div class="form">
              <div class="inputfield">
                  
                      <input type="submit" value="Admin Login" id="logon" class="btn2">
              </div>
          </div>
          <p class="para-2">
            Does not have an account? <a href="../templates/farmer-register.html" style="color:green;">Register here</a>
        </p>
      </form>



    </div>
</body>

</html>