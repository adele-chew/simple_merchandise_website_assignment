//version 5.0 1/8 3.30AM
//function to retrieve cart from catalogue page
function getCart() {
	   var cartQty = document.getElementsByClassName("cartQty")						//assign elements with class name 'qty' to variable qty; number inputs for all products in the 'quantity' column of the catalogue
	   var data = "";										//initialize data variable
           for(i = 0; i < cartQty.length; i++) {								//loops through all qty elements
		if(cartQty[i].value > 0) {									//if the element has a value greater than zero
			if(data.length == 0) {								//and if the data length has not been filled
				data = encodeURI(cartQty[i].name)+"=" + encodeURI(cartQty[i].value);		//the data variable is assigned to the name of the element and uri-encoded value of the element
			}		
			else {										//if the data length has been filled
				data += "&"+encodeURI(cartQty[i].name)+"=" + encodeURI(cartQty[i].value);	//the name of the element and the uri-encoded value of the element is appended to the existing data string
			}
		}
	   }
	   getCartData(data);										//send data function is called
       	}

function getCartData(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if status successful
                  cartRetrieveResponse(this.responseText);						//process the cart response
               }
           } 
           xhr.open("POST", "./php/cartRetrieve.php", true);						//data is sent through POST to cartRetrieve.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");							
           xhr.send(data);										//sends data via xhr
       }

//function where the response from xhr is processed and outputted to webfront
function cartRetrieveResponse(data){									
	  document.getElementById('shoppingCart').innerHTML = "";					//clears out any existing values in the shoppingCartdiv
          document.getElementById('shoppingCart').innerHTML = data;					//inputs the xhr response data into the div
       }

//function to process the cart order
function sendOrderConfirmation() {
	   var order = document.getElementsByClassName("cartOrder");						//assign elements with class name 'order' to variable qty; number inputs for all products in the 'quantity' column of the catalogue	 
	   var data = "";											//initialize data variable
           for(var i = 0; i < order.length; i++) {								//loops through all qty elements
		if(data.length == 0) {										//and if the data length has not been filled
				data = encodeURI(order[i].name)+"=" + encodeURI(order[i].value);		//the data variable is assigned to the name of the element and uri-encoded value of the element
		}		
		else {												//if the data length has been filled
				data += "&"+encodeURI(order[i].name)+"=" + encodeURI(order[i].value);		//the name of the element and the uri-encoded value of the element is appended to the existing data string
		}
	   }
	   data += "&confirmTotalPrice="+encodeURI(document.getElementById('confirmTotalPrice').innerHTML);
	   sendOrderData(data);										//send data function is called
}

function sendOrderData(data){
           var xhr = new XMLHttpRequest();								//initializes a new xhr variable
           xhr.onreadystatechange = function(){								//when ready
               if (this.readyState === 4 && this.status === 200) {					//if status successful
                  orderResponse(this.responseText);							//process the cart response
               }
           } 
           xhr.open("POST", "./php/cartOrderConfirmation.php", true);						//data is sent through POST to cartOrderConfirmation.php
           xhr.setRequestHeader("Content-type", 							//sets request headers to be uri encoded
                "application/x-www-form-urlencoded");							
           xhr.send(data);										//sends data via xhr
}

//function where the response from xhr is processed and outputted to webfront
function orderResponse(data){									
	  document.getElementById('orderConfirmation').innerHTML = "";					//clears out any existing values in the orderConfirmation div
          document.getElementById('orderConfirmation').innerHTML = data;				//inputs the xhr response data into the div
       }
