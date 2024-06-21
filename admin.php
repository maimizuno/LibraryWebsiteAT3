<?php
	include("includes/header.php");//include the html file
	require_once('includes/mysqli_connect.php'); // Requires and includes the "mysqli_connect.php" file, which likely establishes a connection to a MySQL database.

	if(isset($_POST['login'])) // Checks if the 'login' button was clicked or the form was submitted.
	{
		$username = mysqli_real_escape_string($dbc, $_POST["txtUsername"]); // Retrieves the value entered in the 'txtUsername' input field and escapes any special characters.
		$password = mysqli_real_escape_string($dbc, $_POST["txtPassword"]); // Retrieves the value entered in the 'txtPassword' input field and escapes any special characters.

		$query = "SELECT * FROM admin WHERE (adminName = '$username' AND adminPassword = SHA('$password'))"; // Constructs a SQL query to select rows from the 'admin' table where the username and password match the entered values.

		$result = mysqli_query($dbc, $query); // Executes the query on the database connection and stores the result.
		$num = mysqli_num_rows($result); // Retrieves the number of rows returned by the query.

		if($num == 0) // Checks if no rows were returned, indicating no matching username and password combination.
		{
			echo "No match found"; // Outputs a message indicating no match was found.
		}
		else
		{
			header('Location: searchDetails.php'); // Redirects the user to the 'searchDetails.php' page.
		}
	}
?>
<h1>Admin Login</h1> <!-- Outputs a heading for the admin login section. -->
<form action="admin.php" method="post"> <!-- Creates a form that submits to the same page when submitted. -->
	<fieldset style="{width:700px}"> <!-- Defines a fieldset element with a specified width. -->
		Enter Username:
		<input type="text" name="txtUsername" size="25" maxlength="30"/> <!-- Creates a text input field for the username. -->
		<p>
		Enter Password:
		<input type="password" name="txtPassword" size="25" maxlength="30" /> <!-- Creates a password input field for the password. -->
		<p>
			
		<p align="center">
		<input type="submit" name="login" value="Login" style="{width:100px}"/></p> <!-- Creates a submit button labeled "Login". -->
	</fieldset>
</form>
<?php
	include("includes/footer.html"); // Includes the "footer.html" file, which likely contains HTML code for the footer section.
?>
