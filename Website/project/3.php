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
//$result =  mysql_query("SELECT Project_Description FROM $dbName WHERE Project_ID='21'";)or die('error12321'.mysql_error);
while ($row = mysql_fetch_row($result)){
foreach($row as $data){
    echo $data.' ';
}
    echo '<br>';
}
$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Rating_Total ASC";
$search_query = mysqli_query($con, $search_sql);
while ($row = mysql_fetch_row($search_query)){
foreach($row as $data){
    echo $data.' ';
}
    echo '<br>';
}