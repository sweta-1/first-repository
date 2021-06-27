var baseURL="https://www.clearancegrafters.com/";
//==========Quote=========
function processQuote()
{
  var name = $('#names').val();
  var email = $('#email').val();
  var city1 = $('#city1').val();
  var city2 = $('#city2').val(); 
  var message = $('#message').val();

  if(name=='')
  {
	  $('#names').addClass('has-error');
	  $('#names').attr('placeholder','Enter your name');
	  $("html, body").animate({ scrollTop: jQuery('#names').offset().top -100 }, 1000);
	  return false;
  }
  if(email=='')
  {
	  $('#email').addClass('has-error');
	  $('#email').attr('placeholder','Enter your email');
	  $("html, body").animate({ scrollTop: jQuery('#email').offset().top -100 }, 1000);
	  return false;
  }else
  {
	var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(!regex.test(email)) 
	{
	 $('#email').addClass('has-error');
	 $('#email').val('');
	 $('#email').attr('placeholder','Enter a valid email');
	 $("html, body").animate({ scrollTop: jQuery('#email').offset().top -100 }, 1000);
	 return false;
   }
  }
   
  if(city1=='')
  {
	  $('#city1').addClass('has-error');
	  $("html, body").animate({ scrollTop: jQuery('#city1').offset().top -100 }, 1000);
	  return false;
  }
 if(city2=='')
 {
   $('#city2').addClass('error');
   $("html, body").animate({ scrollTop: jQuery('#city2').offset().top -100 }, 1000);
   return false;
 }

 if(city1 == city2)
 {
   alert('Please select different city');
   $('#city2').addClass('has-error');
   $("html, body").animate({ scrollTop: jQuery('#city2').offset().top -100 }, 1000);
   return false;
 }
// $("#Quote_form" ).submit();
$('#Quote_form').prop('disabled',true);
$.ajax({
	type:"POST",
	url:baseURL+"index.php/Front/processQuote",
	dataType:'text',
	data:{name:name,email:email,city1:city1,city2:city2,message:message},
	success:function(res)
{
	if(res==="success")
{
	alert("Thank you for contacting Clearance Grafters. We will get back to you very soon.");}
else
{
	alert("Something went wrong, please try again");
	$('#Quote_form').prop('disabled',false);
	}
$('.form-control').removeClass('has-error');
document.getElementById("Quote_form").reset();
location.reload();
}
});
}
$("#names").focus(function(){
$("#names").removeClass("has-error");
});
$("#email").focus(function(){
$("#email").removeClass("has-error");
});
$("#city1").focus(function(){
$("#city1").removeClass("has-error");
});
$("#city2").focus(function(){
$("#city2").removeClass("has-error");
});
$("#message").focus(function(){
$("#message").removeClass("has-error");
});
function demoprocessQuote()
{
	//alert("ssdasd");return false;
  var name = $('#names').val();
  var email = $('#email').val();
  var city1 = $('#city1').val();
  var city2 = $('#city2').val(); 
  var message = $('#message').val();
  if(name=='')
  {
	  $('#names').addClass('has-error');
	  $('#names').attr('placeholder','Enter your name');
	  $("html, body").animate({ scrollTop: jQuery('#names').offset().top -100 }, 1000);
	  return false;
  }
  if(email=='')
  {
	  $('#email').addClass('has-error');
	  $('#email').attr('placeholder','Enter your email');
	  $("html, body").animate({ scrollTop: jQuery('#email').offset().top -100 }, 1000);
	  return false;
  }else
  {
	var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(!regex.test(email)) 
	{
	 $('#email').addClass('has-error');
	 $('#email').val('');
	 $('#email').attr('placeholder','Enter a valid email');
	 $("html, body").animate({ scrollTop: jQuery('#email').offset().top -100 }, 1000);
	 return false;
   }
  }
   
  if(city1=='')
  {
	  $('#city1').addClass('has-error');
	  $("html, body").animate({ scrollTop: jQuery('#city1').offset().top -100 }, 1000);
	  return false;
  }
 if(city2=='')
 {
   $('#city2').addClass('has-error');
   $("html, body").animate({ scrollTop: jQuery('#city2').offset().top -100 }, 1000);
   return false;
 }

// $("#Quote_form" ).submit();
$('#Quote_form').prop('disabled',true);
$.ajax({
type:"POST",
url:baseURL+"index.php/Front/demoprocessQuote",
dataType:'text',
data:{name:name,email:email,city1:city1,city2:city2,message:message},
success:function(res){
if(res==="success"){
//$("html, body").animate({scrollTop:jQuery('#booappalert').offset().top-100},1000);
	//alert("Thank you for contacting Clearance Grafters. We will get back to you very soon.");
		$('#request_message_modal_response').text("Thank you for contacting Clearance Grafters. We will get back to you very soon.");
}else{
//$("html, body").animate({scrollTop:jQuery('#booappalert').offset().top-100},1000);
	//alert("Something went wrong, please try again");
	//$('#Quote_form').prop('disabled',false);
	$('#request_message_modal_response').text("Something went wrong, please try again");
}
//$('.request_message_modal').toggle();
$('.request_message_modal').fadeIn().delay(5000).fadeOut();
$('.form-control').removeClass('has-error');
document.getElementById("Quote_form").reset();
//location.reload();
}
});
}
//=========Contact====
function processContact()
{
	var name=$("#cnames").val();
	var email=$("#cemails").val();
	var phone=$("#cphone").val();
	var message=$("#cmessage").val();
	var g_recaptcha_response=$('#g-recaptcha-response').val();
	//alert(g_recaptcha_response);
	if(name=='')
{
	$('#cnames').addClass('has-error');
	$('#cnames').attr('placeholder','Enter Name')
$("html, body").animate({scrollTop:$('#cnames').offset().top-100},1000);return false;
}
if(email=='')
{
	$('#cemails').addClass('has-error');
	$('#cemails').attr('placeholder','Enter Email ID')
$("html, body").animate({scrollTop:$('#cemails').offset().top-100},1000);return false;
}
else
{
//var regex=/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var regex=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/
	if(!regex.test(email))
{
	$('#cemails').addClass('has-error');
	$('#cemails').val('');
	$('#cemails').attr('placeholder','Enter Valid Email ID')
$("html, body").animate({scrollTop:$('#cemails').offset().top-100},1000);return false;
}
}
if(phone=='')
{
	$('#cphone').addClass('has-error');
	$('#cphone').attr('placeholder','Phone Number')
$("html, body").animate({scrollTop:$('#cphone').offset().top-100},1000);return false;
}
if(message=='')
{$('#cmessage').addClass('has-error');
$('#cmessage').attr('placeholder','Enter Message')
$("html, body").animate({scrollTop:$('#cmessage').offset().top-100},1000);return false;
}
if(g_recaptcha_response=='')
{
	$('#G-captcha').fadeIn();
	$("html, body").animate({scrollTop:$('#G-captcha').offset().top-100},1000);return false;
	}
$('#submit_contact').prop('disabled',true);
$.ajax({type:"POST",
url:baseURL+"index.php/Front/processContact",
dataType:'text',
data:{name:name,email:email,phone:phone,message:message},
success:function(res)
{
 if(res=='success')
{
$("html, body").animate({scrollTop:jQuery('#booappalert').offset().top-100},1000);//location.reload();
	//alert("Thank you for contacting Clearance Grafters. We will get back to you very soon.");
}
else
{
	$("html, body").animate({scrollTop:jQuery('#booappalert').offset().top-100},1000);
	//alert("Something went wrong, please try again");$('#submit_contact').prop('disabled',false);
}
$('.form-control').removeClass('has-error');
document.getElementById("contact_form").reset();
location.reload();
}
});
}