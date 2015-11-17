<?php
$servername = "localhost";
$username = "spr_erau";
$password = "asdf";
$dbname = "SE500spr";
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Selecting Database
session_start();// Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($connection, "SELECT First_Name FROM Users WHERE Username='" .$user_check. "'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['First_Name'];
if(!isset($login_session))
    {
    $connection->close();
    $login_session = "Log In";
    }
?>
