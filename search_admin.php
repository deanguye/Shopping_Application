<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- All these are search page for products for administrative view -->
    <title>Search Page for Products</title>

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <h3>Search By Name For Administrative Privileges only</h3>

    <form id = "adminsearch" action="adminsearch.php" method = "post">
        <label>Enter Item Name Here: </label>
        <input type = "text" name = "product_name"/>
        <button type = "submit" name = "search">Search</button>
    </form>

    <h4><a href="admin.php">Go back to view cart for administrator</a></h4>
    
</div>

</body>
</html>

