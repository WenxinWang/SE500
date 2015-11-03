<?php

if(isset($_POST['submit'])){
	createUser();
}

/* session_start(); */
function createUser()
{


$con = mysqli_connect("localhost","root","ERAUsprSE500", "SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db("SE500spr", $con);

$First_Name = $_POST['FirstName']; //Take "name" from the form
$Last_Name = $_POST['LastName'];
$Email = $_POST['Email'];
$Username = $_POST['Username'];
//$University = $_POST['university'];
$Password = $_POST['Password'];

//echo "Data", $First_Name, $Last_Name;
/*
 SQL injection

$users_name = mysql_real_escape_string($users_name);
  $users_email = mysql_real_escape_string($users_email);
  $users_website = mysql_real_escape_string($users_website);
  $users_comment = mysql_real_escape_string($users_comment);*/
  
  
  $query = "
  INSERT INTO 'Users' ('First_Name', 'Last_Name', 'Email', 'Username',
         'Password') VALUES ('name',
        'last', 'mail@mail.com', 'username', 'password')";
		
		//$First_Name,
        //$Last_Name, $Email, $Username, $Password)";
	mysqli_query($query);
	
	mysqli_close($con);
	
}
?>