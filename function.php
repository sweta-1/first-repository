<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'task');
class DB_con
{
function __construct()
{
$con = mysqli_connect('localhost','root','','task');
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}

// for username availblty
public function usernameavailblty($firstname) {
$result =mysqli_query($this->dbh,"SELECT firstname FROM tbl_task WHERE firstname='$firstname'");

return $result;

}

// Function for registration
public function registration($firstname,$lastname,$uemail,$phoneno,$dob,$pasword,$userType)
{
$ret=mysqli_query($this->dbh,"insert into tbl_task (firstname,lastname, email,phoneno,dob,password,role) values('$firstname','$lastname', '$uemail','$phoneno','$dob','$pasword', '$userType')");
$last_id = mysqli_insert_id($this->dbh);
return $ret;
}

// Function for signin
public function signin($email,$pasword)
{	

$result=mysqli_query($this->dbh,"SELECT * from tbl_task   where email='$email' and password='$pasword'");
return $result;
}
// Function for Login Status Change for first time user

// Function for Profile
public function get_profile($email)
{
$result=mysqli_query($this->dbh,"select * from tbl_task where email='$email'");
return $result;
}

// Function for Profile List by user Type
public function get_profile_by_user_type($usertype){
	

	$result=mysqli_query($this->dbh,"SELECT * from tbl_task where role='student'");
return $result;
}


}
?>