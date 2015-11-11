<?php
$Table="Projects";
	
	//$conn=mysqli_connect($serverName, $userName, $password);	//create connection
	$con = mysqli_connect("localhost","spr_erau","asdf");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }
else {
echo " succeded logging into the database!"; 
}
mysqli_select_db("SE500spr", $con);




$sql="INSERT INTO $Table (Project_ID, Project_Name, Project_Description,Project_Requirements)
VALUES
('$_POST[Project_ID]','$_POST[Project_Name]','$_POST[Project_Description]','$_POST[Project_Requirements]')";

if (!mysql_query($sql,$con))
  {
  echo "Could not successfully run query ($search_query) from database"  . mysql_error());
  echo mysql_error();
  }
echo "1 record added";

mysql_close($con)
?>