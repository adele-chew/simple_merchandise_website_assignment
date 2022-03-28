<!DOCTYPE html>
<!--//version 6.1 1/8 7PM-->
<!-- site users page for customers and staff. allows for staff members to add and edit customer details.
and all for staff to create and edit staff member accounts. uses SPA-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>    
<title> The Shoebox Pte Ltd </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<link rel="stylesheet" href = "products.css">--> 
<script src="js/SPAUserPage.js"></script>
<script src="js/userCustomers.js"></script>
<script src="js/userStaff.js"></script>
<script>
$(document).ready(function() {
   	 $("#custOverviewDropdown").load("php/userCustOverview.php");
	 $("#staffOverviewDropdown").load("php/userStaffOverview.php");

	$("#showCustAdd").click(function(){
  		$("#addNewCustomer").toggle();
	});

	$("#showCustEdit").click(function(){
  		$("#editCust").toggle();
	});
    
    	$("#showStaffAdd").click(function(){
  		$("#addNewStaff").toggle();
	});

	$("#showStaffEdit").click(function(){
  		$("#editStaff").toggle();
	});
<?php
	if(isset($_COOKIE["username"]) && $_COOKIE["loggedin"] == true){
	$memberFunctions = "<a href='about.php#about'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='about.php#help'>Help</a> |\
 		 	<a href='profile.php'>Member Profile</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$memberFunctions."\");";   
	echo "

";	
	echo "$('#usersOverview').html('<p>Unauthorized access.</p>');"; 
 	
	}

	if(isset($_COOKIE["staffname"]) && $_COOKIE["stafflogged"] == true){
	$staffFunctions = "<a href='about.php#about'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='about.php#help'>Help</a> |\
 		 	<a href='users.php'>Edit Site Users</a> |\
			<a href='products.php'>Manage Products</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$staffFunctions."\");";    	
	}

	if(!(isset($_COOKIE["username"])) && !(isset($_COOKIE["loggedin"])) && !(isset($_COOKIE["staffname"])) && !(isset($_COOKIE["stafflogged"]))){
		echo "$('#usersOverview').html('<p>Unauthorized access.</p>');"; 
	}

?>	
});
</script>
</head>
<body >
	<nav>
    		<a href="about.php#about">About Us</a> |
  		<a href='shopping.php'>The Shoebox Catalogue</a> |
  		<a href='shopping.php#cart'>Your Shopping Cart</a> |
  		<a href="about.php#help">Help</a> |
  		<a href="login.php">Members Login/Sign Up</a> |
 	 	<a href="login.php#staff">Staff Login</a> |
  	</nav>
    	<div id="usersOverview">
    	<h2> ShoeBox Pte Ltd </h2>
    	<h3> Edit Site Users </h3>

    	<button id='customerView'><a href="cust" class="userPages" style='text-decoration:none; color:black;'>Customer Overview</a></button>
    	<button id='staffView'><a href="staff" class="userPages" style='text-decoration:none;color:black;'`>Staff Overview</a></button>
	<br />
    	<br />
	<article id="customers" style='border:1px solid;padding:10px;'>
    		<h4> The Shoebox Customers </h4>
		<button id='showCustAdd'>Create New Customer </button>
   	 	<button id='showCustEdit'>Edit Customer Details</button>
   	 	<br />
		<br />
    		<div id = "addNewCustomer" style='display:none;border:1px solid;padding:10px;'>
    			<label> Customer Username: </label> <br />
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
	 		<div id="registration-response"></div>
    		</div> 
    		<div id = 'editCust' style='display:none;border:1px solid;padding:10px;'> 
			<strong> Edit Customer Details</strong>
			<br />
    			<div id="custOverviewDropdown"></div>
			<br />
    			<button id='selectCustBtn' onclick='selectCustomerDetails()'>Edit Customer Details</button>
     			<br />
     			<div id="custEditDetails"></div> 
     			<div id="custEditResponse"></div>
		</div>
    	</article>

	<article id="staff" style='border:1px solid;padding:10px;' hidden='hidden'>
		<h4> The Shoebox Staff Members </h4>
		<button id='showStaffAdd'>Create New Staff </button>
   	 	<button id='showStaffEdit'>Edit Staff Details</button>
   	 	<br />
		<br />
    		<div id = "addNewStaff" style='display:none;border:1px solid;padding:10px;'>
    			<label> Staff Username: </label> <br />
        		<input type = "text" class = "regStaffForm" name = "regStaffUsername" id = "regStaffUsername" placeholder = "Username">
        		<br />
        		<br />
       			<label> Password: </label><br />
        		<input type = "password" class = "regStaffForm" name = "regStaffPwd" id = "regStaffPwd" placeholder = "Password">
        		<br />
        		<br />
        		<label> Confirm Password: </label><br />
        		<input type = "password" class = "regStaffForm" name = "regStaffConfirm" id = "regStaffConfirm" placeholder = "Retype password">
        		<br />
        		<br />
        		<label> Address </label> <br />
        		<input type = "text" class = "regStaffForm" name = "regStaffAddr" id = "regStaffAddr" placeholder = "Address Line" style = "width:30%;">
    			<br />
        		<br />
        		<label> Contact </label> <br />
        		<input type = "text" class = "regStaffForm" name = "regStaffContact" id = "regStaffContact" placeholder = "Mobile number">
        		<br />
        		<br />
        		<label> Email </label> <br />
        		<input type = "text" class = "regStaffForm" name = "regStaffEmail" id = "regStaffEmail" placeholder = "Email address">
        		<br />
        		<br />
        		<button id="registerStaffBtn" onclick="validateStaffReg();">Register Now</button>
			<div id="staffRegResponse"></div>
    		</div> 
    		<div id = 'editStaff' style='display:none;border:1px solid;padding:10px;'> 
			<strong> Edit Staff Details</strong>
			<br />
    			<div id="staffOverviewDropdown"></div>
			<br />
    			<button id='selectStaffBtn' onclick='selectStaffDetails()'>Edit Staff</button>
     			<br />
     			<div id="staffEditDetails"></div> 
     			<div id="staffEditResponse"></div>
		</div>
	</article>
    </div>
</body>
</html>


