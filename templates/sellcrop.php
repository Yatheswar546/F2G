<?php

	session_start();
	if(isset($_SESSION['farmer']) && $_SESSION['farmer'] == 'farmer' && isset($_SESSION['farmer_id'])){
	// Database Connection
	$f = $_SESSION['farmer_id'];
    require_once('../config.php');
    
    // Check Connection
    if(!$db){
        die("Connection Failed".mysqli_connect_error());
    }
    else{
        // echo "Connection Successful";
    }

	$id = "";
	$pro_id = "";
	$farmerid = "";
	$productid = "";
	$productname = "";
	$subdistrict = "";
	$price = "";
	$quantity = "";
	$total_amount = "";

	if($_SERVER['REQUEST_METHOD'] == 'GET'){
        // GET Method : Show the Data
        if(!isset($_GET["id"])){
            header("location: index.php");
            exit;
        }
        $id = $_GET["id"];
        // Read the Data
        $result = mysqli_query($db,"SELECT * FROM `marketvalue` WHERE id=$id");
        $row = mysqli_fetch_assoc($result);

		$pro_id = $row['pro_id'];
		if(!$row){
            header("Location: index.php");
            exit;
        }
        $productname = $row['pro_name'];
        $productid = $row['pro_id'];
        $price = $row['price'];

	}
	else{
        // POST Method : Update the data
		$farmerid = $_POST['farmerid'];
		$productid = $_POST['productid'];
		$productname = $_POST['productname'];
		$subdistrict = $_POST['subdistrict'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$total_amount = $_POST['total'];

		do{
			if(empty($farmerid) || empty($productid) || empty($productname) || empty($subdistrict) || empty($price) || empty($quantity) || empty($total_amount)){
				echo "All fields are required";
			}
			else{
				$sql = mysqli_query($db,"INSERT INTO `sell_crops`(`farmer_id`, `product_id`, `product_name`, `subdistrict`, `price`, `quantity`, `total_amount`) VALUES ('$farmerid','$productid','$productname','$subdistrict','$price','$quantity', '$total_amount')");

				if(!$sql){
                    // $errormsg = "Invalid Query...".mysqli_connect_error();
					echo "Invalid Query";
					break;
                }
                else{
                    header("Location: ./crophistory.php");
                    exit;
                }
			}
		}while(false);
	}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Crop History</title>
	<style>
		/* Add some styles to center the button */
		.button-container {
			text-align: center;
			margin-top: 40px;
		}

		/* Add some styles to make the form look better */
		form {
			margin: auto;
			width: 50%;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 5px 5px 5px #ccc;
		}

		label {
			display: block;
			margin-bottom: 10px;
		}

		input[type="text"],
		select {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			margin-bottom: 10px;
			font-size: 16px;
		}

		/* Add some styles to center the request button */
		.request-button {
			display: block;
			margin: auto;
			margin-top: 20px;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			background-color: #4CAF50;
			color: white;
			font-size: 16px;
			cursor: pointer;
		}

		.request-button:hover {
			background-color: #3E8E41;
		}



		.button-container {
			text-align: center;
			margin-top: 20px;
		}

		.button-container button {
			padding: 10px 20px;
			font-size: 20px;
			border: none;
			border-radius: 5px;
			background-color: #4CAF50;
			color: white;
			cursor: pointer;
			box-shadow: 2px 2px 5px #ccc;
		}

		.button-container button:hover {
			background-color: #3E8E41;
		}

		form {
			margin-top: 20px;
			/* Existing styles */
			margin: auto;
			width: 50%;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 5px 5px 5px #ccc;
		}
	</style>
</head>

<body>
	<div class="button-container">
		<button>
			<a href="../templates/crop history.php" style="color: aliceblue;text-decoration:none"> Sell Crop</a> 
		</button> 
	</div><br><br>

	<form action="#" method="post">
		<label for="farmerid">Farmer ID</label>
		<input type="text" id="farmerid" name="farmerid" placeholder="Enter farmer ID" readonly value="<?php echo $f; ?>">

		<label for="productid">Product ID</label>
		<input type="text" id="productid" name="productid" placeholder="Enter product ID" readonly value="<?php echo $productid; ?>" >

		<label for="productname">Product Name</label>
		<input type="text" id="productname" name="productname" placeholder="Enter product name" readonly value="<?php echo $productname; ?>">

		<label for="subdistrict">Subdistrict</label>
		<select id="subdistrict" name="subdistrict" required>
			<option value="">Select subdistrict</option>
			<option value="subdistrict1">Subdistrict 1</option>
			<option value="subdistrict2">Subdistrict 2</option>
			<option value="subdistrict3">Subdistrict 3</option>
		</select>
		<label for="price">Price Per Kg</label>
		<input type="text" id="price" name="price" placeholder="Price Per Kg" readonly value="<?php echo $price; ?>">


		<label for="quantity">Quantity</label>
		<input type="text" id="quantity" name="quantity" placeholder="Enter quantity" required>

		<label for="total">Total Amount</label>
		<input type="text" id="total" name="total" placeholder="Total amount" required>

		<!-- <button type="submit" class="request-button" id="sell-crop-btn" disabled>Request to Sell Crop</button> -->
		<input type="submit" name="submit" class="request-button"  value="Request to Sell Crop">

	</form>
	<script>
		// Calculate total amount based on quantity and display it in the total input field
		// document.getElementById("quantity").addEventListener("input", function () {
		// 	var quantity = parseFloat(document.getElementById("quantity").value);
		// 	var pricePerUnit = 10; // Example price per unit
		// 	var total = quantity * pricePerUnit;
		// 	document.getElementById("total").value = total.toFixed(2);
		// });

		// Enable the "Request to Sell Crop" button only when all the required fields are filled
		// const sellCropBtn = document.getElementById('sell-crop-btn');
		// const requiredFields = document.querySelectorAll('input[required], select[required]');

		// requiredFields.forEach(field => {
		// 	field.addEventListener('input', () => {
		// 		const allFieldsFilled = Array.from(requiredFields).every(field => field.value !== '');
		// 		sellCropBtn.disabled = !allFieldsFilled;
		// 	});
		// });

		// sellCropBtn.addEventListener('click', () => {
			// Make the request to sell the crop here

			// Show the success message
		// 	alert('Request to sell crop was successful. Thank you!');
		// });
	</script>
</body>

</html>

<?php
	}
	else{
		header("Location: ../index.php");
	}
?>
