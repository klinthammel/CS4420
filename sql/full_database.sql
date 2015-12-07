-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2015 at 11:05 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CS4420`
--

-- --------------------------------------------------------

--
-- Table structure for table `description_alcohol`
--

DROP TABLE IF EXISTS `description_alcohol`;
CREATE TABLE IF NOT EXISTS `description_alcohol` (
  `barcode` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `rate_count` int(11) NOT NULL,
  PRIMARY KEY (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table will hold the description of the alcoholic drinks on the list.';

--
-- Truncate table before insert `description_alcohol`
--

TRUNCATE TABLE `description_alcohol`;
--
-- Dumping data for table `description_alcohol`
--

INSERT INTO `description_alcohol` (`barcode`, `category`, `sub_category`, `type`, `rating`, `rate_count`) VALUES
(2123450, 'Absinthe', 'N/A', 'liquor', 0, 0),
(2123451, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123452, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123453, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123454, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123455, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123456, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123457, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123458, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123459, 'Brandy', 'N/A', 'liquor', 0, 0),
(2123460, 'Cognac', 'N/A', 'liquor', 0, 0),
(2123461, 'Cognac', 'N/A', 'liquor', 0, 0),
(2123462, 'Everclear', 'N/A', 'liquor', 0, 0),
(2123463, 'Gin', 'N/A', 'liquor', 0, 0),
(2123464, 'Gin', 'N/A', 'liquor', 0, 0),
(2123465, 'Gin', 'N/A', 'liquor', 0, 0),
(2123466, 'Gin', 'N/A', 'liquor', 0, 0),
(2123467, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123468, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123469, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123470, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123471, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123472, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123473, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123474, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123475, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123476, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123477, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123478, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123479, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123480, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123481, 'Liquer', 'N/A', 'liquor', 0, 0),
(2123482, 'Rum', 'N/A', 'liquor', 0, 0),
(2123483, 'Rum', 'N/A', 'liquor', 0, 0),
(2123484, 'Rum', 'N/A', 'liquor', 0, 0),
(2123485, 'Rum', 'N/A', 'liquor', 0, 0),
(2123486, 'Rum', 'N/A', 'liquor', 0, 0),
(2123487, 'Sake', 'N/A', 'liquor', 0, 0),
(2123488, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123489, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123490, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123491, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123492, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123493, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123494, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123495, 'Schnapps', 'N/A', 'liquor', 0, 0),
(2123496, 'Tequila', 'N/A', 'liquor', 0, 0),
(2123497, 'Tequila', 'N/A', 'liquor', 0, 0),
(2123498, 'Tequila', 'N/A', 'liquor', 0, 0),
(2123499, 'Vermouth', 'N/A', 'liquor', 0, 0),
(2123500, 'Vodka', 'N/A', 'liquor', 0, 0),
(2123501, 'Vodka', 'N/A', 'liquor', 0, 0),
(2123502, 'Vodka', 'N/A', 'liquor', 0, 0),
(2123503, 'Vodka', 'N/A', 'liquor', 0, 0),
(2123504, 'Whiskey', 'N/A', 'liquor', 0, 0),
(2123505, 'Whiskey', 'N/A', 'liquor', 0, 0),
(2123506, 'Whiskey', 'Bourbon', 'liquor', 0, 0),
(2123507, 'Whiskey', 'Scotch', 'liquor', 0, 0),
(2123508, 'Whiskey', 'Irish', 'liquor', 0, 0),
(2123509, 'Whiskey', 'Canadian', 'liquor', 0, 0),
(2123510, 'Whiskey', 'Scotch', 'liquor', 0, 0),
(2123511, 'Wine', 'Fortified', 'wine', 0, 0),
(2123512, 'Wine', 'Fortified', 'wine', 0, 0),
(2123513, 'Wine', 'Fortified', 'wine', 0, 0),
(2123514, 'Wine', 'Fortified', 'wine', 0, 0),
(2123515, 'Wine', 'Red', 'wine', 0, 0),
(2123516, 'Wine', 'Red', 'wine', 0, 0),
(2123517, 'Wine', 'Sparkling', 'wine', 0, 0),
(2123518, 'Wine', 'Sparkling', 'wine', 0, 0),
(2123519, 'Wine', 'Sparkling', 'wine', 0, 0),
(2123520, 'Wine', 'White', 'wine', 0, 0),
(2123521, 'Wine', 'White', 'wine', 0, 0),
(2123522, 'Wine', 'White', 'wine', 0, 0),
(2123523, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123524, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123525, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123526, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123527, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123528, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123529, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123530, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123531, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123532, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123533, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123534, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123535, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123536, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123537, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123538, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123539, 'Beer', 'Bottled Other', 'beer', 0, 0),
(2123540, 'Beer', 'Mexican', 'beer', 0, 0),
(2123541, 'Beer', 'Mexican', 'beer', 0, 0),
(2123542, 'Beer', 'Mexican', 'beer', 0, 0),
(2123543, 'Beer', 'Mexican', 'beer', 0, 0),
(2123544, 'Beer', 'Mexican', 'beer', 0, 0),
(2123545, 'Beer', 'Can', 'beer', 0, 0),
(2123546, 'Beer', 'Can', 'beer', 0, 0),
(2123547, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123548, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123549, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123550, 'Beer', 'Bottled Domestic', 'beer', 0, 0),
(2123551, 'Beer', 'Can', 'beer', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `description_non`
--

DROP TABLE IF EXISTS `description_non`;
CREATE TABLE IF NOT EXISTS `description_non` (
  `barcode` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `rate_count` int(11) NOT NULL,
  PRIMARY KEY (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Description of non_alcoholic beverages/condiments.';

--
-- Truncate table before insert `description_non`
--

TRUNCATE TABLE `description_non`;
--
-- Dumping data for table `description_non`
--

INSERT INTO `description_non` (`barcode`, `category`, `sub_category`, `type`, `rating`, `rate_count`) VALUES
(2123552, 'Soda', 'N/A', 'non_alcoholic', 0, 0),
(2123553, 'Soda', 'N/A', 'non_alcoholic', 0, 0),
(2123554, 'Soda', 'N/A', 'non_alcoholic', 0, 0),
(2123555, 'Soda', 'N/A', 'non_alcoholic', 0, 0),
(2123556, 'Juice', 'N/A', 'non_alcoholic', 0, 0),
(2123557, 'Juice', 'N/A', 'non_alcoholic', 0, 0),
(2123558, 'Juice', 'N/A', 'non_alcoholic', 0, 0),
(2123559, 'Juice', 'N/A', 'non_alcoholic', 0, 0),
(2123560, 'Juice', 'N/A', 'non_alcoholic', 0, 0),
(2123561, 'Juice', 'N/A', 'non_alcoholic', 0, 0),
(2123562, 'Tonic ', 'N/A', 'non_alcoholic', 0, 0),
(2123563, 'Non-Alcoholic Wine', 'N/A', 'non_alcoholic', 0, 0),
(2123564, 'Non-Alcoholic Beer', 'N/A', 'non_alcoholic', 0, 0),
(2123565, 'Tea', 'N/A', 'non_alcoholic', 0, 0),
(2123566, 'Coffee', 'N/A', 'non_alcoholic', 0, 0),
(2123567, 'Food', 'N/A', 'non_alcoholic', 0, 0),
(2123568, 'Food', 'N/A', 'non_alcoholic', 0, 0),
(2123569, 'Food', 'N/A', 'non_alcoholic', 0, 0),
(2123570, 'Food', 'N/A', 'non_alcoholic', 0, 0),
(2123571, 'Food', 'N/A', 'non_alcoholic', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items_alcohol`
--

DROP TABLE IF EXISTS `items_alcohol`;
CREATE TABLE IF NOT EXISTS `items_alcohol` (
  `barcode` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  PRIMARY KEY (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains the names, stock, and price details of items.';

--
-- Truncate table before insert `items_alcohol`
--

TRUNCATE TABLE `items_alcohol`;
--
-- Dumping data for table `items_alcohol`
--

INSERT INTO `items_alcohol` (`barcode`, `product`, `price`, `stock`, `package`) VALUES
(2123450, 'Absinthe', 6, 5, 'Bottles'),
(2123451, 'Apple Brandy', 4, 11, 'Bottles'),
(2123452, 'Applejack', 12, 4, 'Bottles'),
(2123453, 'Apricot Brandy', 3, 3, 'Bottles'),
(2123454, 'Armagnac', 5, 4, 'Bottles'),
(2123455, 'Calvados', 4, 9, 'Bottles'),
(2123456, 'Cherry Brandy', 11, 1, 'Bottles'),
(2123457, 'Ginger Brandy', 1, 15, 'Bottles'),
(2123458, 'Grappa', 8, 13, 'Bottles'),
(2123459, 'Peach Brandy', 1, 23, 'Bottles'),
(2123460, 'Courvoisier Cognac', 11, 4, 'Bottles'),
(2123461, 'Hennessy Cognac VS', 10, 17, 'Bottles'),
(2123462, 'Everclear', 9, 1, 'Bottles'),
(2123463, 'Bulldog Gin', 10, 3, 'Bottles'),
(2123464, 'Dry Gin', 5, 2, 'Bottles'),
(2123465, 'Sloe Gin', 7, 10, 'Bottles'),
(2123466, 'Jegermeister', 6, 5, 'Bottles'),
(2123467, 'Amaretto', 5, 9, 'Bottles'),
(2123468, 'Benedictine', 5, 5, 'Bottles'),
(2123469, 'Dekuyper Razzmatazz', 9, 1, 'Bottles'),
(2123470, 'Creme de Cacao', 5, 3, 'Bottles'),
(2123471, 'Creme de Coconut', 2, 16, 'Bottles'),
(2123472, 'Kahlua', 10, 1, 'Bottles'),
(2123473, 'Blue Curacao', 2, 18, 'Bottles'),
(2123474, 'Frangelico', 9, 1, 'Bottles'),
(2123475, 'Galliano', 7, 4, 'Bottles'),
(2123476, 'Bailey''s Irish Cream', 2, 2, 'Bottles'),
(2123477, 'Midori', 6, 9, 'Bottles'),
(2123478, 'Creme de Menthe', 12, 10, 'Bottles'),
(2123479, 'Triple Sec', 12, 13, 'Bottles'),
(2123480, 'Tuaca', 10, 3, 'Bottles'),
(2123481, 'Sambuca', 7, 4, 'Bottles'),
(2123482, 'Bacardi Gold', 10, 8, 'Bottles'),
(2123483, 'Stroh Rum', 1, 9, 'Bottles'),
(2123484, 'Kraken Black Spiced Rum', 6, 16, 'Bottles'),
(2123485, 'Malibu Rum', 2, 3, 'Bottles'),
(2123486, 'Bacardi Spiced Rum', 4, 2, 'Bottles'),
(2123487, 'Sake', 8, 3, 'Bottles'),
(2123488, 'Apple Pucker', 12, 7, 'Bottles'),
(2123489, 'Butter Shots', 10, 4, 'Bottles'),
(2123490, 'Firewater', 1, 1, 'Bottles'),
(2123491, 'Goldschlager', 4, 24, 'Bottles'),
(2123492, 'Cherry Pucker', 7, 15, 'Bottles'),
(2123493, 'Peach Pucker', 1, 1, 'Bottles'),
(2123494, 'Peppermint Schnapps', 3, 4, 'Bottles'),
(2123495, 'Rumple Minze', 9, 7, 'Bottles'),
(2123496, 'Hornitos Reposado Tequila', 6, 18, 'Bottles'),
(2123497, 'Jose Cuervo Reserva', 11, 6, 'Bottles'),
(2123498, 'Patron Silver', 11, 1, 'Bottles'),
(2123499, 'Dry Vermouth', 5, 17, 'Bottles'),
(2123500, 'Smirnoff Vodka', 2, 3, 'Bottles'),
(2123501, 'Absolut Vodka', 10, 16, 'Bottles'),
(2123502, 'Ketel One Vodka', 3, 1, 'Bottles'),
(2123503, 'Skky Vodka', 12, 5, 'Bottles'),
(2123504, 'Jacob''s Ghost White Whiskey', 3, 11, 'Bottles'),
(2123505, 'Rock and Rye', 1, 28, 'Bottles'),
(2123506, 'Wild Turkey 101 Proof Bourbon', 10, 8, 'Bottles'),
(2123507, 'Glenlivet', 10, 6, 'Bottles'),
(2123508, 'Jameson''s Irish Whickey', 8, 10, 'Bottles'),
(2123509, 'Canadian Mist', 7, 3, 'Bottles'),
(2123510, 'Johnnie Walker Scotch', 5, 15, 'Bottles'),
(2123511, 'Dry Sherry', 10, 3, 'Bottles'),
(2123512, 'Lillet Blanc', 2, 16, 'Bottles'),
(2123513, 'Madeira', 6, 7, 'Bottles'),
(2123514, 'Port', 10, 7, 'Bottles'),
(2123515, 'Cabernet', 2, 9, 'Bottles'),
(2123516, 'Sangria', 1, 3, 'Bottles'),
(2123517, 'Cava', 10, 6, 'Bottles'),
(2123518, 'Dom Perignon', 10, 10, 'Bottles'),
(2123519, 'Prosecco', 8, 4, 'Bottles'),
(2123520, 'Cocchi Americano', 3, 19, 'Bottles'),
(2123521, 'Gewurztraminer', 6, 3, 'Bottles'),
(2123522, 'Sauterne', 2, 2, 'Bottles'),
(2123523, 'Bud', 1, 1, '12-Packs'),
(2123524, 'Bud Light', 11, 21, '12-Packs'),
(2123525, 'Bud Light Lime', 3, 2, '12-Packs'),
(2123526, 'Coors', 8, 8, '12-Packs'),
(2123527, 'Coors Light', 9, 23, '12-Packs'),
(2123528, 'Miller Lite', 1, 31, '12-Packs'),
(2123529, 'MGD', 1, 20, '12-Packs'),
(2123530, 'Michelob Ultra', 10, 10, '12-Packs'),
(2123531, 'Fat Tire', 5, 2, '12-Packs'),
(2123532, '1554', 12, 9, '12-Packs'),
(2123533, 'Sunshine', 8, 6, '12-Packs'),
(2123534, 'Heineken', 3, 5, '12-Packs'),
(2123535, 'New Castle', 7, 7, '12-Packs'),
(2123536, 'Guiness', 5, 15, '12-Packs'),
(2123537, 'Leinenkugels', 3, 14, '12-Packs'),
(2123538, 'Red Stripe', 7, 14, '12-Packs'),
(2123539, 'Alaskan Amber', 10, 2, '12-Packs'),
(2123540, 'Tecate', 9, 14, '12-Packs'),
(2123541, 'Dos XXX', 5, 13, '12-Packs'),
(2123542, 'Negra Modelo', 12, 7, '12-Packs'),
(2123543, 'Corona', 2, 5, '12-Packs'),
(2123544, 'Pacifico', 5, 2, '12-Packs'),
(2123545, 'Pabst Blue Ribbon', 2, 10, '12-Packs'),
(2123546, 'Chelada', 5, 6, '12-Packs'),
(2123547, 'Fat Tire', 2, 1, '12-Packs'),
(2123548, 'Blue Moon', 8, 2, '12-Packs'),
(2123549, 'New Belgium (Seasonal)', 1, 18, '12-Packs'),
(2123550, 'Shock Top', 9, 18, '12-Packs'),
(2123551, 'Keystone', 6, 11, '12-Packs');

-- --------------------------------------------------------

--
-- Table structure for table `items_non`
--

DROP TABLE IF EXISTS `items_non`;
CREATE TABLE IF NOT EXISTS `items_non` (
  `barcode` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  PRIMARY KEY (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for non-alcoholic beverages/condiments';

--
-- Truncate table before insert `items_non`
--

TRUNCATE TABLE `items_non`;
--
-- Dumping data for table `items_non`
--

INSERT INTO `items_non` (`barcode`, `product`, `price`, `stock`, `package`) VALUES
(2123552, 'Coke', 8, 10, 'Bottles'),
(2123553, 'Dr. Pepper', 6, 1, 'Bottles'),
(2123554, 'Sprite', 5, 28, 'Bottles'),
(2123555, 'Root Beer', 6, 2, 'Bottles'),
(2123556, 'Cranberry Juice', 11, 6, 'Bottles'),
(2123557, 'Orange Juice', 4, 19, 'Bottles'),
(2123558, 'Pineapple Juice', 11, 8, 'Bottles'),
(2123559, 'Tomato Juice', 8, 4, 'Bottles'),
(2123560, 'Clamato Juice', 10, 25, 'Bottles'),
(2123561, 'Apple Cider', 7, 5, 'Bottles'),
(2123562, 'Tonic', 5, 8, 'Bottles'),
(2123563, 'Sparkling Cider', 7, 7, 'Bottles'),
(2123564, 'Child''s Beer', 2, 9, 'Bottles'),
(2123565, 'Earl Grey', 9, 4, 'Bags'),
(2123566, 'Folgers', 11, 8, 'Bags'),
(2123567, 'Olives', 12, 6, 'Jars'),
(2123568, 'Pickles', 6, 8, 'Jars'),
(2123569, 'Peppers', 7, 1, 'Jars'),
(2123570, 'Celery', 4, 5, 'Stocks'),
(2123571, 'Onions', 5, 3, 'Jars');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `addr` varchar(1024) NOT NULL,
  `ccNum` int(16) NOT NULL,
  `expr` varchar(7) NOT NULL,
  `ccCCV` varchar(4) NOT NULL,
  `ord` longtext NOT NULL,
  `sID` varchar(255) NOT NULL,
  `date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for storing all of our awesome orders!';

--
-- Truncate table before insert `orders`
--

TRUNCATE TABLE `orders`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
