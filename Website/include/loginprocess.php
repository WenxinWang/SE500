<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit']))
    {
        if (empty($_POST['username']) || empty($_POST['password'])) 
        {
            $error = "Username or Password is missing";
        }
        else
        {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $servername = "localhost";
            $serverusername = "spr_erau";
            $serverpassword = "asdf";
            $dbname = "SE500spr";

            // Create connection
            $conn = new mysqli($servername, $serverusername, $serverpassword, $dbname);
            // Check connection
            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            } 
                    
            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            //$username = mysqli_real_escape_string($username);
            //$password = mysqli_real_escape_string($password);
            
            // SQL query to fetch information of registerd users and finds user match.
            $sql = "SELECT * FROM Users WHERE Username = '" .$username. "' AND BINARY Password = BINARY '" .$password. "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                $_SESSION['login_user']=$username; // Initializing Session
                header("location: loggedin.php"); // Redirecting To Other Page
            }
            else
            {
                $error = "Username or Password is invalid";
            }
            $conn->close();
        }
    }
?>
