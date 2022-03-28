<?php
//version 5.0 1/8 3.30AM
	$host = "localhost";
	$username = "X34050658";
	$pwd = "X34050658";
    	$dbname = "X34050658";

	$mysqli = new mysqli($host, $username, $pwd, $dbname);
    	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error . "<br/>Error number: " . $mysqli->connect_errno;
	}

	echo "<p style='color:green;'>Order successful.</p>";
		
	/* //order confirmation codes fully developed by not working. errors encountered that could not be debugged.
	$add = $_POST["cartOrder"];  
	$code = array();
	$qty = array();
	$stockQty = 0;
	$name = "";
	$flagCounter = 0; 
	var_dump($add);

	$keys = array_keys($add);
	for($i = 0; $i < count($add); $i++) {
    		foreach($add [$keys[$i]] as $key => $value) {
			$code[] = $key;
			$qty[] = $value;
    		}
	}

	$total = $_POST["confirmTotalPrice"];
	
	for($i = 0; $i < count($code); $i++) {
		$query = "SELECT * FROM Products WHERE ProductID='".$code[$i]."';";
		echo $query;
		 $result = $mysqli->query($query);
		 if($result->num_rows>0) {
			while ($row = $result->fetch_assoc())
			{
				$name = $row['ProdName'];
				$stockQty = $row['Qty'];
			}
		 }
		 mysqli_free_result($result);

		if($stockQty == 0) {
			$flagCounter = 1;
			break;
		}
	}
	
	$desc = "ID: ".$code[0]." Qty: ".$qty[0]." ";
	for($i = 1; $i<count($code); $i++) {
		$desc .= "ID: ".$code[$i]." Qty: ".$qty[$i]." ";
	}

	if ($flagCounter > 0) {
		exit("Order cancelled. Not enough stock for " . $name); 
	}
	else {
		//$query = checkUserQuery(); 
		//$query .= $total.", '".$desc."')";
		
		echo $query;
		$result = $mysqli->query($query);
		if ($result) {
			updateProductsTable($code, $qty);
			echo "Order processed.";
		}
		else {
			echo $mysqli->error; 
		}
	}
  	mysqli_free_result($result);
  	$mysqli -> close();*/

function checkUserQuery() {
	$query = "";
	if (isset($_COOKIE['stafflogged']) && !(empty($_COOKIE['stafflogged']))) {
		return "INSERT INTO ORDERS (StaffName, TotalPrice, OrderDesc)
				VALUES ('".$_COOKIE['staffname']."', "; 
	}

	else if (isset($_COOKIE['loggedin']) && !(empty($_COOKIE['loggedin']))) {
		return "INSERT INTO ORDERS (CustName, TotalPrice, OrderDesc)
				VALUES ('".$_COOKIE['username']."', ";
	}

}

function updateProductsTable($code, $qty) {
	for ($i = 0; $i<count($code); $i++) {
		$query = "UPDATE Products
			  SET Qty -= ".$qty[i]."
			  WHERE ProductID = '".$code[$i]."'";
		$result = $mysqli->query($query);
		if(!($result)) {
			echo $mysqli->error;
			break;
		}			
	}
}
?>
