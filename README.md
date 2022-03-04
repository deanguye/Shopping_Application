This project was inspired by the Shopping Cart Application completed in past courses at Boston University.

Steps to running this program:

Have XAAMP installed using this link: https://www.apachefriends.org/index.html

1) Download the Zip File and insert the folder containing the contents into the  "XAAMP\htdocs" path.
2) Have XAAMP running on Apache and MySQL Module by clicking "start".
3) Type http://localhost/phpmyadmin/index.php
4) Click on "Databases" and create a new database matching the credentials in database.php. The name should be "test" and click "create".
5) Go to "Privileges" and click "Add user account". Only enter the username and password. Both should be "test" as listed in database.php. Click "Check All" for global privileges. Click "go" when finished.
6) Import items.sql into your database.



Beginning page
1) To access page, type http://localhost/shopping_application-main/
2)You will be redirected to the administration page:
3) Password for both, administrator and customer is "password". No quotes, capitalizations or anything.
4) Click submit to enter either view.

For Administrative Views
1) Only 5 products are shown in the view. To view more, Click "View Product Listing".
2) When searching for product, make sure to type exactly as seen in the list. The search button is case sensitive and only takes in product name.
3) When adding product, make sure to look at product name and it's not duplicated. If not, an error message will be displayed.
4) When updating a product, there will be a check to see if the updated number is greater than the stock
amount, if so, an error message will show up and the chart display will remain the same.
5) When updating, if there is enough stock, the change will occur.
6) Delete Product is for the prducts not displayed on table. Regardless, all products can be deleted
7) If a product is deleted, it will affect the order as well and will delete the order.
8) View Customers is for viewing customers orders but in a table format.

For customers
1) For customer view, we are only seeing customer 1's view. To change the customer, go to the customerview.php, change line 41 and instead of "LIMIT 1", use the select statement to go to a specific customer.
2)To view rest of products, click "View Product Listing"
3) The "add" button only gives you a message a product has been added. The user will not be able to see
the final order until they click "checkout". This is because I was unable to write the code to have a display message to check the database before display.
4) When clicking checkout, all orders will be displayed. If a product has been deleted prior(can only be done on administrative level), it will be reflected in the order as well and removed promptly.




