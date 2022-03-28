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

	//staff function to edit staff details. checks every variable and updates it if post data is retrieved and not empty
	
	if(isset($_POST['staffEmail']) && !(empty($_POST['staffEmail']))) {
		$query = "UPDATE Staff 
			  SET Email = '".$_POST['staffEmail']."'
			WHERE StaffName = '".$_POST['name']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Email set successfully.</p>";
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);
	
	if(isset($_POST['staffContact']) && !(empty($_POST['staffContact']))) {
		$query = "UPDATE Staff 
			  SET Contact = '".$_POST['staffContact']."'
			WHERE StaffName = '".$_POST['name']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Contact number set successfully.</p>";
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);
	
	if(isset($_POST['staffAddr']) && !(empty($_POST['staffAddr']))) {
		$query = "UPDATE Staff 
			  SET Address = '".$_POST['staffAddr']."'
			WHERE CustName = '".$_POST['name']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Address set successfully.</p>";
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	mysqli_free_result($result);

	if(isset($_POST['staffNewPwd']) && !(empty($_POST['staffNewPwd']))) {
		$query = "UPDATE Staff 
			  SET Pwd = '".$_POST['newPwd']."'
			WHERE StaffName = '".$_POST['name']."'";
		$result = $mysqli->query($query);
		if ($result) {
			$print = "<p style='color:green;'>Password reset successfully.</p>";
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
	}
	$print .= "Page will reload shortly.";
	echo $print;
	mysqli_free_result($result);


	$query = "SELECT StaffName, Email, Contact, Address FROM Staff WHERE StaffName= '".$_POST['name']."'";
	$result = $mysqli->query($query);
  	printDetails($result);
  	mysqli_free_result($result);	
	$mysqli -> close();

function printDetails($result) {
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc())
		{	
			echo "<p> Staff username: ".$row['StaffName']."</p>";
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