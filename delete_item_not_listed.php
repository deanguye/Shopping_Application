<?php
// This is for the items not listed in the table so that the administrator can delete the item.
require('database.php');
$test_id = null;

/*** query_order ****/
// This example is also from addproductform.php
$query_order = 'SELECT *
          FROM orders
          ORDER BY orderID';
$order_statement = $db->prepare($query_order);
$order_statement->execute();
$orders = $order_statement->fetchAll();
$order_statement->closeCursor();

/*** query_item ****/
// This example is also from addproductform.php
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
    <title>Delete item not shown on table</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Delete item </h1></header>

    <main>  <!-- Delete the item here -->
            <form id = "update" action="delete_item.php" method = "post">
            <h4>Items already existent in the database</h4>
            <p>Select and order and click submit for deletion.</p>
         <!-- display a table of Students -->
         <select name="ID">
             <!-- Loop through all items for display -->
         <?php foreach ($items as $item) : ?>
            <option value="<?php echo $item['ID']; ?>">
                    <?php echo "Item ID: ".$item['ID']." - Product Name:"; ?>
            <?php echo $item['ProductName']; ?>
        <?php endforeach; ?> 
        </select><br><br>
         <!-- Confirm if you want to delete from https://stackoverflow.com/questions/7814949/javascript-onclick-event-return-keyword-functionality -->
             <button type = "submit" name = "submit" onclick
                    ="return confirm('Do you want to delete this product? ');">Submit</button>
            </form>
            <h4><a href="admin.php">Go back to view cart for administrator</a></h4>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen.</p>
    </footer>
</body>
</html>