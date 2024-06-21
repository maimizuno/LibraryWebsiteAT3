<?php
include("includes/header.php"); // Includes the "header.php" file, which likely contains HTML code for the header section.
require("includes/mysqli_connect.php"); // Requires and includes the "mysqli_connect.php" file, which likely establishes a connection to a MySQL database.

if (isset($_POST["registry"])) { // Checks if the "registry" button is clicked.

    $userEmail = $_POST["txtUserEmail"]; // Retrieves the value entered in the "txtUserEmail" field.
    $userPassword = $_POST["txtPassword"]; // Retrieves the value entered in the "txtPassword" field.
    $userPassword2 = $_POST["txtPassword2"]; // Retrieves the value entered in the "txtPassword2" field.
    $userCountry = $_POST["txtUserCountry"]; // Retrieves the value entered in the "txtUserCountry" field.

    $error1 = ""; // Initializes an empty error message variable.
    $error2 = ""; // Initializes an empty error message variable.
    $error3 = ""; // Initializes an empty error message variable.
    $error4 = ""; // Initializes an empty error message variable.

    if (empty($userEmail)) {
        $error1 = "You forgot to enter your email, please enter it";
    } // If the userEmail field is empty, assigns an error message to the $error1 variable.

    if (empty($userPassword)) {
        $error2 = "You forgot to enter a password, please enter it";
    } // If the userPassword field is empty, assigns an error message to the $error2 variable.

    if (empty($userPassword2)) {
        $error3 = "You forgot to re-enter the password, please re-enter it";
    } // If the userPassword2 field is empty, assigns an error message to the $error3 variable.

    if (empty($userCountry)) {
        $error4 = "You forgot to enter your country, please enter it";
    } // If the userCountry field is empty, assigns an error message to the $error4 variable.

    if (empty($error1) && empty($error2) && empty($error3) && empty($error4)) {
        // If all error variables are empty (no errors), proceed with the registration process.

        if ($userPassword == $userPassword2) { // Checks if the entered password matches the re-entered password.

            $query = "INSERT INTO accounts(userEmail, userPassword, userCountry) VALUES ('$userEmail', SHA('$userPassword'), '$userCountry')";
            // Constructs a SQL query to insert the user's information into the 'accounts' table. The user's password is stored as a hashed value.

            $result = mysqli_query($dbc, $query); // Executes the query on the database connection.

            header("Location: index.php"); // Redirects the user to the index.php page after successful registration.
        } else {
            echo "The two passwords do not match";
        } // If the entered password and the re-entered password do not match, displays an error message.

    }
} // Ends the registration process and handles form submission.

?>

<h1>Register to the Web Site</h1>
<form action="registry.php" method="post">
    <fieldset style="{width:700px}">
        Enter UserEmail:
        <input type="text" name="txtUserEmail" value="<?php if (isset($_POST['txtUserEmail'])) {
            echo $_POST['txtUserEmail'];
        } ?>"/>
        <span><?php if (!empty($error1)) {
                echo $error1;
            } ?></span>
        <p>
            Enter Password:
            <input type="password" name="txtPassword"/>
            <span><?php if (!empty($error2)) {
                    echo $error2;
                } ?></span>
        <p>
            Re-enter Password:
            <input type="password" name="txtPassword2"/>
            <span><?php if (!empty($error3)) {
                    echo $error3;
                } ?></span>
        <p>
            Enter Your Country:
            <input type="password" name="txtUserCountry"/>
            <span><?php if (!empty($error4)) {
                    echo $error4;
                } ?></span>
        <p>
            <input type="submit" name="registry" value="Register"/>
        </p>
    </fieldset>
</form>

<?php include('includes/footer.html'); ?>
