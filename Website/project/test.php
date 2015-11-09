<?php
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

<input name="" type="button" value="下载" onClick="location='http://http://192.168.1.128/phpmyadmin/tbl_get_field.php?db=SE500spr&table=Projects&where_clause=%60Projects%60.%60Project_ID%60+%3D+2&transform_key=Source_Code&sql_query=SELECT+%2A+FROM+%60Projects%60&token=bbf0a484563b8b9e9118a6f7ac9b9a64'" >
<td valign="middle"><a href="tbl_get_field.php?db=SE500spr&amp;table=Projects&amp;where_clause=%60Projects%60.%60Project_ID%60+%3D+2&amp;transform_key=Source_Code&amp;sql_query=SELECT+%2A+FROM+%60Projects%60&amp;token=bbf0a484563b8b9e9118a6f7ac9b9a64" 
class="disableAjax">[BLOB - 1 字节]</a> class="sd" style="sd">下载</a>
?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com-->
<!-- Last Published: Tue Oct 20 2015 18:37:42 GMT+0000 (UTC) -->
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
    <div class="w-container top-menu">
      <div class="w-row toprow">
        <div class="w-col w-col-8"></div>
        <div class="w-col w-col-2 about-column"><a class="about" href="../about/about.html">About</a>
        </div>
        <div class="w-col w-col-2">
          <div class="w-dropdown" data-delay="0">
            <div class="w-dropdown-toggle topmenu">
              <div><span class="in-image-text">Jaiden91</span>
              </div>
              <div class="w-icon-dropdown-toggle usermenu"></div>
            </div>
            <nav class="w-dropdown-list"><a class="w-dropdown-link" href="#">Not you?</a><a class="w-dropdown-link" href="../user/user.html">Profile</a><a class="w-dropdown-link" href="../newedituser/neweditproject.html">Settings</a><a class="w-dropdown-link" href="../neweditproject/newedituser.html">New Project</a>
            </nav>
          </div>
        </div>
      </div>
    </div><img class="top-image" src="../images/Function room2.jpg">
  </div>
  <div class="w-section smallheadsection">
    <h1 class="searchpagetitle"><a class="smallheaderlink" href="../index.html">Project Hunter</a><a class="smallheaderlink" href="../index.html"></a></h1>
  </div>
  <div class="w-section project-title">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6"><img src="../images/ExampleImage3.jpg">
        </div>
        <div class="w-col w-col-6">
          <h1 class="projectheading">Protecting Against SQL Injection</h1>
          <div>
            <div class="w-form">
              <form id="email-form" name="email-form" data-name="Email Form">
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
                    <input class="w-button ratebutton" type="submit" value="Rate!" data-wait="Please wait...">
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
          <div><img src="../images/star rating.jpg">
          </div>
          <div><a href="../user/user.html">M. L. Alphabet</a>&nbsp;Completed on 05/27/2014</div>
        </div>
      </div>
      <div class="projectdescriptiontext">An exciting new method designed to protect against a form of attack that has long since been made irrelevant by modern security techniques. Blah Blah Blah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blah&nbsp;&nbsp;h BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blahh BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blahh BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blahh BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blahh BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blahh BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blahh BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah BlahBlah Blah</div>
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
    <div class="w-container favcontainer"><a class="w-button favorite-button">Favorite!</a>
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