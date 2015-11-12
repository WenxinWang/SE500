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
//$result =  mysql_query("SELECT Project_Description FROM $dbName WHERE Project_ID='21'";)or die('error12321'.mysql_error);

echo "<table border='1'>
<tr>
<th>Project_ID</th>
<th>Project_Name</th>
</tr>";

print_r(mysqli_fetch_array($search_query));


mysql_close($con);
?>
}