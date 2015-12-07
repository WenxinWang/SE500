<?php
// The Session Header allows for identification of users (or identification that no one is logged in) without redirecting unauthorised users.
include('../include/session.php');
if(isset($_POST['submit'])){
	echo "RatingUpdate";
    
   
	UpdateRating(); // Execute the update Rating Function
    
}
/* session_start(); */
function UpdateRating()
{
    // Connect to database
$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");
if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }
mysqli_select_db("SE500spr", $con);
    // Get variables from project.php page
$Value = $_POST['Rating']; 
$Project=$_GET["ID"];
   echo $Project;
  // Prefill query Query will add 1 to the total ratings, and add the rated value to the rating accumulation.Project Rating is therefore Rating_Total / Number of Ratings.
  $query = "UPDATE Projects SET Rating_Total = (Rating_Total + $Value), Number_of_Ratings = (Number_of_Ratings + 1) WHERE Project_ID = $Project";
		
	 	
	
	if (mysqli_query($con, $query)) {
    header("Location:project.php?ID='$Project'");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
}
	
	mysqli_close($con);
	
}
?>