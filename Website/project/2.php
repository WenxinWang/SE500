
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

、

if (!$db){		//check connection
			die("failed to connect SE500spr: " . mysql_error());
	}	
	else{
      echo " succededed logging into the SE500spr database!";  
    } 
	
}
$result = mysqli_query("SELECT * FROM $dbName");
while($row = mysqli_fetch_array($result))
{ if(!$row){ echo "$dbName不存在！"; } else{ echo "$dbName存在！"; } 
}
mysql_close($con);
//$result =  "SELECT * FROM $dbName WHERE Project_Name LIKE 't%'";
//$search_query = mysqli_query($con, $search_sql);
?>