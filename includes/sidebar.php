<div class="col-sm-3 sidebar" >
  <ul class="">
   
    <li> <a href="teacherdashboard.php">Profile</a></li>
    <?php if($finalResult['user_type'] = 'student'){?>
   
    <?php }if($finalResult['user_type'] = 'teacher'){?>
    <li> <a href="student-list.php">student List</a></li>
    <?php }?>
    <li> <a href="logout.php">Logout</a></li>
  </ul>
</div>
