//version 6.0 2/8 3AM
//function where product selected is compiled to be sent through the headers
function selectCustomerDetails() {
	   var select = document.getElementById('custSelect');						//get element by id 'custSelect' and assign to variable select
	   var value = select.options[select.selectedIndex].value;					//get value of selected option and assign to variable value				
	   var data = "custSelect=" + encodeURI(value);							//data variable is assigned with the name of the custSelect element, and the uri-encoded value
           selectCustomer(data);									//send selected customer data
       	}

//function where product data is sent via xhr
function selectCustomer(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  custOverview(this.responseText);							//process the product overview response with this response text
               }
           } 			
           xhr.open("POST", "./php/userCustSelect.php", true);						//data is sent through POST to selectProduct.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
function custOverview(data){						
	  document.getElementById('custEditDetails').innerHTML = "";						//clears out any existing values in the edit div
          document.getElementById('custEditDetails').innerHTML = data;						//inputs the xhr response data into the div
       }

//function to validate password reset fields
function PwdReset() {
	var newPwd = document.getElementById("newPwd").value;					//gets the element value of id 'newPwd' and assigns it to variable newPwd
	var confirmNew = document.getElementById("confirmNew").value;				//gets the element value of id 'confirmNew' and assigns it to variable confirmNew
	var PwdFlag, matchFlag = false;  							//initializes a password flag, and a password match flag. sets all values to false
							
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
		return true;									//send password data
	}
	else {
		return false;
	}
}

//function to validate edit user detail fields
function validateCustEdit() {
	var pwdCheck = document.getElementById("newPwd");					//gets the element value of id 'newPwd' and assigns it ot variable pwdCheck
	var num = parseInt(document.getElementById("contact").value); 				//gets the element value of id 'contact', parses the string value to int and assigns it to variable num 
	var numFlag, inputFlag, pwdFlag = false; 						//initializes an inputs flag, and a num flag. sets all values to false
	var counter = 0;									//initializes a counter variable with value of 0
	var details = document.getElementsByClassName("editCustForm");				//gets the elements from the class 'editCustForm' and assigns it to variable details 
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

	if ((pwdCheck) && (pwdCheck.value)) {
		pwdFlag = PwdReset();								//sets a password flag to the return value of function PwdReset() 
	}
	else {
		pwdFlag = true;
	}
	
	if((inputFlag) && (numFlag) && (pwdFlag)) {								//if all flags are true
		sendCustDetailInput();								//send details data
	}
}

//function where details data is compiled to be sent through the headers 
function sendCustDetailInput() {
	  data = "email=" + encodeURI(document.getElementById("email").value);			//data variable is assigned with the name of the email element, and the uri-encoded value
	  data += "&newPwd=" + encodeURI(document.getElementById("newPwd").value);		//data variable is appended with the name of the addr element and the uri-encoded value
	  data += "&contact=" + encodeURI(document.getElementById("contact").value); 		//data variable is appended with the name of the contact element and the uri-encoded value
	  data += "&addr=" + encodeURI(document.getElementById("addr").value);			//data variable is appended with the name of the addr element and the uri-encoded value
	  data += "&name=" + encodeURI(document.getElementById("name").value);			//data variable is appended with the name of the addr element and the uri-encoded value
	  sendCustDetail(data); 								//send detail data
       	}

//function where details data is sent via xhr
function sendCustDetail(data){
           var xhr = new XMLHttpRequest();							//initializes new xhr variable
           xhr.onreadystatechange = function(){							//when ready
               if (this.readyState === 4 && this.status === 200) {				//if successful
                  processDetails(this.responseText);						//process the edit details response with this response text
		  setTimeout(function(){								// calls for a function after a certain amount of time
           		location.reload(); 								// reloads the page
      		   }, 5000); 
               }
           } 
           xhr.open("POST", "./php/userCustEdit.php", true);					//data is sent through POST to memberEditProfile.php
           xhr.setRequestHeader("Content-type", 						//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);									//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
 function processDetails(data){
	  document.getElementById('custEditResponse').innerHTML = "";					//clears out any existing values in the details div
          document.getElementById('custEditResponse').innerHTML = data;					//inputs the xhr response data into the div

       }

//function to validate registration input fields
function validateReg() {
            var Pwd = document.getElementById("regPwd");						//gets the element value of id 'regPwd' and assigns it to variable Pwd
            var ConfPwd = document.getElementById("regConfirm");					//gets the element value of id 'regConfirm' and assigns it to variable ConfPwd
            var Contact = parseInt(document.getElementById("regContact").value);			//gets the element value of id 'regContact', parses the string value to an integer and assigns it to variable Contact
            var PwdFlag, ConfPwdFlag, ContactFlag = false; 						//initializes a password flag, a confirm password flag, and a contact flag. sets all values to false
            											
	var inputs = document.getElementsByClassName("regForm");					//gets the elements from the class 'regForm' and assigns it to variable inputs
            var inputsFlag = false; 									//initializes an inputsFlag to false
            var counter = 0;										//sets a counter variable to 0
            
            for (var i = 0; i < inputs.length; i++) {							//loops through all input elements
            	if(!(/\S/.test(inputs[i].value))) {							//if the input element is not filled
        			counter++;								//counter value increases by one
        		}
            }
        	
            if(counter == 0) {										//if the counter value is zero
        		inputsFlag = true; 								//set the input flag to true
        	}
            else {									
        		alert("Please fill in all fields. Remaining fields: " + counter);		//else, send an alert to indicate the number of missing field data
        	}
            
        	if(!(/^[a-zA-Z0-9_]+$/.test(Pwd.value))){						//if the password value contains anything other than alphanumerics and underscores
            	alert("You may only have alphanumerics and underscores in your password.");		//send an alert notifying the user of the password criteria
            }
            else {							
            	PwdFlag = true; 									//else, set the password flag to true
            }
            
            if(PwdFlag == true) {									//if the password flag is true
            	if(!(Pwd.value == ConfPwd.value)) {							//check if the password value matches the value of the confirm password field
                	alert("Passwords do not match");						//send an alert if they do not match
                }
                else {
                	ConfPwdFlag = true; 								//else, set the confirm password flag to true
                }
            }
            
            if(!(/^[0-9]+$/.test(Contact))) {								//if the contact field contains anything other than numbers
            	alert("Please input only numbers into the Contact field.");				//send an alert that the contact field can only accept numbers
            }
            else {
            	ContactFlag = true;									//else set the contact flag to true
            }
          if((PwdFlag) && (ConfPwdFlag) && (inputsFlag) && (ContactFlag)) {				//if all flags are true
            	sendRegistrationData();									//send the user registration data
            } 
        }

//function to compile registration data to be sent through headers 
function sendRegistrationData() {
           var data = "regUsername=" + encodeURI(document.getElementById('regUsername').value);		//data variable is assigned with the name of the username element, and the uri-encoded value
	   data += "&regPwd=" + encodeURI(document.getElementById('regPwd').value);			//data variable is appended with the name of the password element and the uri-encoded value
	   data += "&regAddr=" + encodeURI(document.getElementById('regAddr').value);			//data variable is appended with the name of the address element and the uri-encoded value
	   data += "&regContact=" + encodeURI(document.getElementById('regContact').value);		//data variable is appended with the name of the contact element and the uri-encoded value
	   data += "&regEmail=" + encodeURI(document.getElementById('regEmail').value);			//data variable is appended with the name of the email element and the uri-encoded value
           sendRegistration(data);									//send registration data
       	}

//function where registration data is sent via xhr
function sendRegistration(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if successful
                  regResponse(this.responseText);							//call for function to process this response text
		  setTimeout(function(){								// calls for a function after a certain amount of time
           		location.reload(); 								// reloads the page
      		   }, 5000);
               }
           } 
           xhr.open("POST", "./php/userCustRegistration.php", true);					//send data via POST to userCustRegistration.php
           xhr.setRequestHeader("Content-type", 							//set request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function to output xhr response for registration data to webfront
function regResponse(data){
	  document.getElementById('registration-response').innerHTML = "";				//clears out any existing values in the registration-response div
          document.getElementById('registration-response').innerHTML = data;				//inputs the xhr response data into the div
       }

