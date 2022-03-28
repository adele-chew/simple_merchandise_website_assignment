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
<script src="js/catalogue.js"></script>
<script src="js/cart.js"></script>
<script src="js/SPACatalogueCart.js"></script>
<script>
$(document).ready(function() {
	$("#shoppingCart").load("php/cartRetrieve.php");
	
	$("#browseBtn").click(function(){
  		$("#browseByCat").toggle();
	});

	$("#filtersBtn").click(function(){
  		$("#addCartDiv").show();
		
	});

	$("#searchBtn").click(function(){
  		$("#addCartDiv").show();
		
	});

	$("#ViewFullBtn").click(function(){
		$("#addCartDiv").show();
	});

	$("#resetBtn").click(function(){
  		$("input[type='radio']").prop("checked", false); 
	});
<?php
	if(isset($_COOKIE["username"]) && $_COOKIE["loggedin"] == true){
	$memberFunctions = "<a href='about.php#about'>About Us</a> |\
  			<a href='shopping.php#catalogue'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='about.php#help'>Help</a> |\
 		 	<a href='profile.php'>Member Profile</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$memberFunctions."\");";    	
	}

	if(isset($_COOKIE["staffname"]) && $_COOKIE["stafflogged"] == true){
	$staffFunctions = "<a href='about.php#about'>About Us</a> |\
  			<a href='shopping.php#catalogue'>The Shoebox Catalogue</a> |\
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

  <body >
	<nav>
    <a href="about.php#about">About Us</a> |
  <a href="shopping.php#catalogue">The Shoebox's Catalogue</a> |
  <a href="shopping.php#cart">Your Shopping Cart</a> |
  <a href="about.php#help">Help</a> |
  <a href="login.php">Members Login/Sign Up</a> |
  <a href="login.php#staff">Staff Login</a> |
  </nav>

    <h2> Welcome to The Shoebox Pte Ltd </h2>

	<button id='catView'><a href="catalogue" class="shoppingPages" style='text-decoration:none; color:black;'> View Catalogue </a></button>
    	<button id='cartView' onclick='getCart();'><a href="cart" class="shoppingPages" style='text-decoration:none;color:black;'> View Shopping Cart </a></button>
    
	<article id="catalogue" style='border:1px solid;padding:10px;'>
		<h3> The Shoebox Catalogue </h3>
    		<input type = 'text' name = 'search' id = 'search' placeholder = "Search for a product..."> 
    		<button id="searchBtn" onclick="validateSearch()">Search</button>
     		<br />
		<br />
     		<button id="browseBtn">Browse by Category</button>
		<button id="ViewFullBtn" onclick="viewFull()">View Full Catalogue</button>
    		<div id = "browseByCat" style="display:none;">
			<table style="border:0px;">
			<tr>
				<td>Browse by: </td>
				<td><input type='radio' class = 'typeFilter' name = 'typeFilter' value='women'><label>Women's</label></td>
				<td><input type='radio' class = 'typeFilter' name = 'typeFilter' value='men'><label>Men's</label></td>
				<td><input type='radio' class = 'typeFilter' name = 'typeFilter' value='kids'><label>Kids</label></td>
			</tr>
			<tr>
				<td>Select Category: </td>
				<td><input type='radio' class = 'catFilter' name = 'catFilter' value='sports'><label>Sports</label></td>
				<td><input type='radio' class = 'catFilter' name = 'catFilter' value='lifestyle'><label>Lifestyle</label></td>
				<td><input type='radio' class = 'catFilter' name = 'catFilter' value='business'><label>Business Formal</label></td>
			</tr>
			</table>
			<button id="filtersBtn" onclick="validateFilters()">Apply Filters</button>
			<button id="resetBtn">Reset Filters</button>
    		</div>
		<div id="products"></div>
		<br />
		<div id='addCartDiv' style='display:none' ><button id="addToCartBtn" onclick="validateCart()">Add to Cart</button></div>
		<span id = "addTo-Response"></span>
		</div>
	</article>

	<article id="cart" style='border:1px solid;padding:10px;' hidden='hidden'>
		<h3> The Shoebox Catalogue </h3>
		   <?php 
			if(!(isset($_COOKIE["username"])) && !(isset($_COOKIE["loggedin"])) && !(isset($_COOKIE["staffname"])) && !(isset($_COOKIE["stafflogged"]))){	
			echo "<p> If you'd like to place an order, log in <a href='login.php#login'>here</a>! If you're not yet a member, <a href='login.php#register'>Sign Up </a> for free and receive your items today!</p>";
			}

			else {
				echo"<button id='orderBtn' onclick='sendOrderConfirmation()'> Order Now </button>";
			}
   		   ?>
		<div id='shoppingCart'></div>

		<div id='orderConfirmation'></div>

	</article>
</body>
</html>

