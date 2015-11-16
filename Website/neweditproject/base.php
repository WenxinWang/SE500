<?php

if(isset($_POST['submit'])){
	createProject();
}

/* session_start(); */
function createProject()
{

echo "New record created successfully";
/*
$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db("SE500spr", $con);

$Title = $_POST['Title']; 
$Description = $_POST['Description'];
  
  
  $query = "
  INSERT INTO Projects (Project_Name, Project_Description) VALUES ('$Title',
        '$Description')";
		
	
	if (mysqli_query($con, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

	
	mysqli_close($con);
	*/
}
?>