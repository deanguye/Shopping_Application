<?php
require_once('database.php');

/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignment 5 **/
/*******This is to add the product to the card **/
$CustomerID = filter_input(INPUT_POST, 'customer_id');
$ID = filter_input(INPUT_POST, 'ID');
$quantity = filter_input(INPUT_POST, 'quantity');
$price = filter_input(INPUT_POST, 'Price');


//Add product to the database
// Source: https://stackoverflow.com/questions/36484366/how-to-get-value-of-option-from-html-select-tag-using-php
if ($CustomerID != false || $ID != false  || $quantity != false || $price != false) {
    $orderID = 0;
    $total = floatval($price) * intval($quantity);

    // update quantities
    
        //get quantity in stock
        //Calculate to change total
        $q = "SELECT * FROM items WHERE ID = '$ID'";
        $total_query = $db -> prepare($q);  // prepare order_search$order_search 
        $success = $total_query ->execute();
        $total_all = $total_query-> fetch(); // fetch all orders
        //print_r($total_all);
        $quantity1 = $total_all['Quantity'];
        $total_query->closeCursor();

        // convert the quantity retrived to integer to check for comparison
        $subquantity = intval($quantity1);

        //To detect cases of negative numbers or 0 values for orders, if so, do not update database
        if($subquantity == 0){
            echo "Unable to complete transaction because we do not have item in stock.";
            echo "Return to customer shopping cart";
            //http://localhost/CS602_HW5_Nguyen/index.php?course_id=cs602
            // Display the Student List page
            // from https://www.php.net/manual/en/function.header.php
            header('Location: customerview.php?');
        } 

        else if ($subquantity >= intval($quantity)){
            $total2 = $subquantity - intval($quantity);
        //update quantity in stock
        // get customer breakdown!
        //https://www.w3schools.com/sql/sql_top.asp
        $item_search = "UPDATE items SET Quantity= '$total2' WHERE ID = '$ID' ";
        $item_query = $db -> prepare($item_search);  // prepare item_search$item_search 
        $success = $item_query ->execute();
        $item_all = $item_query-> fetchAll(); // fetch all orders
        $item_query->closeCursor();

        //query to get order ID
        //https://www.w3schools.com/sql/sql_top.asp
        $id_search = "SELECT * FROM orders WHERE customerorderID = '.$CustomerID.' "; 
        $id_query = $db -> prepare($id_search);  // prepare id_search$id_search 
        $success = $id_query ->execute();
        $id_all = $id_query-> fetchAll(); // fetch all orders
        print_r($id_all);
        $id_query->closeCursor();
    
         // if already in cart, update quantity and other attributes
         if($id_all['orderID'] == $orderID && $id_all['ID'] == $ID){
        $query_item = "UPDATE orders SET ID= '$ID',
        orderQuantity ='$quantity' WHERE customerorderID = '$CustomerID' ";
        $s_statement = $db->prepare($query_item);
        $success = $s_statement->execute();
        $s_statement->closeCursor();
        } else {
        // create new order here
        $query_item = "INSERT INTO orders
        (orderID, ID, customerorderID, orderQuantity, Total)
        VALUES
        (:order_id,:ID, :customer_id, :quantity,:total)";

        $s_statement = $db->prepare($query_item);
        $s_statement->bindValue(':order_id', $orderID);
        $s_statement->bindValue(':ID', $ID);
        $s_statement->bindValue(':customer_id', $CustomerID);
        $s_statement->bindValue(':quantity', $quantity);
        $s_statement->bindValue(':total', $total);
        $success = $s_statement->execute();
        $s_statement->closeCursor();
    } 

    
    
    

//http://localhost/CS602_HW5_Nguyen/index.php?course_id=cs602
// Display the Student List page
// from https://www.php.net/manual/en/function.header.php
header('Location: customerview.php?');
}

}
        
?>