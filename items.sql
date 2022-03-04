-- https://stackoverflow.com/questions/1771
-- 1324/database-structure-for-customer-table-having-many-orders-per-customer-and-many
-- create the tables
CREATE TABLE customers (
  customerorderID       INT(11)        NOT NULL   AUTO_INCREMENT,
  FirstName     VARCHAR(12)    NOT NULL,
  LastName    VARCHAR(255)   NOT NULL,
  PRIMARY KEY (customerorderID)
);


CREATE TABLE items (
  ID       INT(12)    NOT NULL,
  ProductName     VARCHAR(255)   NOT NULL,
  PDescription     VARCHAR(600)   NOT NULL,
  Price     DECIMAL(6, 2)   NOT NULL,
  Quantity    INT(11)    NOT NULL,
  PRIMARY KEY(ID)
);

CREATE TABLE orders (
  orderID       INT(12)    NOT NULL AUTO_INCREMENT,
  ID       INT(12)    NOT NULL,
  customerorderID    INT(11)        NOT NULL,
  orderQuantity INT(12)     NOT NULL,
  Total DECIMAL(6, 2)   NOT NULL,
  PRIMARY KEY (orderID),
  CONSTRAINT fk_id FOREIGN KEY (customerorderID) references customers(customerorderID),
  CONSTRAINT fk_item FOREIGN KEY (ID) references items(ID)
);




INSERT INTO customers VALUES
(1, 'John','Doe'),
(2, 'Jane','Doe'),
(3, 'Deanna','Nguyen'),
(4, 'John','Test'),
(5, 'Jane','Test');

INSERT INTO items VALUES
(1, 'water', 'drinking beverage', 2.00,1),
(2, 'hand sanitizer', 'hygiene product', 1.50,5),
(3, 'chips', 'eating food', 1.00,3),
(4, 'magazine', 'reading magazine', 2.50,4),
(5, 'candy', 'eating ', 0.05,1),
(6, 'paper plates', 'used for eating ', 2.60,1),
(7, 'napkins', 'cleaning utencil', 5.40,1),
(8, 'laundry detergent', 'used for laundry/cleaning. ',3.55,1);

-- insert data into the database
INSERT INTO orders VALUES
(1,1, 1, 2, 2.00),
(2,1, 2, 3, 0.15),
(3,2, 3, 1, 1.50),
(4,3,3, 2, 0.10),
(5,4,4, 5, 10.00);

