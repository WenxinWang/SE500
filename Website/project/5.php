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
$sql = "SELECT * FROM $dbName WHERE Project_Id = '36' ";
$result = mysqli_query($con, $sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
else
	echo "you dong xi";

while ($row = mysqli_fetch_object($result)); 
    //echo "$row[0]\n";
	//echo $row->Project_ID;
	//echo $row->Project_Name;
	//echo $row->Project_Description;
	$type= $row->type1;
	Header("Content-type: $row->type1"); 
//ob_clean(); //防止php将utf8的bom头输出
	echo $row->Source_Code;

?>