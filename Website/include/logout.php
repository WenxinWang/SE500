<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: ../Website/index.php"); // Redirecting To Home Page
}
?>
