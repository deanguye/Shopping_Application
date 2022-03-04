<?php
require_once('database.php');

/** ALL CODE IS FROM THE DELETE_PRODUCT.PHP from product manager */
// Get order
$orderID = filter_input(INPUT_POST, 'orderID');

// Delete the product from the database
if ($orderID != false) {
    $query_item = 'DELETE FROM orders
              WHERE orderID = :orderID';
    $s_statement = $db->prepare($query_item);
    $s_statement->bindValue(':orderID', $orderID);
    $success = $s_statement->execute();
    $s_statement->closeCursor();    
} 

//http://localhost/CS602_HW5_Nguyen/index.php?course_id=cs602
// Display the Admin page here
// from https://www.php.net/manual/en/function.header.php
header('Location: admin.php?');

?>