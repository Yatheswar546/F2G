<?php  

  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/index.css" type="text/css" media="all">
  <script type="text/javascript" src="../javascript/jquery-1.6.js"></script>
  <script type="text/javascript" src="../javascript/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../javascript/tms-0.3.js"></script>
  <script type="text/javascript" src="../javascript/tms_presets.js"></script>
  <script type="text/javascript" src="../javascript/script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
              <li class="active"><a href="../templates/commodities.php">Commodities</a></li>
              <li><a href="../templates/service.php">Services</a></li>
              <li><a href="../templates/mvtable.php">Market Value</a></li>
              <li><a href="../templates/contact.php">Contact</a></li>
              <li><a href="../templates/about.php">About</a></li>
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
        </div><br><br><br>
        <FORM NAME="orderForm">
          <TABLE BORDER=1>
            <COLGROUP WIDTH=300>
              <COLGROUP WIDTH=300>
                <COLGROUP WIDTH=300>
                  <COLGROUP WIDTH=150>
                    <COLGROUP WIDTH=300>
                      <COLGROUP WIDTH=180>
                        <COLGROUP WIDTH=200>
                          <COLGROUP WIDTH=180>
                            <div class="container" style="position: relative;margin-right: 2px; width: 100%;">
                              <table class="table table-bordered">
                                <thead style="border: 2px; color: black;">
                                  <tr style="color: black;">
                                    <th style="background-color: rgb(3, 136, 3); border: 2px;border-color: black;">
                                      Vegetables
                                    </th>
                                    <th style="background-color: rgb(3, 136, 3); border: 2px;border-color: black;">
                                      Fruits</th>
                                    <th style="background-color: rgb(3, 136, 3); border: 2px;border-color: black;">
                                      Grains</th>
                                    <th style="background-color: rgb(3, 136, 3); border: 2px;border-color: black;">
                                      Oilseeds
                                    </th>
                                    <th style="background-color: rgb(3, 136, 3); border: 2px;border-color: black;">
                                      Spices</th>
                                    <th style="background-color: rgb(3, 136, 3); border: 2px;border-color: black;">MISC
                                    </th>
                                  </tr>
                                </thead>
                                <tbody style="border: 2px;border-color: black;">
                                  <tr>
                                    <td style=" border: 2px;border-color: black;">1.Peas</td>
                                    <td style=" border: 2px;border-color: black;">1.Mango</td>
                                    <td style=" border: 2px;border-color: black;">1.Millets</td>
                                    <td>1.Castor seed</td>
                                    <td>1.Ajwain</td>
                                    <td>1.Anthurium</td>
                                  </tr>
                                  <tr>
                                    <td>2.Spinach</td>
                                    <td>2.Apple</td>
                                    <td>2.Bajra</td>
                                    <td>2.Cotton Seed</td>
                                    <td>2.Black Pepper Whole</td>
                                    <td>2.Betel nut</td>
                                  </tr>
                                  <tr>
                                    <td>3.Brinjal</td>
                                    <td>3.Orange</td>
                                    <td>3.Sabudana</td>
                                    <td>3.Kusum seed</td>
                                    <td>3.Cardamoms Whole</td>
                                    <td>3.Bamboo</td>

                                  </tr>
                                  <tr>
                                    <td>4.Tomato</td>
                                    <td>4.Pear</td>
                                    <td>4.Barley</td>
                                    <td>4.Linseed</td>
                                    <td>4.Cloves Whole</td>
                                    <td>4.Banana Stem</td>
                                  </tr>
                                  <tr>
                                    <td>5.Potato</td>
                                    <td>5.Watermelon</td>
                                    <td>5.Jowar</td>
                                    <td>5.Mustard seed</td>
                                    <td>5.Coriander whole</td>
                                    <td>5.Betel leaves</td>
                                  </tr>
                                  <tr>
                                    <td>6.Bottle Guard</td>
                                    <td>6.Musk melon</td>
                                    <td>6.Dhalia</td>
                                    <td>6.Neem Seeds</td>
                                    <td>6.Cumin</td>
                                    <td>6.Carnation</td>
                                  </tr>
                                  <tr>
                                    <td>7.Bitter Guard</td>
                                    <td>7.Pineapple</td>
                                    <td>7.Maize</td>
                                    <td>7.Nigar Seed</td>
                                    <td>7.Dried Raw Mango Slices</td>
                                    <td>7.Chhappan Kaddu</td>
                                  </tr>
                                  <tr>
                                    <td>8.Beans</td>
                                    <td>8.Apricot</td>
                                    <td>8.Atta</td>
                                    <td>8.Peanut kernel.</td>
                                    <td>8.Dry Ginger</td>
                                    <td>8.Chironji</td>
                                  </tr>
                                  <tr>
                                    <td>9.Pumpkin</td>
                                    <td>9.Avocado</td>
                                    <td>9.Basmati rice</td>
                                    <td>9.Pongam seeds</td>
                                    <td>9.Fennel seed</td>
                                    <td>9.Chrysanthemum</td>
                                  </tr>
                                  <tr>
                                    <td>10.Cabbage</td>
                                    <td>10.Ber</td>
                                    <td>10.Chakhao</td>
                                    <td>10.Rapeseed</td>
                                    <td>10.Fenugreek seed</td>
                                    <td>10.Coconut</td>
                                  </tr>
                                  <tr>
                                    <td>11.Capsicum</td>
                                    <td>11.Custard apple</td>
                                    <td>11.Chana Dal Split</td>
                                    <td>11.Sal Seed</td>
                                    <td>11.Large cardamom</td>
                                    <td>11.Coconut with Husk</td>
                                  </tr>
                                  <tr>
                                    <td>12.Cauliflower</td>
                                    <td>12.Garcinia</td>
                                    <td>12.Chana whole.</td>
                                    <td>12.Sesame seed</td>
                                    <td>12.Mace Whole</td>
                                    <td>12.Cotton</td>
                                  </tr>
                                  <tr>
                                    <td>13.Cluster beansr</td>
                                    <td>13.Guava</td>
                                    <td>13.Jowar</td>
                                    <td>13.Sunflower seed</td>
                                    <td>13.Mace Whole</td>
                                    <td>13.Cotton</td>
                                  </tr>
                                  <tr>
                                    <td>13.Cluster beansr</td>
                                    <td>13.Guava</td>
                                    <td>13.Jowar</td>
                                    <td>13.Sunflower seed</td>
                                    <td>13.Mace Whole</td>
                                    <td>13.Cotton</td>
                                  </tr>
                                  <tr>
                                    <td>13.Cluster beansr</td>
                                    <td>13.Guava</td>
                                    <td>13.Jowar</td>
                                    <td>13.Sunflower seed</td>
                                    <td>13.Mace Whole</td>
                                    <td>13.Cotton</td>
                                  </tr>
                                  <tr>
                                    <td>13.Cluster beansr</td>
                                    <td>13.Guava</td>
                                    <td>13.Jowar</td>
                                    <td>13.Sunflower seed</td>
                                    <td>13.Mace Whole</td>
                                    <td>13.Cotton</td>
                                  </tr>
                                  <tr>
                                    <td>13.Cluster beansr</td>
                                    <td>13.Guava</td>
                                    <td>13.Jowar</td>
                                    <td>13.Sunflower seed</td>
                                    <td>13.Mace Whole</td>
                                    <td>13.Cotton</td>
                                  </tr>
                                  <tr>
                                    <td>13.Cluster beansr</td>
                                    <td>13.Guava</td>
                                    <td>13.Jowar</td>
                                    <td>13.Sunflower seed</td>
                                    <td>13.Mace Whole</td>
                                    <td>13.Cotton</td>
                                  </tr>
                                  <tr>
                                    <td>13.Cluster beansr</td>
                                    <td>13.Guava</td>
                                    <td>13.Jowar</td>
                                    <td>13.Sunflower seed</td>
                                    <td>13.Mace Whole</td>
                                    <td>13.Cotton</td>
                                  </tr>
                                </tbody>
                              </table>
          </table>
    </div>
</body>

</html>