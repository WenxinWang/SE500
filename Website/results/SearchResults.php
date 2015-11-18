<?php
   


// Tiffany code (Database connection and Query here
    // Code to include MYSQL, connect  to the database, select  the database to use, query  the database table 
	//$serverName="192.168.1.128/phpmyadmin";
	//$userName="spr_erau";
	//$password="$PRfall2015@ERAU";
	$dbName="Projects";
    $ProjectDesc = [];
    $ProjectName = [];
    $ProjectAuthors = [];
    $ProjectDate = [];
    $ProjectRating = [];
    $ProjectID = [];

    $ii = 0; 
    $num = 0;
    $load = 0; 
	//$conn=mysqli_connect($serverName, $userName, $password);	//create connection
	$con = mysqli_connect("localhost","spr_erau","asdf", "SE500spr");

if (!$con)
  {
    die('Could not connect: ' . mysqli_connect_error());
  }
else {
echo " succeded logging into the database!"; 
}
mysqli_select_db("SE500spr", $con);
	//if (!$conn){		//check connection
	//		die("Connection failed: " . mysqli_connect_error());
	//}	
	//else{
     // echo " succ}ed logging into the database!";  
   // } 

// The below will take the results of the search from the previuos page Execute

    $Search_Name=$_GET["name"];
	//the same with $Advanced_Search_projectName=$_GET["name"];
    //$searchPage = 1;
    $searchPage = $_GET["page"];
    $OrderSearch = $_GET["OrderSearch"];
/*what can we advanced search

---------------- all the choices should be the lowest tolerance or being contained-----------------------------
Project_Name	//Keyword
Project_ID		//ID
Date_Uploaded	//Begin_UploadDateRange
Date_Last_Updated	//End_UploadDateRange
University // University
Source_Code//Artefacts
Rating_Total	//Rating
Recommended_Grade_Level	//Level
Completion_Status		//Status
Group_Members	//Authors
Primary_Programming_Language	//Language

-----------------------------------------------------------------------------------------------------------------
*/


//-----------------------------------------------------------------------------------------------------------------
$Advanced_Search_Keyword=$_GET["Keyword"];
$Advanced_Search_ID=$_GET["ID"];
$Advanced_Search_Begin_UploadDateRange=$_GET["Begin_UploadDateRange"];
$Advanced_Search_End_UploadDateRange=$_GET["End_UploadDateRange"];
$Advanced_Search_University=$_GET["University"];
$Advanced_Search_Artefacts=$_GET["Artefacts"];
$Advanced_Search_Rating=$_GET["Rating"];
$Advanced_Search_Level=$_GET["Level"];
$Advanced_Search_Status=$_GET["Status"];
$Advanced_Search_Authors=$_GET["Authors"];
$Advanced_Search_Language=$_GET["Language"];
//------------------------------------------------------------------------------------------------------------------



//the advanced choices after "where" 
/*$where_sentence = "(Project_Name Like '%$$Search_Name' OR
				Project_Name Like $Advanced_Search_Keyword) AND
				Project_ID = $Advanced_Search_ID AND
				Date_Uploaded >= $Advanced_Search_Begin_UploadDateRange AND
				Date_Last_Updated <= $Advanced_Search_End_UploadDateRange AND
				University LIKE '%$Advanced_Search_University%' AND
				// = $Advanced_Search_Artefacts AND
				Rating_Total LIKE '%$Advanced_Search_Rating%' AND
				Recommended_Grade_Level LIKE '%$Advanced_Search_Level%' AND
				Completion_Status LIKE '%$Advanced_Search_Status%' AND
				Group_Members LIKE '%$Advanced_Search_Authors%' AND
				Primary_Programming_Language LIKE '%$Advanced_Search_Language%'";
*/
/*				
Project_ID		//ID
Date_Uploaded	//Begin_UploadDateRange
Date_Last_Updated	//End_UploadDateRange
University // University
Source_Code//Artefacts
Rating_Total	//Rating
Recommended_Grade_Level	//Level
Completion_Status		//Status
Group_Members	//Authors
Primary_Programming_Language	//Language
*/

if (!$OrderSearch){
   
    $search_sql = "SELECT Project_ID, Project_Description,
	Project_Name, Group_Members, Date_Uploaded, Rating_Total
	FROM $dbName WHERE (Project_Name Like '%$$Search_Name' OR
				Project_Name Like $Advanced_Search_Keyword) AND
				Project_ID = $Advanced_Search_ID AND
				Date_Uploaded >= $Advanced_Search_Begin_UploadDateRange AND
				Date_Last_Updated <= $Advanced_Search_End_UploadDateRange AND
				University LIKE '%$Advanced_Search_University%' AND
				// = $Advanced_Search_Artefacts AND
				Rating_Total LIKE '%$Advanced_Search_Rating%' AND
				Recommended_Grade_Level LIKE '%$Advanced_Search_Level%' AND
				Completion_Status LIKE '%$Advanced_Search_Status%' AND
				Group_Members LIKE '%$Advanced_Search_Authors%' AND
				Primary_Programming_Language LIKE '%$Advanced_Search_Language%'";
		
}

/*else {
    

	
switch($OrderSearch){
		case"RL":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence} ORDER BY Rating_Total ASC";
			break;
		case"RH":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence} ORDER BY Rating_Total DESC";
			break;
		case"LH":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence} ORDER BY Recommended_Grade_Level DESC";
			break;
		case"LL":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence} ORDER BY Recommended_Grade_Level ASC";
			break;
		case"VH":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence}"; // doesn't exsist the view_number choices.
			break;
		case"VL":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence}";// doesn't exsist the view_number choices.
			break;
		case"DH":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence} ORDER BY Date_Uploaded DESC";
			break;
		case"DL":
			$search_sql = "SELECT Project_ID, Project_Description,
				Project_Name, Group_Members, Date_Uploaded, Rating_Total
				FROM $dbName WHERE {$where_sentence} ORDER BY Date_Uploaded ASC";
			break;
		 
		}
}
*/
		//( Page -1 (i.e. 0 is the first page))
    if(!$searchPage){ // If no search page has been provided - straight from index or advanced search page. 
        $searchPage = 0;
    }
	// $search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Project_ID DESC";
		//here can also return other items of the projects.
	$search_query = mysqli_query($con, $search_sql);
	
	if(!$search_query){	//Error checking here / may want to reroute index page
	echo "Could not successfully run query ($search_query) from database" . mysqli_error();
	//	header("Location:index.php");
	}else{
           $NumResults =  mysqli_num_rows($search_query);
			if(!NumResults){	//Error checking here / may want to reroute index page
			echo "No rows found, nothing to print so return to index page.";

			}else{
               
				while($search_rs = mysqli_fetch_assoc($search_query)){
                    if ($num >= ($searchPage * 15) && $num < (($searchPage + 1) * 15)){       
                        $ProjectDesc[$load] = $search_rs["Project_Description"];
                        $ProjectName[$load] = $search_rs["Project_Name"];
                        $ProjectAuthors[$load] = $search_rs["Group_Members"];
                        $ProjectDate[$load] = $search_rs["Date_Uploaded"];
                        $ProjectRating[$load] = $search_rs["Rating_Total"];
                        $ProjectID[$load] = $search_rs["Project_ID"];
                        $load++;
                }
					$num ++;
				}
?>

<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 10 2015 20:34:35 GMT+0000 (UTC) -->
<html data-wf-site="5615631c7481d047217c335f" data-wf-page="56157233ecd841d67a8f12df">
<head>
  <meta charset="utf-8">
  <title>Search Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="../css/normalize.css">
  <link rel="stylesheet" type="text/css" href="../css/webflow.css">
  <link rel="stylesheet" type="text/css" href="../css/jaidens-supercool-site.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
      }
    });
  </script>
  <script type="text/javascript" src="../js/modernizr.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico">
  <link rel="apple-touch-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png">
</head>
<body>
  <div class="w-section head-panel">
    <div class="w-container top-menu"></div>
  </div>
  <div class="w-section toprowsection">
    <div class="w-container toprowcontainer">
      <div class="w-row toprow">
        <div class="w-col w-col-8 w-col-small-8 w-col-tiny-4"></div>
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4 about-column"><a class="about" href="../about/about.html">About</a>
        </div>
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4">
          <div class="w-dropdown" data-delay="0">
            <div class="w-dropdown-toggle topmenu">
              <div class="log-in-button"><span class="in-image-text">Log In</span>
              </div>
              <div class="w-icon-dropdown-toggle usermenu"></div>
            </div>
            <nav class="w-dropdown-list"><a class="w-dropdown-link" href="../newedituser/newedituser.html">New User</a><a class="w-dropdown-link" href="../user/user.html">Profile</a><a class="w-dropdown-link" >Settings</a><a class="w-dropdown-link" href="../neweditproject/neweditproject.html">New Project</a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section search-page-search">
    <div class="w-container">
      <div class="w-form">
        <form id="email-form" name="email-form" data-name="Email Form" method = "get" action = "../results/SearchResults.php">
           <div class="w-row">
            <div class="w-col w-col-2 w-col-small-2">
              <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.html">Project Hunter</a><a class="smallheaderlink" href="../index.html"></a></h1>
            </div>
            <div class="w-col w-col-8 w-col-small-8">
              <input class="w-input" id="name" type="text" placeholder="<?php echo $Search;?>" name="name" data-name="name">
            </div>
           <div class="w-col w-col-2 w-col-small-2">
              <input class="w-button" type="submit" value="Submit" data-wait="Please wait...">
            </div>
          </div>
          <div>
            <div class="w-row">
              <div class="w-col w-col-7"></div>
              <div class="w-col w-col-3">
                <h5>Order Search</h5>
              </div>
              <div class="w-col w-col-2"><a href="../advancedsearch/advanced-search.html">Advanced Search</a>
              </div>
            </div>
            <div class="w-row">
              <div class="w-col w-col-7"></div>
              <div class="w-col w-col-3">
                <select class="w-select ordersearch" id="OrderSearch" name="OrderSearch" data-name="OrderSearch">
                  <option value="RH">Rating (High - Low)</option>
                  <option value="RL">Rating (Low - Hi)</option>
                  <option value="LH">Level (High - Low)</option>
                  <option value="LL">Level (low - High)</option>
                  <option value="VH">Views (High - Low)</option>
                  <option value="VL">Views (Low - High)</option>
                  <option value="DH">Dates (Eariler first)</option>
                  <option value="DL">Dates (Oldest first)</option>
                </select>
              </div>
              <div class="w-col w-col-2"><a class="w-button" href="#">Save Search</a>
              </div>
            </div>
          </div>
        </form>
        <div class="w-form-done">
          <p>Thank you! Your submission has been received!</p>
        </div>
        <div class="w-form-fail">
          <p>Oops! Something went wrong while submitting the form</p>
        </div>
      </div>
      <div>
          <!--Syntax Requires checking -->
        <h1 class="results-heading"><?php echo "Your Search for {$Search} returned {$NumResults} results!"; ?> </h1>
        
      </div>
    </div>
  </div>
  <div class="w-section results-section">
    <div class="w-container result">
        <!-- This is the beginning of the results, the earlier code will be replaced by a while loop which will add rows based on number of elements. -->
   
        <?php 
        
        while($ii < count($ProjectName)){
        echo '<div class="w-row">';
           echo ' <div class="w-col w-col-2"><img class="resultimage" src="../images/Project/';
           echo $ProjectID[$ii];
           echo '.jpg">';
            echo '</div>';
        echo '<div class="w-col w-col-10">';
          echo '<div class="w-row">';
            echo '<div class="w-col w-col-7 projectheadingcolumn">';
            echo '<h3 class="resultheading"><a class="smallheaderlink" href="../project/project.php?ID=';
            echo $ProjectID[$ii];
            echo '">';
            echo $ProjectName[$ii];
            echo '</a></h3>';
            //<h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.html">Project Hunter</a><a class="smallheaderlink" href="../index.html"></a></h1>
              echo '<div>Created by';
              echo "{$ProjectAuthors[$ii]}, {$ProjectDate[$ii]}";  
            echo '</div>';
            echo '</div>';
            echo '<div class="w-col w-col-5">';
              echo '<div>Includes: SRS, Source Code, Proposal</div>';
            if ($ProjectRating[$ii] < 0.25){
                echo '<div><img src="../images/starImage/0.png">';
            } elseif ($ProjectRating[$ii] < 0.75){
                echo '<div><img src="../images/starImage/05.png">';
            } elseif ($ProjectRating[$ii] < 1.25){
                echo '<div><img src="../images/starImage/1.png">';
            } elseif ($ProjectRating[$ii] < 1.75){
                echo '<div><img src="../images/starImage/15.png">';
            } elseif ($ProjectRating[$ii] < 2.25){
                echo '<div><img src="../images/starImage/2.png">';
            } elseif ($ProjectRating[$ii] < 2.75){
                echo '<div><img src="../images/starImage/25.png">';
            } elseif ($ProjectRating[$ii] < 3.25){
                echo '<div><img src="../images/starImage/3.png">';
            } elseif ($ProjectRating[$ii] < 3.75){
                echo '<div><img src="../images/starImage/35.png">';
            } elseif ($ProjectRating[$ii] < 4.25){
                echo '<div><img src="../images/starImage/4.png">';
            } elseif ($ProjectRating[$ii] < 4.75){
                echo '<div><img src="../images/starImage/45.png">';
            } else {
                 echo '<div><img src="../images/starImage/5.png">';
            }
              echo '</div>';
            echo '</div>';
          echo '</div>';
          echo '<div class="result-text">';
          echo "{$ProjectDesc[$ii]}"; 
        echo '&nbsp;</div>';
        echo '</div>';
      echo '</div>';
            
        $ii++;
        }

        ?>
        <div> 
      </div>
  </div>
  <div class="w-section bottom-text">
    <div class="w-container">
        <div class="results-text">Now displaying 
        
        <?php
        
        echo (($searchPage*15) + 1);
            
        echo " to ";
            
        if ((($searchPage + 1) * 15) < $NumResults){
            
            echo (($searchPage + 1) * 15);
            
            
        }  else {
            
            echo $NumResults;
            
        }
            echo " of ";
            echo $NumResults;
        
        ?>
       Results </div>
      <div class="search-navigate">
          
          <?php
          
          if ($searchPage != 0){
          
          echo '<div class="w-col w-col-6 w-clearfix"><a class="previous-page" href="../results/SearchResults.php?name=';
          echo $Search;
          echo '&OrderSearch=';
          echo $OrderSearch;
          echo '&page=';
          echo ($searchPage - 1);
          echo '">‍&lt;&nbsp;<span>Previous</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
          echo '</div>';
          
          }
          
         
          if ((($searchPage + 1) * 15) < $NumResults){
          
          echo '<div class="w-col w-col-6"><a href="../results/SearchResults.php?name=';
          echo $Search;
          echo '&OrderSearch=';
          echo $OrderSearch;
          echo '&page=';
          echo ($searchPage + 1);
          echo '">&nbsp; &nbsp; &nbsp;&nbsp;Next &gt;</a>';
          echo '</div>';
              
          }
          
          ?>
          
           
       
        
        
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>
