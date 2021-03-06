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
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4 about-column"><a class="about" href="about/about.html">About</a>
        </div>
        <div class="w-col w-col-2 w-col-small-2 w-col-tiny-4">
          <div class="w-dropdown" data-delay="0">
            <div class="w-dropdown-toggle topmenu">
              <div class="log-in-button"><span class="in-image-text">Log In</span>
              </div>
              <div class="w-icon-dropdown-toggle usermenu"></div>
            </div>
            <nav class="w-dropdown-list"><a class="w-dropdown-link" href="newedituser/newedituser.html">New User</a><a class="w-dropdown-link" href="user/user.html">Profile</a><a class="w-dropdown-link" >Settings</a><a class="w-dropdown-link" href="neweditproject/neweditproject.html">New Project</a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="w-section headingsection">
    <div class="w-container">
      <h1 class="title"><span class="title-text">Project Hunter</span></h1>
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-10"></div>
        <div class="w-col w-col-2 advanced-column"><a class="advanced" href="advancedsearch/advanced-search.html">Advanced?&nbsp;</a>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>
<form action="6.php" method="post"
enctype="multipart/form-data">
Project_ID: <input type="text" name="Project_ID" />
Project_Name: <input type="text" name="Project_Name" />
Project_Description: <input type="text" name="Project_Description" />
Project_Requirements: <input type="text" name="Project_Requirements" />

<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<input type="submit" name="submit" value="Submit" />
 <div class="w-form-done">
          <p>Thank you! Your submission has been received!</p>
</form>
