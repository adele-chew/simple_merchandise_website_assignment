<!DOCTYPE html> 
<!--//version 5.0 1/8 3.30AM-->
<!-- SPA holding both the about page and the help page. Static websites containing information about the website and our company branding.-->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head> 
<title>The ShoeBox Pte Ltd</title> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/SPAAboutHelp.js"></script>
<script>
$(document).ready(function() {
<?php
	if(isset($_COOKIE["username"]) && $_COOKIE["loggedin"] == true){
	$memberFunctions = "<a href='about' class = 'infoPages'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='help' class = 'infoPages'>Help</a> |\
 		 	<a href='profile.php'>Member Profile</a> |\
  			<a href='logout.php'>Logout</a>";
	echo "$('nav').html(\"".$memberFunctions."\");";    	
	}

	if(isset($_COOKIE["staffname"]) && $_COOKIE["stafflogged"] == true){
	$staffFunctions = "<a href='about' class = 'infoPages'>About Us</a> |\
  			<a href='shopping.php'>The Shoebox Catalogue</a> |\
  			<a href='shopping.php#cart'>Your Shopping Cart</a> |\
  			<a href='help' class = 'infoPages'>Help</a> |\
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
    <a href="about" class = "infoPages">About Us</a> |
  <a href="shopping.php">The Shoebox's Catalogue</a> |
  <a href="shopping.php#cart">Your Shopping Cart</a> |
  <a href="help" class = "infoPages">Help</a> |
  <a href="login.php">Members Login/Sign Up</a> |
  <a href="login.php#staff">Staff Login</a> |
</nav>
<main>
<article id="about">
<h2> Welcome to The ShoeBox Pte Ltd </h2>

<p>Selling shoes for every occasion and providing comfort for all ages - sneakers, sandals, wedges, heels, flats and more. Founded in 2011, The Shoebox has strived to make a name for itself, not only locally, but in the international scene, with uncompromising standards for quality and designs, along with a strive to be the modern, sophisticated trend-setter for all. 
The Shoebox believes in catering to all groups, and carries a wide range of shoes from business wear and parties, to casual wear, to formal dress events. Adorable kid shoes featuring the scaled down versions of our featured and popular adult designs are also available. Find shoes that fit the best version of yourself - and find shoes to fit for your loved ones as well. 
All our shoes are crafted with quality leather so our customers can stride through all walks of life with confidence and comfort. We place the emphasis on high-calibre craftsmanship, an unwavering attention to detail, and importance on foot health and comfort. We ensure they not only fit well but also remain a trusted wardrobe staple.
</p>

<h2>Our Contact Details ...</h2>
<p><h3> Company Name: </h3> The ShoeBox Pte Ltd 
<h3> Address:</h3> 1 Beach Road, 189673 Singapore, Singapore
<h3> Contact phone:</h3> 6841 4548
<h3> Email address:</h3> theshoebox.singapore@gmail.com</p>

<h2>Others Information You May Be Interested In ...</h2>
<h3> Our Mission: </h3>
<p>To inspire movement and progress in everyone in all walks of life</p>
<h3> Our Ethos: </h3>
<p>Professional, transparent, trustworthy and reliable. </p>
<h3> Historical Glory: </h3>
Global footwear awards - FOOTWEAR DESIGN OF THE YEAR – KIDS
<h3> Charitable Support: </h3> 
<p> Corporate Social Responsibility - donations and sponsorship to Singapore Children’s Society </p>
<h3> Message from us:  </h3> 
<p>We aim to create a lasting impression with not only our customers, but with our partners and our products itself. We strive to ensure that the values of The Shoebox are upheld not only with our customers and clientele, but with our employees and environment. The values we have are: 
Creating a culture of diverse belonging and exciting innovation, where everyone of all backgrounds are welcome. 
Challenging new heights with determination and passion, finding new ways to grow as a company and as individuals together. 
Being present in our ever-progressing globalized economy and culture, connecting to our customers with transparency, dignity and respect. 
Striving to be the best and holding ourselves with a gold standard, being accountable for results and setting an example to the community.
</p>

<p> Take a look at our FAQ <a href="help" class = "infoPages">Here</a></p>

</article>

<article id="help" hidden="hidden">

<h2> User Guide </h2>
how to navigate on our site
At the top on each of our page there is a navigation bar which help you to navigate around our pages.
We have a total of 6 pages.

<ol>
<li> About Us, </li> 
if you like to know more about us you can visit our <a href="about" class = "infoPages">"About Us"</a> page where is our home page where it includes information such as our contact details and company's history and other informations such as our company mission.
</br></br>
<li> The Shoebox's Catalogue, </li>
if you like to see what products we have you can visit our <a href ="catalogue.php">"Catalogue"</a> page, where it contain all our products information.
</br></br>
There are 3 buttons that you can click on.
<ul>
<li> Search - you can type in any keywords in the box (e.g Black, sports, running, kids) and click the search button, it will display relevant product containing the keywords.</li>
if there is product that you like to purchase you can input the quantity at the last column and if you wish to purchase more products you can add it to your cart first by selecting the add to cart button at the bottom of the page.
then continue to browse. Else, if you wish to purchase immediately you can simply scroll to the bottom of the page and select view cart, which will bring you to our shopping cart page.
</br></br>
<li> Browse by Category - after you click on this button there is 2 options for you to select, "Browse by:" and "Select Category:", select and click on apply filters. </li>
if there is product that you like to purchase you can input the quantity at the last column and if you wish to purchase more products you can add it to your cart first by selecting the add to cart button at the bottom of the page.
then continue to browse. Else, if you wish to purchase immediately you can simply scroll to the bottom of the page and select view cart, which will bring you to our shopping cart page.
</br></br>
<li> View Full Catalogue - When you click on this button it will display the full product list for you to view and you you are able to add add products to cart.</li>
if there is product that you like to purchase you can input the quantity at the last column and if you wish to purchase more products you can add it to your cart first by selecting the add to cart button at the bottom of the page.
then continue to browse. Else, if you wish to purchase immediately you can simply scroll to the bottom of the page and select view cart, which will bring you to our shopping cart page.
</br></br></ul>
<li> The Shoebox's Member's SignUp,</li>
if you like to purchase our products, be a <a href ="login.php#register">"Member"</a> page, where you can fill in your details and start shopping with us.
Fill in you details such as Username, Password, Confirm Password, Address, Contact and Email then click on the Register now.
</br></br>
<li> The Shoebox's Member's Login,</li>
to login, you can visit our <a href ="login.php">"Member's Login"</a> page. fill in your username and password then click on the login button.
</br></br>
<li> The Shoebox's Cart,</li>
this is your shopping basket, a summary of what product you have added on the catalogue.
You can click on the ___ button to submit your order for order processing.
</br></br>
<li> The Shoebox's Staff's Login,</li>
to login, you can visit our <a href ="login.php#staff">"Staff's Login"</a> page. fill in your username and password then click on the login button.
</br></br></ol>
</section>

<section>
<h2> FAQ </h2>

<h3> Ordering </h3>
<ol>
<li> Q: How can I order </li>
A: You can order easily using our online platform. When you find a product you need, you can add it to cart, login and go through the ordering process. 
</br></br>
<li> Q: Why should I buy online? </li>
A: Speeding up the process. By ordering online you will you will get prices faster and you will be able to go through order confirmation and payment process much faster. This could save days of your time.
</br></br>
<li> Q: Can I cancel my order? </li>
A: If you want to cancel your order, please do so as soon as possible. If we have already processed your order, you need to contact us and return the product. Please contact hytest@hytest.fi
</br></br>
<li> Q: Can I save my order and check out later? </li>
A: We apologise that we could not save your order. You have to check out after your selection, or make new cart on your next visit as some of our products comes in limited editions.
</br></br></ol>

<h3> Accounts </h3>
<ol>
<li> Q: How do create an account? </li>
A: Simply click <a href ="login.php#register">"here"</a> it will bring you to the sign up page. Fill in your details and you can start shopping with us.
</br></br></ol>
</section>
</article>
</main>
<footer><p>&#169; Copyright 2021 The ShoeBox Pte Ltd</p></footer>
</body></html>