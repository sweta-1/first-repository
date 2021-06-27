<?php
session_start();
include_once('function.php');
$userProfile=new DB_con();
$result=$userProfile->get_profile($_SESSION['email']);
$finalResult=mysqli_fetch_assoc($result);
if($finalResult['role']=='student' ){
	echo "<script>window.location.href='welcome.php'</script>";die;
}
$userType='student';
$result2=$userProfile->get_profile_by_user_type($userType);
if(strlen($_SESSION['uid'])=="")
{
  header('location:logout.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Student Page</title>
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
        <h3>Student List</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>S No.</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Role</th>   
            
            </tr>
          </thead>
          <tbody>
            <?php 
	$sk=1;
	while($finaluserListResult=mysqli_fetch_assoc($result2)){
		//echo "<pre>";print_r($finaluserListResult);
		?>
            <tr>
              <td><?php echo $sk;?></td>
              <td><?php echo $finaluserListResult['firstname'];?></td>
              <td><?php echo $finaluserListResult['email'];?></td>
              <td><?php echo $finaluserListResult['lastname'];?></td>

              <td><?php 
		if ($finaluserListResult['role']=='student'){
		echo "student";
		}elseif ($finaluserListResult['role']=='teacher'){
			echo "teacher";
		}?>
                <br/>
  
            </tr>
            <?php $sk++;}?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function  userStatusChange(data1, data2) {
	//alert(data1 + data2);return false;
  $.ajax({
  type: "POST",
  url: "changeStatus.php",
  data:{userId:data1, user_status:data2},
  success: function(data){
	  window.location.href='manager-list.php';
  }
  });

}
function changeUserType(data1, data2) {
	//alert(data1 + data2);return false;
  $.ajax({
  type: "POST",
  url: "cangeUserType.php",
  data:{userId:data1, userType:data2},
  success: function(data){
	  window.location.href='manager-list.php';
  }
  });

}
function deletUser(data1) {
  $.ajax({
  type: "POST",
  url: "deletUser.php",
  data:{userId:data1},
  success: function(data){
	  window.location.href='manager-list.php';
  }
  });

}
</script>
</body>
</html>