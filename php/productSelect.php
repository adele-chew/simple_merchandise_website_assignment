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
 
//display a form for staff to edit product details on

 $query  = "SELECT * FROM Products WHERE ProductID = ".$_POST['productSelect']; 
  $result = $mysqli->query($query);
  printSelect($result);
  mysqli_free_result($result);
  $mysqli -> close();

function printSelect($result) {
	if ($result->num_rows > 0) {
   		echo "<h4>Edit Product Details</h4>";
		while ($row = $result->fetch_assoc())
		{	
			echo "<label> Product Name </label> <br />";
			echo "<input type='text' class='editForm' name='prodName' id='prodName' placeholder='".$row['ProdName']."'> <br /> <br />";
			echo "<label> Product Description </label> <br />";
			echo "<textarea rows='5' cols='50' class='editForm' name='prodDesc' id='prodDesc' placeholder='".$row['ProdDesc']."'></textarea> <br /> <br />";
			echo "<label> Quantity </label> <br />";
			echo "<input type='number' class='editForm' min='0' name='qty' id='qty' placeholder='".$row['Qty']."'> <br /> <br />";
			echo "<label> Price </label> <br />";
			echo "<input type='number' class='editForm' min='0' step='.01' name='price' id='price' placeholder='".$row['Price']."'> <br /> <br />";
			echo "<label> Color </label> <br />";
			echo "<input type='text' class='editForm' name='color' id='color' placeholder='".$row['Color']."'> <br /> <br />";
			echo "<label> Fabric </label> <br />";
			echo "<input type='text' class='editForm' name='fabric' id='fabric' placeholder='".$row['Fabric']."'> <br /> <br />";
			echo "<label> Replace <strong>All</strong> Keywords </label> <br />";
			echo "<textarea rows='5' cols='50' class='editForm' name='replaceKeyword' id='replaceKeyword' placeholder='".$row['Keywords']."'></textarea><br /> <br />";
			echo "<label> Add Keywords to Existing Value </label> <br />";
			echo "<textarea rows='5' cols='50' class='editForm' name='addKeyword' id='addKeyword' placeholder='".$row['Keywords']."'></textarea><br />";
			echo "<input type='hidden' class='editForm' name='prodID' id='prodID' value='".$row['ProductID']."'> <br /> <br />";
		}
		echo "<button id='saveBtn' onclick='validateEdit()'>Save Details</button>";
	}
	else {
		echo "No products could be found.";
	}
}

?>

