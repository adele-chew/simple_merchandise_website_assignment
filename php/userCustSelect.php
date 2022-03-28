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
 
//staff function to obtain the selected index of the dropdown list and print a form to edit the customer's information

 $query  = "SELECT * FROM Customer WHERE CustName = '".$_POST['custSelect']."'"; 
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
			$name = $row['CustName'];
			
		}
	printForm($email, $contact, $addr, $name);
	}
	else {
		echo "No customer details could be found.";
	}
}

function printForm($email, $contact, $addr, $name) {
	echo "<h4>Edit Customer Details</h4>";
	echo "<label> Change password </label>";
	echo "<input type='password' class = 'editCustForm' name = 'newPwd' id='newPwd'><br /><br />";
	echo "<label> Confirm new password </label>";
	echo "<input type='text' class = 'editCustForm' name = 'confirmNew' id='confirmNew'><br /><br />";
	echo "<label> Change email </label> <br />";
	echo "<input type='text' class = 'editCustForm' name = 'email' id='email' placeholder = '".$email."'><br /><br />";
	echo "<label> Change contact </label> <br />";
	echo "<input type='text' class = 'editCustForm' name = 'contact' id='contact' placeholder = '".$contact."'><br /><br />";
	echo "<label> Change address </label> <br />";
    echo "<input type='text' class = 'editCustForm' name = 'addr' id='addr' placeholder = '".$addr."' style='width:50%;'><br /><br />";
	echo "<input type='hidden' class='editCustForm' name='name' id='name' value='".$name."'> <br /> <br />";
	echo "<button id='saveBtn' onclick='validateCustEdit()'>Save Details</button>";
	echo "</div> <br /> <br />";
}

?>