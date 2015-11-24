<?php


include('../include/session.php');

if(isset($_POST['submit'])){
	echo "New record created successfully";
	createProject();
}

/* session_start(); */
function createProject()
{


$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }

mysqli_select_db("SE500spr", $con);
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
  $filename = mysql_escape_string(file_get_contents($_FILES['file']['tmp_name']));
$filetype=$_FILES['file']['type'];//这里填入图片类型
$Title = $_POST['Title']; 
  $sql="INSERT INTO $dbName (Project_ID, Project_Name, Project_Description, Source_Code, type1)
VALUES
('$_POST[Project_ID]','$_POST[Project_Name]','$_POST[Project_Description]','$filename','$filetype')";//数据插入到数据库test表中
$search_query = mysqli_query($con, $sql);
if (!$search_query) 
    echo "beng";
else 
	echo "hao";
  
	mysqli_close($con);
	
}
?>