<?php
$dbName="Projects";

	
	//$conn=mysqli_connect($serverName, $userName, $password);	//create connection
	$con = mysqli_connect("localhost","spr_erau","asdf","SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysql_connect_error());
  }
else {
echo " succeded logging into the database!"; 
}
$db=mysqli_select_db($con, "SE500spr");

if (!$db){		//check connection
			die("failed to connect SE500spr: " . mysql_error());
	}	
	else{
      echo " succededed logging into the SE500spr database!";  
    } 
$result = "SELECT Project_ID,Project_Name,  FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Rating_Total ASC";
$search_query = mysqli_query($con, $result);
// Numeric array
$row=mysqli_fetch_array($search_query,MYSQLI_NUM);
printf ("%s (%s)n",$row[0],$row[1]);

// Associative array
while($row=mysqli_fetch_array($search_query,MYSQLI_ASSOC))
{
	printf ("%s (%s)\n",$row["Project_Name"],$row["Project_ID"]);
}
// Free result set
mysqli_free_result($search_query);

mysqli_close($con);

?>
}