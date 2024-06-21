<?php
    include("includes/header.php"); // Includes the "header.php" file, which likely contains HTML code for the header section.
    require("includes/mysqli_connect.php"); // Requires and includes the "mysqli_connect.php" file, which likely establishes a connection to a MySQL database.
    
    $query = "SELECT * FROM search"; // Constructs a SQL query to select all records from the 'search' table.
    $result = mysqli_query($dbc, $query); // Executes the query on the database connection.
    
    echo "<table border = '1' width = '400' height = '60' align = 'center'>";
    echo "<tr><th>View Search Details</th></tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row["searchWords"]; // Outputs the searchWords column value from each row.
        echo "</tr>";
    }
    echo "</table>";
    
    include("includes/footer.html"); // Includes the "footer.html" file, which likely contains HTML code for the footer section.
?>
