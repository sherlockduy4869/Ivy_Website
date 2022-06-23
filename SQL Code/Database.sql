CREATE DATABASE WEB_FINAL
GO

USE WEB_FINAL
GO

/*TABLE AREA*/
--TABLE INCLUDES ADMIN INFORMATION
CREATE TABLE TBL_ADMIN
(
	ADMIN_ID INT IDENTITY PRIMARY KEY,
	ADMIN_NAME VARCHAR(255),
	ADMIN_USER VARCHAR(255),
	ADMIN_PASS VARCHAR(255),
	ADMIN_LEVEL INT
)
GO

--TABLE INCLUDES CATEGORY INFORMATION
CREATE TABLE TBL_CATEGORY
(
	CATEGORY_ID INT IDENTITY PRIMARY KEY,
	CATEGORY_NAME VARCHAR(255)
)
GO

--TABLE INCLUDES PRODUCT INFORMATION
CREATE TABLE TBL_PRODUCT
(
	PRODUCT_ID INT IDENTITY PRIMARY KEY,
	PRODUCT_NAME VARCHAR(255),
	CATEGORY_ID INT FOREIGN KEY(CATEGORY_ID) REFERENCES TBL_CATEGORY,
	PRICE FLOAT,
	PRODUCT_DESCRIPTION VARCHAR(500),
	TYPE INT,
	IMAGE VARCHAR(255),
)
GO

--TABLE INCLUDES PRODUCT_IMAGE_DESCRIPTION INFORMATION
CREATE TABLE TBL_PRODUCT_IMAGE_DESCRIPTION
(
	PRO_IMG_DES_ID INT IDENTITY PRIMARY KEY,
	PRODUCT_ID INT FOREIGN KEY(PRODUCT_ID) REFERENCES TBL_PRODUCT,
	PRO_IMG_DES VARCHAR(255)
)
GO

--TABLE INCLUDES SIZE INFORMATION
CREATE TABLE TBL_SIZE
(
	SIZE_ID INT IDENTITY PRIMARY KEY,
	PRODUCT_ID INT FOREIGN KEY(PRODUCT_ID) REFERENCES TBL_PRODUCT,
	SIZE_VALUE VARCHAR(255)
)
GO

--TABLE INCLUDES COLOR INFORMATION
CREATE TABLE TBL_COLOR
(
	COLOR_ID INT IDENTITY PRIMARY KEY,
	PRODUCT_ID INT FOREIGN KEY(PRODUCT_ID) REFERENCES TBL_PRODUCT,
	COLOR_VALUE VARCHAR(255)
)
GO

--TABLE INCLUDES CART INFORMATION
CREATE TABLE TBL_CART
(
	CART_ID INT IDENTITY PRIMARY KEY,
	PRODUCT_ID INT,
	SESSION_ID VARCHAR(255),
	PRODUCT_NAME VARCHAR(255),
	PRICE FLOAT,
	SIZE VARCHAR(255),
	COLOR VARCHAR(255),
	QUANTITY INT,
	IMAGE VARCHAR(255),
	STATUS INT DEFAULT 0
)
GO

--TABLE INCLUDES ORDER INFORMATION
CREATE TABLE TBL_ORDER
(
	ORDER_ID INT IDENTITY PRIMARY KEY,
	SESSION_ID VARCHAR(255),
	CUSTOMER_NAME VARCHAR(255),
	CUSTOMER_PHONE VARCHAR(255),
	CUSTOMER_EMAIL VARCHAR(255),
	CUSTOMER_ADDRESS VARCHAR(255),
	DATE_ORDER DATE 
)
GO

/*TRIGGER AREA*/

--TRIGGER FOR ADDING ORDER_NUMBER
CREATE TRIGGER ADDING_ORDER_NUMBER
ON TBL_ORDER
FOR INSERT
AS 
BEGIN

	DECLARE @session_id VARCHAR(255)

	SELECT @session_id = SESSION_ID FROM inserted

	DECLARE ct CURSOR FOR SELECT TBL_CART.PRODUCT_ID, TBL_CART.QUANTITY
								FROM TBL_ORDER INNER JOIN TBL_CART
								ON TBL_ORDER.SESSION_ID = TBL_CART.SESSION_ID
								WHERE TBL_ORDER.SESSION_ID = @session_id

	OPEN ct
	DECLARE @product_id INT
	DECLARE @quantity_order INT

	FETCH NEXT FROM ct INTO @product_id, @quantity_order
	WHILE @@FETCH_STATUS = 0
	BEGIN

		UPDATE TBL_PRODUCT
		SET NUMBER_ORDERS = NUMBER_ORDERS + @quantity_order
		WHERE PRODUCT_ID = @product_id
		FETCH NEXT FROM ct INTO @product_id, @quantity_order

	END
	CLOSE ct
	DEALLOCATE ct

END
GO


--TRIGGER MYSQL
BEGIN
  DECLARE product_id INT;
  DECLARE quantity_order INT;
  DECLARE done INT DEFAULT FALSE;
  DECLARE tro CURSOR FOR SELECT tbl_cart.PRODUCT_ID, tbl_cart.QUANTITY
								FROM tbl_order INNER JOIN tbl_cart
								ON tbl_order.SESSION_ID = tbl_cart.SESSION_ID
								WHERE tbl_order.SESSION_ID = NEW.SESSION_ID;
  DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
  OPEN tro;
  FETCH tro INTO product_id, quantity_order;
  myloop: LOOP
    IF done THEN
      LEAVE myloop;
    END IF;
	FETCH tro INTO product_id, quantity_order;
    UPDATE tbl_product
	SET NUMBER_ORDERS = NUMBER_ORDERS + quantity_order
	WHERE PRODUCT_ID = product_id;
  END LOOP;
  CLOSE tro;
END

SELECT TBL_PRODUCT.PRODUCT_ID, SUM(TBL_CART.QUANTITY) AS NUM 
            FROM TBL_PRODUCT
            INNER JOIN TBL_CART
            ON TBL_PRODUCT.PRODUCT_ID = TBL_CART.PRODUCT_ID
			WHERE TBL_CART.STATUS = 1
			GROUP BY tbl_product.PRODUCT_ID
GO