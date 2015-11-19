<?php
include('../include/unauthsession.php');
?>

<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 10 2015 20:34:35 GMT+0000 (UTC) -->
<html data-wf-site="5615631c7481d047217c335f" data-wf-page="561bdfab1e3b95411143dfd2">
<head>
  <meta charset="utf-8">
  <title>Advanced Search</title>
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
  <div>
    <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.html">Project Hunter</a><a class="smallheaderlink" href="../index.html"></a></h1>
  </div>
  <div class="w-container">
    <div class="invalidmessage"><em>Incorrect Date Range - Please Use MM/DD/YYYY format</em>
    </div>
  </div>
  <div class="w-section advancedsearchsection">
    <div class="w-container advancedsearchcontainer">
      <div class="w-form">
	  
<!--get the form information "email-form" from advanced search page-->

<!--what can we advanced search

---------------- all the choices should be the lowest tolerance or being contained-----------------------------
Project_Name	//Keyword
Project_ID		//ID
Date_Uploaded	//Begin_UploadDateRange
Date_Last_Updated	//End_UploadDateRange
X University // University
Source_Code//Artefacts
Rating_Total	//Rating
Recommended_Grade_Level	//Level
Completion_Status		//Status
Group_Members	//Authors
X Primary_Programming_Language	//Language

%%Not included:
Project_Description	//Description
Recommended_Team_Size	//Team_Size
Project_Privacy_Level
Secondary_Programming_Languages
-----------------------------------------------------------------------------------------------------------------
 -->


        <form id="email-form" name="email-form" data-name="Email Form" method="GET" action="../results/SearchResults.php">
          <label for="name">Keyword</label>
          <input class="w-input" id="Keyword" type="text" placeholder="Enter your name" name="Keyword" required="required" data-name="Keyword">
		  <label for="email">UploadDateRange (MM/DD/YYYY)</label>
          <div class="w-row">
            <div class="w-col w-col-6">
             <input class="w-input" id="Begin_UploadDateRange" type="text" placeholder="Example Text" name="Begin_UploadDateRange"  data-name="Begin_UploadDateRange">
              <label for="email">University</label>
            </div>
            <div class="w-col w-col-6">
              <input class="w-input" id="End_UploadDateRange" type="text" placeholder="Example Text" name="End_UploadDateRange" data-name="End_UploadDateRange">
            </div>
          </div>
          <input class="w-input" id="University" type="text" placeholder="Example Text" name="University" data-name="University">
          <div class="w-row">
            <div class="w-col w-col-2">
              <label for="Artefacts">Artefacts</label>
            </div>
            <div class="w-col w-col-2">
              <label for="MinRating">Rating</label>
            </div>
            <div class="w-col w-col-2">
              <label for="email">Level</label>
            </div>
            <div class="w-col w-col-2">
              <label for="email">Status</label>
            </div>
            <div class="w-col w-col-2">
              <label for="email">Authors</label>
            </div>
            <div class="w-col w-col-2">
              <label for="email">Language</label>
            </div>
          </div>
          <div class="w-row">
            <div class="w-col w-col-2">
              <select class="w-select artefacts" id="Artefacts" name="Artefacts" data-name="Artefacts">
                <option value="">Unimportant</option>
                <option value="TRUE">Has Artefacts</option>
                <option value="FALSE">No Artefacts</option>
              </select>
            </div>
            <div class="w-col w-col-2">
              <select class="w-select rating" id="Rating" name="Rating">
                <option value="">Any</option>
                <option value="1">1 Star +</option>
                <option value="2">2 Star +</option>
                <option value="3">3 Star +</option>
                <option value="4">4 Star +</option>
              </select>
            </div>
            <div class="w-col w-col-2">
              <select class="w-select level" id="Level" name="Level" data-name="Level">
                <option value="0">Any</option>
                <option value="1">High School</option>
                <option value="2">Freshman</option>
                <option value="3">Junior/Senior</option>
                <option value="4">Postgrad</option>
                <option value="5">Doctorate Level</option>
              </select>
            </div>
            <div class="w-col w-col-2">
              <select class="w-select status" id="Status" name="Status" data-name="Status">
                <option value="0">Any</option>
                <option value="False">Incomplete</option>
                <option value="True">Complete</option>
              </select>
            </div>
            <div class="w-col w-col-2">
              <input class="w-input" id="Username" type="text" placeholder="Jaiden91" name="Authors" data-name="Authors">
            </div>
            <div class="w-col w-col-2">
              <select class="w-select language" id="Language" name="Language" data-name="Language">
                <option value="C">C</option>
                <option value="C++">C++</option>
                <option value="Php">Php</option>
                <option value="Python">Python</option>
				<option value="JavaScript">JavaScript</option>
				<option value="CSS">CSS</option>
				<option value="Ruby">Ruby</option>
				<option value="Java">Java</option>
				<option value="HTML">HTML</option>
				<option value="Shell">Shell</option>
              </select>
            </div>
          </div>
-->		  
          <input class="w-button" type="submit" value="Search" data-wait="Please wait...">
        </form>
		
        <div class="w-form-done">
          <p>Thank you! Your submission has been received!</p>
        </div>
        <div class="w-form-fail">
          <p>Oops! Something went wrong while submitting the form</p>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>