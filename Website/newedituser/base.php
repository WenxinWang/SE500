<?php


/*
When form submitted, start function "createUSer"
*/
if(isset($_POST['submit'])){
	createUser();
}

/* Function that create an user */
function createUser()
{

//Connection to the database with "host,username,password,dbname"
$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

//if connection failed, stop and print error statement
if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

//Select database
mysqli_select_db("SE500spr", $con);

//Get info from the form
$First_Name = $_POST['FirstName']; //Take "name" from the form
$Last_Name = $_POST['Last-Name'];
$Email = $_POST['Email'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Description = $_POST['Blurb'];
$University = $_POST['University'];
  
  //SQL query for the database to insert a new project
  $query = "
  INSERT INTO Users (First_Name, Last_Name, Email, Username,
         Password, User_Description, University) VALUES ('$First_Name',
        '$Last_Name', '$Email', '$Username', '$Password', '$Description', '$University')";
		
	//Run the query
	if (mysqli_query($con, $query)) {
	header("Location:../index.php");
} else {
//if failed, print error statement
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

	//Close connection
	mysqli_close($con);
	
}
?>
