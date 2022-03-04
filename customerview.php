<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignment 5 **/
require_once('database.php');

// select items based on ID == from Homework 5
$itemID = filter_input(INPUT_GET, 'ID');
if ($itemID == NULL || $itemID == FALSE) {
    // limit to 1 entry to display on top (from w3schools)
    //https://www.w3schools.com/sql/sql_top.asp
    $item_select = 'SELECT * FROM items LIMIT 1'; 
    $item_statement = $db -> prepare($item_select);  // prepare item_select$item_select 
    $item_statement ->execute();
    $item = $item_statement -> fetch(); // fetch ite
    $itemID = $item['ID']; // get first item id
    $item_statement->closeCursor();
}

// Get the matching attributes from items based on custoemr ID
$query_ID = 'SELECT * FROM items
                        WHERE ID = :ID';
$id_statement = $db->prepare($query_ID); // prepare customer statement 2
$id_statement -> bindValue(':ID',$itemID);
$id_statement->execute();
$an_item = $id_statement->fetch();
$courseName = $an_item['ID']; // get a customer with matching customer name
$id_statement->closeCursor();

// Get All Items / from get all courses example
$query_items = 'SELECT * FROM items
                      ORDER BY ID';
$all_statement = $db->prepare($query_items);
$all_statement->execute();
$all_items = $all_statement->fetchAll();
$all_statement->closeCursor();

// select the customer for display page and only limit to 1 customer view (default customer 1)
$customerID = filter_input(INPUT_GET, 'customer_id');
if ($customerID == NULL) {
    // limit to 1 entry to display on top (from w3schools)
    //https://www.w3schools.com/sql/sql_top.asp
    $customer_select = 'SELECT * FROM customers LIMIT 1'; 
    $customer_statement = $db -> prepare($customer_select);  // prepare customer_select$customer_select 
    $customer_statement ->execute();
    $customer = $customer_statement -> fetch(); // fetch customer
    $customerID = $customer['customerorderID']; // get first customer id
    $customer_statement->closeCursor();
}


?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!--********** ALL HTML IS FROM THE example.php for product manager *******-->
<!-- the body section -->
<body>
<header><h1>Shopping Cart</h1></header>
<main>
    <section>
        <!-- display a table of Students -->
        <h1 style ="text-align: center;">Shopping Cart Items</h2>
         <!-- display a table of Students -->
         <h2><?php echo "View For Customer Number ".$customerID?></h2>
 <!-- display a table of items: From courses/students example in module5 -->
        <table align = "center">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Add</th>

            </tr>
            <!-- display a table of items -->
            <!-- For each statement is from homework 5 -->
            <?php foreach ($all_items as $item) : ?>
                <td><?php echo $item['ID']; ?></td>
                <td><?php echo $item['ProductName']; ?></td>
                <td><?php echo $item['PDescription']; ?></td>
                <td><?php echo $item['Price']; ?></td>
                <td><form action="add_to_cart.php" method="POST">
                <select name="quantity" id="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select></td>
                <td><input type="hidden" name="customer_id"
                           value="<?php echo $customerID; ?>">
                    <input type="hidden" name="ID"
                           value="<?php echo $item['ID']; ?>">
                           <input type="hidden" name="Price"
                           value="<?php echo $item['Price']; ?>">
<!-- For each statement is from homework 5:https://stackoverflow.com/questions/7814949/javascript-onclick-event-return-keyword-functionality -->
                    <input type="submit" value="add" onclick
                    = "return alert('Add button was clicked. Quantity in items table will be updated.');"}></td>
            </form>                
            </tr>
            <?php endforeach; ?>            
        </table>
        <!-- View product listings here-->
        <p><a href="list_of_items_customer.php">View Product Listing</a></p>
        
        <!--All the form actions are from various examples (Murach, Homework 5 and 6)-->
        <h5> Search For Product By Name </h5>
            <form action="search.php" method = "post">
            <input type = "hidden" name = "product_name"/>
            <button type = "submit" name = "search">Search</button>
        </form>

        <h5> Proceed to Checkout?</h5>
        <form action="checkout.php" method="POST">
        <input type="hidden" name="customer_id"
            value="<?php echo $customerID; ?>">
            <!--https://stackoverflow.com/questions/7814949/javascript-onclick-event-return-keyword-functionality  -->
        <input type="submit" value="Checkout" onclick
                    ="return confirm('Do you want to complete checkout now of all items? ');">
        </form>

        <h5> Return to Login Page</h5>
        <form action="index.php" method="post">
        <button type = "submit" name = "return">Return</button>
        </form>

        
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>
