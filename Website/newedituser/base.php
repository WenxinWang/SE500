<?php

if(isset($_POST['submit'])){
	createUser();
}

/* session_start(); */
function createUser()
{

/*mysql_connect() or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());

$con = mysql_connect("192.168.1.128/phpmyadmin","spr_erau","$PRfall2015@ERAU");

if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

mysql_select_db("SE500spr", $con);

$First_Name = $_POST['first_name']; //Take "name" from the form
$Last_Name = $_POST['last_name'];
$Email = $_POST['email'];
$Username = $_POST['username'];
$University = $_POST['university'];
$Password = $_POST['password'];

 SQL injection

$users_name = mysql_real_escape_string($users_name);
  $users_email = mysql_real_escape_string($users_email);
  $users_website = mysql_real_escape_string($users_website);
  $users_comment = mysql_real_escape_string($users_comment);
  
  
  $query = "
  INSERT INTO `SE500`.`Users` (`first_name`, 'last_name', `email`, `username`,
        `favorited_project`, `uploaded_project`, `university`, `password`) VALUES ('$First_Name',
        '$Last_Name', '$Email', '$Username', NULL, NULL,
        $University, '$Password');";
		
	mysql_query($query);
	
	mysql_close($con);*/
	echo "Hello";
}
?>