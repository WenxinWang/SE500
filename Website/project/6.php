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

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
$filename="$_FILES["file"]["tmp_name"]" //这里填入图片路径 
$COMPRESS_CONTENT = addslashes(fread(fopen($filename, "r"), filesize($filename)));//打开文件并规范化数据存入变量$data中

//展示：


$sql="INSERT INTO $dbName (Source_Code)
VALUES
('$COMPRESS_CONTENT'))";//数据插入到数据库test表中
$search_query = mysqli_query($con, $sql);
if (!$search_query) 
    echo "beng";
else 
	echo "hao";
ob_end_clean();
//Header( "Content-type: image/gif");
echo $search_query["COMPRESS_CONTENT"];
?>