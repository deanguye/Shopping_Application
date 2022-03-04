<?php
require('database.php');
/*******This is the form page to add all the items.**/
/*** query_item ****/
// This example is also from addproductform.php
$query_item = 'SELECT *
          FROM items
          ORDER BY ID';
$item_statement = $db->prepare($query_item);
$item_statement->execute();
$items = $item_statement->fetchAll();
$item_statement->closeCursor();

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Add new product</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Add New Product </h1></header>

    <main>
        <h1>Add New Product</h1>
        <form action="add_item.php" method="post"
              id="add_item_form">

            <label>ID:</label>
            <input type="number" name="id"><br>

            <label>Product Name:</label>
            <input type="text" name="product_name"><br>

            <label>Description:</label>
            <input type="text" name="pdescription"><br>

            <label>Price:</label>
            <input type="number" step="any" name="price"><br>

            <label>Quantity:</label>
            <input type="number" name="quantity"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item"><br>
        </form>

        <h4>Items already existent in the database</h4>
        <p>This is so that no duplicate items are added. 
            Otherwise, it will notify the user an error occured.</p>
         <!-- display a table of Students -->
         <select name="customer_order_id">
         <?php foreach ($items as $item) : ?>
            <option value="<?php echo $item['ID']; ?>">
                    <?php echo "ID: ".$item['ID']." - Product Name:"; ?>
            <?php echo $item['ProductName']; ?>
        <?php endforeach; ?> 
        </select><br>



        <p><a href="admin.php">Go back to view cart</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen.</p>
    </footer>
</body>
</html>