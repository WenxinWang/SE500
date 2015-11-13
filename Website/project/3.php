<form action="3.php" method="post">

Project_ID: <input type="text" name="Project_ID" />
Project_Name: <input type="text" name="Project_Name" />
Project_Description: <input type="text" name="Project_Description" />
Project_Requirements: <input type="text" name="Project_Requirements" />
<input type="submit" />
</form>
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
$sql="INSERT INTO $dbName (Project_ID, Project_Name, Project_Description，Project_Requirements)
VALUES
('$_POST["Project_ID"]','$_POST["Project_Name"]','$_POST["Project_Description"]','$_POST["Project_Requirements"]')";
$search_sql = "SELECT Project_ID, Project_Description, Project_Name FROM $dbName WHERE Project_ID LIKE '21'";
$search_query = mysqli_query($con, $search_sql);
if (!$search_query) 
    echo "beng";
else 
	echo "hao";
while ($row = mysqli_fetch_row($search_query))
{
	echo $row[0];
	echo $row[1];
	echo $row[2];
	echo $row[3];
}
//$result =  mysql_query("SELECT Project_Description FROM $dbName WHERE Project_ID='21'";)or die('error12321'.mysql_error);
//$sql = "SELECT Project_ID, Project_Description, Project_Name FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Rating_Total ASC";
//$result = mysqli_query($con, $sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysqli_fetch_row($result)) {
    echo "Table: $row[0]\n";
	echo "Table: $row[1]\n";
	echo "Table: $row[2]\n";
}
?>