<?php
include("includes/header.php"); // Includes the "header.php" file, which contains HTML code for the header section.
require("includes/mysqli_connect.php"); // Requires and includes the "mysqli_connect.php" file, which likely establishes a connection to a MySQL database.

$productId = $_GET['ID']; // Retrieves the value of the 'ID' parameter from the URL query string.

$query = "SELECT * FROM products WHERE productId = '$productId'"; // Constructs a SQL query to select rows from the 'products' table where the productId matches the retrieved value.

$result = mysqli_query($dbc, $query); // Executes the query on the database connection and stores the result.

echo "<table border='1' width='400' height='60' align='center'>"; // Outputs the beginning of an HTML table element.

while($row = mysqli_fetch_array($result)) {
    // Loops through each row in the result set and assigns it to the '$row' variable as an associative array.

    echo "<tr>"; // Outputs the beginning of an HTML table row element.
    echo "<th>Product ID</th>" . "<td>" . $row["productID"]; // Outputs a table header cell and a corresponding cell with the value of the 'productID' column from the current row.
    echo "</tr>"; // Outputs the end of an HTML table row element.

    echo "<tr>"; // Outputs the beginning of an HTML table row element.
    echo "<th>Product Name</th>" . "<td>" . $row['productName']; // Outputs a table header cell and a corresponding cell with the value of the 'productName' column from the current row.
    echo "</tr>"; // Outputs the end of an HTML table row element.

    echo "<tr>"; // Outputs the beginning of an HTML table row element.
    echo "<th>Genre</th>" . "<td>" . $row['genre']; // Outputs a table header cell and a corresponding cell with the value of the 'genre' column from the current row.
    echo "</tr>"; // Outputs the end of an HTML table row element.

    echo "<tr>"; // Outputs the beginning of an HTML table row element.
    echo "<th>Price</th>" . "<td>" . $row['price']; // Outputs a table header cell and a corresponding cell with the value of the 'price' column from the current row.
    echo "</tr>"; // Outputs the end of an HTML table row element.
}

echo "</table>"; // Outputs the end of the HTML table element.

include("includes/footer.html"); // Includes the "footer.html" file, which contains HTML code for the footer section.
?>
