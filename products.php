<!DOCTYPE html>
<!--//version 5.0 1/8 3.30AM-->
<!-- catalogue page. retrieves information dynamically through AJAX according to user's search and prints it out accordingly. 
Uses cookies to determine if user is logged in to alter the nav system.-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>    
<title> The Shoebox Pte Ltd </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<link rel="stylesheet" href = "products.css">--> 
<script src="js/products.js"></script>
<script>
$(document).ready(function() {
	$("#selectProd").load("php/productOverview.php");

	$("#showAdd").click(function(){
  		$("#addNewProduct").toggle();
	});

	$("#showEdit").click(function(){
  		$("#editDetails").toggle();
	});

<?php
	if(isset($_COOKIE["username"]) && $_COOKIE["loggedin"] == true){
	$memberFunctions = "<a href='about.php#about'>About Us</a> |\
  			<a href='catalogue.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
 		 	<a href='profile.php'>Member Profile</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$memberFunctions."\");";   
	echo "

";	
	echo "$('#productsOverview').html('<p>Unauthorized access.</p>');"; 
 	
	}

	if(isset($_COOKIE["staffname"]) && $_COOKIE["stafflogged"] == true){
	$staffFunctions = "<a href='about.php#about'>About Us</a> |\
  			<a href='catalogue.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
 		 	<a href='users.php'>Edit Site Users</a> |\
			<a href='products.php'>Manage Products</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$staffFunctions."\");";    	
	}

	if(!(isset($_COOKIE["username"])) && !(isset($_COOKIE["loggedin"])) && !(isset($_COOKIE["staffname"])) && !(isset($_COOKIE["stafflogged"]))){
		echo "$('#productsOverview').html('<p>Unauthorized access.</p>');"; 
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
    <div id="productsOverview">
    <h2> ShoeBox Pte Ltd </h2>
    <h3> Edit Products Catalogue </h3>

    <button id='showAdd'>Add New Product</button>
    <button id='showEdit'>Edit/Delete Product</button>
    <br />
	<br />
    <div id = 'addNewProduct' style='display:none;border:1px solid;padding:10px;'>
	<strong> Add New Product </strong>
	<br />
	<br />
	<label> Product Name </label> <br />
	<input type='text' class='addForm' name='addName' id='addName' placeholder='Product Name'> <br /> <br />
	<label> Product Description </label> <br />
	<textarea rows='5' cols='50' class='addForm' name='addDesc' id='addDesc' placeholder='Product Description'></textarea> <br /> <br />
	<label> Quantity </label> <br />
	<input type='number' class='addForm' min='1' name='addQty' id='addQty' placeholder='100'> <br /> <br />
	<label> Price </label> <br />
	<input type='number' class='addForm' min='0' step='.01' name='addPrice' id='addPrice' placeholder='0.99'> <br /> <br />
	<label> Color </label> <br />
	<input type='text' class='editForm' name='addColor' id='addColor' placeholder='Color'> <br /> <br />
	<label> Fabric </label> <br />
	<input type='text' class='editForm' name='addFabric' id='addFabric' placeholder='Fabric'> <br /> <br />
	<label> Add Keywords For Product Search </label> <br />
	<textarea rows='5' cols='50' class='addForm' name='addNewKeyword' id='addNewKeyword' placeholder='Insert keywords here for product search'></textarea><br />
	<button id='addBtn' onclick='validateAdd()'>Add New Product</button>
	<div id="add-response"></div>
    </div> 
	<br />
    <div id = 'editDetails' style='display:none;border:1px solid;padding:10px;'> 
	<strong> Edit/Delete Product </strong>
	<br />
	<br />
    	<div id="selectProd"></div>
	<p> Double click button to confirm product deletion:
	<button id='deleteBtn' ondblclick='deleteProductData()'>Delete Product</button>
	<br />
	<br />
    	<button id='selectBtn' onclick='selectProductData()'>Edit Details</button>
     	<br />
     	<div id="edit"></div> 
     	<div id="response"></div>
     </div>
</body>
</html>

