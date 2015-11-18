<?php
$dbName="Projects";

	
	//$conn=mysqli_connect($serverName, $userName, $password);	//create connection
	$con = mysqli_connect("localhost","spr_erau","asdf","SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysql_connect_error());
  }
$db=mysqli_select_db($con, "SE500spr");
if (!$db){		//check connection
			die("failed to connect SE500spr: " . mysql_error());
	}	
//$result =  mysql_query("SELECT Project_Description FROM $dbName WHERE Project_ID='21'";)or die('error12321'.mysql_error);
$sql = "SELECT Source_Code FROM $dbName WHERE Project_Id LIKE '36' ORDER BY Rating_Total ASC";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

header("Content-type:image/jpeg'"); 
header("Content-Transfer-Encoding: binary"); 
ob_clean(); //防止php将utf8的bom头输出
while ($row = mysqli_fetch_object($result)) {
    echo $row['Source_Code'];
}
?>