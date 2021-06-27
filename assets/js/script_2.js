$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: 6000, //Set AutoPlay to 3 seconds
      items :4,
    navigation : true,
    navigationText : ["prev","next"],
      itemsDesktop : [1199,3],
	  
      itemsDesktopSmall : [979,3]
 
  });
 $(".next").click(function(){
    owl.trigger('owl.next');
  });
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  });

$(function() {
    // setTimeout() function will be fired after page is loaded
    // it will wait for 5 sec. and then will fire
    // $("#myMessage").hide() function
	//$('#successMessage').fadeIn('slow').delay(5000).fadeOut('slow');
    /*setTimeout(function() {$("#successMessage").fadeOut('slow')}, 5000);*/
});
});