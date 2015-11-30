<?php


include('../include/session.php');
/*
When form submitted, start function "createProject" with the correct User ID
*/
if(isset($_POST['submit'])){
	echo "New record created successfully";
	createProject($UserId);
}

/* Function that create a project */
function createProject($UID)
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
$Title = $_POST['Title']; 
$Description = $_POST['Description'];
$Authors = $_POST['Authors'];
  
 //SQL query for the database to insert a new project
  $query = "
  INSERT INTO Projects (Project_Name, Project_Description, Uploader, Date_Uploaded, Group_Members) VALUES ('$Title',
        '$Description', '$UID', now(), '$Authors')";
		
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
