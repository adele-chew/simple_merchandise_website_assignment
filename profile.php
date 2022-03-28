<!DOCTYPE html>
<!--//version 5.0 1/8 3.30AM-->
<!--member profile page for the user to edit their details and reset password.
uses cookies to determine if the user is logged in. only member login cookie is checked, as this is the member-only site.-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>    
<title> The Shoebox Pte Ltd </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/profile.js"></script>
<script>
$(document).ready(function() {
	$("#details").load("php/memberProfileOverview.php");

	$("#editBtn").click(function(){
  		$("#editDetails").toggle();
	});

	$("#PwdReset").click(function(){
  		$("#resetDetails").toggle();
	});

<?php
	if((isset($_COOKIE["username"])) && ($_COOKIE["loggedin"] == true)){
	$memberFunctions = "<a href='about.php'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='about.php#help'>Help</a> |\
 		 	<a href='profile.php'>Member Profile</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$memberFunctions."\");";    	
	}

	if(isset($_COOKIE["staffname"]) && $_COOKIE["stafflogged"] == true){
	$staffFunctions = "<a href='about.php#about' class='infoPages'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='about.php#help' class='infoPages'>Help</a> |\
 		 	<a href='users.php'>Edit Site Users</a> |\
			<a href='products.php'>Manage Products</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$staffFunctions."\");";  
	echo "

";
	echo "$('#member-details').html('<p>Dear ShoeBox Staff, to edit member details, please go to <a href=\'\'> Customer Overview </a></p>');";  	
	}

	if(!(isset($_COOKIE["username"])) && !(isset($_COOKIE["loggedin"])) && !(isset($_COOKIE["staffname"])) && !(isset($_COOKIE["stafflogged"]))){
		echo "$('#member-details').html('<p> Please log in to view your member details. </p>');";    	
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
  <a href="login.php">Members Login/Sign Up</a> |
  <a href="login.php#staff">Staff Login</a> 
</nav>
    <div id="member-details">
    <h2> <?php echo $_COOKIE["username"]; ?>'s Profile </h2>
	<h3> Edit details </h3>
	<div id="details"> </div> 
	<button id='editBtn' name = 'editBtn' onsubmit='editDetails();'> Edit Details </button>
	<div id="editDetails" style="display:none;border: 1px solid;padding:10px;margin:10px;"> 
	<label> Change email </label>
	<input type="text" class = "editForm" name = "email" id="email" placeholder = "New Email">
	<br />
	<br />
	<label> Change contact </label>
	<input type="text" class = "editForm" name = "contact" id="contact" placeholder = "New Contact">
	<br />
	<br />
	<label> Change address </label>
	<input type="text" class = "editForm" name = "addr" id="addr" placeholder = "New Address" style="width:35%;">
	<br />
	<br />
	<button id='saveBtn' name = 'saveBtn' onclick='editDetails();'>Save Changes</button>
	</div> 
	<br />
	<br />
	<button id='PwdReset' name = 'PwdReset'> Reset Password </button>
	<div id="resetDetails" style="display:none;border: 1px solid;padding:10px;margin:10px;"> 
	<label> Current password </label>
	<input type="password" class = "resetForm" name = "currPwd" id="currPwd" placeholder = "Current Password">
	<br />
	<br />
	<label> Enter new password </label>
	<input type="password" class = "resetForm" name = "newPwd" id="newPwd" placeholder = "New Password">
	<br />
	<br />
	<label> Confirm your new password </label>
	<input type="password" class = "resetForm" name = "confirmNew" id="confirmNew" placeholder = "Retype New Password">
	<br />
	<br />
	<button id='saveBtn' name = 'saveBtn' onclick='PwdReset();'>Save Changes</button>
	<br />
	<div id="resetConfirmation"></div>
	</div> 
   </div>
</body>
</html>

	

