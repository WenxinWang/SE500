<?php


if(isset($_POST['submit'])){
	echo "RatingUpdate";
    $Project=$_GET["ID"];
	UpdateRating();
    echo $Project;
}

/* session_start(); */
function UpdateRating()
{


$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db("SE500spr", $con);

$Value = $_POST['Rating']; 

  
  
  $query = "
  UPDATE Projects SET Rating_Total AS (Rating_Total + $Value) AND Number_of_Ratings AS (Number_of_Ratings + 1) WHERE Project_ID = .$Project";
		
	
	if (mysqli_query($con, $query)) {
    header("Location:project.php?ID='$Project'");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}

	
	mysqli_close($con);
	
}
?>
