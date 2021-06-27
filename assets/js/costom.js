var baseURL='https://www.clearancegrafters.com/';
$(function(){
 var url = window.location.pathname;  
 var activePage = url.substring(url.lastIndexOf('/')+1);
$('.nav li a').each(function(){  
var currentPage = this.href.substring(this.href.lastIndexOf('/')+1);
if (activePage == currentPage) {
$(this).parent().closest('li.dropdown').addClass('active'); 
} 
});

//alert(url.indexOf('reviewDetail'));
if(url.indexOf('customerReviews')>-1)
{
$(".navbar-nav li:first").addClass("active");	
}

if(url.indexOf('productDetails')>-1)
{
$( "ul.navbar-nav li:nth-child(4)").addClass("active");	
}

if(url=='/')
{
$( "ul.navbar-nav li:nth-child(1)").addClass("active");	
}

 })
 /*=================================*/
 $(".dropdown-menu li").hover(function(){
  $(this).parent().closest('li.dropdown').addClass('active2');
},function(){
  $(this).parent().closest('li.dropdown').removeClass('active2');
});
/*=================For Popup================*/ 

$(document).ready(function() {
//$('#popupPages').fadeOut(10000);

setTimeout(function(){
    $("#popupPages").fadeOut(400);
}, 10000);

 // 5 seconds x 1000 milisec = 5000 milisec
$('#IdCloase').click(function () {
$('#popupPages').fadeOut();	
})
});
/*=================For Popup================*/ 

