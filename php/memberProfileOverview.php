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

	//displays member detail information
	$query = "SELECT CustName, Email, Contact, Address FROM Customer WHERE CustName = '".$_COOKIE['username']."'";
	$result = $mysqli->query($query);
  	printDetails($result);
  	mysqli_free_result($result);	
	$mysqli -> close();

function printDetails($result) {
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc())
		{
			echo "<p>Email address: " . $row['Email'] . "</p>";
			echo "<p>Contact number: " . $row['Contact'] . "</p>";
			echo "<p>Address: " . $row['Address'] . "</p>";
		}
	}
	else {
		echo "No result found!";
	}
}

?>


