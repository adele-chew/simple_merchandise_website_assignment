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
	
	//for users to reset their password

	$query = "SELECT Pwd FROM Customer WHERE CustName = '".$_COOKIE['username']."'";
	$result = $mysqli->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc())
			{
				$currPwd = $row['Pwd'];
			}	
	}
	mysqli_free_result($result);

	if($currPwd != $_POST['currPwd']) {						//if their current password field is incorrect, do not change the password;
		echo "<p style='color:red;'>Current password is incorrect</p>";
	}
	else {
		$update = "UPDATE Customer 
			  SET Pwd ='".$_POST['newPwd']."' 
			  WHERE CustName ='".$_COOKIE['username']."'";
		$response = $mysqli->query($update);
		if ($response) {
			echo "<p style='color:green;'>Password reset successfully.</p>";
		}
		else {
			echo "ERROR:" . $mysqli->error;
		}
		mysqli_free_result($response);
	}
  $mysqli -> close();
?>

