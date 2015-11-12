
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
$result =  "SELECT * FROM $dbName WHERE Project_Name LIKE 't%'";
?>