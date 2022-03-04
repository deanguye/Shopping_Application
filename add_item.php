<?php
    /*** ALL CODE IS FROM addproduct.php ***/
    require_once('database.php');

    // Get the product data
    $Id = filter_input(INPUT_POST, 'id');
    $productName = filter_input(INPUT_POST, 'product_name');
    $description = filter_input(INPUT_POST, 'pdescription');
    $price = filter_input(INPUT_POST, 'price');
    $quantity = filter_input(INPUT_POST, 'quantity');

    // Query to check if item exists and if so, alert user
    $query_ID = 'SELECT * FROM items WHERE ID = :ID';
    $id_statement = $db->prepare($query_ID); // prepare customer statement 2
    $id_statement -> bindValue(':ID',$Id);
    $id_statement->execute();
    $an_item = $id_statement->fetch();
    $id_statement->closeCursor();

    
    // Validate inputs // All from add_product.php
    if ($Id == null || $productName == null  || $price == null
    || $description == null || $quantity == null) { // if any fields are empty
        $error = "Invalid product data. Make sure to check all fields and try again.";
        include('error.php');
    } else if($an_item != null){ // if product in database, go here
        $error = "Product already exists. Make sure to check all fields and try again.";
        include('error.php');
    } else{
        require_once('database.php');
        
        // Add the student into database from the add product php code, learned from lecture
        $query_items = 'INSERT INTO items
                 (ID, ProductName, Pdescription, Price, Quantity)
              VALUES
                 (:id, :product_name, :pdescription,:price,:quantity)';
        // student statement
        $s_statement = $db->prepare($query_items);
        // bind statements here
        $s_statement->bindValue(':id', $Id);
        $s_statement->bindValue(':product_name', $productName);
        $s_statement->bindValue(':pdescription', $description);
        $s_statement->bindValue(':price', $price);
        $s_statement->bindValue(':quantity', $quantity);
        $s_statement->execute();
        $s_statement->closeCursor();

    // Display the Student List page
    // from https://www.php.net/manual/en/function.header.php
    header('Location: admin.php?');
    }

    

?>