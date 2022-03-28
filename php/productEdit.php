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

	//checks each variable and updates product detail values if post data is retrieved and not empty

  	if(isset($_POST['prodName']) && !(empty($_POST['prodName']))) {
		$query = "UPDATE Products 
			  SET ProdName = '".$_POST['prodName']."'
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product name set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	if(isset($_POST['prodDesc']) && !(empty($_POST['prodDesc']))) {
		$query = "UPDATE Products 
			  SET ProdDesc = '".$_POST['prodDesc']."'
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product description set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	if(isset($_POST['qty']) && !(empty($_POST['qty']))) {
		$query = "UPDATE Products 
			  SET Qty = '".$_POST['qty']."'
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product quantity set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	if(isset($_POST['price']) && !(empty($_POST['price']))) {
		$query = "UPDATE Products 
			  SET Price = '".$_POST['price']."'
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product price set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	if(isset($_POST['color']) && !(empty($_POST['color']))) {
		$query = "UPDATE Products 
			  SET Color = '".$_POST['color']."'
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product keywords set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	if(isset($_POST['fabric']) && !(empty($_POST['fabric']))) {
		$query = "UPDATE Products 
			  SET Fabric = '".$_POST['fabric']."'
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product keywords set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);


	if(isset($_POST['replaceKeyword']) && !(empty($_POST['replaceKeyword']))) {
		$query = "UPDATE Products 
			  SET Keywords = '".$_POST['replaceKeyword']."'
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product keywords set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	if(isset($_POST['addKeyword']) && !(empty($_POST['addKeyword']))) {
		$query = "UPDATE Products 
			  SET Keywords = CONCAT(Keywords, ' ".$_POST['addKeyword']."') 
			WHERE ProductID = '".$_POST['prodID']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Product keywords set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

  	$mysqli -> close();
?>

