<?php
require('database.php');
$test_id = null;

// From Murach Example
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
    <title>Update customer order</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Update customer order </h1></header>

    <main>  
          <!-- All these items are for users to enter input to update order. --> 
            <form id = "update" action="update_order.php" method = "post">
             <label>Enter Order ID Here: </label>
             <input type = "number" name = "order_id"/>
       
            <br><br>
             <label>Enter Product ID Here: </label>
             <input type = "number" name = "id"/>
             <br><br>

             <label>Enter Customer ID Here: </label>
             <input type = "number" name = "customer_id"/>
             <br><br>

             <label>Enter Order Quantity: </label>
             <input type = "number" name = "quantity"/>
             <br><br>

             <button type = "submit" name = "submit">Submit</button>
            </form>

            <h4>Orders already existent in the database</h4>
            <p>This is for the administrator to reference.</p>
         <!-- display a table of Students -->
         <select name="customer_order_id">
         <?php foreach ($orders as $order) : ?>
            <option value="<?php echo $order['orderID']; ?>">
                    <?php echo "Order ID: ".$order['orderID']." - Customer ID:"; ?>
            <?php echo $order['customerorderID']; ?>
            <?php echo "-Product ID:".$order['ID']."- Quantity: ".$order['orderQuantity']; ?>
        <?php endforeach; ?> 
        </select><br>

        <h4>Item names to reference and id when changing order</h4>
         <!-- display a table of Students -->
         <select name="customer_order_id">
         <?php foreach ($items as $item) : ?>
            <option value="<?php echo $item['ID']; ?>">
                    <?php echo "ID: ".$item['ID']." - Product Name:"; ?>
            <?php echo $item['ProductName']; ?>
        <?php endforeach; ?> 
        </select><br>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen.</p>
    </footer>
</body>
</html>