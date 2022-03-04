<?php
require('database.php');

/*** query_customer ****/
// This example is also from view customer form.
$query_customer = 'SELECT *
          FROM customers
          ORDER BY customerorderID';
$customer_statement = $db->prepare($query_customer);
$customer_statement->execute();
$customers = $customer_statement->fetchAll();
$customer_statement->closeCursor();


// Get All courses
$query_items = 'SELECT * FROM items
                      ORDER BY ID';
$all_statement = $db->prepare($query_items);
$all_statement->execute();
$all_items = $all_statement->fetchAll();
$all_statement->closeCursor();

// Get the students by the matching course id! This method is from the github link and index.php?
function getByID(){
    require_once('database.php');
    // get students where it matches course ID
    $queryID= "SELECT * FROM orders ORDER BY orderID ASC";
    $statement = $db->prepare($queryID);
    $statement->execute(); //execute query
    //https://www.php.net/manual/en/pdostatement.fetch.php and from John Winderbaum'students[$i] 
    //recording sessions
    $all_items = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // close
    return $all_items; // return students
}

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>View Customer</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section, view the customer by clicking on select table -->
<body>
    <header><h1>View Customer </h1></header>

    <main>
        <h1>View Customer</h1>
        <form action="view_customer.php" method="post"
              id="view_customer_form">

            <b>View List of Customer Orders By ID Number and Full Name</b>
            <!-- All from the add_product.form php example-->
            <!-- https://stackoverflow.com/questions/57249923/display-description-after-selecting-an-option-->
            <br>
            <p>Use the select table to get the exact customer information<p>
            <p> Note, only the order ID number, Order Amount, and total price
                for that order will be shown.<p>
            <select name="customer_order_id">
            <?php foreach ($customers as $customer) : ?>
                <option value="<?php echo $customer['customerorderID']; ?>">
                    <?php echo $customer['customerorderID']."."; ?>
                    <?php echo $customer['FirstName']; ?>
                    <?php echo $customer['LastName']; ?>
            <?php endforeach; ?>
    
            </select><br>
            <label>&nbsp;</label>
            <br>
            <button>Submit</button>
        </form>
        <p><a href="admin.php">View Cart</a></p>

       
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen.</p>
    </footer>
</body>
</html>