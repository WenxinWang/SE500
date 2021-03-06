<?php

// The Unauth Header allows for identification of users (or identification that no one is logged in) without redirecting unauthorised users.

include('include/unauthsession.php');
?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 10 2015 20:34:35 GMT+0000 (UTC) -->
<html data-wf-site="5615631c7481d047217c335f" data-wf-page="5615631c7481d047217c3360">
<head>
  <meta charset="utf-8">
  <title>Project Hunter GUI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Webflow">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/webflow.css">
  <link rel="stylesheet" type="text/css" href="css/jaidens-supercool-site.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
      }
    });
  </script>
  <script type="text/javascript" src="js/modernizr.js"></script>
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
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4 about-column"><a class="about" href="about/about.php">About</a>
        </div>
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4">
          <div class="w-dropdown" data-delay="0">
            <div class="w-dropdown-toggle topmenu">
            
            <?php  
                
                //This PHP segment embeds HTML code for a drop down menu, the contents are different depending on whether the User is logged in or not.
                
                if($LoggedIn){
              echo '<div class="log-in-button"><span class="in-image-text" ><i>';
                echo $login_session;
                  echo  '</i></span>';
            echo  '</div>';
            echo  '<div class="w-icon-dropdown-toggle usermenu"></div>';
            echo  '</div>';
            echo  '<nav class="w-dropdown-list"><a class="w-dropdown-link" href="user/user.php?ID=';
            echo  $UserId;
            echo  '">Profile</a><a class="w-dropdown-link" href="include/logout.php">Log Out</a><a class="w-dropdown-link" href="neweditproject/newproject.php">New Project</a>';
                    
                    // The above is a link to the profile page, which is embedding the Users Id into the Get request.
            echo '</nav>';    
            
              
                }else{
                
               echo '<div class="log-in-button"><span class="in-image-text"><i>Log In</i></span>';
             echo '</div>';
             echo '<div class="w-icon-dropdown-toggle usermenu"></div>';
             echo '</div>';
             echo '<nav class="w-dropdown-list"><a class="w-dropdown-link" href="login.php">Log In</a>';
             echo '<a class="w-dropdown-link" href="newedituser/newedituser.php">New User</a>';
             echo '</nav>';
           
              
              
                }
             ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section headingsection">
    <div class="w-container">
      <h1 class="title"><span class="title-text">Project Hunter</span></h1>
    </div>
  </div>
  <div class="w-section">
    <div class="w-container">
      <div class="w-form">
        <form id="wf-form-Search-Form" name="wf-form-Search-Form" data-name="Search Form" method="get" action="results/SearchResults.php">
          <div class="w-row searchrow">
            <div class="w-col w-col-10">
              <input class="w-input searchbar" id="name" type="text" placeholder="Search for Projects..." name="name" data-name="Name">
            </div>
            <div class="w-col w-col-2 submit-advanced">
              <input class="w-button submitbutton" type="submit" value="Submit" data-wait="Please wait...">
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
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-10"></div>

        <div class="w-col w-col-2 advanced-column"><a class="advanced" href="advancedsearch/advanced-search.php">Advanced Search&nbsp;</a>

        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>
