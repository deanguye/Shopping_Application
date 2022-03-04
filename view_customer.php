<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignment 5 **/
// View customer php
require_once('database.php');

$customerID = filter_input(INPUT_POST, 'customer_order_id');

// get customer breakdown!
//https://www.w3schools.com/sql/sql_top.asp
$customer_search = 'SELECT * FROM orders WHERE customerorderID = :customer_order_id'; 
$customer_query = $db -> prepare($customer_search);  // prepare customer_search$customer_search 
$customer_query->bindValue(':customer_order_id',$customerID);
$success = $customer_query ->execute();
$item_all = $customer_query-> fetchAll(); // fetch all orders
$customer_query->closeCursor();


//Get total orders
//https://www.w3schools.com/sql/sql_top.asp
$total_orders = 'SELECT SUM(Total) FROM orders WHERE customerorderID = :customer_order_id'; 
$total_query = $db -> prepare($total_orders);  // prepare customer_orders$customer_orders 
$total_query->bindValue(':customer_order_id',$customerID);
$success2 = $total_query ->execute();
$all_totals = $total_query-> fetch(); // fetch all orders
$totals = $all_totals[0];// get content inside sum
$total_query->closeCursor();
?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Customer description </title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!--********** ALL HTML IS FROM THE example.php for product manager *******-->
<!-- the body section -->
<body>
<header><h1><?php echo "List of customers orders for customer number ".$customerID." "?></h1><header>
<main>
    <section>
    <table align = "center">
        <!--********** View the customer after clicking on form submission *******-->
        <h4>Note: The Product ID is listed to reference the product name.</h4>
            <tr>
                <th>Order ID Number</th>
                <th>Product ID</th>
                <th>Order Quantity</th>
                <th>Total Price per Order</th>
            </tr>
         <?php foreach ($item_all as $item) : ?>
            <tr>
                <td><?php echo $item['orderID']; ?></td>
                <td><?php echo $item['ID']; ?></td>    
                <td><?php echo $item['orderQuantity']; ?></td>    
                <td><?php echo $item['Total']; ?></td>    
            <tr>
            <?php endforeach; ?>        
         </table>

        <h2>Total for the entire order:<?php echo $totals?><?php?></h2>

        <p><a href="admin.php">Go back to Shopping Cart View for Administrator</a></p>  
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>