<?php
$dbName="Projects";

	
	//$conn=mysqli_connect($serverName, $userName, $password);	//create connection
	$con = mysql_connect("localhost","spr_erau","asdf");

if (!$con)
  {
    die('Could not connect: ' . mysql_connect_error());
  }
else {
echo " succeded logging into the database!"; 
}
mysql_select_db("SE500spr", $con);

if (!$con){		//check connection
			die("Connection failed: " . mysql_error());
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

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Project_ID'] . "</td>";
  echo "<td>" . $row['Project_Name'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
}