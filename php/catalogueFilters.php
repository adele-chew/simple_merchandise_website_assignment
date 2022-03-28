<?php 
//version 5.0 1/8 3.30AM
	
	//set up connection to mysql
	$host = "localhost";
	$username = "X34050658";
	$pwd = "X34050658";
    	$dbname = "X34050658";

	$mysqli = new mysqli($host, $username, $pwd, $dbname);
    	
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli->connect_error . "<br/>Error number: " . $mysqli->connect_errno;
	}
 
//display catalogue filters results table

$type = null; 					//set variables type and cat to null
$cat  = null; 

	switch($_POST['typeFilter']) {		//switch case statement for the post method variable 'typeFilter'
        case "women":				//assign value to variable depending on the case
            $type = "women";
            break;
        case "men":
            $type = "men";
            break;
        case "kids":
            $type = "kids";
            break;
    	}
    
    if(!empty($_POST['catFilter'])){		//if the post method variable is not empty
 		switch($_POST['catFilter']) {	//switch case statement for the post method variable catFilter
        	case "sports":			//assign value to cat variable depending on the case
            	$cat = "sports";
            	break;
        	case "lifestyle":
            	$cat = "lifestyle";
            	break;
        	case "business":
            	$cat = "business";
        	    break;
    	}
    }
	    //query statement for mysql
            $query = "SELECT ProductID, ProdName, ProdDesc, Fabric, Color, Price FROM Products WHERE MATCH (Keywords) AGAINST ('+$type";
            
            if($cat != null) {			 //if $cat is not null, add to the query
            	$query .=" +$cat";
            }
            $query .= "' IN BOOLEAN MODE)";
            
		//for testing: 				
		//$query = "SELECT * FROM Products";
		//echo $query;
            
		$result = $mysqli->query($query); 
        	printTable($result);
		mysqli_free_result($result);
		$mysqli -> close();			

//function to print result in a table form
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
