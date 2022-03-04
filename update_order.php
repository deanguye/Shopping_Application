<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignment 5 **/
/*******This is to allow the user to fill out all fields to update order**/
require_once('database.php');
$orderID = filter_input(INPUT_POST, 'order_id');
$productID = filter_input(INPUT_POST, 'id');
$customerID = filter_input(INPUT_POST, 'customer_id');
$quantity = filter_input(INPUT_POST, 'quantity');


// For old description change
$old_order = "SELECT * FROM orders WHERE orderID = '$orderID'";
$old_query = $db -> prepare($old_order);  // prepare order_search$order_search 
$success = $old_query ->execute();
$old_all = $old_query-> fetchAll(); // fetch all orders
$old_query->closeCursor();

//check product quantity
//Calculate to change total
$total_q = "SELECT * FROM items WHERE ID = '$productID'";
$total_query = $db -> prepare($total_q);  // prepare order_search$order_search 
$success = $total_query ->execute();
$total_all = $total_query-> fetch(); // fetch all orders
$total_query->closeCursor();

if($total_all['Quantity'] < $quantity){
    $error = "Cannot include a value greater than the quantity of items. As shown in the page
    below, the values will remain unchanged for all fields as a result.";
    include('Error.php');
} 

else{ $order_search = "UPDATE orders SET ID= '$productID',
    customerorderID = '$customerID', orderQuantity = '$quantity' WHERE orderID = '$orderID' ";
    $item_query = $db -> prepare($order_search);  // prepare order_search$order_search 
    $success = $item_query ->execute();
    $item_all = $item_query-> fetchAll(); // fetch all orders
    $item_query->closeCursor();

    //Calculate to change total
    $total_q = "SELECT * FROM items WHERE ID = '$productID'";
    $total_query = $db -> prepare($total_q);  // prepare order_search$order_search 
    $success = $total_query ->execute();
    $total_all = $total_query-> fetch(); // fetch all orders
    $total_query->closeCursor();

    $total = floatval($total_all['Price']) * intval($quantity);
    $final_search = "UPDATE orders SET Total= '$total'WHERE orderID = '$orderID' ";
    $final_query = $db -> prepare($final_search);  // prepare order_search$order_search 
    $success = $final_query ->execute();
    $final_all = $final_query-> fetchAll(); // fetch all orders
    $final_query->closeCursor();

    // change quantity after order to reflect on database
    $new_quantity = intval($total_all['Quantity']) - intval($quantity);
    $final_quantity = "UPDATE items SET Quantity= '$new_quantity'WHERE ID = '$productID' ";
    $final_q = $db -> prepare($final_quantity);  // prepare order_search$order_search 
    $success = $final_q ->execute();
    $final = $final_q-> fetchAll(); // fetch all orders
    $final_q->closeCursor();
}

    // For old description change
    $new_order = "SELECT * FROM orders WHERE orderID = '$orderID'";
    $new_query = $db -> prepare($new_order);  // prepare order_search$order_search 
    $success = $new_query ->execute();
    $new_all = $new_query-> fetchAll(); // fetch all orders
    $new_query->closeCursor();

?>


<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Update Item Attributes </title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!--********** ALL HTML IS FROM THE example.php for product manager *******-->
<!-- the body section -->
<body>
<header><h1><?php echo "Update order for customer ID ".$customerID?></h1><header>
<main>
    <section>
        <h3>Old Order Information Before Change:</h3>
         <?php foreach ($old_all as $old) : ?>
            <b>Old order ID:</b><p><?php echo $old['orderID']?></p>
                <b>Old Product ID:</b><p><?php echo $old['ID']?></p>
               <b>Old Customer ID</b><p><?php echo $old['customerorderID']?></p>
               <b>Old Quantity</b><p><?php echo $old['orderQuantity']?></p> 
            <?php endforeach; ?>      
    </section>
    <section>
    <h3> New Order Information after change:</h3>
         <?php foreach ($new_all as $item) : ?>
            <b>New order ID:</b><p><?php echo $item['orderID']?></p>
                <b>New product ID: </b><p><?php echo $item['ID']?></p>
               <b>New customer ID </b><p><?php echo $item['customerorderID']?></p>
               <b>New Quantity</b><p><?php echo $item['orderQuantity']?></p>        
            <?php endforeach; ?>     
    </section> 
    <p><a href="admin.php">Go back to Shopping Cart View For Admin</a></p>  
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>
