<?php

/**** ALL CODE IS FROM HOMEWORK 6 */
////https://www.allphptricks.com/create-and-consume-simple-rest-api-in-php/
//https://github.com/zichenma/items-manager/blob/master/rest.php

// Get list of items
function getItems(){
    require('database.php');// from add student forms
    // Get All items from homework5 index.php
    $queryItems = "SELECT * FROM `items`";
    $statement = $db->prepare($queryItems);
    $statement->execute();
    //https://www.php.net/manual/en/pdostatement.fetch.php * 
    //I learned this from John Winderbaum'students[$a] recorded session
    $all_products = $statement->fetchAll(PDO::FETCH_ASSOC);// get rid of index number
    $statement->closeCursor(); 
    return $all_products; // get all items
}

// Get the product by product name
function getProductName($ProductName){
    require('database.php'); // from add student form
    // get product matching name
    $query_name= "SELECT * FROM `items` WHERE ProductName= '$ProductName'";
    $statement = $db->prepare($query_name);
    $statement->execute(); //execute query
    //https://www.php.net/manual/en/pdostatement.fetch.php and from John Winderbaum'students[$a] 
    //recording sessions on indexing
    $all_names = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // close
    return $all_names; // return students
}

// Get the products matching by price range
function getPriceRange($p1,$p2){
    require('database.php'); // from add student form
    // get students where it matches items ID
    $query_pr= $output = "SELECT * FROM `items` WHERE Price >= $p1 AND Price <= $p2";
    $statement = $db->prepare($query_pr);
    $statement->execute(); //execute query
    //https://www.php.net/manual/en/pdostatement.fetch.php and from John Winderbaum'students[$a] 
    //recording sessions on indexing
    $all_pr = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor(); // close
    return $all_pr; // return students
}

// JSON FORMAT CONDITIONS BASED ON GET
//https://www.allphptricks.com/create-and-consume-simple-rest-api-in-php/
////https://github.com/zichenma/items-manager/blob/master/rest.php
 //https://www.allphptricks.com/create-and-consume-simple-rest-api-in-php/
$format= filter_input(INPUT_GET, 'format');
 
switch ($format) {
    case 'json':
        if(isset($_GET['items'])){
        //https://stackoverflow.com/questions/6054033/pretty-printing-json-with-php and 
        header('Content-Type: application/json');
        //https://www.wikitechy.com/technology/pretty-printing-json-php/ solution 5
        $json = json_encode(getItems(), JSON_PRETTY_PRINT);
        echo $json;
        }

        // only get the price range
        else if(isset($_GET['PriceRange'])){
        //https://stackoverflow.com/questions/6054033/pretty-printing-json-with-php and 
        header('Content-Type: application/json');
        $PriceRange = $_GET['PriceRange'];
        $values = explode("-",$PriceRange); // split between dash
        $min = $values[0]; // get min
        $max = $values[1]; // get max

        //https://www.wikitechy.com/technology/pretty-printing-json-php/ solution 5
        $json = json_encode(getPriceRange($min,$max),JSON_PRETTY_PRINT);
        echo $json;
        }

        else if(isset($_GET['ProductName'])){ // only get the product name
            $ProductName = $_GET['ProductName'];
         //https://stackoverflow.com/questions/6054033/pretty-printing-json-with-php and 
            header('Content-Type: application/json');
            //https://www.wikitechy.com/technology/pretty-printing-json-php/ solution 5
            $json = json_encode(getProductName($ProductName), JSON_PRETTY_PRINT);
            echo $json;
        }
        break;

    case 'xml':
            if(isset($_GET['items'])){
            header('Content-Type: text/xml');// looked at w3 schools
        $all_products = getItems();
        $an_item = null; //empty string to contenate for printout
        // This foreach loop was from the previous rest api assignment and assignment 2 foreach loop
        foreach($all_products as $a){
            $ID = $a['ID'];
            $ProductName = $a['ProductName'];
            $PDescription = $a['PDescription'];
            $Price = $a['Price'];
            $Quantity = $a['Quantity'];

            //container for print out
            $an_item .= '<item>
            <ID>'.$ID.'</ID>
            <ProductName>'.$ProductName.'</ProductName>
            <PDescription>'.$PDescription.'</PDescription>
            <Price>'.$Price.'</Price>
            <Quantity>'.$Quantity.'</Quantity>
            </item>';
        };

    // define full xml here
    echo '<items>'
    .$an_item.
    '</items>';}//echo xml response here

    // FOR ALL STUDENTS
        else if(isset($_GET['PriceRange'])){
             // it would not let me run on application/xl
        header('Content-Type: text/xml');

        $PriceRange = $_GET['PriceRange'];
        $values = explode("-",$PriceRange); // split between dash
        $min = $values[0]; // get min
        $max = $values[1]; // get max

        $range =getPriceRange($min,$max);
        $an_i = null; //empty string to contenate for printout

        // This foreach loop was from the previous rest api assignment and 
        // https://github.com/zichenma/items-manager/blob/master/rest.php
        foreach($range as $p){
            $ID = $p['ID'];
            $ProductName = $p['ProductName'];
            $PDescription = $p['PDescription'];
            $Price = $p['Price'];
            $Quantity = $p['Quantity'];

            //container for print out
            $an_i .= '<item>
            <ID>'.$ID.'</ID>
            <ProductName>'.$ProductName.'</ProductName>
            <PDescription>'.$PDescription.'</PDescription>
            <Price>'.$Price.'</Price>
            <Quantity>'.$Quantity.'</Quantity>
            </item>';
        }; //echo container
    echo '<items>'
       .$an_i.
    '</items>';} 
        
        else if(isset($_GET['ProductName'])){
            header('Content-Type: text/xml');
            $Pr= $_GET['ProductName'];
            $all_products = getProductName($Pr);
            $a_product = null; //empty string to contenate for printout
        // This foreach loop was from the previous rest api assignment and assignment 2 foreach loop
        foreach($all_products as $e){
            $ID = $e['ID'];
            $ProductName = $e['ProductName'];
            $PDescription = $e['PDescription'];
            $Price = $e['Price'];
            $Quantity = $e['Quantity'];

            //container for print out
            $a_product .= '<item>
            <ID>'.$ID.'</ID>
            <ProductName>'.$ProductName.'</ProductName>
            <PDescription>'.$PDescription.'</PDescription>
            <Price>'.$Price.'</Price>
            <Quantity>'.$Quantity.'</Quantity>
            </item>';
        };  echo '<items>'
        .$a_product.
     '</items>';}
        break;

    default:
        add_error("Could not find format");
        break;
};


?>