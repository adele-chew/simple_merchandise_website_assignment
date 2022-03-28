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

//staff function to obtain selected index from dropdown menu and print a form to edit staff details

 $query  = "SELECT * FROM Staff WHERE StaffName = '".$_POST['staffSelect']."'"; 
	
  $result = $mysqli->query($query);
  assignVar($result);
  mysqli_free_result($result);
  $mysqli -> close();

function assignVar($result) {
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc())
		{	
			$email = $row['Email'];
			$contact = $row['Contact'];
			$addr = $row['Address'];
			$name = $row['StaffName'];
			
		}
	printForm($email, $contact, $addr, $name);
	}
	else {
		echo "No customer details could be found.";
	}
}

function printForm($email, $contact, $addr, $name) {
	echo "<h4>Edit Staff Details</h4>";
	echo "<label> Change password </label>";
	echo "<input type='password' class = 'editStaffForm' name = 'staffNewPwd' id='staffNewPwd'><br /><br />";
	echo "<label> Confirm new password </label>";
	echo "<input type='text' class = 'editStaffForm' name = 'staffConfirmNew' id='staffConfirmNew'><br /><br />";
	echo "<label> Change email </label> <br />";
	echo "<input type='text' class = 'editStaffForm' name = 'staffEmail' id='staffEmail' placeholder = '".$email."'><br /><br />";
	echo "<label> Change contact </label> <br />";
	echo "<input type='text' class = 'editStaffForm' name = 'staffContact' id='staffContact' placeholder = '".$contact."'><br /><br />";
	echo "<label> Change address </label> <br />";
    	echo "<input type='text' class = 'editStaffForm' name = 'staffAddr' id='staffAddr' placeholder = '".$addr."' style='width:50%;'><br /><br />";
	echo "<input type='hidden' class='editStaffForm' name='staffName' id='staffName' value='".$name."'> <br /> <br />";
	echo "<button id='saveStaffBtn' onclick='validateStaffEdit()'>Save Details</button>";
	echo "</div> <br /> <br />";
}

?>