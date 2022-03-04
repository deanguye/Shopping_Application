<?php
/*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignment 5 **/
/*******This is the main administrative page for the table **/
require_once('database.php');

// Get all items and limit to 1 entry
$itemID = filter_input(INPUT_GET, 'ID');
if ($itemID == NULL || $itemID == FALSE) {
    // limit to 1 entry to display on top (from w3schools)
    //https://www.w3schools.com/sql/sql_top.asp
    $item_select = 'SELECT * FROM items LIMIT 1'; 
    $item_statement = $db -> prepare($item_select);  // prepare item_select$item_select 
    $item_statement ->execute();
    $item = $item_statement -> fetch(); // fetch item
    $itemID = $item['ID']; // get first item id
    $item_statement->closeCursor();
}

// Get the matching id for the items
$query_ID = 'SELECT * FROM items
                        WHERE ID = :ID';
$id_statement = $db->prepare($query_ID); // prepare item statement 2
$id_statement -> bindValue(':ID',$itemID);
$id_statement->execute();
$an_item = $id_statement->fetch();
$courseName = $an_item['ID']; // get a matching item id
$id_statement->closeCursor();

// Get All courses
$query_items = 'SELECT * FROM items
                      ORDER BY ID LIMIT 5';
$all_statement = $db->prepare($query_items);
$all_statement->execute();
$all_items = $all_statement->fetchAll();
$all_statement->closeCursor();


//Query  For customer displays only
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
    <center><title>Shopping Cart</title></center>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!--********** ALL HTML IS FROM THE example.php for product manager *******-->
<!-- the body section -->
<body>
<header><h1 style ="text-align: center;">Shopping Cart</h1></header>
<main>
    <section>
        <!-- display a table of Students -->
        <h1 style ="text-align: center;">Shopping Cart Items</h2>
         <!-- display a table of Students -->
         <h2><?php echo "View For Administrator"?></h2>

        <table align = "center">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Stock Quantity</th>
                <th>Price</th>
                <th>Delete</th>

            </tr>
            <!-- display a table of Items-->
            <?php foreach ($all_items as $item) : ?>
                <td><?php echo $item['ID']; ?></td>
                <td><?php echo $item['ProductName']; ?></td>
                <td><?php echo $item['PDescription']; ?></td>
                <td><?php echo $item['Quantity']; ?></td>
                <td><?php echo $item['Price']; ?></td>
              
                <td><form action="delete_item.php" method="post">
                     <!-- get a product id. -->
                    <input type="hidden" name="ID"
                           value="<?php echo $item["ID"]; ?>">
                    <!--https://stackoverflow.com/questions/45727944/how-to-get-delete-confirmation-from-user-before-the-delete-query-using-php -->
                    <input type="submit" value="Delete" onclick
                    ="return confirm('Do you want to delete this product? ');">
                </form></td>
                
            </tr>
            <?php endforeach; ?> 
       
            
        </table>
    </section>
    <br>
    <!-- Display all the links here the admininstrator can access. -->
    <p><a href="list_of_items.php">View Product Listing</a></p>
    <p><a href="search_admin.php">Search For Product</a></p>
        <p><a href="add_item_form.php">Add Product</a></p>
        <p><a href="updated_form.php">Update Product</a></p>
        <p><a href="delete_item_not_listed.php">Delete Product (Not shown on table)</a></p>
        <p><a href="update_order_form.php">Update Customer Order</a></p>
        <p><a href="delete_order_form.php">Delete Customer Order</a></p>
        <p><a href="view_customer_form.php">View Customers</a></p>
        <p><a href="restapis.php">Link to rest apis</a></p>
        <p><a href="index.php">Return to login view</a></p>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
</footer>
</body>
</html>