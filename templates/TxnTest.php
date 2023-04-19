<?php

	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	session_start();
	// if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin' && isset($_SESSION['farmer_id']))
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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/make-payment.css">
  <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
  <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
  <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
  <script type="text/javascript" src="../javascript/tms_presets.js"></script>
  <script type="text/javascript" src="../javascript/script.js"></script>
  <title>F2G Payment</title>
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
              <li class="active"><a href="../index.php">Home</a></li>
              <li><a href="../templates/commodities.php">Commodities</a></li>
              <li><a href="../templates/service.php">Services</a></li>
              <li><a href="../templates/mvtable.php">Market Value</a></li>
              <li><a href="../templates/contact.php">Contact</a></li>
              <li><a href="../templates/about.php">About</a></li>
              <li><a href="../templates/login-as.php">Login</a></li>
              
            </ul>
          </nav>
        </div>
      </header>
    </div>
  </div>
  <script src="../javascript/make-payment.js"></script>

  <div class="container">
    <form method="post" action="pgRedirect.php">

      <div class="row">

        <div class="col">

          <h3 class="title">billing address</h3>

          <div class="inputBox">
            <span>full name :</span>
            <input type="text" placeholder="john deo" />
          </div>
          <div class="inputBox">
            <span>email :</span>
            <input type="email" placeholder="example@example.com" />
          </div>
          <div class="inputBox">
            <span>ORDER_ID:</span>
            <input id="ORDER_ID" type="text" name="ORDER_ID" placeholder="879465" value="" />
          </div>
          <div class="inputBox">
            <span>CUSTID :</span>
            <input type="text" id="CUST_ID" name="CUST_ID" placeholder="mumbai" />
          </div>

          <div class="flex">
            <div class="inputBox">
              <span>INDUSTRY_TYPE :</span>
              <input type="text" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail" />
            </div>
            <div class="inputBox">
              <span>Channel :</span>
              <input type="text" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB" />
            </div>
          </div>

        </div>

        <div class="col">
          <h3 class="title">payment</h3>

          <div class="inputBox">
            <span>cards accepted :</span>
            <img src="../images/card_img.png" alt="">
          </div>
          <div class="inputBox">
            <span>name on card :</span>
            <input type="text" placeholder="mr. john deo" />
          </div>
          <div class="inputBox">
            <span>credit card number :</span>
            <input type="number" placeholder="1111-2222-3333-4444" />
          </div>
          <div class="inputBox">
            <span>Total Amount :</span>
            <input type="text" title="TXN_AMOUNT" name="TXN_AMOUNT"/>
          </div>

          <!-- <div class="flex">
            <div class="inputBox">
              <span>exp year :</span>
              <input type="number" placeholder="2022"/>
            </div>
            <div class="inputBox">
              <span>CVV :</span>
              <input type="text" placeholder="1234"/>
            </div>
          </div> -->

        </div>

      </div>
	  <input value="procced to check out" type="submit"	id ="logon" class="submit-btn" onclick="">
      <!-- <input type="submit" value="procced to check out" id ="logon" class="submit-btn" onClick="myFunction()"/> -->
    </form>

  </div>

</body>

</html>
<!-- <html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
	</form>
</body>
</html> -->