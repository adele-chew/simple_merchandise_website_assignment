//version 5.0 1/8 3.30AM
	//function to validate search bar input
	function validateSearch(){
		var query = document.getElementById("search").value; 					//get element by id 'search' and assign it to variable query
		if (!(/\S/.test(query))) {								//if there is no string in the search input value
        		alert("Not a valid search.");							//send alert that it is not a valid search
        	}	
        	else if (/[.,!?\\-]/.test(query)) {							//if there is punctuations within the search input
        		alert("Please remove punctuation and separate search words with spaces."); 	//send alert to remove all punctions and separate searches with whitespace
        	}
        	else {
        		sendUserInput(); 								//else, send the user search input
        	}
	}
	
	//function to validate the search filters
	function validateFilters(){									
		var types = document.getElementsByClassName('typeFilter'); 				//get elements by class name 'typeFilter; radio buttons for women's, men's and kids
		var radioFlag = false; 									//set a flag for the radio buttons to false
		for (i = 0; i < types.length; ++ i) {							//loop through the radio buttons
        		if (types[i].checked) {								//if any of the radio buttons are checked
				radioFlag = true;							//the flag is true
			}
    		}
		if (radioFlag == false) {								//if the radio flag is false
			alert("No filters selected.");							//send an alert that there are no selected radio buttons
		}

		else {
			sendRadioBtnInput();								//else, send the radio button inputs
		}
	}
	
	//function to validate cart quantity
	function validateCart(){					
		var qty = document.getElementsByClassName("qty");					//assign elements with class name 'qty' to variably qty; the elements for the quantity column in the products catalogue
		var counter = 0; 									//set a counter variable
		for (var i = 0; i < qty.length; i++) {							//loop through the qty array
			if (!(qty[i].value>0)) {							//if the qty element value is not greater than 0
        			counter++;								//counter increases by one
        		}
		}
		
		if(counter == qty.length) {								//if the counter value is equal to the quantity length
			alert("No items selected.");							//send alert that no items have been selected
		}
		else {
			sendCartInput();								//else, send data function is called
		}
	}

	//function to send user search bar input in the headers
	function sendUserInput() {									
           var data = "search=" + encodeURI(document.getElementById('search').value);			//variable named data is assigned the name of the searchbar element, and the value of it is encoded with URI
           sendSearch(data);										//send data 
       	}
	
	//function to send the radio button inputs in the headers
	function sendRadioBtnInput() {
	   var types = document.getElementsByClassName("typeFilter");					//assign elements with class name 'typeFilter' to variable types; radio buttons for women's, men's and kids
	   var cat = document.getElementsByClassName("catFilter");					//assign elements with class name 'catFilter' to variable cat; radio buttons for sportswear, lifestyle and business formal
           for (var i = 0; i < types.length; i++) {							//loop through all typeFilter elements
		if(types[i].checked) {									//if this radio button is checked
			data = "typeFilter=" + encodeURI(types[i].value);				//the data variable is assigned to the name of the element and encodes the value of the element with URI
		}
	   }
	   for (var j = 0; j < cat.length; j++) {							//loop through all catFilter elements
			if (cat[j].checked) {								//if this radio button is checked
				data +="&catFilter=" + encodeURI(cat[j].value);				//the name of the element and the URI encoded value of the element is appended to the data variable
			}
	    }
           sendFilters(data);										//send data function is called
       	}

	//function to send the cart input in the headers
	function sendCartInput() {
	   var qty = document.getElementsByClassName("qty")						//assign elements with class name 'qty' to variable qty; number inputs for all products in the 'quantity' column of the catalogue
	   var data = "";										//initialize data variable
           for(i = 0; i < qty.length; i++) {								//loops through all qty elements
		if(qty[i].value > 0) {									//if the element has a value greater than zero
			if(data.length == 0) {								//and if the data length has not been filled
				data = encodeURI(qty[i].name)+"=" + encodeURI(qty[i].value);		//the data variable is assigned to the name of the element and uri-encoded value of the element
			}		
			else {										//if the data length has been filled
				data += "&"+encodeURI(qty[i].name)+"=" + encodeURI(qty[i].value);	//the name of the element and the uri-encoded value of the element is appended to the existing data string
			}
		}
	   }
           sendCart(data);										//send data function is called
       	}

	//function to send search data via XHR
       function sendSearch(data){
           var xhr = new XMLHttpRequest();								//initialize a new XHR variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  processResponse(this.responseText);							//call function to process the response with this response text
               }
           } 
           xhr.open("POST", "./php/catalogueSearch.php", true);						//send data via POST to catalogueSearch.php
           xhr.setRequestHeader("Content-type", 							//set request header to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//send the data via xhr
       }

	//function to send filters data via xhr
       function sendFilters(data){					
           var xhr = new XMLHttpRequest();								//initialize a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  processResponse(this.responseText);							//call function to process the response with this response text
               }
           } 
           xhr.open("POST", "./php/catalogueFilters.php", true);					//send data via POST to catalogueFilters.php
           xhr.setRequestHeader("Content-type", 							//set request header to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//send the data via xhr
       }

	//function to send cart inputs via xhr
       function sendCart(data){														
           var xhr = new XMLHttpRequest();								//initialize a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  processCartResponse(this.responseText);						//call function to process the response with this response text
               }
           } 
           xhr.open("POST", "./php/catalogueToCart.php", true);						//send data via POST to catalogueToCart.php
           xhr.setRequestHeader("Content-type", 							//set request header to be url encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//send the data via xhr
       }
	
	//function to print response from xhr request for products table
       function processResponse(data){									
	  document.getElementById('products').innerHTML = "";						//clear out any previous data within the inner html of the products div
          document.getElementById('products').innerHTML = data;						//input it with the data from xhr response
       }

	//function to print response from xhr request for adding to cart
	function processCartResponse(data){								
	  document.getElementById('addTo-Response').innerHTML = "";						//clear out any previous data within the cart html of the shopping cart response div named 'response'
          document.getElementById('addTo-Response').innerHTML = data;						//input it with the data from xhr response
       }

	//function to view the full catalogue, via xhr
	function viewFull() {
		var xhr = new XMLHttpRequest();								//initialize a new xhr variable
		xhr.onreadystatechange = function(){							//when ready
			if (xhr.readyState === 4 && xhr.status === 200) {				//if the status is successful
				processResponse(this.responseText);					//call the function to process the response with this response text

			}
		};
		xhr.open("GET", "./php/catalogueRetrieve.php", true);					//using GET method to catalogueRetrieve.php. no data is sent, but the full catalogue is retrieved
		xhr.send();										//send the data via xhr
	}

