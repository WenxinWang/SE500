<?php


include('../include/session.php');

if(isset($_POST['submit'])){
	echo "New record created successfully";
	createProject($UserId);
}

/* session_start(); */
function createProject($UID)
{


$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db("SE500spr", $con);

$Title = $_POST['Title']; 
$Description = $_POST['Description'];
$Authors = $_POST['Authors'];
  
  
  $query = "
  INSERT INTO Projects (Project_Name, Project_Description, Uploader, Date_Uploaded, Group_Members) VALUES ('$Title',
        '$Description', '$UID', now(), '$Authors')";
		
	
	if (mysqli_query($con, $query)) {
    header("Location:../index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

	
	mysqli_close($con);
	
}
?>
