<?php
include('../include/session.php');
$dbName="Projects";

	
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

$ProjectRating = 0.00;
$Project=$_GET["ID"];

$search_sql = "SELECT Project_Description, Project_Name, Group_Members, Date_Uploaded, Rating_Total, Number_of_Ratings FROM $dbName WHERE Project_ID = $Project";

$search_query = mysqli_query($con, $search_sql);

if(!$search_query){	//Error checking here / may want to reroute index page
	echo "Could not successfully run query ($search_query) from database" . mysqli_error();
	//	header("Location:index.php");
	}else{
                        $search_rs = mysqli_fetch_assoc($search_query);
                        $ProjectDesc = $search_rs["Project_Description"];
                        $ProjectName = $search_rs["Project_Name"];
                        $ProjectAuthors = $search_rs["Group_Members"];
                        $ProjectDate = $search_rs["Date_Uploaded"];
                        $RatingTotal = $search_rs["Rating_Total"];
                        $Num = $search_rs["Number_of_Ratings"];
                        settype($RatingTotal, 'float');
                        settype($Num, 'float');
                        if(Num == 0){
                            $ProjectRating = 0;
                        }else{
                            //$ProjectRating = bcdiv($RatingTotal, $Num, 3);
                            $ProjectRating = $RatingTotal / $Num;   
                        }
                        
}


?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 10 2015 20:34:35 GMT+0000 (UTC) -->
<html data-wf-site="5615631c7481d047217c335f" data-wf-page="561bf1df71ffdcb9278e8127">
<head>
  <meta charset="utf-8">
  <title>Project Page</title>
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
  <div class="w-section smallheadsection">
    <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.php">Project Hunter</a><a class="smallheaderlink" href="../index.php"></a></h1>
  </div>
  <div class="w-section project-title">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6">
            <?php
            echo '<img src="../images/Project/';
            echo $Project;
            echo '.jpg">';
                ?>
        </div>
        <div class="w-col w-col-6">
          <h1 class="projectheading"><?php echo $ProjectName ?> Rating: <?php echo $ProjectRating ?> Num: <?php echo $Num ?> RatingTotal: <?php echo $RatingTotal ?> </h1>
          <div>
            <div class="w-form">
              <form id="email-form" method = "post" action = "RatingUpdate.php?ID=<?php echo $Project ?>" name="email-form" data-name="Email Form">
                <div class="w-row">
                  <div class="w-col w-col-8">
                    <select class="w-select ratingbutton" id="Rating" name="Rating" data-name="Rating">
                      <option value="1">1 Star</option>
                      <option value="2">2 Star</option>
                      <option value="3">3 Star</option>
                      <option value="4">4 Star</option>
                      <option value="5">5 Star</option>
                    </select>
                  </div>
                  <div class="w-col w-col-4">
                    <input class="w-button ratebutton" name= "submit" type="submit" value="Rate!" data-wait="Please wait...">
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
          </div>
          <div>
              <?php
                         if ($ProjectRating < 0.25){
                echo '<div><img src="../images/starImage/0.png">';
            } elseif ($ProjectRating < 0.75){
                echo '<div><img src="../images/starImage/05.png">';
            } elseif ($ProjectRating < 1.25){
                echo '<div><img src="../images/starImage/1.png">';
            } elseif ($ProjectRating < 1.75){
                echo '<div><img src="../images/starImage/15.png">';
            } elseif ($ProjectRating < 2.25){
                echo '<div><img src="../images/starImage/2.png">';
            } elseif ($ProjectRating < 2.75){
                echo '<div><img src="../images/starImage/25.png">';
            } elseif ($ProjectRating < 3.25){
                echo '<div><img src="../images/starImage/3.png">';
            } elseif ($ProjectRating < 3.75){
                echo '<div><img src="../images/starImage/35.png">';
            } elseif ($ProjectRating < 4.25){
                echo '<div><img src="../images/starImage/4.png">';
            } elseif ($ProjectRating < 4.75){
                echo '<div><img src="../images/starImage/45.png">';
            } else {
                 echo '<div><img src="../images/starImage/5.png">';
            }
              ?>
          </div>
          <div><a href="../user/user.php"><?php echo $ProjectAuthors ?></a>&nbsp;Completed on <?php echo $ProjectDate ?></div>
        </div>
      </div>
      <div class="projectdescriptiontext"><?php echo $ProjectDesc ?></div>
    </div>
    <div>
      <div class="w-container">
        <div class="w-row">
          <div class="w-col w-col-3"><img width="49" src="../images/dl.jpg">
            <div>Requirements Spec</div>
          </div>
          <div class="w-col w-col-3"><img width="49" src="../images/dl.jpg">
            <div>Project Description</div>
          </div>
          <div class="w-col w-col-3"><img width="49" src="../images/dl.jpg">
            <div>Source Code</div>
          </div>
          <div class="w-col w-col-3"><img width="49" src="../images/dl.jpg">
            <div>Other</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section">
    <div class="w-container favcontainer"><a class="w-button favorite-button"><span>Favorite</span>!</a>
    </div>
    <div class="w-container">
      <div class="bottom-text-project-page">Back To Search Results</div>
    </div>
  </div>
  <div class="w-section">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6"><a class="w-button favorite-button">Modify!</a>
        </div>
        <div class="w-col w-col-6"><a class="w-button favorite-button">Delete!</a>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>
