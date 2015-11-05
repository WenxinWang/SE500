<?php

// Tiffany code (Database connection and Query here
    // Code to include MYSQL, connect  to the database, select  the database to use, query  the database table 
	$serverName="192.168.1.128/phpmyadmin";
	$userName="spr_erau";
	$password="$PRfall2015@ERAU";
	$dbName="Projects";
	
	$conn=mysqli_connect($serverName, $userName, $password);	//create connection
	
	if (!$conn){		//check connection
			die("Connection failed: " . mysqli_connect_error());
	}	
	else echo " succed logging into the database!";

// The below will take the results of the search from the previuos page 

    $Search_keyword=$_GET["name"];
	$Search_beginDate=$_GET["BeginDate"];
	$Search_endDate=$_GET["End-Date"];
	$Search_field=$_GET["FieldField"];
	//? for label, how can I get the choice from users?
	
	
	
	$search_sql = "SELECT * FROM $dbName WHERE Project_Name LIKE '%"$Search_keyword"%' AND
				BeginDate >= $Search_beginDate AND
				End-Date <= $Search_endDate AND 
				FieldField LIKE '%"$Search_field"%'	" ;
		//here can also return other items of the projects.
	$search_query = mysqli_query($search_sql);
	
	if(!$search_query){	//Error checking here / may want to reroute index page
		echo "Could not successfully run query ($search_query) from database" . mysqli_error();
		header("Location:index.php");
	}else{
			$num_rows = mysqli_num_rows($search_query);
			if(!$num_rows){	//Error checking here / may want to reroute index page
				echo "No rows found, nothing to print so return to index page.";
				header("Location:index.php");
			}else{
				$search_rs = mysqli_fetch_assoc($search_query);
				
				<p>Search results</p>
				// While a row of data exists, put that row in $row as an associative array
				// Note: If you're expecting just one row, no need to use a loop
				// Note: If you put extract($row); inside the following loop, you'll
				//       then create $userid, $fullname, and $userstatus
				while ($row = mysql_fetch_assoc($result)) {
// results need to be send back to GUI interface.
					echo $row["ID"];
					echo $row["User_ID"];
					echo $row["Project_Name"];
					echo $row["Project_Description"];
					echo $row["Requirements"];
					echo $row["Source_Code"];
					echo $row["UML _Diagram_1"];
					echo $row["UML_Diagram_2"];
					echo $row["UML_Diagram_3"];
					echo $row["UML_Diagram_4"];
					echo $row["UML_Diagram_5"];
					echo $row["UML_Diagram_6"];
					echo $row["UML_Diagram_7"];
					echo $row["UML_Diagram_8"];
					echo $row["UML_Diagram_9"];
					echo $row["UML_Diagram_10"];
					echo $row["Recommended_Grade_Level"];
					echo $row["Recommended_Team_Size"];
					echo $row["Completion_Status"];
					echo $row["University"];
					echo $row["Group_Members"];
					echo $row["Rating_Total"];
					echo $row["Number_of_Ratings"];
					echo $row["Project_Security_Level"];
					echo $row["Date_Uploaded"];
					echo $row["Primary_Programming_Language"];
				}
			}
	}
	
//search for daterange
		
	mysqli_free_result($search_query);
	mysqli_close($conn);

?>