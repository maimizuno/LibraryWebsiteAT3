<?php
	$dbc = mysqli_connect('localhost', 'bing', 'abc123', 'mai');

	// Check if there was an error in establishing the database connection
	if (mysqli_connect_errno()) {
		// Display a fatal error message with the description of the connection error
		echo "FATAL ERROR:</br></br>Database Connection Failed: ", mysqli_connect_error();
		// Terminate the script execution
		exit();
	}
?>
