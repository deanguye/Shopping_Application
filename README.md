READ ME - Idea for shopping cart was from Murach Guitar example and more.

Steps to running this program:
1) Prior Programs need to be ready: XAAMP, MYSQL
2) Make sure to enter the credentials listed as database.php
3) Import items.sql into your database.
4) For xaamp, make sure to put in htdocs.
5) To begin, run apache and mysql at the same time in xaamp. Then import items.sql to database.


Beginning page
1) To access page, type http://localhost/CS602_Project_Nguyen/
2)You will be redirected to the administration page:
3) Password for both, administrator and customer is "password". No quotes, capitalizations or anything.
4) Click submit to enter either view.

For Administrative Views
1) Only 5 products are shown in the view. To view more, Click "View Product Listing".
2) When searching for product, make sure to type exactly as seen in the list. The search button is case sensitive and only takes in product name.
3)When adding product, make sure to look at product name and it's not duplicated. If not, an error message will be displayed.
4) When updating a product, there will be a check to see if the updated number is greater than the stock
amount, if so, an error message will show up and the chart display will remain the same.
5) When updating, if there is enough stock, the change will occur.
6) Delete Product is for the prducts not displayed on table. Regardless, all products can be deleted
7) If a product is deleted, it will affect the order as well and will delete the order.
8) View Customers is for viewing customers orders but in a table format.

For customers
1) For customer view, we are only seeing customer 1's view. To change the customer, go to the customer view, change line 41 and instead of "LIMIT 1", use the select statement to go to a specific customer.
Otherwise, we are stick to one customer view at a time for demonstration purposes (and that is customer 
2)To view rest of products, click "View Product Listing"
3) The "add" button only gives you a message a product has been added. The user will not be able to see
the final order until they click "checkout". This is because I was unable to write the code to have a display message to check the database before display.
4) When clicking checkout, all orders will be displayed. If a product has been deleted prior(can only be done on administrative level), it will be reflected in the order as well and removed promptly.

Access REST PHP
1) For items, use the following links
  a) http://localhost/CS602_Project_Nguyen/rest.php?format=json&items
  b) http://localhost/CS602_Project_Nguyen/rest.php?format=xml&items

2) For Products with Specified range
   a)http://localhost/CS602_Project_Nguyen/rest.php?format=xml&PriceRange=1.00-2.00
   b) http://localhost/CS602_Project_Nguyen/rest.php?format=json&PriceRange=1.00-2.00

3) For Product Name 
   a) http://localhost/CS602_Project_Nguyen/rest.php?format=json&ProductName=napkins
   b) http://localhost/CS602_Project_Nguyen/rest.php?format=xml&ProductName=napkins



