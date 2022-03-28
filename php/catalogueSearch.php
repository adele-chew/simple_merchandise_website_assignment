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
 
//display catalogue search results table

$search = explode(" ", $_POST['search']);	
      			$query = "SELECT ProductID, ProdName, ProdDesc, Fabric, Color, Price FROM Products WHERE MATCH (Keywords) AGAINST ('+$search[0]"; 
     
     			for($i = 1; $i < count($search); $i++) {
					if(!empty($search[$i])) {
						$query .= " +$search[$i]";
					}
      			}
                $query .= "' IN BOOLEAN MODE)";
			//for testing: 
			//$query = "SELECT ProductID, ProdName, ProdDesc, Fabric, Color, Price FROM Products WHERE MATCH (Keywords) AGAINST ('women' IN BOOLEAN MODE)"; 
			//echo $query;
			$result = $mysqli->query($query); 
        		printTable($result);
			mysqli_free_result($result);
			$mysqli -> close();

function printTable($result) {
	if ($result->num_rows > 0) {
   		echo "<h3>Search Results</h3>";
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
