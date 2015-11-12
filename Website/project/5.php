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


//$result =  mysql_query("SELECT Project_Description FROM $dbName WHERE Project_ID='21'";)or die('error12321'.mysql_error);
$sql = "SELECT Project_ID, Project_Description, Project_Name FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Rating_Total ASC";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
else
	echo "you jie guo de shu chu cuo le ";

while ($row = mysqli_fetch_row($result)) {
    {
		echo "Project_ID: $row['Project_ID']\n";
		echo "Project_Description: $row['Project_Description']\n";
		echo "Project_Name: $row['Project_Name']\n";
	}
}
?>