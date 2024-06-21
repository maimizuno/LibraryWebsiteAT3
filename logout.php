<?php
	session_start(); //Starts the session or resumes an existing session.
	session_destroy(); // Destroy the session itself.
	setcookie ("maimember",  "",  time() - 3600);// Destroy the user name cookie.	
	header("Location: index.php"); //Sends an HTTP redirect response to the "index.php" page, redirecting the user to that page.
	
?>