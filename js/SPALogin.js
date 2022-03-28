//version 5.0 1/8 3.30AM
var page = ["#user", "#register", "#staff"];		//value is set as the article id
var curPage = page[0];					//current page follows the first article in the page

$(document).ready(function(){
   var newPage = getPage(window.location.hash);		//if the url#hash changes, render the corresponding <article>
   render(newPage);

   $('.loginPages').click(function(e){			//all <a> elements within the SPA are tagged with class = 'loginPages'
       e.preventDefault();				//on click prevent default 
       var newPage = $(this).attr('href');		//the new page will be this element
       window.location.hash=newPage;			//changes url
   });
   
   $(window).on('hashchange', function(){		//when url#hash changes
       var newPage = getPage(window.location.hash);	//if the url#hash changes, render the corresponding <article>
       render(newPage);					
   });

});

function render(newPage){				
    if (newPage == curPage) return;			//if the hash is same with the current page, dont do anything
    $(curPage).hide();					//else, hide the current <article>
    $(newPage).show();					//show the new <article>
    curPage = newPage; 					//the curPage variable becomes the newPage variable
}

function getPage(hash){
   var i = page.indexOf(hash);				//i is the index of the hash of each <article>
   if (i<0 && hash != "") window.location.hash=page[0]; //if i is less than zero, and the hash is not empty, then assign url#hash to page[0]
   return i < 1 ? page[0] : page[i];			//return page 0 if i is less than 1, else, return page i
}

