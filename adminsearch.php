<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignmetn 5 **/
/*******This page will display the search results for the search bar for administrative page. **/
require_once('database.php');

$productID = filter_input(INPUT_POST, 'product_name');

// get customer breakdown!
//https://www.w3schools.com/sql/sql_top.asp
$item_search = 'SELECT * FROM items WHERE ProductName = :product_name'; 
$item_query = $db -> prepare($item_search);  // prepare item_search$item_search 
$item_query->bindValue(':product_name',$productID);
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

        <p><a href="admin.php">Go back to Shopping Cart View</a></p>  
        <p><a href="updated_form.php">Click to Update the Product</a></p>  
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>

