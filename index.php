<?php
// This is the main page for the site.
include ('includes/header.php'); // Includes the "header.php" file, which contains HTML code for the header section.

if(isset($_SESSION['user_email']) && isset($_COOKIE['maimember'])) {
    // Checks if the 'user_email' session variable is set and the 'maimember' cookie is set.

    $user = $_SESSION['user_email']; // Retrieves the value of the 'user_email' session variable and assigns it to the '$user' variable.
    echo "<h1>Welcome ".$user . " to Mai's website"; // Outputs a welcome message with the value of '$user'.
    echo "</h1>";
    echo "<p>Body Content for logged in user</p>"; // Outputs a paragraph indicating the body content for a logged-in user.
}
else {
    // If the user is not logged in (either the 'user_email' session variable or 'maimember' cookie is not set).
    echo "<h1>Please log in first.</h1>"; // Outputs a message prompting the user to log in.
}

include ('includes/footer.html'); // Includes the "footer.html" file, which contains HTML code for the footer section.
?>
