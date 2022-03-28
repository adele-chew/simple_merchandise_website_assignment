<?php
//version 5.0 1/8 3.30AM
    if(isset($_COOKIE["username"]) && $_COOKIE["loggedin"] == true){
	echo "<p style = 'color:green;'> Already logged in. </p>";
	echo "<p> <a href='about.php'>Home</a> | <a href='shopping.php'>Catalogue</a> | <a href='shopping.php#cart'>Shopping Cart</a> | <a href='profile.php'>Member Profile</a></p> <br />";
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

    //member login page
if(isset($_POST['loginUsername']) && isset($_POST['loginPwd'])) {
    $query = "SELECT CustName, Pwd FROM Customer WHERE CustName ='".$_POST['loginUsername']."'"; 
    $result = $mysqli->query($query);
    $user = "";
    $pw = ""; 
  	
    if($result->num_rows>0) {
        while ($row = $result->fetch_assoc())
		{
        	$user = $row['CustName'];
            $pw = $row['Pwd'];
        }
	if (!($pw == $_POST['loginPwd'])) {						//checks for matching pwd
   		echo "<p style='color:red;'>Incorrect password.</p>";
    	}
    else {
    	setcookie("loggedin", true, time() + 3600, "/"); 
	setcookie("username", $user, time() + 3600, "/"); 
    	echo "<p style = 'color:green;'>Log in successful, where would you like to go?</p>";
        echo "<p> <a href='about.php'>Home</a> | <a href='shopping.php'>Catalogue</a> | <a href='shopping.php#cart'>Shopping Cart</a> | <a href='profile.php'>Member Profile</a></p> <br />";
    	echo "<a href ='./logout.php'> Log out </a>"; 
	}	
    }
    else if ($result->num_rows==0){
    	echo "<p style='color:red;'>There is no registered user with that username found.</p>"; 
    }
    
  mysqli_free_result($result);
  $mysqli -> close();
}
?>
