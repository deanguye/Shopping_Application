<?php
// Cart is from the guitar example
// Create an empty cart if it doesn't exist
if (!isset($_SESSION['cart']) ) {
    $_SESSION['cart'] = array();
}

// Add an item to the cart
function add_item($id, $quantity) {
    $_SESSION['cart'][$id] = round($quantity, 0);
}
//display code here/ 
function display_cart($id,$ProductName,$PDescription,$Price, $Quantity){
        $response['ID'] = $id;
        $response['ProductName'] = $ProductName;
        $response['PDescription'] = $PDescription;
        $response['Price'] = $Price;
        $response['Quantity'] = $Quantity;
        echo $response;
        //echo xmlrpc_encode($response);
    }
    
?>