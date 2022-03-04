<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignmetn 5 **/
// This entire page is to view the item listing for the customers.
require_once('database.php');

$productID = filter_input(INPUT_POST, 'id');

// get customer breakdown!
//https://www.w3schools.com/sql/sql_top.asp
$item_search = 'SELECT * FROM items WHERE ID = :id'; 
$item_query = $db -> prepare($item_search);  // prepare item_search$item_search 
$item_query->bindValue(':id',$productID);
$success = $item_query ->execute();
$item_all = $item_query-> fetchAll(); // fetch all orders
$item_query->closeCursor();


?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Item description </title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!--********** ALL HTML IS FROM THE example.php for product manager *******-->
<!-- the body section -->
<body>
<header><h1><?php echo "Item information for ".$productID?></h1><header>
<main>
    <section>
         <?php foreach ($item_all as $item) : ?>
                <b>Description for <?php echo $item['ProductName']; ?>: </b><p><?php echo $item['PDescription']; ?></p>
                <b>Price for Product</b>
                <p>$<?php echo $item['Price']; ?></p>    
        
            <?php endforeach; ?>            

        <p><a href="list_of_items_customer.php">Go back to list of items</a></p>
        <p><a href="customerview.php">Go back to Shopping Cart View</a></p>  
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>

