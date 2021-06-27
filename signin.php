<?php
session_start();
include_once('function.php');
$usercredentials=new DB_con();
if(isset($_POST['signin']) && $_POST['signin']!="")
{
$email=$_POST['email'];
$pasword=$_POST['password'];
$ret=$usercredentials->signin($email,$pasword);
$num=mysqli_fetch_assoc($ret);
// print_r($num); die;
if(sizeof($num)>0)
{
  $_SESSION['uid']=$num['id'];
  $_SESSION['email']=$num['email'];
  $_SESSION['role'] = $num['role'];
  if($_SESSION['role'] == 'teacher'){
    echo "<script>window.location.href='teacherdashboard.php'</script>";
  }elseif ($_SESSION['role'] == 'student') {
    echo "<script>window.location.href='studentdashboard.php'</script>";
    
  }
}
else

{
echo "<script>alert('Invalid details. Please try again');</script>";
echo "<script>window.location.href='signin.php'</script>";
}
}

// if(isset($_SESSION['uid']) && $_SESSION['uid']!="")
// {
//   header('location:welcome.php');
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>User Registraion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="Signin">
    <legend class=" text-center">User Signin</legend>
    <div class="row">
      <div class="col-sm-4 offset4">
        <form class="form-horizontal" action='' method="POST">
          <div class="control-group"> 
            <!-- Fullname -->
            <label class="control-label"  for="Firstname">Email</label>
            <div class="">
              <input type="text" id="firstname" name="email" placeholder="" class="form-control" required="true">
            </div>
          </div>
          <div class="control-group"> 
            <!-- Password-->
            <label class="control-label" for="password">Password</label>
            <div class="controls">
              <input type="password" id="password" name="password" placeholder="" class="form-control" required="true">
            </div>
          </div>
          <div class="control-group"> 
            <!-- Button --> 
            <br/>
            <div class="controls">
              <input class="btn btn-success" type="submit" name="signin" value="Signin">
            </div>
          </div>
          <div class="control-group"> 
            <!-- Button -->
            <div class="controls"> Not Registered yet? <a href="index.php">Register Here</a> </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
