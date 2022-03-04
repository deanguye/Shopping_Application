<?php
require('database.php');

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

<!-- Delete customer order -->
<head>
    <title>Delete customer order</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Delete customer order </h1></header>
    <main>  
        <!-- Go to order form -->
            <form id = "delete_order_form" action="delete_order.php" method = "post">
            <h4>Orders already existent in the database</h4>
            <p>Select and order and click submit for deletion.</p>

            <!-- display a table of Students -->
            <select name="orderID">
            <?php foreach ($orders as $order) : ?>
             <option value="<?php echo $order['orderID']; ?>">
                    <?php echo "Order ID: ".$order['orderID']." - Customer ID:"; ?>
                <?php echo $order['customerorderID']; ?>
             <?php endforeach; ?> 
            </select><br><br>
             <!-- https://stackoverflow.com/questions/7814949/javascript-onclick-event-return-keyword-functionality -->
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