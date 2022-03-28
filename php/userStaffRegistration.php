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
 
	//staff function to create new staff accounts.

    $query = "SELECT StaffName FROM Staff WHERE StaffName ='".$_POST['regStaffUsername']."'"; 
    $result = $mysqli->query($query);
  	
    if($result->num_rows>0) {
    	echo "<p style='color:red;'> Staff username is already taken. </p>";
    }
    else {
    	$insert = "INSERT INTO Staff (StaffName, Address, Contact, Email, Pwd)
        	VALUES('".$_POST['regStaffUsername']."', '".$_POST['regStaffAddr']."', '".$_POST['regStaffContact']."', '".$_POST['regStaffEmail']."', '".$_POST['regStaffPwd']."')";
        $response = $mysqli->query($insert);

	if ($response) {
		echo "<p style='color:green;'>Staff account creation successful!</p>";
		echo "<p> Page will reload shortly. </p>";
	}
	else {
		echo "ERROR:" . $mysqli->error;
	}		
    }
  mysqli_free_result($result);
  $mysqli -> close();
?>
