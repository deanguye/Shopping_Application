<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignment 5 **/
/*******This page will display all the informaiton for checkout for customer **/
require_once('database.php');

$customerID = filter_input(INPUT_POST, 'customer_id');
$totals = "";

//https://www.w3schools.com/sql/sql_top.asp
// Display orders with matching customer ID and a greater quantity than 0
$customer_orders = 'SELECT * FROM orders WHERE customerorderID = :customer_id AND orderQuantity > 0'; 
$customer_query = $db -> prepare($customer_orders);  // prepare customer_orders$customer_orders 
$customer_query->bindValue(':customer_id',$customerID);
$success = $customer_query ->execute();
$all_orders = $customer_query-> fetchAll(); // fetch all orders
$customer_query->closeCursor();

//Get total orders tally
//https://www.w3schools.com/sql/sql_top.asp
$total_orders = 'SELECT SUM(Total) FROM orders WHERE customerorderID = :customer_order_id';  
$total_query = $db -> prepare($total_orders);  // prepare customer_orders$customer_orders 
$total_query->bindValue(':customer_order_id',$customerID);
$total_query ->execute();
$all_totals = $total_query-> fetch(); // fetch all orders
$totals = $all_totals[0];// get content inside sum
$total_query->closeCursor();

//Get customer order information here
$customers = 'SELECT * FROM customers WHERE customerorderID = :customer_id'; 
$query = $db -> prepare($customers);  // prepare customer_orders$customer_orders 
$query->bindValue(':customer_id',$customerID);
$success = $query ->execute();
$customer = $query-> fetchAll(); // fetch all orders
$query->closeCursor();
?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Display Order Summary</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!--********** ALL HTML IS FROM THE example.php for product manager *******-->
<!-- the body section -->
<body>
<header><h1>Deanna's Shopping Cart</h1></header>
<main>
    <section>
         <!-- display a table for customer -->
         <h1><?php echo "Checkout For Customer Number ".$customerID?></h1>
         <h4>Note: The Total represents comprehensively the pricing of all items in that one order.</h4>

        <table align = "center">
            <tr>
                <th>Order ID Number</th>
                <th>Product ID</th>
                <th>Customer Order ID Number</th>
                <th>Order Quantity</th>
                <th>Total</th>
            </tr>
            <!-- display order attributes-->
            
            <?php foreach ($all_orders as $order) : ?>
                <td><?php echo $order['orderID']; ?></td>
                <td><?php echo $order['ID']; ?></td>
                <td><?php echo $order['customerorderID']; ?></td>
                <td><?php echo $order['orderQuantity']; ?></td>
                <td><?php echo $order['Total']; ?></td>            
            </tr>
            <?php endforeach; ?>            
        </table>
        <!-- Show total amount for all orders combined -->
        <h2>Total of all the orders combined:<?php echo $totals?><?php?>     


        </h2>       
        <p><a href="customerview.php">Go back to Shopping Cart View</a></p>  
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>