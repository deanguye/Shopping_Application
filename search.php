<!DOCTYPE html>
<html lang="en">
<head>
      <!-- All these are search page for products for customer view -->
    <meta charset="UTF-8">
    <title>Search Page for Products</title>

  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <h3>Search By Name</h3>

    <form id = "customersearch" action="customersearch.php" method = "post">
        <label>Enter Item Name Here: </label>
        <input type = "text" name = "product_name"/>
        <button type = "submit" name = "search">Search</button>
    </form>
    
</div>

</body>
</html>

