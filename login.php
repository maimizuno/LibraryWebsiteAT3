<?php
//use PHP to include the header file here
include("includes/header.php");//include the html file
require_once('includes/mysqli_connect.php'); // Requires and includes the "mysqli_connect.php" file, which establishes a connection to a MySQL database.

if(isset($_POST["login"]))
{
    // Checks if the 'login' button was clicked or the form was submitted.
    
    $userEmail = mysqli_real_escape_string($dbc, $_POST["txtUserEmail"]); // Retrieves the value entered in the 'txtUserEmail' input field and escapes any special characters.
    $userPassword = mysqli_real_escape_string($dbc, $_POST["txtPassword"]); // Retrieves the value entered in the 'txtPassword' input field and escapes any special characters.

    $query = "SELECT * FROM accounts WHERE (userEmail = '$userEmail' AND userPassword = SHA('$userPassword'))"; // Constructs a SQL query to select rows from the 'accounts' table where the userEmail and userPassword match the entered values.

    $result = mysqli_query($dbc, $query); // Executes the query on the database connection and stores the result.
    $num = mysqli_num_rows($result); // Retrieves the number of rows returned by the query.

    if($num == 0)
    {
        echo "No match found"; // Outputs a message indicating no match was found.
    }
    else
    {
        $row = mysqli_fetch_array($result); // Retrieves the first row from the result set as an associative array.
        $_SESSION['user_email'] = $row['userEmail']; // Stores the userEmail value from the row into the 'user_email' session variable.
        $name = $row['userEmail']; // Retrieves the userEmail value from the row and assigns it to the '$name' variable.
        setcookie("maimember",  $name,  time()+60*30); // Sets a cookie named 'maimember' with the value of '$name' that expires in 30 minutes.

        header('Location: index.php'); // Redirects the user to the 'index.php' page.
    }
}
?>

<h1>Login to the Web Site</h1> <!-- Outputs a heading for the login section. -->
<form action="login.php" method="post"> <!-- Creates a form that submits to the same page when submitted. -->
    <fieldset style="{width:700px}"> <!-- Defines a fieldset element with a specified width. -->
        Enter Your registered Email:
        <input type="text" name="txtUserEmail" size="25" maxlength="30"/> <!-- Creates a text input field for the user's email. -->
        <p>
        Enter Your Password:
        <input type="password" name="txtPassword" size="25" maxlength="30" /> <!-- Creates a password input field for the user's password. -->
        <p>
        
        <p align="center">
        <input type="submit" name="login" value="Login" style="{width:100px}"/></p> <!-- Creates a submit button labeled "Login". -->
    </fieldset>
</form>

<?php include ('includes/footer.html'); // Includes the "footer.html" file, which contains HTML code for the footer section. ?>
