<!DOCTYPE html>
<!--//version 5.0 1/8 3.30AM-->
<!-- SPA containing member login, member registration and staff login pages. 
Cookies are uesd to determine if staff or member has already logged in. 
Form input used for each page to send POST data to server-side and authorize login or create new member account.-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>    
<title> The Shoebox Pte Ltd </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/login.js"></script>
<script src="js/SPALogin.js"></script>
<script>
$(document).ready(function() {
	$("#login-response").load("php/userlogin.php");
	$("#staff-response").load("php/stafflogin.php");
<?php
	if(isset($_COOKIE["username"]) && $_COOKIE["loggedin"] == true){
	$memberFunctions = "<a href='about.php'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='about.php#help'>Help</a> |\
 		 	<a href='profile.php'>Member Profile</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$memberFunctions."\");";    	
	}

	if(isset($_COOKIE["staffname"]) && $_COOKIE["stafflogged"] == true){
	$staffFunctions = "<a href='about.php'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='about.php#help'>Help</a> |\
 		 	<a href='users.php'>Edit Site Users</a> |\
			<a href='products.php'>Manage Products</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$staffFunctions."\");";    	
	}

?>
});
</script>
</head>
  <body>
<nav>
      <a href="about.php">About Us</a> |
  <a href='shopping.php'>The Shoebox Catalogue</a> |
  <a href='shopping.php#cart'>Your Shopping Cart</a> |
  <a href="help.php">Help</a> |
  <a href="user" class="loginPages">Members Login/Sign Up</a> |
  <a href="staff" class="loginPages">Staff Login</a> 
</nav>
<article id = "user">
    <h3> Welcome back! </h3>
	<p> Not a member? Sign up <a href = "register" class="loginPages">here!</a></p>

    <div id="user-authorized"></div>    

    <div id = "loginForm">
    	<h4> Enter login details </h4>
        <label> Username: </label> <br />
        <input type = "text" class = "loginForm" name = "loginUsername" id = "loginUsername" placeholder = "Username">
        <br />
        <br />
        <label> Password: </label><br />
        <input type = "password" class = "loginForm" name = "loginPwd" id = "loginPwd" placeholder = "Password">
	<br />
        <br />
        <button id="loginBtn" onclick="validateLogIn();">Login</button>
    </div>
    <div id = "login-response"> </div>
</article>

<article id = "register" hidden="hidden">
<h3> Register to Receive Your New Pair of Shoes Today! </h3>
    <p> Already a member? <a href = "user" class="loginPages">Log in here!</a></p>
    <div id = "registrationForm">
        <label> Username: </label> <br />
        <input type = "text" class = "regForm" name = "regUsername" id = "regUsername" placeholder = "Username">
        <br />
        <br />
        <label> Password: </label><br />
        <input type = "password" class = "regForm" name = "regPwd" id = "regPwd" placeholder = "Password">
        <br />
        <br />
        <label> Confirm Password: </label><br />
        <input type = "password" class = "regForm" name = "regConfirm" id = "regConfirm" placeholder = "Retype password">
        <br />
        <br />
        <label> Address </label> <br />
        <input type = "text" class = "regForm" name = "regAddr" id = "regAddr" placeholder = "Address Line" style = "width:30%;">
    	<br />
        <br />
        <label> Contact </label> <br />
        <input type = "text" class = "regForm" name = "regContact" id = "regContact" placeholder = "Mobile number">
        <br />
        <br />
        <label> Email </label> <br />
        <input type = "text" class = "regForm" name = "regEmail" id = "regEmail" placeholder = "Email address">
        <br />
        <br />
        <button id="registerBtn" onclick="validateReg();">Register Now</button>
    </div>
    
    <div id = "registration-response"> </div>
</article>

<article id = "staff" hidden="hidden">
<h3> Staff login page </h3>
	
    <div id="staff-authorized"></div>    
    
    <div id = "staffLoginForm">
    	<h4> Enter login details </h4>
        <label> Username: </label> <br />
        <input type = "text" class = "staffForm" name = "staffUsername" id = "staffUsername" placeholder = "Username">
        <br />
        <br />
        <label> Password: </label><br />
        <input type = "password" class = "staffForm" name = "staffPwd" id = "staffPwd" placeholder = "Password">
	<br />
        <br />
        <button id="registerBtn" onclick="validateStaff();">Login</button>
    </div>
    <div id = "staff-login"> </div>

</article>

</body>
</html>

	

