<?php



if(isset($_POST['submit'])){
	echo "New record created successfully";
	createUser();
}

/* session_start(); */
function createUser()
{


$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db("SE500spr", $con);

$First_Name = $_POST['FirstName']; //Take "name" from the form
$Last_Name = $_POST['LastName'];
$Email = $_POST['Email'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];

//echo "Data", $First_Name, $Last_Name;
/*
 SQL injection

$users_name = mysql_real_escape_string($users_name);
  $users_email = mysql_real_escape_string($users_email);
  $users_website = mysql_real_escape_string($users_website);
  $users_comment = mysql_real_escape_string($users_comment);*/
  
  
  $query = "
  INSERT INTO Users (First_Name, Last_Name, Email, Username,
         Password) VALUES ('$First_Name',
        '$Last_Name', '$Email', '$Username', '$Password')";
		
		//$First_Name,
        //$Last_Name, $Email, $Username, $Password)";
	//mysqli_query($query);
	
	if (mysqli_query($con, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

	
	mysqli_close($con);
	
}
?>