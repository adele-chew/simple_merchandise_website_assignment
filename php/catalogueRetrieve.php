<?php 
//version 5.0 1/8 3.30AM

	//establish connection to mysql
  	$host = "localhost";
	$username = "X34050658";
	$pwd = "X34050658";
   	 $dbname = "X34050658";

	$mysqli = new mysqli($host, $username, $pwd, $dbname);
    	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error . "<br/>Error number: " . $mysqli->connect_errno;
	}

//display full catalogue table

  $query  = "SELECT * FROM Products";		//query statement to select all details on the product table
  $result = $mysqli->query($query);
  printTable($result);				//print result
  mysqli_free_result($result);
  $mysqli -> close();

//function to print results into the table
function printTable($result) {
	if ($result->num_rows > 0) {
   		echo "<h3>View Full Catalogue</h3>";
    		echo"<table border='1'>
		<tr>
		<th> Product Name </th>
    		<th> Description </th>
		<th> Fabric </th>
		<th> Color </th>
    		<th> Price </th>
		<th> Quantity </th>
		</tr>";
		while ($row = $result->fetch_assoc())
		{
			echo "<tr>";
			echo "<td>" . $row['ProdName'] . "</td>";
			echo "<td>" . $row['ProdDesc'] . "</td>";
			echo "<td>" . $row['Fabric'] . "</td>";
			echo "<td>" . $row['Color'] . "</td>";
			echo "<td>" . $row['Price'] . "</td>";
			echo "<td align = 'center'><input type = 'number' min='0' class = 'qty' name = 'qty[0][".$row['ProductID']."]' size = '4' value = '0'/></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	else {
		echo "No result found!";
	}
}

?>

