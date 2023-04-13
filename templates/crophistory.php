<?php

    session_start();

    if(isset($_SESSION['farmer']) && $_SESSION['farmer'] == 'farmer'){
       $id = $_SESSION['farmer_id'];

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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CROP HISTORY</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pending {
            background-color: #fdd;
        }

        .completed {
            background-color: #dfd;
        }

        #search-input {
            margin-top: 20px;
            margin-bottom: 10px;
            width: 50%;
            padding: 5px;
            border: 1px solid #181717;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
   <center><h2 style="color: 30px;color: green;">CROP HISTORY</h2></center> 
    
    <div>
        <input type="text" id="search-input" placeholder="Search...">
    </div>
    <table id="products-table">
        <thead>
            <tr>
                <th>Farmer ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr> 
        </thead>
        <tbody>

            <?php
                // read data from sell_crops table
                $crops = mysqli_query($db,"SELECT * FROM `quality_check` WHERE far_id='$id'");
                if(!$crops){
                    die("Something Went wrong with query".mysqli_connect_error());
                }
                else{
                    while($row = mysqli_fetch_assoc($crops)){
                        echo "
                            <tr>
                                <td>$row[far_id]</td>
                                <td>$row[pro_id]</td>
                                <td>$row[pro_name]</td>
                                <td>$row[quantity]kg</td>
                                <td>$row[price]/-</td>
                                <td class='completed'>Pending</td>
                            </tr>   
                        ";
                    }
                }

            ?>

            <!-- Add more rows here -->
        </tbody>
    </table>

    <script>
        // Get the input field and table
        var input = document.getElementById("search-input");
        var table = document.getElementById("products-table");

        // Add event listener to the input field
        input.addEventListener("keyup", function() {
            // Get the filter value
            var filter = input.value.toUpperCase();

            // Loop through all rows in the table
            for (var i = 0; i < table.rows.length; i++) {
                // Get the cells in the current row
                var cells = table.rows[i].cells;

                // Loop through all cells in the row
                for (var j = 0; j < cells.length; j++) {
                    // Check if the cell value matches the filter value
                    if (cells[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        // Show the row if there is a match
                        table.rows[i].style.display = "";
                        break;
                    } else {
                        // Hide the row if there is no match
                        table.rows[i].style.display = "none";
                    }
                }
            }
        });
    </script>
</body>
</html>

<?php
	}
	else{
		header("Location: ../index.php");
	}
?>
