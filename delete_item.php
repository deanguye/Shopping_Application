<?php
require_once('database.php');

/** ALL CODE IS FROM THE DELETE_PRODUCT.PHP from product manager */
// Get Item
$itemId = filter_input(INPUT_POST, 'ID');

// Delete the product from the database
if ($itemId != false) {
    
    //Calculate to change total
    $total_o = "SELECT * FROM orders WHERE ID = '$itemId'";
    $total_q = $db -> prepare($total_o);  // prepare order_search $order_search 
    $success = $total_q ->execute();
    $total_o = $total_q-> fetchAll(); // fetch all orders
    $total_q->closeCursor();

    //If any orders found with this product, delete them first so no foreign key conflict
    if($total_o){
        $query_order = 'DELETE FROM orders
        WHERE ID = :ID';
        $s_statement = $db->prepare($query_order);
        $s_statement->bindValue(':ID', $itemId);
        $success = $s_statement->execute();
        $s_statement->closeCursor(); 

        // after delete order, then delete the items
        $query_item = 'DELETE FROM items
              WHERE ID = :ID';
        $s_statement = $db->prepare($query_item);
        $s_statement->bindValue(':ID', $itemId);
        $success = $s_statement->execute();
        $s_statement->closeCursor();  

    }else{
        // if no orders were made with this item, delete the item completely
    $query_item = 'DELETE FROM items
              WHERE ID = :ID';
    $s_statement = $db->prepare($query_item);
    $s_statement->bindValue(':ID', $itemId);
    $success = $s_statement->execute();
    $s_statement->closeCursor(); 
    } 
  
}

//Display admin page.
// from https://www.php.net/manual/en/function.header.php
header('Location: admin.php?');

?>