<?php
require('database.php');
$test_id = null;

/*** query_item ****/
// This example is from update form on Murach example.
// get items
$query_item = 'SELECT *
          FROM items
          ORDER BY ID';
$item_statement = $db->prepare($query_item);
$item_statement->execute();
$items = $item_statement->fetchAll();
$item_statement->closeCursor();

?>


<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Update current product</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Update current Product </h1></header>

    <main>
        <h1>Update current Product</h1>
            <!-- Fill in fields to update product-->
            <form id = "update" action="update.php" method = "post">
             <label>Enter Product ID Here: </label>
             <input type = "number" name = "id"/>
       
            <br><br>
             <label>Enter Product Name Here: </label>
             <input type = "text" name = "product_name"/>
             <br><br>

             <label>Enter Product Description Here: </label>
             <input type = "text" name = "pdescription"/>
             <br><br>

             <label>Enter New Price: </label>
             <input type = "number" step="any" name = "price"/>
             <br><br>

             <label>Enter New Quantity: </label>
             <input type = "number" name = "quantity"/>
             <br><br>

             <button type = "submit" name = "submit">Submit</button>
            </form>

            <h4>Items already existent in the database</h4>
            <p>This is for the administrator to reference.</p>
         <!-- display a table of Students -->
         <select name="customer_order_id">
         <?php foreach ($items as $item) : ?>
            <option value="<?php echo $item['ID']; ?>">
                    <?php echo "ID: ".$item['ID']." - Product Name:"; ?>
            <?php echo $item['ProductName']; ?>
        <?php endforeach; ?> 
        </select><br>
        <p><a href="admin.php">Go back to Shopping Cart View</a></p>  
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen.</p>
    </footer>
</body>
</html>