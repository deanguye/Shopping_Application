<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignment 5 **/
/*******This is to update the product name with php **/
require_once('database.php');

$productID = filter_input(INPUT_POST, 'id');
$productName = filter_input(INPUT_POST, 'product_name');
$pdescription = filter_input(INPUT_POST, 'pdescription');
$price = filter_input(INPUT_POST, 'price');
$quantity = filter_input(INPUT_POST, 'quantity');

// For old description change
$old_search = "SELECT * FROM items WHERE ID = '$productID'";
$old_query = $db -> prepare($old_search);  // prepare item_search$item_search 
$success = $old_query ->execute();
$old_all = $old_query-> fetchAll(); // fetch all orders
$old_query->closeCursor();


// get customer breakdown!
//https://www.w3schools.com/sql/sql_top.asp
$item_search = "UPDATE items SET ProductName= '$productName',
 PDescription = '$pdescription', Price = '$price',Quantity='$quantity'
  WHERE ID = '$productID' ";
$item_query = $db -> prepare($item_search);  // prepare item_search$item_search 
$success = $item_query ->execute();
$item_all = $item_query-> fetchAll(); // fetch all orders
$item_query->closeCursor();


//Calculate to change total
$total_q = "SELECT * FROM items WHERE ID = '$productID'";
$total_query = $db -> prepare($total_q);  // prepare order_search$order_search 
$success = $total_query ->execute();
$total_all = $total_query-> fetch(); // fetch all orders
$total_query->closeCursor();

//Calculate to change total
$total_o = "SELECT * FROM orders WHERE ID = '$productID'";
$total_q = $db -> prepare($total_o);  // prepare order_search$order_search 
$success = $total_q ->execute();
$total_o = $total_q-> fetchAll(); // fetch all orders
$total_q->closeCursor();

// update all totals
foreach($total_o as $to){
    $id = $to['orderID'];
    $quantity = $to['orderQuantity'];
    $total = floatval($total_all['Price']) * intval($quantity);
    $final_search = "UPDATE orders SET Total= '$total'WHERE orderID = '$id' ";
$final_query = $db -> prepare($final_search);  // prepare order_search$order_search 
$success = $final_query ->execute();
$final_all = $final_query-> fetchAll(); // fetch all orders
$final_query->closeCursor();
}



// For old description change
$new_search = "SELECT * FROM items WHERE ID = '$productID'";
$new_query = $db -> prepare($new_search);  // prepare item_search$item_search 
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
<header><h1><?php echo "Item change for Product ID ".$productID?></h1><header>
<main>
    <section>
        <h3>Old Item Attributes Before Change:</h3>
         <?php foreach ($old_all as $old) : ?>
            <b>Old Item ID:</b><p><?php echo $old['ID']?></p>
                <b>Old Item Name:</b><p><?php echo $old['ProductName']?></p>
               <b>Old Item Description</b><p><?php echo $old['PDescription']?></p>
               <b>Old Item Price</b><p><?php echo $old['Price']?></p> 
               <b>Old Item Quantity</b><p><?php echo $old['Quantity']?></p> 
            <?php endforeach; ?>      
    </section>
    <section>
    <h3> New attributes after change:</h3>
         <?php foreach ($new_all as $item) : ?>
            <b>New Item ID:</b><p><?php echo $item['ID']?></p>
                <b>New Item ID: </b><p><?php echo $item['ProductName']?></p>
               <b>New Item </b><p><?php echo $item['PDescription']?></p>
               <b>New Item Price</b><p><?php echo $item['Price']?></p>  
               <b>New Item Quantity</b><p><?php echo $item['Quantity']?></p>      
            <?php endforeach; ?>     
    </section> 
    <p><a href="admin.php">Go back to Shopping Cart View For Admin</a></p>  
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>
