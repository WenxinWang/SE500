<?php
   include('../include/unauthsession.php');
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
    $Search=$_GET["name"];
    //$searchPage = 1;
    $searchPage = $_GET["page"];
    $OrderSearch = $_GET["OrderSearch"];


if (!$OrderSearch){
		$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings	FROM $dbName WHERE Project_Name LIKE '%$Search%'";
}else {
    
	
switch($OrderSearch){
		case"RL":
			$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Rating_Total ASC";
			break;
		case"RH":
			$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Rating_Total DESC";
			break;
		case"LH":
			$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings	FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Recommended_Grade_Level DESC";
			break;
		case"LL":
			$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Recommended_Grade_Level ASC";
			break;
		case"VH":
			$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings	FROM $dbName WHERE Project_Name LIKE '%$Search%'";//ORDER BY View_times DESC
			break;
		case"VL":
				$search_sql = "SELECT Project_ID, Project_Description,	Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings FROM $dbName WHERE Project_Name LIKE '%$Search%'";//ORDER BY View_times ASC
			break;
		case"DH":
			$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Date_Uploaded DESC";
			break;
		case"DL":
			$search_sql = "SELECT Project_ID, Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings	FROM $dbName WHERE Project_Name LIKE '%$Search%' ORDER BY Date_Uploaded ASC";
			break;
		}
}

		//( Page -1 (i.e. 0 is the first page))
    if(!$searchPage){ // If no search page has been provided - straight from index or advanced search page. 
        $searchPage = 0;
    }

	$search_query = mysqli_query($con, $search_sql);
	
	if(!$search_query){	//Error checking here / may want to reroute index page
	echo "Could not successfully run query ($search_query) from database" . mysqli_error();
	//	header("Location:index.php");
	}else{
			//$num_rows = mysqli_num_rows($search_query);
           $NumResults =  mysqli_num_rows($search_query);
			if(!NumResults){	//Error checking here / may want to reroute index page
			echo "No rows found, nothing to print so return to index page.";
	//			header("Location:index.php");
		}else{
				//array("ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription");
				//array("Example1", "Example2", "Example3", "Example4", "Example5", "Example6", "Example7", "Example8", "Example9", "Example10", "Example11", "Example12", "Example13", "Example14", "Example15", "Example16", "Example17", "Example18", "Example19", "Example20");
				//array("Eample1", "Example2", "Example3", "Example4", "Example5", "Example6", "Example7", "Example8", "Example9", "Example10", "Example11", "Example12", "Example13", "Example14", "Example15", "Example16", "Example17", "Example18", "Example19", "Example20");
				//array("Example1", "Example2", "Example3", "Example4", "Example5", "Example6", "Example7", "Example8", "Example9", "Example10", "Example11", "Example12", "Example13", "Example14", "Example15", "Example16", "Example17", "Example18", "Example19", "Example20");
				//array(1.4,2.6,3.1232,3.234,2.436,1.30,2.890,3.7,2.2,2.4,3.3,4.03,5,4.5,5,4.49,3.31,4.5,5.3,2.4);
				//initial the array for saving results
               
				while($search_rs = mysqli_fetch_assoc($search_query)){
                    
                    if ($num >= ($searchPage * 15) && $num < (($searchPage + 1) * 15)){
                        
                        
                        $ProjectDesc[$load] = $search_rs["Project_Description"];
                        $ProjectName[$load] = $search_rs["Project_Name"];
                        $ProjectAuthors[$load] = $search_rs["Group_Members"];
                        $ProjectDate[$load] = $search_rs["Date_Uploaded"];
                        $RatingTotal[$load] = $search_rs["Rating_Total"];
                        $Num[$load] = $search_rs["Number_of_Ratings"];
                        $ProjectID[$load] = $search_rs["Project_ID"];
                        $load++;
                }
					$num ++;
				}
			//	<p>Search results</p>
				// While a row of data exists, put that row in $row as an associative array
				// Note: If you're expecting just one row, no need to use a loop
				// Note: If you put extract($row); inside the following loop, you'll
				//       then create $userid, $fullname, and $userstatus
				//while ($row = mysql_fetch_assoc($result)) {
// results need to be send back to GUI interface.
				//	echo $row["ID"];
				//	echo $row["User_ID"];
				//	echo $row["Project_Name"];
				//	echo $row["Project_Description"];
			//		echo $row["Requirements"];
				//	echo $row["Source_Code"];
				//	echo $row["UML _Diagram_1"];
				//	echo $row["UML_Diagram_2"];
				//	echo $row["UML_Diagram_3"];
				//	echo $row["UML_Diagram_4"];
				//	echo $row["UML_Diagram_5"];
				//	echo $row["UML_Diagram_6"];
				//	echo $row["UML_Diagram_7"];
				//	echo $row["UML_Diagram_8"];
				//	echo $row["UML_Diagram_9"];
				//	echo $row["UML_Diagram_10"];
				//	echo $row["Recommended_Grade_Level"];
				//	echo $row["Recommended_Team_Size"];
				//	echo $row["Completion_Status"];
				//	echo $row["University"];
				//	echo $row["Group_Members"];
				//	echo $row["Rating_Total"];
				//	echo $row["Number_of_Ratings"];
		//			echo $row["Project_Security_Level"];
	//				echo $row["Date_Uploaded"];
	//				echo $row["Primary_Programming_Language"];
		}
		}
	//}
		
	//mysqli_free_result($search_query);
	//mysqli_close($conn);
    //$NumResults = mysql_num_rows($DB);
    //$NumResults = 20;
    //$ProjectDesc = array("ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription", "ExampleProjectDescription");
    //$ProjectName = array("Example1", "Example2", "Example3", "Example4", "Example5", "Example6", "Example7", "Example8", "Example9", "Example10", "Example11", "Example12", "Example13", "Example14", "Example15", "Example16", "Example17", "Example18", "Example19", "Example20");
    //$ProjectAuthors = array("Example1", "Example2", "Example3", "Example4", "Example5", "Example6", "Example7", "Example8", "Example9", "Example10", "Example11", "Example12", "Example13", "Example14", "Example15", "Example16", "Example17", "Example18", "Example19", "Example20");
    //$ProjectDate = array("Example1", "Example2", "Example3", "Example4", "Example5", "Example6", "Example7", "Example8", "Example9", "Example10", "Example11", "Example12", "Example13", "Example14", "Example15", "Example16", "Example17", "Example18", "Example19", "Example20");
    //$ProjectRating = array(1.4,2.6,3.1232,3.234,2.436,1.30,2.890,3.7,2.2,2.4,3.3,4.03,5,4.5,5,4.49,3.31,4.5,5.3,2.4);
    //$ii = 0;
       
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
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4 about-column"><a class="about" href="../about/about.php">About</a>
        </div>
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4">
          <div class="w-dropdown" data-delay="0">
            <div class="w-dropdown-toggle topmenu">
               <?php  
                if($LoggedIn){
              echo '<div class="log-in-button"><span class="in-image-text" ><i>';
                echo $login_session;
                  echo  '</i></span>';
            echo  '</div>';
            echo  '<div class="w-icon-dropdown-toggle usermenu"></div>';
            echo  '</div>';
            echo  '<nav class="w-dropdown-list"><a class="w-dropdown-link" href="../user/user.php?ID=';
            echo  $UserId;
            echo  '">Profile</a><a class="w-dropdown-link" href="../logouttest.php">Log Out</a><a class="w-dropdown-link" href="../neweditproject/newproject.php">New Project</a>';
            echo '</nav>';    
            
              
                }else{
                
               echo '<div class="log-in-button"><span class="in-image-text"><i>Log In</i></span>';
             echo '</div>';
             echo '<div class="w-icon-dropdown-toggle usermenu"></div>';
             echo '</div>';
             echo '<nav class="w-dropdown-list"><a class="w-dropdown-link" href="../login.php">Log In</a>';
             echo '<a class="w-dropdown-link" href="../newedituser/newedituser.php">New User</a>';
             echo '</nav>';
           
              
              
                }
             ?>
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
              <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.php">Project Hunter</a><a class="smallheaderlink" href="../index.php"></a></h1>
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
              <div class="w-col w-col-2"><a href="../advancedsearch/advanced-search.php">Advanced Search</a>
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
           echo ' <div class="w-col w-col-2"><img class="resultimage" src="../images/ExampleImage1.jpeg">';
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
            if (($RatingTotal[$ii]/$Num[$ii]) < 0.25){
                echo '<div><img src="../images/starImage/0.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 0.75){
                echo '<div><img src="../images/starImage/05.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 1.25){
                echo '<div><img src="../images/starImage/1.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 1.75){
                echo '<div><img src="../images/starImage/15.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 2.25){
                echo '<div><img src="../images/starImage/2.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 2.75){
                echo '<div><img src="../images/starImage/25.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 3.25){
                echo '<div><img src="../images/starImage/3.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 3.75){
                echo '<div><img src="../images/starImage/35.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 4.25){
                echo '<div><img src="../images/starImage/4.png">';
            } elseif (($RatingTotal[$ii]/$Num[$ii]) < 4.75){
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
        
        <!-- Old results code used to display 
        
      <div class="w-row">
        <div class="w-col w-col-2"><img class="resultimage" src="../images/ExampleImage1.jpeg">
        </div>
        <div class="w-col w-col-10">
          <div class="w-row">
            <div class="w-col w-col-7 projectheadingcolumn">
              <h3 class="resultheading">Amazing Fantastic Project</h3>
              <div>Created by P. J. Kim. A, R, Cullen. 2015</div>
            </div>
            <div class="w-col w-col-5">
              <div>Includes: SRS, Source Code, Proposal</div>
              <div><img src="../images/star rating.jpg">
              </div>
            </div>
          </div>
          <div class="result-text">This Exciting Project Seeks to demonstrate blah blah blah blah blah blah blah blah&nbsp;blah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blahblah blah blah blah ....&nbsp;</div>
        </div>
      </div>
      <div>
        <div class="w-row">
          <div class="w-col w-col-2"><img class="resultimage" src="../images/ExampleImage2.jpeg">
          </div>
          <div class="w-col w-col-10">
            <div class="w-row">
              <div class="w-col w-col-7">
                <h3 class="resultheading">Revolutionary Payment system</h3>
                <div>Created by M. L. Tight</div>
              </div>
              <div class="w-col w-col-5">
                <div>Includes: Idea Only</div>
                <div><img src="../images/star rating.jpg">
                </div>
              </div>
            </div>
            <div>I would like someone to attempt to redesign the card payment system to allow blah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blah...</div>
          </div>
        </div>
        <div>
          <div class="w-row">
            <div class="w-col w-col-2"><img class="resultimage" src="../images/ExampleImage3.jpg">
            </div>
            <div class="w-col w-col-10">
              <div class="w-row">
                <div class="w-col w-col-7">
                  <h3 class="resultheading">Protecting against SQL Inject...</h3>
                  <div>
                    <div>Created by M. L. Alphabet</div>
                  </div>
                </div>
                <div class="w-col w-col-5">
                  <div>Includes: Requirements, Description</div>
                  <div><img src="../images/star rating.jpg">
                  </div>
                </div>
              </div>
              <div>An exciting new method designed to protect against a form of attack that has long since been made irrelevant by modern security techniques. Blah Blah&nbsp;Blah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blah ...</div>
            </div>
          </div>
          <div>
            <div class="w-row">
              <div class="w-col w-col-2"><img class="resultimage" src="../images/exampleimage4.jpg">
              </div>
              <div class="w-col w-col-10">
                <div class="w-row">
                  <div class="w-col w-col-7">
                    <h3 class="resultheading">Optimising Control of Death Ray</h3>
                    <div>
                      <div>Created by Dr. Evil</div>
                    </div>
                  </div>
                  <div class="w-col w-col-5">
                    <div>Includes: Requirements, Idea</div>
                    <div><img src="../images/star rating.jpg">
                    </div>
                  </div>
                </div>
                <div>
                  <div>My Death Ray is not functioning well enough to reliably hit targets from orbit. I am seeking assistance to calibrate its targeting. Suitable for PhD level students looking for a career in..... EVIL. muahahah</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
-->
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
          <div class="w-col w-col-6 w-clearfix">
          <?php
          
          if ($searchPage != 0){
          
          echo '<a class="previous-page" href="../results/SearchResults.php?name=';
          echo $Search;
          echo '&OrderSearch=';
          echo $OrderSearch;
          echo '&page=';
          echo ($searchPage - 1);
          echo '">‍';
          
          }
          echo '&lt;&nbsp;<span>Previous</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
          echo '</div>';
          echo '<div class="w-col w-col-6">';
              
              
          if ((($searchPage + 1) * 15) < $NumResults){
          
          echo '<a href="../results/SearchResults.php?name=';
          echo $Search;
          echo '&OrderSearch=';
          echo $OrderSearch;
          echo '&page=';
          echo ($searchPage + 1);
          echo '">';
         
              
          }
           echo '&nbsp; &nbsp; &nbsp;&nbsp;Next &gt;</a>';
          echo '</div>';
          ?>
          
           
       
        
        
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>