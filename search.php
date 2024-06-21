<?php
    include("includes/header.php"); // Includes the "header.php" file, which likely contains HTML code for the header section.
    require_once("includes/mysqli_connect.php"); // Requires and includes the "mysqli_connect.php" file, which likely establishes a connection to a MySQL database.

    if (isset($_POST["search"])) { // Checks if the "search" button is clicked.

        $productName = $_POST['txtProductName']; // Retrieves the value entered in the "txtProductName" field.

        $query = "INSERT INTO search(searchWords) VALUE ('$productName')";
        $result = mysqli_query($dbc, $query);
        // Inserts the search keyword into a 'search' table (assuming it exists), to store the search history.

        $query = "SELECT * FROM products WHERE productName = '$productName'"; // Constructs a SQL query to search for products by name.
        $result = mysqli_query($dbc, $query); // Executes the query on the database connection.

        echo "<table border = '1' width = '400' height = '60'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Product Name</th>";
        echo "<th>Genre</th>";
        echo "<th>Price(AU$)</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {

            echo "<td>" . $row["productID"];
            echo "<td>" . $row["productName"];
            echo "<td>" . $row["genre"];
            echo "<td>" . $row["price"];
        }
        echo "</table>";
    }

?>

<h1>Search Products</h1>
<form action="search.php" method="post">
    <fieldset style="{width:700px}">
        Enter product name:
        <input type="text" name="txtProductName"/>
        <p>
        <input type="submit" name="search" value="Search"/>
        </p>
    </fieldset>
</form>

<?php
    include("includes/footer.html"); // Includes the "footer.html" file, which likely contains HTML code for the footer section.
?>
