/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     02/05/2024 15:22:54                          */
/*==============================================================*/
DROP DATABASE IF EXISTS sepatuku;
CREATE DATABASE sepatuku;
USE sepatuku;

DROP TABLE IF EXISTS ACCOUNT;
DROP TABLE IF EXISTS CART;
DROP TABLE IF EXISTS DETAIL_CART;
DROP TABLE IF EXISTS DETAIL_ORDER;
DROP TABLE IF EXISTS DETAIL_PRODUK;
DROP TABLE IF EXISTS DETAIL_WISHLIST;
DROP TABLE IF EXISTS KATEGORI;
DROP TABLE IF EXISTS ORDER_TABLE;
DROP TABLE IF EXISTS PRODUK;
DROP TABLE IF EXISTS WISHLIST;


CREATE TABLE ACCOUNT (
   ACCOUNT_ID           int unsigned not null auto_increment,
   USERNAME             VARCHAR(50) NOT NULL UNIQUE,
   PASSWORD             TEXT NOT NULL,
   EMAIL                VARCHAR(100) NOT NULL UNIQUE,
   PHONE_NUMBER         VARCHAR(20),
   ADDRESS              VARCHAR(100),
   ROLES				VARCHAR(15) NOT NULL DEFAULT 'User',
   PRIMARY KEY (ACCOUNT_ID)
);

/*==============================================================*/
/* Table: KATEGORI                                              */
/*==============================================================*/
CREATE TABLE KATEGORI (
   KATEGORI_ID         int unsigned not null auto_increment,
   NAMA_KATEGORI        VARCHAR(100),
   PRIMARY KEY (KATEGORI_ID)
);

/*==============================================================*/
/* Table: PRODUK                                                */
/*==============================================================*/
CREATE TABLE PRODUK (
   PRODUK_ID            VARCHAR(15) NOT NULL,
   KATEGORI_ID          INT NOT NULL,
   NAMA_PRODUK          VARCHAR(100),
   DESKRIPSI            TEXT,
   IMAGE                VARCHAR(200),
   HARGA                BIGINT,
   PRIMARY KEY (PRODUK_ID)
);


/*==============================================================*/
/* Table: DETAIL_PRODUK                                         */
/*==============================================================*/
CREATE TABLE DETAIL_PRODUK (
   PRODUK_ID            VARCHAR(15) NOT NULL,
   UKURAN               INT,
   JUMLAH               INT,
   foreign key (PRODUK_ID) references PRODUK(PRODUK_ID)
);

/*==============================================================*/
/* Table: CART                                                  */
/*==============================================================*/
CREATE TABLE CART (
   CART_ID              int unsigned not null auto_increment,
   ACCOUNT_ID           int unsigned not null,
   NAMA_CART            VARCHAR(100),
   foreign key (ACCOUNT_ID) references ACCOUNT(ACCOUNT_ID),
   PRIMARY KEY (CART_ID)
);

/*==============================================================*/
/* Table: DETAIL_CART                                           */
/*==============================================================*/
CREATE TABLE DETAIL_CART (
 CART_ID             int unsigned not null,
 PRODUK_ID            VARCHAR(15) NOT NULL,
 UKURAN               INT NOT NULL,
 JUMLAH               INT,
 foreign key (PRODUK_ID) references PRODUK(PRODUK_ID),
 foreign key (CART_ID) references CART(CART_ID)
);

/*==============================================================*/
/* Table: ORDER_TABLE                                           */
/*==============================================================*/

CREATE TABLE ORDER_TABLE (
   ORDER_ID             VARCHAR(15) NOT NULL,
   ACCOUNT_ID          int unsigned not null,
   ORDER_TIME timestamp NOT NULL default current_timestamp,
   TOTAL_HARGA          BIGINT,
   foreign key (ACCOUNT_ID) references ACCOUNT(ACCOUNT_ID),
   PRIMARY KEY (ORDER_ID)
);

/*==============================================================*/
/* Table: DETAIL_ORDER                                          */
/*==============================================================*/
CREATE TABLE DETAIL_ORDER (
   ORDER_ID             VARCHAR(15) NOT NULL,
   PRODUK_ID            VARCHAR(15) NOT NULL,
   UKURAN               INT,
   JUMLAH               INT,
   foreign key (ORDER_ID) references ORDER_TABLE(ORDER_ID),
   foreign key (PRODUK_ID) references PRODUK(PRODUK_ID)
);

/*==============================================================*/
/* Table: WISHLIST                                              */
/*==============================================================*/
CREATE TABLE WISHLIST (
   WISHLIST_ID          int unsigned not null auto_increment,
   ACCOUNT_ID           int unsigned not null,
   NAMA_WISHLIST        VARCHAR(100),
   foreign key (ACCOUNT_ID) references ACCOUNT(ACCOUNT_ID),
   PRIMARY KEY (WISHLIST_ID)
);

/*==============================================================*/
/* Table: DETAIL_WISHLIST                                       */
/*==============================================================*/
CREATE TABLE DETAIL_WISHLIST (
 WISHLIST_ID          int unsigned not null,
 PRODUK_ID            VARCHAR(15) NOT NULL,
 foreign key (WISHLIST_ID) references WISHLIST(WISHLIST_ID),
 foreign key (PRODUK_ID) references PRODUK(PRODUK_ID)
);
#
INSERT INTO `ACCOUNT` (`ACCOUNT_ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `PHONE_NUMBER`, `ADDRESS`,`ROLES`) VALUES
('1', 'Mario_Giancarlo_Cahyadi', '$2y$12$o2CPSMiN1WHkdkLzoJ/Vi.BgukxHmG4.eRqTbquBCEScJWdWQ6gm2', 'Mgiancarlo@student.ciputra.ac.id', '08123493252', 'Cornell Apartment, Surabaya, JawaTimur','User'),# Mario Giancarlo Cahyadi
('2', 'Tjok_Istri_Vicky_Savitri', '$2a$12$R1BROIFbTDZBg9WO0/5zneqnjw7wHGCP2ItYpyEw0fjHA3ASdoX8C', 'tistrivicky@student.ciputra.ac.id', '08128925845', 'Cornell Apartment, Surabaya, JawaTimur','User'),# Tjok Istri Vicky Savitri
('3', 'David_Lee', '$2a$12$nBTRoFBtAvy4aZpFDyhU9eM7NwVM6DiReMVmuZLRBOvAdWkE/YYCG', 'david.lee@example.com', '+61 2 1234 5678', '789 Elm Street, Anytown, Australia','User'),# P@ssw0rd
('4', 'Sarah_Brown', '$2a$12$qY.Klf.0RvKXttfhhkF79eWIAia2X3RabhDmREpBBcW375/HqUBtu', 'sarah.brown@example.com', '+33 1 23 45 67 89', '101 Oak Street, Anytown, France','User'),# Brownie456
('5', 'Michael_Wang', '$2a$12$FEzqbdA13TBZYbgWcHFUI.667VGU5ZT7fCwMmCvaGL4fQmqwug3au', 'michael.wang@example.com', '+86 10 1234 5678', '321 Maple Street, Anytown, China','User'),# Wang2023!
('6', 'Emily_Rodriguez', '$2a$12$TgTay0tu/U606dZgrQqJB.3uW8gbr4aQjvoXb7k4Tmvt59HjV/OU.', 'emily.rodriguez@example.com', '+1 (123) 456-7890', '456 Pine Street, Anytown, USA','User'),# Rodriguez!2023
('7', 'Daniel_Kim', '$2a$12$By52.5PtKG9ERbHwROQJEeTobsCjToibHm.t.GK5s1jhHiIoaSRbG', 'daniel.kim@example.com', '+44 5678 901234', '789 Oak Street, Anytown, UK','User'),# Kimmy123
('8', 'Emma_Chen', '$2a$12$HyS0ZAyqAP6GeHiDHXZZGOXjtZxyrX3AoO4BOmncFLwBnt2CEklQ6', 'emma.chen@example.com', '+61 3 2345 6789', '101 Elm Street, Anytown, Australia','User'),# Chen2023
('9', 'Alexander_Nguyen', '$2a$12$fjlno5K06xVzreRsYGt4VupoucYc49j.6pq6SOKRu/7EvFvkB067e', 'alexander.nguyen@example.com', '+33 2 34 56 78 90', '321 Maple Street, Anytown, France','User'),# Nguyen!567
('10', 'Olivia_Patel', '$2a$12$iCwfPN4/7dJo9WiQAIlR2OEshcGSz7Pp998ZRjj0ZfH4ZyyAttLiq', 'olivia.patel@example.com', '+86 21 2345 6789', '567 Cedar Street, Anytown, China','User'),# Patel#2023
('11', 'Willia_ Martinez', '$2a$12$/KqFpiH/NjqLRqWMsxgfBOE0KgU5U7.7V2IiTgKLvLFnk6iAk9qdq', 'william.martinez@example.com', '+1 (234) 567-8901', '890 Pine Street, Anytown, USA','User'),# Martinez123
('12', 'Sophia_Brown', '$2a$12$FZQSMnAr/cxQPceUyoLrleCfMPLoOMy1A.pOFWe5pV9mFY9T6Cf4S', 'sophia.brown@example.com', '+44 6789 012345', '123 Oak Street, Anytown, UK','User'),# Brown2023
('13', 'James_Liu', '$2a$12$BE1VGpTf1Zxop1nZ6Z9o2OXp4kQ85adlkYeVgHBUgp6HNOMth735u', 'james.liu@example.com', '+61 4 3456 7890', '456 Elm Street, Anytown, Australia','User'), # Liu#123
('14', 'Isabella_Garcia', '$2a$12$PQzLP2b/J2/OLnzezjfE7.zFnWzvPYT0JEG6zLInJ7A5mMXGNcj2m', 'isabella.garcia@example.com', '+33 3 45 67 89 01', '789 Maple Street, Anytown, France','User'),# Garcia456
('15', 'Benjamin_Khan', '$2a$12$uzut7rP2QgRec/xbZ4xBuOguAkL3CTKn7MbmaVi0HW1PrBtyDkRdO', 'benjamin.khan@example.com', '+86 22 3456 7890', '101 Cedar Street, Anytown, China','User'), # Khan!2023
('16', 'Ava_Singh', '$2a$12$TUv1tSIJWcwxjL8HNxhc3ua/mqblyRGgLgiw2GeC6Pg6gYbpWvDr.', 'ava.singh@example.com', '+1 (345) 678-9012', '234 Pine Street, Anytown, USA','User'),# Singh@2023
('17', 'Matthew_Kim', '$2a$12$SkEYwuyr10H3.7w/nE6T3e8Tb.oZ48TW0BsnjtP8ofVvnvkqBpO5m', 'matthew.kim@example.com', '+44 7890 123456', '567 Oak Street, Anytown, UK','User'), # Kim123!2023
('18', 'Charlotte_Nguyen', '$2a$12$223cNaBDDXmTpAfNrB3uCu7lq0cGaQP.XtJt0FkCL/BFQF.pd8aga', 'charlotte.nguyen@example.com', '+61 5 4567 8901', '890 Elm Street, Anytown, Australia','User'),# Nguyen#2023
('19', 'Ethan_Hernandez', '$2a$12$MM593cIA9umjc0iC8ez2DOaVYegD8U89sIMgNux0YlrEsdWfuvjOu', 'ethan.hernandez@example.com', '+33 4 56 78 90 12', '123 Maple Street, Anytown, France','User'),# Hernandez@567
('20', 'Amelia_Wong', '$2a$12$ccPp18YDUHCse6QBguii5uDwGKBZOLiFSlLD8ryz.JTY0wKJiOF/.', 'amelia.wong@example.com', '+86 23 4567 8901', '456 Cedar Street, Anytown, China','User'),# Wong456!2023
('21', 'Daniel_Evans', '$2a$12$UUhohQ.Tm5pp/l79OrahSuddOZn/k0TkwJA9UNMxvwy4CtkZq7XhS', 'daniel.evans@example.com', '+1 (456) 789-0123', '789 Pine Street, Anytown, USA','User'), # Evans@2023
('22', 'Grace_Kim', '$2a$12$Iy/nPD.elOeLxBgH9REptOqlYv4ti946i4v9W0ZYV9hjxVE4CvvW2', 'grace.kim@example.com', '+44 9012 345678', '101 Oak Street, Anytown, UK','User'),# Kim2023!
('23', 'Henry_Chan', '$2a$12$ivCMXEEmJFR0bxj/YyqL2uDFa/lAN12rskg/WAxhyfV5UolzPfvvK', 'henry.chan@example.com', '+61 6 5678 9012', '321 Elm Street, Anytown, Australia','User'),# Chan123#
('24', 'Chloe_Patel', '$2a$12$/9UUr7YzJByz2EZdD.tWtO5xZMV/zza10VNbHe85XlCEAMz6A7h4m', 'chloe.patel@example.com', '+33 5 67 89 01 23', '567 Maple Street, Anytown, France','User'),#Patel@2023
('25', 'Ella_Nguyen', '$2a$12$wPmKZXIHtbg0xrQ5jKNVEOSE3euJ16Xqg8kSlc09xISDqYE6UHmum', 'ella.nguyen@example.com', '+86 24 5678 9012', '890 Cedar Street, Anytown, China','User'),#Nguyen567#
('26', 'admin', '$2a$12$SoeztCRfNrYvGhsR0s/e0ukK3oibnl8uNbVfVOzncOMymgBvdBHVK', 'admin@admin', '081239435046', 'Gwalk Street, Surabaya','Admin');# admin


INSERT INTO KATEGORI (KATEGORI_ID,NAMA_KATEGORI) VALUES
(1,'Laki laki'),
(2,'Perempuan'),
(3,'Anak anak');

INSERT INTO PRODUK VALUES
('P0001','1','Adidas Handball Spezial Shoes','Upper Material: Leather/Suede Inner Material: Textile Sole Material: Rubber','assets/adidas-1246-1324044-1.webp','1700000'),
('P0002', 1, 'Nike Air Force 1', 'Upper Material: Leather/Synthetic Leather Sole Material: Rubber', 'assets/01-NIKE-FFSSBNIK5-NIKDZ2786400.jpg', 1500000),
('P0003', 2, 'Adidas Ultra Boost 2.0 Triple White', 'Upper Material: Primeknit Sole Material: Rubber', 'assets/adidas-ultra-boost-2.0-triple-white.webp', 2000000),
('P0004', 3, 'K-D Kids Rainbow Tab Shoe - Multi', 'Keep their sneaker rotation looking fresh with footwear like the K-D Rainbow Tab Sneakers. These funky shoes are great for mixing into a weekend outfit and feature a single tab for fastening with leather look panelling, and are made complete with a star embroidery to the front, stitched detailing and a textured sole for added grip.', 'assets/K-D-Kids-Rainbow-Tab-Shoe-Multi.webp', 500000),
('P0005', 1, 'Converse Chuck Taylor All Star', 'Upper Material: Canvas Sole Material: Rubber', 'assets/071A69AD4DE0A79949B564214BD96119.webp', 1000000),
('P0006', 2, 'Nike Air Max 90', 'Upper Material: Mesh/Synthetic Leather Sole Material: Rubber', 'assets/01-NIKE-F34RUNIK5-NIKDH8010100-White.webp', 1800000),
('P0007', 3, 'KIDS NIKE LITTLE KID FLEX RUNNER 2 SLIP-ON RUNNING SHOES', 'Stretch fabric upper with synthetic overlays and support sides Easy slip-on entry with elastic band and pull tabs Cushioned insole with fabric lining Sculpted foam midsole and durable outsole', 'assets/Nike-little-kid-runner.webp', 2500000),
('P0008', 1, 'Puma Suede Classic', 'Upper Material: Suede Sole Material: Rubber', 'assets/Puma-Suede-Classic.webp', 1300000),
('P0009', 2, 'Vans Old Skool', 'Upper Material: Canvas/Suede Sole Material: Rubber', 'assets/Vans-Old-Skool.webp', 1200000),
('P0010', 3, 'Adidas Originals X Disney Mickey Superstar 360 Shoes Kids', 'Designed specifically for lifestyle, these slip-on sneakers for kids exude urban playful style with Minnie Mouse graphic details. Featuring a combination of violet, white, and pink colors, they are crafted with mesh and synthetic upper, textile insole, rubber outsole, and a round toe.', 'assets/adidas-mickey-1.webp', 300000),
('P0011', 1, 'New Balance 574', 'Upper Material: Suede/Mesh Sole Material: Rubber', 'assets/New-Balance-574.webp', 1600000),
('P0012', 2, 'Adidas Stan Smith', 'Upper Material: Leather Sole Material: Rubber', 'assets/Adidas-Stan-Smith.webp', 1700000),
('P0013', 3, 'Family Smiles LED Light Up Wings Sneakers Kids High', 'Light up the night with Family Smiles LED Shoes! With the push of a button, you can alternate between 7 vibrant colors and up to 11 different lighting patterns guaranteed to let the crowd know you’re coming! Our kids shoes are made of high-quality breathable materials with durable and wear-resistant rubber soles for maximum comfort.', 'assets/Family-Smiles-LED-Light-Up-Wings-Sneakers-Kids-High-Top.webp', 400000),
('P0014', 1, 'Reebok Classic Leather', 'Upper Material: Leather Sole Material: Rubber', 'assets/Reebok-Classic-Leather.webp', 1400000),
('P0015', 2, 'Nike Air Jordan 1', 'Upper Material: Leather Sole Material: Rubber', 'assets/Nike-Air-Jordan-1.webp', 2200000),
('P0016', 3, 'Adidas originals x hello kitty and friends superstar 360 shoes kids', 'Designed specifically for lifestyle, these slip-on sneakers for kids boast an urban playful style with Hello Kitty graphic details. Featuring a combination of pink and white colors, they are crafted with textile and synthetic upper, textile insole, rubber outsole, and a round toe.', 'assets/adidas-hello-kitty.webp', 1350000),
('P0017', 1, 'Under Armour HOVR Phantom 2', 'Upper Material: Mesh Sole Material: Rubber', 'assets/Under-Armour-HOVR-Phantom-2.webp', 1900000),
('P0018', 2, 'Converse Chuck 70', 'Upper Material: Canvas Sole Material: Rubber', 'assets/Converse-Chuck-70.webp', 1100000),
('P0019', 3, 'Kushyshoo Girls Nude Cat Flats Soft Mary Jane', 'The upper of these childrens ballet flats from Kushyshoo has an elastic band that offers a stay-put fit,so she can run,jump,and play with confidence.', 'assets/shoe1.webp', 200000),
('P0020', 1, 'Skechers D`Lites', 'Upper Material: Leather/Synthetic Sole Material: Rubber', 'assets/Skechers-DLites.webp', 1200000),
('P0021', 2, 'Puma Cali Sport', 'Upper Material: Leather/Synthetic Sole Material: Rubber', 'assets/Puma-Cali-Sport.webp', 1700000),
('P0022', 3, 'Nike Big Kid Court Borough Low Recraft Gs Sneakers', 'Comfort and style come together in the Nike Court Borough Low 2. The structured, supportive fit has a retro basketball design so you can look like an all-star off the court.', 'assets/NIKE-BIG-KID-COURT-BOROUGH-LOW-RECRAFT-GS-SNEAKERS.webp', 250000),
('P0023', 1, 'ASICS Gel-Kayano 27', 'Upper Material: Mesh/Synthetic Sole Material: Rubber', 'assets/ASICS-Gel-Kayano-27.webp', 2100000),
('P0024', 2, 'Reebok Club C 85', 'Upper Material: Leather Sole Material: Rubber', 'assets/Reebok-Club-C-85.webp', 1500000),
('P0025', 3, 'Under Armour Kids Grade School SlipSpeed Nubuck Training Shoes', 'BREATHABLE UPPER: Supportive nubuck material with engineered venting BOA FIT SYSTEM: A personalized fit, one click at a time, with a 12-point lockdown system CONVERTIBLE HEEL: Go from train mode to recover mode', 'assets/Under-Armour-Kids-Grade-School.webp', 100000);



INSERT INTO DETAIL_PRODUK (PRODUK_ID, UKURAN, JUMLAH) VALUES
-- Adidas handball spezial shoes (P0001)
('P0001', 40, 3),
('P0001', 41, 2),
('P0001', 42, 1),

-- Nike Air Force 1 (P0002)
('P0002', 40, 3),
('P0002', 42, 3),
('P0002', 43, 3),

-- Adidas Ultra Boost 2.0 Triple White (P0003)
('P0003', 42, 3),
('P0003', 43, 3),
('P0003', 44, 3),

-- K-D Kids Rainbow Tab Shoe - Multi (P0004)
('P0004', 26, 3),
('P0004', 27, 3),
('P0004', 28, 3),

-- Converse Chuck Taylor All Star (P0005)
('P0005', 40, 3),
('P0005', 41, 2),
('P0005', 42, 1),

-- Nike Air Max 90 (P0006)
('P0006', 40, 3),
('P0006', 42, 3),
('P0006', 43, 3),

-- KIDS NIKE LITTLE KID FLEX RUNNER 2 SLIP-ON RUNNING SHOES (P0007)
('P0007', 26, 3),
('P0007', 27, 4),
('P0007', 28, 3),

-- Puma Suede Classic (P0008)
('P0008', 42, 5),
('P0008', 43, 4),
('P0008', 44, 3),

-- Vans Old Skool (P0009)
('P0009', 41, 3),
('P0009', 42, 4),
('P0009', 43, 3),

-- Adidas Originals X Disney Mickey Superstar 360 Shoes Kids (P0010)
('P0010', 25, 5),
('P0010', 26, 5),
('P0010', 27, 5),

-- New Balance 574 (P0011)
('P0011', 42, 7),
('P0011', 43, 7),
('P0011', 44, 7),
-- Adidas Stan Smith (P0012)
('P0012', 40, 3),
('P0012', 41, 5),
('P0012', 42, 4),
-- Family Smiles LED Light Up Wings Sneakers Kids High (P0013)
('P0013', 23, 2),
('P0013', 24, 5),
('P0013', 25, 3),
-- Reebok Classic Leather (P0014)
('P0014', 40, 3),
('P0014', 41, 3),
('P0014', 42, 3),
-- Nike Air Jordan 1 (P0015)
('P0015', 42, 7),
('P0015', 43, 7),
('P0015', 44, 8),
-- Adidas originals x hello kitty and friends superstar 360 shoes kids (P0016)
('P0016', 22, 8),
('P0016', 21, 8),
('P0016', 23, 8),
-- Under Armour HOVR Phantom 2 (P0017)
('P0017', 43, 1),
('P0017', 44, 1),
('P0017', 45, 1),
-- Converse Chuck 70 (P0018)
('P0018', 42, 5),
('P0018', 42, 5),
('P0018', 42, 5),

-- Kushyshoo Girls Nude Cat Flats Soft Mary Jane (P0019)
('P0019', 21, 6),
('P0019', 22, 6),
('P0019', 23, 6),

-- Skechers D`Lites (P0020)
('P0020', 39, 3),
('P0020', 40, 3),
('P0020', 41, 3),
('P0020', 42, 3),
-- Puma Cali Sport (P0021)
('P0021', 40, 5),
('P0021', 41, 4),
('P0021', 42, 3),
-- Nike Big Kid Court Borough Low Recraft Gs Sneakers (P0022)
('P0022', 21, 6),
('P0022', 22, 2),
('P0022', 23, 4),
-- ASICS Gel-Kayano 27 (P0023)
('P0023', 42, 3),
('P0023', 43, 3),
('P0023', 44, 3),
-- Reebok Club C 85 (P0024)
('P0024', 41, 5), -- Ukuran tidak spesifik
('P0024', 42, 5),
('P0024', 43, 5),
-- Under Armour Kids Grade School SlipSpeed Nubuck Training Shoes (P0025)
('P0025',23, 4),
('P0025',24, 5),
('P0025',25, 5);



INSERT INTO CART (ACCOUNT_ID, NAMA_CART)
SELECT ACCOUNT_ID, CONCAT('cart_', USERNAME) AS NAMA_CART FROM ACCOUNT;

INSERT INTO DETAIL_CART VALUES
(1,'P0001',40,1),
(1,'P0002',40,1),
(1,'P0003',42,1),
(2,'P0004',26,1),
(2,'P0005',41,1),
(2,'P0006',42,1),
(3,'P0007',42,1),
(3,'P0008',43,1),
(3,'P0009',42,1),
(4,'P0010',25,1),
(4,'P0011',42,1),
(4,'P0012',42,1),
(5,'P0013',23,1),
(5,'P0014',40,1),
(5,'P0015',42,1),
(6,'P0016',22,1),
(6,'P0017',43,1),
(6,'P0018',42,1),
(7,'P0019',21,1),
(7,'P0020',39,1),
(7,'P0021',40,1),
(8,'P0022',21,1),
(8,'P0023',42,1),
(8,'P0024',41,1),
(9,'P0025',23,1);


INSERT INTO WISHLIST (ACCOUNT_ID, NAMA_WISHLIST  )
SELECT ACCOUNT_ID, CONCAT('wishlist_', USERNAME) AS NAMA_CART FROM ACCOUNT;

INSERT INTO DETAIL_WISHLIST VALUES
(1,'P0001'),
(2,'P0002'),
(3,'P0003'),
(4, 'P0004'),
(5, 'P0005'),
(6, 'P0006'),
(7, 'P0007'),
(8, 'P0008'),
(9, 'P0009'),
(10, 'P0010'),
(11, 'P0011'),
(12, 'P0012'),
(13, 'P0013'),
(14, 'P0014'),
(15, 'P0015'),
(16, 'P0016'),
(17, 'P0017'),
(18, 'P0018'),
(19, 'P0019'),
(20, 'P0020'),
(21, 'P0021'),
(22, 'P0022'),
(23, 'P0023'),
(24, 'P0024'),
(25, 'P0025');

INSERT INTO `ORDER_TABLE` (`ORDER_ID`, `ACCOUNT_ID`, `TOTAL_HARGA`) VALUES
('T202405100001', 1, 1700000),
('T202405100002', 2, 1500000),
('T202405100003', 3, 2000000),
('T202405100004', 4, 500000),
('T202405100005', 5, 1000000),
('T202405100006', 6, 1800000),
('T202405100007', 7, 2500000),
('T202405100008', 8, 1300000),
('T202405100009', 9, 1200000),
('T202405100010', 10, 300000),
('T202405100011', 11, 1600000),
('T202405100012', 12, 1700000),
('T202405100013', 13, 400000),
('T202405100014', 14, 1400000),
('T202405100015', 15, 2200000),
('T202405100016', 16, 1350000),
('T202405100017', 17, 1900000),
('T202405100018', 18, 1100000),
('T202405100019', 19, 200000),
('T202405100020', 20, 1200000),
('T202405100021', 21, 1700000),
('T202405100022', 22, 250000),
('T202405100023', 23, 2100000),
('T202405100024', 24, 1500000),
('T202405100025', 25, 100000);

INSERT INTO `DETAIL_ORDER` (`ORDER_ID`, `PRODUK_ID`, `UKURAN`, `JUMLAH`) VALUES
('T202405100001', 'P0001', '40', 1),
('T202405100002', 'P0002', '40', 1),
('T202405100003', 'P0003', '42', 1),
('T202405100004', 'P0004', '26', 1),
('T202405100005', 'P0005', '40', 1),
('T202405100006', 'P0006', '42', 1),
('T202405100007', 'P0007', '26', 1),
('T202405100008', 'P0008', '42', 1),
('T202405100009', 'P0009', '41', 1),
('T202405100010', 'P0010', '25', 1),
('T202405100011', 'P0011', '42', 1),
('T202405100012', 'P0012', '40', 1),
('T202405100013', 'P0013', '25', 1),
('T202405100014', 'P0014', '40', 1),
('T202405100015', 'P0015', '42', 1),
('T202405100016', 'P0016', '22', 1),
('T202405100017', 'P0017', '43', 1),
('T202405100018', 'P0018', '42', 1),
('T202405100019', 'P0019', '21', 1),
('T202405100020', 'P0020', '42', 1),
('T202405100021', 'P0021', '40', 1),
('T202405100022', 'P0022', '21', 1),
('T202405100023', 'P0023', '42', 1),
('T202405100024', 'P0024', '41', 1),
('T202405100025', 'P0025', '23', 1);

drop function if exists fGenProdukId;
delimiter $$
CREATE FUNCTION fGenProdukId()
RETURNS VARCHAR(100) DETERMINISTIC
BEGIN
    DECLARE prefix VARCHAR(1) DEFAULT 'P';
    DECLARE result VARCHAR(10);

    -- Calculate the next available product ID
    SELECT IFNULL(CONCAT(prefix, LPAD(MAX(SUBSTRING(produk_id, 2)) + 1, 4, '0')), CONCAT(prefix, '0001')) INTO result
    FROM produk
    WHERE SUBSTRING(produk_id, 1, 1) = prefix;

    RETURN result;
END $$
delimiter ;

drop trigger if exists tInsProdukId;
delimiter $$
create trigger tInsProdukId
before insert
on Produk
for each row
begin
	SET new.Produk_id=fGenProdukId();
end $$
delimiter ;

DELIMITER //
CREATE PROCEDURE pGetCart (idAccount int)
BEGIN
   SELECT CART.ACCOUNT_ID, CART.NAMA_CART, DETAIL_CART.PRODUK_ID, PRODUK.NAMA_PRODUK, DETAIL_CART.UKURAN, PRODUK.IMAGE, PRODUK.HARGA, DETAIL_CART.JUMLAH
FROM CART
JOIN `ACCOUNT` ON `ACCOUNT`.ACCOUNT_ID = CART.ACCOUNT_ID AND `ACCOUNT`.ACCOUNT_ID = idAccount
JOIN DETAIL_CART ON DETAIL_CART.CART_ID = CART.CART_ID
JOIN PRODUK ON PRODUK.PRODUK_ID = DETAIL_CART.PRODUK_ID
HAVING DETAIL_CART.JUMLAH > 0;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE pGetWishlist (idAccount int)
BEGIN
   SELECT WISHLIST.ACCOUNT_ID, PRODUK.PRODUK_ID, PRODUK.NAMA_PRODUK, PRODUK.IMAGE, PRODUK.HARGA
FROM WISHLIST
JOIN `ACCOUNT` ON `ACCOUNT`.ACCOUNT_ID = WISHLIST.ACCOUNT_ID AND `ACCOUNT`.ACCOUNT_ID = idAccount
JOIN DETAIL_WISHLIST ON DETAIL_WISHLIST.WISHLIST_ID = WISHLIST.WISHLIST_ID
JOIN PRODUK ON PRODUK.PRODUK_ID = DETAIL_WISHLIST.PRODUK_ID;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE pGetFilterCategory (idCategory int)
BEGIN
SELECT PRODUK_ID, IMAGE, NAMA_PRODUK, HARGA
FROM PRODUK
where kategori_id = idCategory;
END //
DELIMITER ;

CREATE VIEW vBEST_SELLING AS
SELECT
  p.PRODUK_ID,
  p.IMAGE,
  p.NAMA_PRODUK,
  p.HARGA,
  SUM(dt.JUMLAH) AS JUMLAH
FROM PRODUK p
JOIN DETAIL_ORDER dt ON p.PRODUK_ID = dt.PRODUK_ID
GROUP BY p.PRODUK_ID
ORDER BY JUMLAH DESC
LIMIT 8;

CREATE VIEW vLATEST AS
SELECT
  p.PRODUK_ID,
  p.IMAGE,
  p.NAMA_PRODUK,
  p.HARGA
FROM PRODUK p
ORDER BY 1 DESC
LIMIT 8;

drop function if exists fGenOrderId;
DELIMITER  //
CREATE FUNCTION fGenOrderId()
RETURNS VARCHAR(15)
DETERMINISTIC
BEGIN
  DECLARE result VARCHAR(15);
  SELECT CONCAT('T', DATE_FORMAT(NOW(), '%Y%m%d'), LPAD(IFNULL(CONVERT(MAX(SUBSTR(order_id, 10, 4)), UNSIGNED), 0) + 1, 4, '0')) INTO result
  FROM order_table
  WHERE SUBSTR(order_id, 2, 8) = DATE_FORMAT(NOW(), '%Y%m%d');
  RETURN result;
END //
DELIMITER ;

DELIMITER //

CREATE TRIGGER tAddOrder
BEFORE INSERT
ON order_table
FOR EACH ROW
BEGIN
  SET NEW.order_id = fGenOrderId();
END //

DELIMITER ;

DELIMITER //
CREATE TRIGGER tUpdateStock
AFTER INSERT
ON DETAIL_ORDER
FOR EACH ROW
BEGIN
UPDATE DETAIL_PRODUK DP
  SET DP.JUMLAH = DP.JUMLAH - NEW.JUMLAH
  WHERE PRODUK_ID = NEW.PRODUK_ID and UKURAN = NEW.UKURAN;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE pHISTORY(ACCID INT)
BEGIN
	SELECT ORDER_TABLE.ORDER_ID, ORDER_TABLE.TOTAL_HARGA, DATE_FORMAT(ORDER_TABLE.ORDER_TIME, '%d %M %Y') as TANGGAL
    FROM ORDER_TABLE, ACCOUNT
    WHERE ORDER_TABLE.ACCOUNT_ID = ACCOUNT.ACCOUNT_ID AND ORDER_TABLE.ACCOUNT_ID = ACCID;
END//
DELIMITER ;

DELIMITER //
CREATE PROCEDURE pDETAIL_HISTORY(ID VARCHAR(15))
BEGIN
	   SELECT DETAIL_ORDER.PRODUK_ID, PRODUK.NAMA_PRODUK, DETAIL_ORDER.UKURAN, PRODUK.IMAGE, PRODUK.HARGA*DETAIL_ORDER.JUMLAH AS TOTAL, DETAIL_ORDER.JUMLAH
	FROM DETAIL_ORDER
	JOIN PRODUK ON PRODUK.PRODUK_ID = DETAIL_ORDER.PRODUK_ID
    WHERE DETAIL_ORDER.ORDER_ID = ID;
END //

CREATE VIEW vRandomProducts as
SELECT
  p.PRODUK_ID,
  p.IMAGE,
  p.NAMA_PRODUK,
  p.HARGA
FROM PRODUK p
ORDER BY RAND()
LIMIT 6;

drop function if exists fGenWishList;
DELIMITER  //
CREATE FUNCTION fGenWishList(acc varchar(100))
RETURNS VARCHAR(100)
DETERMINISTIC
BEGIN
  DECLARE result VARCHAR(100);
  SET result = CONCAT('wishlist_', acc);
  RETURN result;
END //
DELIMITER ;

drop function if exists fGenCart;
DELIMITER  //
CREATE FUNCTION fGenCart(acc varchar(100))
RETURNS VARCHAR(100)
DETERMINISTIC
BEGIN
  DECLARE result VARCHAR(100);
  SET result = CONCAT('cart_', acc);
  RETURN result;
END //
DELIMITER ;
