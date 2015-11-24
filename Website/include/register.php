<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    $confirm='';

    if (isset($_POST['submit']))
    {
        if (empty($_POST['Username']) || empty($_POST['Password']) || empty($_POST['PasswordCheck']) || empty($_POST['FirstName']|| empty($_POST['Last-Name']|| empty($_POST['Email'])) 
        {
            $error = "A required field is empty";
        }
        elsif ($_POST['Password'] != $_POST['PasswordCheck'])
        {
            $error = "Passwords do not match";
        }
        else
        {
          $username = $_POST['Username'];
          $password =  $_POST['Password'];
          $firstName = $_POST['FirstName'];
          $lastName = $_POST['Last-Name'];
          $email =  $_POST['Email'];
          $university = $_Post['University'];
          $userdescription = $_Post['Blurb'];
          
        
          // Establishing Connection with Server by passing server_name, user_id and password as a parameter
          $servername = "localhost";
          $serverusername = "spr_ERAU";
          $serverpassword = "asdf";
          $dbname = "SE500spr";

          // Create connection
          $conn = new mysqli($servername, $serverusername, $serverpassword, $dbname);
          // Check connection
          if ($conn->connect_error)
          {
            die("Connection failed: " . $conn->connect_error);
          } 
          $query = mysqli_query($conn, "SELECT * FROM Users WHERE Email = '" .$_POST['Email']. "'");
              
          if(!$row = mysqli_fetch_array($query))
          {
            $query = "INSERT INTO Users (Username, Password, First_Name, Last_Name, Email, User_Description) VALUES ('$username','$password','$firstname','$lastname', '$email', '$userdescription')";
            $data = mysqli_query($conn, $query);
            if($data)
              {
                $confirm = "User has been registered";
	            }
          }
          elseif($row = mysqli_fetch_array($query))
          {
            $error = "Email is already registered";
          }
          else
          {
            $error = "Error registering user";
          }
        }
        $conn->close();
      }
?>
