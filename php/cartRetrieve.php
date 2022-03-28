<?php
//version 5.0 1/8 3.30AM

  //establish server connection
  	$host = "localhost";
	$username = "X34050658";
	$pwd = "X34050658";
    	$dbname = "X34050658";

	$mysqli = new mysqli($host, $username, $pwd, $dbname);
    	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error . "<br/>Error number: " . $mysqli->connect_errno;
	}
 
  //generate cart data

	if(isset($_POST['cartQty']) && !(empty($_POST['cartQty']))) {	
		$add = $_POST['cartQty'];  
		$code = array();
		$qty = array();

		$keys = array_keys($add);
		for($i = 0; $i < count($add); $i++) {
    			foreach($add [$keys[$i]] as $key => $value) {
					$code[] = $key;
					$qty[] = $value;
    			}
		}

		$query = "SELECT ProductID, ProdName, Price from Products WHERE ProductID = '".$code[0]."'";
	
		if (count($code) > 1) {
			for($i=1; $i < count($code); $i++) {
				$query .= " OR ProductID = '".$code[$i]."'";
    			}
		}
		//for testing:
		//echo $query; 
  		$result = $mysqli->query($query);
  		printTable($result, $qty);
  		mysqli_free_result($result);
  		$mysqli -> close();
	}

	else {
		echo "<p> Nothing in your cart yet! Go <a href='shopping.php#catalogue'>shopping</a>?";
	}

function printTable($result, $qty) {
    $counter = 0;		//counter variable
    $priceQty = 0;		//price * quantity variable
    $total = 0; 		//total price from all items variable
	if ($result->num_rows > 0) {
		//print table
   		echo "<p> The following items are currently in your cart. </p>";
		echo "<p> If you move out of this page or add a different set of items to your cart, your cart will reset. </p>";
		echo "<table>";
		echo "<tr>";
		echo "<th> Product Name  </th>";
		echo "<th> Quantity </th>";
		echo "<th> Price </th>";
       		 echo "<th> Total </th>";
		echo "</tr>";
		while ($row = $result->fetch_assoc())
		{
        		$priceQty = $qty[$counter] * $row['Price'];
			$total += $priceQty;
			echo "<tr>";
			echo "<td>" . $row['ProdName'] . "</td>";
			echo "<td style='text-align:center;'>". $qty[$counter] ."</td>";
			echo "<td>" . $row['Price'] . "</td>";
			echo "<td>" . $priceQty . "</td>";
			echo "</tr>";
			echo "<input type='hidden' class ='cartOrder' name='cartOrder[0][".$row['ProductID']."]' value = '".$qty[$counter]."'>";
			$counter++;
		}
		echo "<tr>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td name='confirmTotalPrice' id = 'confirmTotalPrice'>".$total."</td>";
        echo "</tr>";
	echo "</table>";
	}
	else {
		echo "No result found!";
	}
}
?>

