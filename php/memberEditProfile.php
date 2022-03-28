<?php
//version 5.0 1/8 3.30AM
	$host = "localhost";
	$username = "X34050658";
	$pwd = "X34050658";
    	$dbname = "X34050658";

	$mysqli = new mysqli($host, $username, $pwd, $dbname);
	$print = "";
    	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error . "<br/>Error number: " . $mysqli->connect_errno;
	}

	//checks each variable and updates member profile if post data is retrieved
	if(isset($_POST['email']) && !(empty($_POST['email']))) {
		$query = "UPDATE Customer 
			  SET Email = '".$_POST['email']."'
			WHERE CustName = '".$_COOKIE['username']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Email set successfully.</p>";
			echo $print;
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);
	
	if(isset($_POST['contact']) && !(empty($_POST['contact']))) {
		$query = "UPDATE Customer 
			  SET Contact = '".$_POST['contact']."'
			WHERE CustName = '".$_COOKIE['username']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Contact number set successfully.</p>";
			echo $print;

		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);
	
	if(isset($_POST['addr']) && !(empty($_POST['addr']))) {
		$query = "UPDATE Customer 
			  SET Address = '".$_POST['addr']."'
			WHERE CustName = '".$_COOKIE['username']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Address set successfully.</p>";
			echo $print;

		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	$query = "SELECT Email, Contact, Address FROM Customer WHERE CustName = '".$_COOKIE['username']."'";
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
			echo "<p>Address: " . $row['Contact'] . "</p>";
		}
	}
	else {
		echo "No result found!";
	}
}
?>