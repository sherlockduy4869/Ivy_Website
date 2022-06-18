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
	NUMBER_ORDERS INT
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
	SIZE_VALUE VARCHAR(255),
)
GO

--TABLE INCLUDES COLOR INFORMATION
CREATE TABLE TBL_COLOR
(
	COLOR_ID INT IDENTITY PRIMARY KEY,
	PRODUCT_ID INT FOREIGN KEY(PRODUCT_ID) REFERENCES TBL_PRODUCT,
	COLOR_VALUE VARCHAR(255),
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
	SIZE_ID INT,
	COLOR_ID INT,
	QUANTITY INT,
	IMAGE VARCHAR(255)
)
GO

--TABLE INCLUDES ORDER INFORMATION
CREATE TABLE TBL_ORDER
(
	ORDER_ID INT IDENTITY PRIMARY KEY,
	PRODUCT_NAME,
	SIZE VARCHAR(255),
	COLOR VARCHAR(255),
	DATE_ORDER DATETIME,
	ORDER_VALUE VARCHAR(255),
	CUSTOMER_NAME VARCHAR(255),
	CUSTOMER_PHONE VARCHAR(255),
	CUSTOMER_EMAIL VARCHAR(255),
	CUSTOMER_ADDRESS VARCHAR(255)
)
GO
