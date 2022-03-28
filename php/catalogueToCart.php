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
 
	//prints cart confirmation on catalogue page and allows cart to retrieve order
	$add = $_POST['qty'];  
	$code = array();
	$qty = array();

	$keys = array_keys($add);
	for($i = 0; $i < count($add); $i++) {
    		foreach($add [$keys[$i]] as $key => $value) {
			$code[] = $key;
			$qty[] = $value;
    		}
	}

	$query = "SELECT ProductID, ProdName from Products WHERE ProductID = '".$code[0]."'";
	
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

function printTable($result, $qty) {
	$counter = 0;
	if ($result->num_rows > 0) {
   		echo "<p style='color:green;'>The following items were added to cart. </p>";
		while ($row = $result->fetch_assoc())
		{
			
			echo "Product Name: ". $row['ProdName']; 
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "Quantity: ".$qty[$counter]; 
			echo "<br />";
			echo "<input type = 'hidden' min='0' class = 'cartQty' name = 'cartQty[0][".$row['ProductID']."]' value = '".$qty[$counter]."'/>";
			$counter++; 
		}
	}
	else {
		echo "No result found!";
	}
}
?>