
<!-- html for main page !-->
<!-- This example is taken from the shopping cart/ Murach example for module 6-->
<main>
<h1>Login Page</h1>

<h4>In this scenario, the precondition is that the admin and customer user is 
    already has their password entered in. The drop down is for demonstration 
    purposes to distinguish between customer and admin page. Click submit 
    to redirect to each page. As well, the customer view is for customer 1.
</h4>
    <!--<input type="submit" formaction="http://firsttarget.com" value="Submit to first" />
      <input type="submit" formaction="http://secondtarget.com" value="Submit to second" /> -->
        <form method ="post">
        <label>Select Account type:</label>
        <select name="account" id="account">
             <option value="admin">Admin</option>
             <option value="customerview">Customer</option><br>
        </select>
        <br>
        <!-- Password is validated here (from murach example)-->
        <label>Enter Password Here: </label>
        <input type = "password" name = "password"/>

        <input type="submit" value="submit" name="submit">
        
    <?php
    /*******ALL THIS IS FROM THE EXAMPLE.PHP in the Product Manager and assignmetn 5 **/
    require_once('database.php');

    $account = null;
    if(isset($_POST['submit']) && isset($_POST['password'])){ // check for password and account
        $password = $_POST['password'];
        $account = $_POST['account'];

    // switch between admin and customer view
    switch($account){
        case 'admin':
            // check for password
            if($password == "password"){
                header('Location: admin.php?');break; // redirect admin page
            }else{
                echo "Password is incorrect, re-enter again."; // if wrong password
            }
        case 'customerview':
            if($password == "password"){
            header('Location: customerview.php?'); break; // redirect customer page
            }else{
                echo "Password is incorrect, re-enter again.";
            }
    }
    }
    ?>

      </form>
</main>
