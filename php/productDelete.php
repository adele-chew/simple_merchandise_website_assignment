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

	//staff function to delete products from the database	

	$query = "DELETE FROM Products WHERE ProductID = '".$_POST['productSelect']."'";
	$result = $mysqli->query($query);
	if ($result) {
		$print = "<p style='color:green;'>Product deleted successfully. Page will be refreshed shortly.</p>";
		echo $print;
	}
	else {
		echo "ERROR:" . $mysqli->error;
	}
	
	mysqli_free_result($result);
  	$mysqli -> close();
?>

