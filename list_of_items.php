<?php
require('database.php');

/*** query_item ****/
// This page is to display the list of items! All from homework 5 and 6.
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
    <title>View Product Listing</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>View the product listing </h1></header>

    <main>
        <h4>These are the items already existent in the database.</h4>
        <p>Use the dropdown selection to view the product name.</p>

        <form id = "list_of_items" action="view_listing.php" method = "post">
         <!-- display a table of items using php -->
         <select name="id">
         <?php foreach ($items as $item) : ?>
            <option value="<?php echo $item['ID']; ?>">
                    <?php echo "ID: ".$item['ID']." - Product Name:"; ?>
            <?php echo $item['ProductName']; ?>
        <?php endforeach; ?> 
        </select><br><br>
        <button>Submit</button>
        </form>



        <p><a href="admin.php">Go Back to Shopping Cart View</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen.</p>
    </footer>
</body>
</html>