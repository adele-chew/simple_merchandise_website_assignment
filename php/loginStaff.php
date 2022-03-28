<?php
//version 5.0 1/8 3.30AM
    if(isset($_COOKIE["staffname"]) && $_COOKIE["stafflogged"] == true){
	echo "<p style = 'color:green;'> Already logged in. </p>";
	echo "<p><a href='about.php'>Home</a> | <a href='shopping.php'>Catalogue</a> | <a href='users.php'>Edit Site Users</a> | <a href='products.php'>Manage Products</a> <br />";
	echo "<a href ='./logout.php'> Log out </a>";
	}
    
	$host = "localhost";
	$username = "X34050658";
	$pwd = "X34050658";
    $dbname = "X34050658";

	$mysqli = new mysqli($host, $username, $pwd, $dbname);
    	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error . "<br/>Error number: " . $mysqli->connect_errno;
	}
    
    //staff login function
if(isset($_POST['staffUsername']) && isset($_POST['staffPwd'])) {
    $query = "SELECT StaffName, Pwd FROM Staff WHERE StaffName ='".$_POST['staffUsername']."'"; 
    $result = $mysqli->query($query);
    $user = "";
    $pw = ""; 
  	
    if($result->num_rows>0) {
        while ($row = $result->fetch_assoc())
		{
        	$user = $row['StaffName'];
            $pw = $row['Pwd'];
        }
	if (!($pw == $_POST['staffPwd'])) {				//checks if password matches
   		echo "<p style='color:red;'>Incorrect password.</p>";
    	}
    	else {
    		setcookie("stafflogged", true, time() + 3600, "/"); 
		setcookie("staffname", $user, time() + 3600, "/"); 
    		echo "<p style = 'color:green;'>Log in successful, select a place to go:</p>";
        	echo "<p><a href='about.php'>Home</a> | <a href='shopping.php'>Catalogue</a> | <a href='users.php'>Edit Site Users</a> | <a href='products.php'>Manage Products</a> <br />";
    		echo "<a href ='./logout.php'> Log out </a>"; 
	}	
    }
    else {
    	echo "There is no registered staff with that username found."; 
    }
    
  mysqli_free_result($result);
  $mysqli -> close();
}
?>
