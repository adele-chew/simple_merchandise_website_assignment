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
 
//staff function. prints a dropdown bar with all the staff's usernames

 $query  = "SELECT StaffName FROM Staff";
  $result = $mysqli->query($query);
  printSelect($result);
  mysqli_free_result($result);
  $mysqli -> close();

function printSelect($result) {
	if ($result->num_rows > 0) {
   		echo "<label>Select a staff account: </label>";
		echo "<select id='staffSelect' name = 'staffSelect'>";
		while ($row = $result->fetch_assoc())
		{
			echo "<option value='".$row['StaffName']."'>". $row['StaffName'] . "</option>";
		}
		echo "</select>";
	}
	else {
		echo "No staff could be found.";
	}
}

?>

