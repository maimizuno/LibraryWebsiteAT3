<?php
    include("includes/header.php"); // Includes the "header.php" file, which likely contains HTML code for the header section.
    require("includes/mysqli_connect.php"); // Requires and includes the "mysqli_connect.php" file, which likely establishes a connection to a MySQL database.
    
    if(isset($_SESSION['user_email']) && isset($_COOKIE['maimember'])) { // Checks if the user is logged in based on the existence of the 'user_email' session variable and 'maimember' cookie.
        $query = "SELECT * FROM products"; // Constructs a SQL query to retrieve all records from the 'products' table.
        $result = mysqli_query($dbc, $query); // Executes the query on the database connection.
        
        echo "<table border='1' width='400' height='60' align='center'>";
        echo "<tr><th>Product Id</th><th>Product name</th><th>Genre</th><th>Price</th><th>View Details</th></tr>";
        while($row = mysqli_fetch_array($result)) { // Iterates over the result set and fetches each row as an array.
            echo "<tr>";
            echo "<td>" . $row["productID"];
            echo "<td>" . $row["productName"];
            echo "<td>" . $row["genre"];
            echo "<td>" . $row["price"];
            echo "<td><a href='productDetails.php?ID=",$row['productID'],"'>", 'View', "</a></td>"; // Generates a hyperlink to the product details page using the product ID as a parameter.
            echo "</tr>";
        }
        echo "</table>";
    } else { // If the user is not logged in.
        echo "<h1>Please log in first.</h1>"; // Outputs a message prompting the user to log in.
    }
    
    include("includes/footer.html"); // Includes the "footer.html" file, which likely contains HTML code for the footer section.
?>
