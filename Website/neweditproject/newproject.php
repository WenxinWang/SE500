<?php
include('../include/session.php');
?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 10 2015 20:34:35 GMT+0000 (UTC) -->
<html data-wf-site="5615631c7481d047217c335f" data-wf-page="562502d2468ce6455493cb01">
<head>
  <meta charset="utf-8">
  <title>NewProject</title>
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
            echo  '">Profile</a><a class="w-dropdown-link" href="../include/logout.php">Log Out</a><a class="w-dropdown-link" href="../neweditproject/newproject.php">New Project</a>';
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
  <div class="w-section">
    <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.php">Project Hunter</a><a class="smallheaderlink" href="../index.php"></a></h1>
  </div>
  <div class="w-section">
    <div class="w-container">
      <div class="w-form">
        <form id="email-form" method="post" action="base.php" name="email-form" data-name="Email Form">
          <label for="name">Project Title:</label>
          <input class="w-input" id="Title" type="text" placeholder="Enter your name" name="Title" data-name="Name" required="required">
          <div class="w-row">
            <div class="w-col w-col-2">
              <label for="email">Project Description:</label>
            </div>
            <div class="w-col w-col-10">
              <textarea class="w-input" id="field" placeholder="Project Description Here" name="Description"></textarea>
            </div>
          </div>
          <div class="w-row">
            <div class="w-col w-col-8">
              <label for="IMGSRC">Main Image</label>
              <div class="w-row">
                <div class="w-col w-col-9">
                  <input class="w-input" id="IMGSRC" type="text" placeholder="Upload Image" name="IMGSRC" data-name="IMGSRC">
                </div>
                <div class="w-col w-col-3"><a class="w-button" href="#">Upload/Search</a>
                </div>
              </div>
            </div>
            <div class="w-col w-col-4"><img class="editprojectscreen" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg">
            </div>
          </div>
          <label for="email">Project Users:</label>
          <div class="w-row">
            <div class="w-col w-col-2">
              <label for="email">Authors</label>
            </div>
            <div class="w-col w-col-10">
              <input class="w-input" id="Authors" type="text" placeholder="Enter Author Names (Harvard style reference preferred)" name="Authors">
            </div>
          </div>
          <div class="w-row">
            <div class="w-col w-col-6">
              <label for="email">Completed</label>
            </div>
            <div class="w-col w-col-6">
              <select class="w-select" id="Completed" name="Completed" data-name="Completed">
                <option value="TRUE">Yes</option>
                <option value="False">No</option>
              </select>
            </div>
          </div>
          <div>
            <div class="w-row">
              <div class="w-col w-col-6">
                <label for="email">Level</label>
              </div>
              <div class="w-col w-col-6">
                <select class="w-select" id="Select-Project-Grade-Level" name="Select-Project-Grade-Level" data-name="Select Project Grade Level">
                  <option value="12">High School</option>
                  <option value="100">Freshman</option>
                  <option value="200">Sophomore</option>
                  <option value="300">Junior</option>
                  <option value="400">Senior</option>
                  <option value="600">Grad</option>
                  <option value="700">PhD</option>
                </select>
              </div>
            </div>
          </div>
          <div>
            <div class="w-row">
              <div class="w-col w-col-2">
                <label for="email">Artifacts</label>
              </div>
              <div class="w-col w-col-8">
                <input class="w-input" id="field-3" type="text" placeholder="Artefact Path" name="field-3" data-name="Field 3">
              </div>
              <div class="w-col w-col-2"><a class="w-button" href="#">Upload/Search</a>
              </div>
            </div>
          </div>
          <input class="w-button" type="submit" value="Add Project" name="submit" data-wait="Please wait...">
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
