<?php
session_start();
include_once('function.php');
$userProfile=new DB_con();
$result=$userProfile->get_profile($_SESSION['email']);
$finalResult=mysqli_fetch_array($result);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="Welcome">
    <div class="row">
      <div class="col-sm-12" style="background:#333;height:50px;"> </div>
      <?php include("includes/sidebar.php");?>
      <div class="col-sm-9">
        <h2 align="center">Teacher Dashboard : <?php echo $_SESSION['firstname']=$finalResult['firstname'];?> </h2>
        <div class="row">
          <div class="col-sm-12">
            <?php if(isset($_SESSION['msg']) && $_SESSION['msg']!=""){
      echo $_SESSION['msg'];
      }?>
          </div>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-sm-8">
              <div class="profile">
                <div class="form-group">
                  <label for="fname">FirstName</label>
                  <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $finalResult['firstname'];?>" required>
                </div>
                

 <div class="form-group">
                  <label for="fname">LastName</label>
                  <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $finalResult['lastname'];?>" required>
                </div>
               


                <div class="form-group">
                  <label for="userEmail">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo $finalResult['email'];?>" required>
                </div>
                
                              
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
