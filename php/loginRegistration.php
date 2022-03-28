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
    //new member registration page
	
    $query = "SELECT CustName FROM Customer WHERE CustName ='".$_POST['regUsername']."'"; 
    $result = $mysqli->query($query);
  	
    if($result->num_rows>0) {
    	echo "<p style='color:red;'> Username is already taken. </p>";
    }
    else {
    	$insert = "INSERT INTO Customer (CustName, Address, Contact, Email, Pwd)
        	VALUES('".$_POST['regUsername']."', '".$_POST['regAddr']."', ".$_POST['regContact'].", '".$_POST['regEmail']."', '".$_POST['regPwd']."')";
        $response = $mysqli->query($insert);

	if ($response) {
		echo "<p style='color:green;'>Registration successful! New users may now proceed to <a href='login.php'>log in here!</a></p>";
	}
	else {
		echo "ERROR:" . $mysqli->error;
	}		
    }
  mysqli_free_result($result);
  $mysqli -> close();
?>
