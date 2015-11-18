<?php
include('../include/session.php');
?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 10 2015 20:34:35 GMT+0000 (UTC) -->
<html data-wf-site="5615631c7481d047217c335f" data-wf-page="5625023f932c368504a4bd81">
<head>
  <meta charset="utf-8">
  <title>User</title>
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
  <div class="w-section">
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
            echo  '">Profile</a><a class="w-dropdown-link" href="../logouttest.php">Log Out</a><a class="w-dropdown-link" href="../neweditproject/neweditproject.php">New Project</a>';
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
    <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.html">Project Hunter</a><a class="smallheaderlink" href="../index.html"></a></h1>
  </div>
  <div class="w-section">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6"><img class="profileimage" src="../images/exampleimage4.jpg">
        </div>
        <div class="w-col w-col-6">
          <h1>Jaiden91</h1>
          <p>Paragraph describing the User here.&nbsp;Paragraph describing the User here.Paragraph describing the User here.Paragraph describing the User here.Paragraph describing the User here.Paragraph describing the User here.Paragraph describing the User here.Paragraph describing the User here.</p>
        </div>
      </div>
      <div>
        <div class="w-row">
          <div class="w-col w-col-6">
            <h4>Email</h4>
          </div>
          <div class="w-col w-col-6">
            <h4>University</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6">
          <div>jaiden.wolf.kennedy@gmail.com</div>
        </div>
        <div class="w-col w-col-6">
          <div>Embry-Riddle Aeronautical</div>
        </div>
      </div>
      <div class="w-row userprojdisp">
        <div class="w-col w-col-6">
          <h4>Jaiden's Projects</h4>
        </div>
        <div class="w-col w-col-6">
          <h4>Jaiden's Favorites</h4>
        </div>
      </div>
      <div class="w-row">
        <div class="w-col w-col-6">
          <div class="w-row projectdisp">
            <div class="w-col w-col-4"><img width="150" src="../images/exampleimage4.jpg">
            </div>
            <div class="w-col w-col-8">
              <h5 class="userprojectheadingtext"><em><a href="../project/project.html">Project Heading</a></em></h5>
            </div>
          </div>
          <div class="w-row projectdisp">
            <div class="w-col w-col-4"><img width="150" src="../images/exampleimage4.jpg">
            </div>
            <div class="w-col w-col-8">
              <h5 class="userprojectheadingtext"><em><a href="../project/project.html">Project Heading</a></em></h5>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6">
          <div class="w-row projectdisp">
            <div class="w-col w-col-4"><img width="150" src="../images/exampleimage4.jpg">
            </div>
            <div class="w-col w-col-8">
              <h5 class="userprojectheadingtext"><em><a href="../project/project.html">Project Heading</a></em></h5>
            </div>
          </div>
          <div class="w-row projectdisp">
            <div class="w-col w-col-4"><img width="150" src="../images/exampleimage4.jpg">
            </div>
            <div class="w-col w-col-8">
              <h5 class="userprojectheadingtext"><em><a href="../project/project.html">Project Heading</a></em></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section">
    <div class="w-container">
      <div class="w-row bottomrow">
        <div class="w-col w-col-6"><a class="w-button" href="../newedituser/newedituser.html">Modify</a>
        </div>
        <div class="w-col w-col-6"><a class="w-button" href="#">Delete Account?</a>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>