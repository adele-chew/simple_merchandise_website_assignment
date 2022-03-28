//version data here. 
//function where product selected is compiled to be sent through the headers
function selectProductData() {
	   var select = document.getElementById('productSelect');					//get element by id 'selectProd' and assign to variable select
	   var value = select.options[select.selectedIndex].value;					//get value of selected option and assign to variable value				
	   var data = "productSelect=" + encodeURI(value);						//data variable is assigned with the name of the selectProd element, and the uri-encoded value
           selectProduct(data);										//send selected product data
       	}

//function where product data is sent via xhr
function selectProduct(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  productsOverview(this.responseText);							//process the product overview response with this response text
               }
           } 			
           xhr.open("POST", "./php/productSelect.php", true);						//data is sent through POST to selectProduct.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
function productsOverview(data){						
	  document.getElementById('edit').innerHTML = "";						//clears out any existing values in the edit div
          document.getElementById('edit').innerHTML = data;						//inputs the xhr response data into the div
       }

//function that validates edit products input
function validateEdit() {						
            var inputs = document.getElementsByClassName("editForm");				//gets the element value of id 'loginPwd' and assigns it to variable Pwd
	    var replace = document.getElementById('replaceKeyword').value;				//gets the element value of id 'replaceKeyword' and assigns it to the variable replace
	    var add = document.getElementById('addKeyword').value;					//gets the element value of id 'replaceKeyword' and assigns it to the variable replace
	    var inputsFlag, keywordFlag = false; 							//initializes an inputs flag and a keyword flag and sets the values to false; 
	    var counter = 0;										//initializes counter with value 0

	    for(var i=0; i<inputs.length; i++) {							//loops through all input elements
		if(!(/\S/.test(inputs[i].value))) {								//if input value is empty
			counter++;									//counter increases by one
	   	}
	    }

            if (counter == inputs.length) {								//if counter value is equal to number of inputs elements
		alert("No fields have been filled."); 							//send an alert that no fields have been input
	    }
            else {
            	inputsFlag = true;									//else, inputs flag is set to true
            }

	    if((/\S/.test(replace)) && (/\S/.test(add))) {						//if replace and add variables both have values
		alert("You cannot replace and add keywords to the product at the same time!");		//send an alert to the user that they cannot replace and add keywords at the same time 
	    }
	    else {
		keywordFlag = true; 									//else, set the keyword flag to true
	    }

	    if((inputsFlag) && (keywordFlag)) {								//if all flags are true
		editProductData();									//send edit product data
	    }
        }

//function where edit product inputs is compiled to be sent through the headers
function editProductData() {										
           var data = "prodName=" + encodeURI(document.getElementById('prodName').value);		//data variable is assigned with the name of the prodName element, and the uri-encoded value
	   data += "&prodDesc=" + encodeURI(document.getElementById('prodDesc').value);			//data variable is appended with the name of the prodDesc element and the uri-encoded value
	   data += "&qty=" + encodeURI(document.getElementById('qty').value);				//data variable is appended with the name of the qty element and the uri-encoded value
	   data += "&price=" + encodeURI(document.getElementById('price').value);			//data variable is appended with the name of the price element and the uri-encoded value
	   data += "&replaceKeyword=" + encodeURI(document.getElementById('replaceKeyword').value);	//data variable is appended with the name of the replaceKeyword element and the uri-encoded value
	   data += "&addKeyword=" + encodeURI(document.getElementById('addKeyword').value);		//data variable is appended with the name of the addKeyword element and the uri-encoded value
	   data += "&prodID=" + encodeURI(document.getElementById('prodID').value);			//data variable is appended with the name of the prodID element and the uri-encoded value
	   data += "&fabric=" + encodeURI(document.getElementById('fabric').value);			//data variable is appended with the name of the fabric element and the uri-encoded value
	   data += "&color=" + encodeURI(document.getElementById('color').value);			//data variable is appended with the name of the color element and the uri-encoded value
           editProducts(data);										//send edit product data
       	}

//function where login data is sent via xhr
function editProducts(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  editDeleteResponse(this.responseText);						//process the edit product response with this response text
               }
           } 			
           xhr.open("POST", "./php/productEdit.php", true);						//data is sent through POST to productEdit.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
function editDeleteResponse(data){						
	  document.getElementById('response').innerHTML = "";					//clears out any existing values in the response div
          document.getElementById('response').innerHTML = data;					//inputs the xhr response data into the div
       }

//function where edit product inputs is compiled to be sent through the headers
function deleteProductData() {	
	   var select = document.getElementById('productSelect');					//get element by id 'selectProd' and assign to variable select
	   var value = select.options[select.selectedIndex].value;					//get value of selected option and assign to variable value				
	   var data = "productSelect=" + encodeURI(value);						//data variable is assigned with the name of the selectProd element, and the uri-encoded value
           deleteProduct(data);										//send delete product data
       	}

//function where login data is sent via xhr
function deleteProduct(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  editDeleteResponse(this.responseText);						//process the delete response with this response text
		  setTimeout(function(){								// calls for a function after a certain amount of time
           		location.reload(); 								// reloads the page
      		   }, 5000); 										// after 10 seconds

               }
           } 			
           xhr.open("POST", "./php/productDelete.php", true);						//data is sent through POST to productDelete.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function that validates edit products input
function validateAdd() {						
            var inputs = document.getElementsByClassName("addForm");				//gets the element value of id 'loginPwd' and assigns it to variable Pwd
	    var counter = 0;										//initializes counter with value 0

	    for(var i=0; i<inputs.length; i++) {							//loops through all input elements
		if(/\S/.test(inputs[i].value)) {								//if input value is empty
			counter++;									//counter increases by one
	   	}
	    }

            if (counter != inputs.length) {								//if counter value is equal to number of inputs elements
		alert("Please fill all fields"); 							//send an alert that no fields have been input
	    }
	    else {
		addProductData();									//send product data
	    }
        }

//function where edit product inputs is compiled to be sent through the headers
function addProductData() {										
           var data = "addName=" + encodeURI(document.getElementById('addName').value);			//data variable is assigned with the name of the addName element, and the uri-encoded value
	   data += "&addDesc=" + encodeURI(document.getElementById('addDesc').value);			//data variable is appended with the name of the addDesc element and the uri-encoded value
	   data += "&addQty=" + encodeURI(document.getElementById('addQty').value);			//data variable is appended with the name of the addQty element and the uri-encoded value
	   data += "&addPrice=" + encodeURI(document.getElementById('addPrice').value);			//data variable is appended with the name of the addPrice element and the uri-encoded value
	   data += "&addNewKeyword=" + encodeURI(document.getElementById('addNewKeyword').value);	//data variable is appended with the name of the addNewKeyword element and the uri-encoded value
	   data += "&addColor=" + encodeURI(document.getElementById('addColor').value);			//data variable is appended with the name of the addColor element and the uri-encoded value
	   data += "&addFabric=" + encodeURI(document.getElementById('addFabric').value);		//data variable is appended with the name of the addFabric element and the uri-encoded value
           addProduct(data);										//send login data
       	}

//function where login data is sent via xhr
function addProduct(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if the status is successful
                  addProdResponse(this.responseText);							//process the add product response with this response text
		  setTimeout(function(){								// calls for a function after a certain amount of time
           		location.reload(); 								// reloads the page
      		   }, 5000); 										// after 5 seconds

               }
           } 			
           xhr.open("POST", "./php/productAddNew.php", true);						//data is sent through POST to productAddNew.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");
           xhr.send(data);										//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
function addProdResponse(data){						
	  document.getElementById('add-response').innerHTML = "";					//clears out any existing values in the add-response div
          document.getElementById('add-response').innerHTML = data;					//inputs the xhr response data into the div
       }
