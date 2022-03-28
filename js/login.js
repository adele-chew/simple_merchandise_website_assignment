//version 5.0 1/8 3.30AM
//function that validates login input
function validateLogIn() {						
            var Pwd = document.getElementById("loginPwd").value;					//gets the element value of id 'loginPwd' and assigns it to variable Pwd
            var UName = document.getElementById("loginUsername").value;					//gets the element value of id 'loginUsername' and assigns it to variable UName

            if(!(/\S/.test(UName)) && !(/\S/.test(Pwd))) {						//if either of the username or password fields are empty
        		alert("Please fill in both fields.");						//send an alert to indicate that both fields are required									
            }
            else if(!(/\S/.test(UName))) {								//if the username field is empty
            	alert("Please fill in username.");							//send an alert to indicate that the username field is empty
            }
            else if(!(/\S/.test(Pwd))) {								//if the password field is empty
            	alert("Please fill in password.");							//send an alert to indicate the password field is empty
            }
            else {
            	sendLoginData();									//if no alerts are triggered, call function to send data
        	}
        }

//function where login input data is compiled to be sent through the headers
function sendLoginData() {										
           var data = "loginUsername=" + encodeURI(document.getElementById('loginUsername').value);	//data variable is assigned with the name of the username element, and the uri-encoded value
	   data += "&loginPwd=" + encodeURI(document.getElementById('loginPwd').value);			//data variable is appended with the name of the password element and the uri-encoded value
           sendLogin(data);										//send login data
       	}

//function where login data is sent via xhr
function sendLogin(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  loginResponse(this.responseText);							//process the login response with this response text
               }
           } 			
           xhr.open("POST", "./php/loginMember.php", true);						//data is sent through POST to userlogin.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
function loginResponse(data){						
	  document.getElementById('login-response').innerHTML = "";					//clears out any existing values in the login-response div
          document.getElementById('login-response').innerHTML = data;					//inputs the xhr response data into the div
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
               }
           } 
           xhr.open("POST", "./php/loginRegistration.php", true);						//send data via POST to registration.php
           xhr.setRequestHeader("Content-type", 							//set request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function to output xhr response for registration data to webfront
function regResponse(data){
	  document.getElementById('registration-response').innerHTML = "";				//clears out any existing values in the registration-response div
          document.getElementById('registration-response').innerHTML = data;				//inputs the xhr response data into the div
       }

//function to validate staff login inputs
function validateStaff() {
            var Pwd = document.getElementById("staffPwd").value;					//gets the element value of id 'staffPwd' and assigns it to variable Pwd
            var UName = document.getElementById("staffUsername").value;					//gets the element value of id 'staffUsername' and assigns it to variable UName

            if(!(/\S/.test(UName)) && !(/\S/.test(Pwd))) {						//if either of the username or password fields are empty
        		alert("Please fill in both fields.");						//send an alert to indicate that both fields are required
            }
            else if(!(/\S/.test(UName))) {								//if the username field is empty
            	alert("Please fill in username.");							//send an alert to indicate that the username field is empty
            }
            else if(!(/\S/.test(Pwd))) {								//if the password field is empty
            	alert("Please fill in password.");							//send an alert to indicate the password field is empty
            }
            else {
            	sendStaffData();									//if no alerts are triggered, call function to send data
        	}
        }

//function to compile staff login data to be sent through headers
function sendStaffData() {
           var data = "staffUsername=" + encodeURI(document.getElementById('staffUsername').value);	//data variable is assigned with the name of the staffUsername element, and the uri-encoded value
	   data += "&staffPwd=" + encodeURI(document.getElementById('staffPwd').value);			//data variable is appended with the name of the staffPwd element and the uri-encoded value
           sendStaff(data);										//sends staff login data
       	}
//function where staff login data is sent via xhr
function sendStaff(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if successful
                  staffResponse(this.responseText);							//call for function to process this response text
               }
           } 
           xhr.open("POST", "./php/loginStaff.php", true);						//send data via POST to stafflogin.php
           xhr.setRequestHeader("Content-type", 							//set request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

function staffResponse(data){
	  document.getElementById('staff-login').innerHTML = "";					//clears out any existing values in the staff-login div
          document.getElementById('staff-login').innerHTML = data;					//inputs the xhr response data into the div
       }


