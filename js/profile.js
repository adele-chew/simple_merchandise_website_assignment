//version 5.0 1/8 3.30AM
//function to validate password reset fields
function PwdReset() {
	var details = document.getElementsByClassName("resetForm");				//gets the elements from the class 'resetForm' and assigns it to variable details 
	var newPwd = document.getElementById("newPwd");						//gets the element value of id 'newPwd' and assigns it to variable newPwd
	var confirmNew = document.getElementById("confirmNew");					//gets the element value of id 'confirmNew' and assigns it to variable confirmNew
	var inputFlag, PwdFlag, matchFlag = false;  						//initializes an inputs flag, a password flag, and a password match flag. sets all values to false
	var counter=0;										//initializes a counter with value 0

	for (var i = 0; i < details.length; i++) {						//loops through all detail elements
		if (!(/\S/.test(details[i].value))) {						//if the detail value of this element is empt
			counter++;								//counter increases by 1
		}
	}

	if (counter > 0) {									//if the counter value is greater than 0
		alert("Please enter all fields.");						//send an alert to enter a value in all fields
	}
	else {
		inputFlag = true;								//else set the inputs flag to true
	}

	if(!(/^[a-zA-Z0-9_]+$/.test(newPwd.value))){						//if the password value has anything other than alphanumerics and underscores
            	alert("You may only have alphanumerics and underscores in your password.");	//send an alert to indicate that only alphanumerics and underscores are allowed
	}
	else {
		PwdFlag = true;									//else set the password flag to true
	}

	if (newPwd.value != confirmNew.value) {							//if the new password value and the confirm new password value does not match
		alert("Please ensure new password inputs are matching.");			//send an alert to indicate that they are not matching
	}
	else {
		matchFlag = true;								//else set the password match flag to true
	}

	if((inputFlag) && (PwdFlag) && (matchFlag)) {						//if all flags are true
		sendPwdData();									//send password data
	}
}

//function where password data is compiled to be sent through the headers 
function sendPwdData() {
           var data = "newPwd=" + encodeURI(document.getElementById('newPwd').value);		//data variable is assigned with the name of the newPwd element, and the uri-encoded value
		data+= "&currPwd=" + encodeURI(document.getElementById('currPwd').value);	//data variable is appended with the name of the currPwd element and the uri-encoded value
           sendPwd(data);									//send password data
       	}

//function where password data is sent via xhr
function sendPwd(data){				
           var xhr = new XMLHttpRequest();							//initializes a new xhr variable
           xhr.onreadystatechange = function(){							//when ready
               if (this.readyState === 4 && this.status === 200) {				//if successful
                  PwdConfirm(this.responseText);						//process the password response with this response text
               }
           } 
           xhr.open("POST", "./php/memberResetPwd.php", true);					//data is sent through POST to memberResetPwd.php
           xhr.setRequestHeader("Content-type", 						//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);									//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
 function PwdConfirm(data){
	  document.getElementById('resetConfirmation').innerHTML = "";				//clears out any existing values in the resetConfirmation div
          document.getElementById('resetConfirmation').innerHTML = data;			//inputs the xhr response data into the div
       }

//function to validate edit user detail fields
function editDetails() {
	var num = parseInt(document.getElementById("contact").value); 				////gets the element value of id 'contact', parses the string value to int and assigns it to variable num 
	var numFlag, inputFlag = false; 							//initializes an inputs flag, and a num flag. sets all values to false
	var counter = 0;									//initializes a counter variable with value of 0
	var details = document.getElementsByClassName("editForm");				//gets the elements from the class 'editForm' and assigns it to variable details 
	if((num) && !(/^[0-9]+$/.test(num))) {							//if num is filled, and num contains characters other than numbers
		alert("Please only input numbers into the contact field.");			//send an alert to indicate that only numbers are allowed in the contact field
	}
	else {
		numFlag = true;									//else set the num flag to true
	}

	for(var i = 0; i < details.length; i++) {						//loops through the details elements
		if (!(/\S/.test(details[i].value))) {						//if the detail element is empty
		counter++;									//increase the counter value by 1
		}
	}
	if (counter == details.length) {							//if the counter value is equal to the number of details elements
		alert("Please enter information in at least one field");			//send an alert to user to input data in at least one field
	}
	else {
		inputFlag = true; 								//else set input flag to true
	}

	if((inputFlag) && (numFlag)) {								//if all flags are true
		sendDetailInput();								//send details data
	}
}

//function where details data is compiled to be sent through the headers 
function sendDetailInput() {
	  data = "email=" + encodeURI(document.getElementById("email").value);			//data variable is assigned with the name of the email element, and the uri-encoded value
	  data += "&contact=" + encodeURI(document.getElementById("contact").value); 		//data variable is appended with the name of the contact element and the uri-encoded value
	  data += "&addr=" + encodeURI(document.getElementById("addr").value);			//data variable is appended with the name of the addr element and the uri-encoded value
	  sendDetails(data); 									//send detail data
       	}

//function where details data is sent via xhr
function sendDetails(data){
           var xhr = new XMLHttpRequest();							//initializes new xhr variable
           xhr.onreadystatechange = function(){							//when ready
               if (this.readyState === 4 && this.status === 200) {				//if successful
                  processDetails(this.responseText);						//process the edit details response with this response text
               }
           } 
           xhr.open("POST", "./php/memberEditProfile.php", true);				//data is sent through POST to memberEditProfile.php
           xhr.setRequestHeader("Content-type", 						//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);									//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
 function processDetails(data){
	  document.getElementById('details').innerHTML = "";					//clears out any existing values in the details div
          document.getElementById('details').innerHTML = data;					//inputs the xhr response data into the div

       }

