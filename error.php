<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>Shopping Cart</h1></header>

    <main>
        <h2 class="top">Error</h2>
        <p><?php echo $error; ?></p>
        <p><a href="index.php">Return to login view</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Deanna Nguyen</p>
    </footer>
</body>
</html>