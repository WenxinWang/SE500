<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Nov 10 2015 20:34:35 GMT+0000 (UTC) -->
<html data-wf-site="5615631c7481d047217c335f" data-wf-page="562502f4202d244654cd186c">
<head>
  <meta charset="utf-8">
  <title>New/EditProject</title>
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
  <div class="w-section">
    <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.html">Project Hunter</a><a class="smallheaderlink" href="../index.html"></a></h1>
  </div>
  <div class="w-section">
    <div class="w-container">
      <div>* Indicates Required Field</div>
      <div>
        <div class="w-form">
          <form id="email-form" method="post" action="base.php" name="email-form" data-name="Email Form">
           <div>
              <div class="w-row">
                <div class="w-col w-col-6">
                  <h4>Username*</h4>
                </div>
                <div class="w-col w-col-6">
                  <input class="w-input" id="Username" type="text" placeholder="Your Username Here" name="Username" required="required" data-name="Username">
                </div>
              </div>
              <div class="w-row">
                <div class="w-col w-col-6">
                  <h4>Password*</h4>
                </div>
                <div class="w-col w-col-6">
                  <input class="w-input" id="Password" type="text" placeholder="Enter Password" name="Password" required="required" data-name="Password">
                </div>
              </div>
            </div>
            <div class="w-row">
              <div class="w-col w-col-6">
                <h4>Repeat Password*</h4>
              </div>
              <div class="w-col w-col-6">
                <input class="w-input" id="PasswordCheck" type="text" placeholder="Re-enter Password" name="PasswordCheck" required="required" data-name="PasswordCheck">
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
            <div>
              <div class="w-row">
                <div class="w-col w-col-6">
                  <h4>First Name*</h4>
                </div>
                <div class="w-col w-col-6">
                  <input class="w-input" id="FirstName" type="text" placeholder="Your First Name Here" name="FirstName" required="required" data-name="FirstName">
                </div>
              </div>
              <div>
                <div class="w-row">
                  <div class="w-col w-col-6">
                    <h4>Last Name*</h4>
                  </div>
                  <div class="w-col w-col-6">
                    <input class="w-input" id="Last-Name" type="text" placeholder="Your Last Name Here" name="Last-Name" required="required" data-name="Last Name">
                  </div>
                </div>
                <div>
                  <div class="w-row">
                    <div class="w-col w-col-6">
                      <h4>Email*</h4>
                    </div>
                    <div class="w-col w-col-6">
                      <input class="w-input" id="Email" type="text" placeholder="Your Email Here" name="Email" required="required" data-name="Email">
                    </div>
                  </div>
                  <div class="w-row">
                    <div class="w-col w-col-3">
                      <h4>Your Blurb Here</h4>
                    </div>
                    <div class="w-col w-col-9">
                      <textarea class="w-input" id="Blurb" placeholder="Tell us about yourself !" name="Blurb" data-name="Blurb"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input class="w-button" type="submit" value="Add User!" name="submit" data-wait="Please wait...">
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
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/webflow.js"></script>
  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>