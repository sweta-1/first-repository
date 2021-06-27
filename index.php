<?php session_start();
// include Function  file
include_once('function.php');
// Object creation
$userdata=new DB_con();
if(isset($_POST['submit']))
{
	//echo "<pre>";print_r($_REQUEST);die;
// Posted Values
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$uemail=$_POST['email'];
$pasword=$_POST['password'];
$confirmpassword=$_POST['cnfpassword'];
$dob=$_POST['dob'];
//print_r($dob);die;
$phoneno=$_POST['phoneno'];
$userType=$_POST['userType'];

//Function Calling
$sql=$userdata->registration($firstname,$lastname,$uemail,$phoneno,$dob,$pasword,$userType);

if($sql)
{
// Message for successfull insertion
echo "<script>alert('Registration successfull.');</script>";
echo "<script>window.location.href='signin.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='signin.php'</script>";
}
}
if(isset($_SESSION['uid']) && $_SESSION['uid']!="")
{
  header('location:welcome.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="registration">
    <div id="legend" align="center">
      <legend class="">User Registration</legend>
    </div>
    <div class="row">
      <div class="col-sm-4 offset4">
        <form class="form-horizontal" action='' method="post">
          <fieldset>
            <div class="control-group"> 
        
              <label class="control-label"  for="username">User Type*</label>
              <div class="controls">
                <select name="userType" required class="form-control">
                  <option value="">Select user type</option>
                  <option value="student">Student</option>
                  <option value="teacher">Teacher</option>
                </select>
              </div>
            </div>
            <div class="control-group"> 
              <!-- firstname-->
              <label class="control-label"  for="username">FirstName</label>
              <div class="controls">
                <input type="text" id="username" name="firstname" placeholder="" class="form-control" required="true">
              </div>
            </div>
            <div class="control-group"> 
              <!-- lastname -->
              <label class="control-label"  for="username">LastName*</label>
              <div class="controls">
                <input type="text" id="firstname" name="lastname" onblur="checkusername(this.value)" class="form-control" required="true">
                <span id="usernameavailblty"></span> </div>
            </div>
            <div class="control-group"> 
              <!-- E-mail -->
              <label class="control-label" for="email">E-mail*</label>
              <div class="controls">
                <input type="email" id="email" name="email" placeholder="" class="form-control" required="true" >
                <span id="useremailavailblty"></span> </div>
            </div>
            <div class="control-group"> 
              <!-- Password-->
              <label class="control-label" for="password">Password*</label>
              <div class="controls">
                <input type="password" id="passwords" name="password" placeholder="" class="form-control" required="true">
              </div>
            </div>
            <br/>

             <div class="control-group"> 
              <!-- Password-->
              <label class="control-label" for="password">ConfirmPassword*</label>
              <div class="controls">
                <input type="password" id="cnfpassword" name="cnfpassword" placeholder="" class="form-control" required="true">
              </div>
            </div>
            <br/>
             <div class="control-group"> 
              <!-- Password-->
              <label class="control-label" for="phone">Phoneno</label>
              <div class="controls">
                <input type="number" id="phoneno" name="phoneno" placeholder="" class="form-control" required="true">
              </div>
            </div>
            <br/>


              <div class="control-group"> 
              <!-- Password-->
              <label class="control-label" for="dob">DOB</label>
              <div class="controls">
                <input type="date" id="dob" name="dob" placeholder="" class="form-control" required="true">
              </div>
            </div>
            <br/>

            <div class="control-group"> 
              <!-- Button -->
              <div class="controls">
                <button class="btn btn-success" type="submit" id="submit" name="submit"    

onclick="return Validate()"
                >Register</button>
              </div>
            </div>
            <div class="control-group">
              <div class="controls"> Already registered <a href="signin.php">Signin</a> </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script type="text/javascript">

 $(function () {
        $("#submit").click(function () {
            var password = $("#passwords").val();
            var confirmPassword = $("#cnfpassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            
            return true;
        });
    });
  </script>
</html>
