<!DOCTYPE html>
<html>

<!-- This entire page is for demoing rest APIS and contains sample price range and product names -->
<!-- the head section -->
<head>
    <title>Shopping Cart Rest API's </title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Shopping Cart Rest API's</h1></header>

    <main>
        <h2 class="top">This page will link you to all the REST API's by data type and search</h2>

        <h3> Lookup all Items </h3>
        <p><a href="rest.php?format=json&items">JSON format</a></p>
        <p><a href="rest.php?format=xml&items">XML format</a></p>
       
        <h3> Lookup by Price Range (example listed is from Price Range 1.00-2.00) </h3>
        <p>Note: users can modify the range by typing in the browser <p>
        <p><a href="rest.php?format=json&PriceRange=1.00-2.00">JSON format</a></p>
        <p><a href="rest.php?format=xml&PriceRange=1.00-2.00">XML format</a></p>

        <h3> Lookup by Product Name (using water as example) </h3>
        <p>Note: users can modify the product Name by typing in the browser <p>
        <p><a href="rest.php?format=json&ProductName=water">JSON format</a></p>
        <p><a href="rest.php?format=xml&ProductName=water">XML format</a></p>


        <p><a href="admin.php">Return to admin view</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
    </footer>
</body>
</html>