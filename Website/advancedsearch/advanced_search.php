<?php

// Tiffany code (Database connection and Query here
    // Code to include MYSQL, connect  to the database, select  the database to use, query  the database table 

$Advanced_dbName="Projects";
$Advanced_ProjectDesc = [];
$Advanced_ProjectName = [];
$Advanced_ProjectAuthors = [];
$Advanced_ProjectDate = [];
$Advanced_ProjectRating = [];
$Advanced_ProjectID = [];
$Advanced_ii = 0;
$Advanced_num = 0;
$Advanced_load = 0; 

//create connection
//mysqli_connect($serverName, $userName, $password);	
	//$serverName="192.168.1.128/localhost";
	//$userName="spr_erau";
	//$password="asdf";
	//$database_name = "SE500spr";
$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

if (!$con){
    die('Could not connect: ' . mysqli_connect_error());
}
else{
	echo " succeded logging into the database!"; 
}
mysqli_select_db("SE500spr", $con);


// The below will take the results of the search from the previuos page

$Advanced_Search_projectName=$_GET["name"];
$Advanced_Search_beginDate=$_GET["BeginDate"];
$Advanced_Search_endDate=$_GET["EndDate"];
$Advanced_Search_artefacts=$_GET["Artefacts"];
$Advanced_Search_field=$_GET["field"];
$Advanced_Search_level=$_GET["Level"];
$Advanced_Search_status=$_GET["Status"];
$Advanced_Search_username=$_GET["Username"];
$Advanced_Search_viewCount=$_GET["View-Count"];
	
	
//$searchPage = 1;
$Advanced_SearchPage = $_GET["page"];
	
//Can have more multiple choices
	
$Advanced_Search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%"$Advanced_Search_projectName"%' AND
		Begin_Date >= $Advanced_Search_beginDate AND
		End_Date <= $Advanced_Search_endDate AND 
		Artifacts_Amount = '"$Advanced_Search_artefacts"' AND 
		Rating_Total >= $Advanced_Search_field AND
		Recommended_Grade_Level = $Advanced_Search_level AND
		Completion_Status = $Advanced_Search_status AND
		Group_Members LIKE '"$Advanced_Search_username"' AND 
		View_Count >= $Advanced_Search_viewCount ";
				
//( Page -1 (i.e. 0 is the first page))

if(!$Advanced_SearchPage){ 
// If no search page has been provided - straight from index or advanced search page. 
	$Advanced_SearchPage = 0;
}

// $search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Project_ID DESC";
//here can also return other items of the projects.
$Advanced_Search_query = mysqli_query($con, $Advanced_Search_sql);

if(!$Advanced_Search_query){	//Error checking here / may want to reroute index page
	echo "Could not successfully run query ($Advanced_Search_query) from database" . mysqli_error();
}else{
    $Advanced_NumResults =  mysqli_num_rows($Advanced_Search_query);
	if(!$Advanced_NumResults){	//Error checking here / may want to reroute index page
		echo "No rows found, nothing to print so return to index page.";
		//header("Location:index.php");
	}else{	//initial the array for saving results
		while($Advanced_Search_rs = mysqli_fetch_assoc($Advanced_Search_query)){
			if ($Advanced_num >= ($Advanced_SearchPage * 15) && $Advanced_num < (($Advanced_SearchPage + 1) * 15)){
						
				$Advanced_ProjectDesc[$Advanced_load] = $search_rs["Project_Description"];
				$Advanced_ProjectName[$Advanced_load] = $search_rs["Project_Name"];
				$Advanced_ProjectAuthors[$Advanced_load] = $search_rs["Group_Members"];
				$Advanced_ProjectDate[$Advanced_load] = $search_rs["Date_Uploaded"];
				$Advanced_ProjectRating[$Advanced_load] = $search_rs["Rating_Total"];
				$Advanced_ProjectID[$Advanced_load] = $search_rs["Project_ID"];
				$Advanced_load++;
			}
			$Advanced_num ++;
		}
	}
}
while($Advanced_ii < count($Advanced_ProjectName)){
echo '<div class="w-row">';
   echo ' <div class="w-col w-col-2"><img class="resultimage" src="../images/ExampleImage1.jpeg">';
	echo '</div>';
echo '<div class="w-col w-col-10">';
  echo '<div class="w-row">';
	echo '<div class="w-col w-col-7 projectheadingcolumn">';
	echo '<h3 class="resultheading"><a class="smallheaderlink" href="../project/project.php?ID=';
	echo $Advanced_ProjectID[$ii];
	echo '">';
	echo $Advanced_ProjectName[$ii];
	echo '</a></h3>';
	//<h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.html">Project Hunter</a><a class="smallheaderlink" href="../index.html"></a></h1>
	  echo '<div>Created by';
	  echo "{$Advanced_ProjectAuthors[$ii]}, {$Advanced_ProjectDate[$ii]}";  
	echo '</div>';
	echo '</div>';
	echo '<div class="w-col w-col-5">';
	  echo '<div>Includes: SRS, Source Code, Proposal</div>';
	if ($Advanced_ProjectRating[$Advanced_ii] < 0.25){
		echo '<div><img src="../images/starImage/0.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 0.75){
		echo '<div><img src="../images/starImage/05.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 1.25){
		echo '<div><img src="../images/starImage/1.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 1.75){
		echo '<div><img src="../images/starImage/15.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 2.25){
		echo '<div><img src="../images/starImage/2.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 2.75){
		echo '<div><img src="../images/starImage/25.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 3.25){
		echo '<div><img src="../images/starImage/3.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 3.75){
		echo '<div><img src="../images/starImage/35.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 4.25){
		echo '<div><img src="../images/starImage/4.png">';
	} else if ($Advanced_ProjectRating[$Advanced_ii] < 4.75){
		echo '<div><img src="../images/starImage/45.png">';
	} else {
		 echo '<div><img src="../images/starImage/5.png">';
	}
	  echo '</div>';
	echo '</div>';
  echo '</div>';
  echo '<div class="result-text">';
  echo "{$Advanced_ProjectDesc[$ii]}"; 
echo '&nbsp;</div>';
echo '</div>';
echo '</div>';
	
$Advanced_ii++;
}

//	mysqli_free_result($Advanced_Search_query);
//	mysqli_close($con);

?>