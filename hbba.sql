-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2014 at 02:57 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hbba`
--
CREATE DATABASE IF NOT EXISTS `hbba` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hbba`;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blogID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `datePosted` datetime NOT NULL,
  `authorID` int(11) NOT NULL,
  `catID` int(11) NOT NULL,
  PRIMARY KEY (`blogID`),
  KEY `authorID` (`authorID`,`catID`),
  KEY `catID` (`catID`),
  KEY `authorID_2` (`authorID`),
  KEY `authorID_3` (`authorID`),
  KEY `authorID_4` (`authorID`),
  KEY `catID_2` (`catID`),
  KEY `authorID_5` (`authorID`,`catID`),
  KEY `blogID` (`blogID`,`authorID`,`catID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogID`, `title`, `content`, `datePosted`, `authorID`, `catID`) VALUES
(1, 'What is PHP?', 'PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.', '2014-02-19 05:05:09', 1, 1),
(2, 'What is MySQL?', 'MySQL is the world''s second most widely used open-source relational database management system. It is named after co-founder Michael Widenius''s daughter, My. The SQL phrase stands for Structured Query Language.', '2014-02-18 06:13:00', 1, 2),
(3, 'What is Javascript?', 'an object-oriented computer programming language commonly used to create interactive effects within web browsers.', '2014-02-18 06:17:00', 1, 3),
(4, 'What is Ajax?', 'Ajax an acronym for Asynchronous JavaScript and XML)[1] is a group of interrelated Web development techniques used on the client-side to create asynchronous Web applications. With Ajax, Web applications can send data to, and retrieve data from, a server asynchronously (in the background) without interfering with the display and behavior of the existing page. Data can be retrieved using the XMLHttpRequest object. Despite the name, the use of XML is not required; JSON is often used instead (see AJAJ), and the requests do not need to be asynchronous.', '2014-05-07 00:00:00', 1, 3),
(5, 'What is Jquery Mobile?', 'jQuery Mobile framework takes the "write less, do more" mantra to the next level: Instead of writing unique applications for each mobile device or OS, the jQuery mobile framework allows you to design a single highly-branded responsive web site or application that will work on all popular smartphone, tablet, and desktop platforms.', '2014-05-07 00:00:00', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for each category',
  `category` varchar(10) NOT NULL COMMENT 'Category description',
  PRIMARY KEY (`catID`),
  KEY `catID` (`catID`),
  KEY `catID_2` (`catID`),
  KEY `catID_3` (`catID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `category`) VALUES
(1, 'php'),
(2, 'SQL'),
(3, 'Javascript'),
(4, 'jQuery');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `datePosted` datetime NOT NULL,
  `comment` text NOT NULL,
  `blogID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `commentID` (`commentID`,`blogID`,`authorID`),
  KEY `commentID_2` (`commentID`,`blogID`,`authorID`),
  KEY `commentID_3` (`commentID`,`blogID`,`authorID`),
  KEY `commentID_4` (`commentID`,`blogID`,`authorID`),
  KEY `blogID` (`blogID`),
  KEY `authorID` (`authorID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `datePosted`, `comment`, `blogID`, `authorID`) VALUES
(1, '2014-02-22 14:13:47', 'Yeah that''s awesome', 1, 1),
(2, '2014-02-24 20:13:45', 'Test Comment\r\nLine One\r\nLine Two', 3, 1),
(3, '2014-02-25 15:21:59', 'Yay lets make comment for mother Russia,\r\nso comment, wow!', 1, 1),
(4, '2014-02-26 18:51:33', 'Avast ye landlover, many a day have I been upon the seas.', 2, 12),
(5, '2014-02-26 19:32:23', 'you stink like stinky stink stink.', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackID` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier',
  `firstName` varchar(40) NOT NULL COMMENT 'user FIrst Name',
  `lastName` varchar(40) NOT NULL COMMENT 'User last name',
  `email` varchar(100) NOT NULL COMMENT 'user email address',
  `feedback` text NOT NULL COMMENT 'Feedback provided by user',
  `dateTime` datetime NOT NULL COMMENT 'Date and time of form submission',
  PRIMARY KEY (`feedbackID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `firstName`, `lastName`, `email`, `feedback`, `dateTime`) VALUES
(6, 'Karl', 'Salisbury', 'karl.salisbury@gmail.com', 'Wow you are so cool', '2014-05-28 15:37:15'),
(7, 'Kyle', 'Staussman', 'karl.salisbury@gmail.com', 'Hells yeah', '2014-06-04 09:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for the table',
  `userID` int(11) NOT NULL COMMENT 'The purchaser of the product, the foreign key linking the invoice table with the user table',
  `dateTime` datetime NOT NULL COMMENT 'The date and time of the purchase',
  PRIMARY KEY (`invoiceID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `userID`, `dateTime`) VALUES
(10, 1, '2014-02-20 13:50:12'),
(11, 1, '2014-02-20 13:50:57'),
(12, 1, '2014-02-20 13:51:32'),
(13, 1, '2014-02-20 13:51:59'),
(14, 1, '2014-02-20 13:52:43'),
(15, 1, '2014-02-20 14:02:17'),
(16, 1, '2014-02-20 14:02:31'),
(17, 1, '2014-02-20 14:06:02'),
(18, 1, '2014-02-20 14:06:12'),
(19, 1, '2014-02-20 14:06:38'),
(20, 1, '2014-02-20 14:06:47'),
(21, 1, '2014-02-20 14:08:08'),
(22, 1, '2014-02-21 13:21:20'),
(23, 1, '2014-02-21 13:32:21'),
(24, 1, '2014-02-21 13:34:26'),
(25, 1, '2014-02-22 13:09:01'),
(26, 1, '2014-02-22 13:12:30'),
(27, 1, '2014-02-22 13:12:46'),
(28, 1, '2014-02-22 13:13:03'),
(29, 1, '2014-02-22 13:13:12'),
(30, 1, '2014-02-22 14:01:33'),
(31, 1, '2014-02-23 14:16:13'),
(32, 1, '2014-02-26 10:36:29'),
(33, 1, '2014-02-26 10:40:02'),
(34, 1, '2014-02-26 10:41:45'),
(35, 1, '2014-02-26 19:29:13'),
(36, 1, '2014-04-28 10:59:06'),
(37, 1, '2014-04-28 20:34:30'),
(38, 1, '2014-05-07 13:38:36'),
(39, 1, '2014-05-11 18:38:21'),
(40, 1, '2014-05-15 23:29:18'),
(41, 1, '2014-05-19 19:12:37'),
(42, 1, '2014-05-19 19:41:42'),
(43, 1, '2014-05-21 16:20:20'),
(44, 1, '2014-05-21 16:20:43'),
(45, 1, '2014-05-21 16:21:06'),
(46, 1, '2014-05-21 19:56:21'),
(47, 1, '2014-05-21 22:05:48'),
(48, 1, '2014-05-22 09:10:29'),
(49, 1, '2014-05-22 09:12:40'),
(50, 1, '2014-05-27 14:18:25'),
(51, 1, '2014-05-28 15:28:24'),
(52, 1, '2014-05-28 15:46:31'),
(53, 1, '2014-05-28 15:48:16'),
(54, 1, '2014-05-28 15:49:05'),
(55, 1, '2014-05-28 15:49:27'),
(56, 1, '2014-05-29 09:41:45'),
(57, 1, '2014-06-03 09:37:57'),
(58, 1, '2014-06-03 11:09:52'),
(59, 1, '2014-06-03 15:12:31'),
(60, 1, '2014-06-03 15:15:40'),
(61, 1, '2014-06-04 10:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique identifier for the table',
  `name` varchar(40) NOT NULL COMMENT 'Name of the product',
  `description` text NOT NULL COMMENT 'Description of the product',
  `price` decimal(10,2) NOT NULL COMMENT 'Price of the product',
  `image` varchar(100) NOT NULL COMMENT 'Product image path',
  `gender` enum('male','female','unisex') NOT NULL COMMENT 'gender of product',
  `dateAdded` datetime NOT NULL COMMENT 'date the product was added',
  `onSale` decimal(10,2) DEFAULT NULL COMMENT 'The old price before the product was on sale',
  `size` enum('One Size Fits All','XS','S','M','L','XL','1','2','3','4','5','6','7','8','9','10','11','12','14','16') NOT NULL DEFAULT 'One Size Fits All' COMMENT 'Product sizing',
  `colour` enum('Black','White','Navy','Blue','Grey','Brown','Beige','Orange','Yellow','Red','Green','Purple','Multicoloured','Patterned','Floral','Striped','Checks') NOT NULL COMMENT 'Product Colour',
  `category` enum('Shirts','Tshirts','Pants','Jeans','Shorts','Shoes','Tops','Skirts','Dresses','Bags','Jewellery','Headwear','Accessories','Jackets','Jumpers') NOT NULL COMMENT 'Product Category',
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `description`, `price`, `image`, `gender`, `dateAdded`, `onSale`, `size`, `colour`, `category`) VALUES
(2, 'Another Bag', 'Bag and stuff', '39.99', '../images/cart/bag.png', 'female', '0000-00-00 00:00:00', NULL, 'One Size Fits All', 'Brown', 'Bags'),
(3, 'Leather Jacket', 'Vintage leather jacket', '89.99', '../images/cart/leatherjacket.png', 'male', '0000-00-00 00:00:00', NULL, 'M', 'Brown', 'Shoes'),
(4, 'Shoes', 'Wow cool shoes', '19.99', '../images/cart/shoe.png', 'male', '0000-00-00 00:00:00', NULL, 'One Size Fits All', 'Black', 'Shoes'),
(5, 'Shirt', 'A vintage cowboy shirt. Guaranteed to make you look like a cowboy.', '11.99', '../images/cart/shirt.png', 'male', '0000-00-00 00:00:00', '29.99', 'M', 'Checks', 'Shirts'),
(18, 'Vintage dress', 'A vintage dress', '49.99', '../images/cart/vintagedress.png', 'female', '2014-05-21 00:00:00', NULL, '10', 'Black', 'Dresses'),
(19, 'Ladies brogues', 'Brogues bro.', '35.99', '../images/cart/ladiesshoes.png', 'female', '2014-05-21 00:00:00', NULL, 'One Size Fits All', 'Brown', 'Shoes'),
(20, 'Floral Skirt', 'A floral skirt', '19.99', '../images/cart/floralskirt.png', 'female', '2014-05-21 00:00:00', NULL, '8', 'Floral', 'Skirts'),
(21, 'Mustard skirt', 'A skirt in a mustard colour', '19.99', '../images/cart/mustardskirt.png', 'female', '2014-05-21 00:00:00', NULL, '8', 'Yellow', 'Skirts'),
(22, 'Greek Fisherman''s Hat', 'The Greek fisherman''s cap is often associated with seamanship and marine situations. It has become popular amongst the public in general, rather than staying isolated as an occupational hat. One example of it being put in prominence of popular culture was when it was worn by John Lennon. "John Lennon hat" (or cap) is the informal name that was used in the mid-1960s to denote this style of cap.', '29.99', '../images/cart/fishermanshat.png', 'male', '2014-06-03 00:00:00', NULL, 'One Size Fits All', 'Brown', 'Headwear'),
(23, 'Crazy Jumper', 'Famous jumper wearers are Bill Cosby', '29.99', '../images/cart/crazyjumper.png', 'male', '2014-06-03 00:00:00', NULL, 'M', 'Brown', 'Jumpers'),
(24, 'Scorpion Jacket', 'Driver references the fable of The Scorpion and the Frog: the frog agrees to carry the scorpion across the river; the scorpion stings the frog, saying "it''s my nature" and both drown. Driver can be seen as The Frog of the story - he drives/carries criminals (scorpions) around in his car, but is inevitably dragged into their destructive world (stung) leading to everybody''s downfall. Driver''s jacket has a scorpion on the back, just as the frog carried the scorpion on its back.', '89.99', '../images/cart/scorpionjacket.png', 'male', '2014-06-03 00:00:00', NULL, 'S', 'White', 'Jeans'),
(25, 'Genuine Vintage Levis', 'Vintage jeans. Crafted by the finest denim artisans made in the good old USA', '56.99', '../images/cart/jeans.png', 'male', '2014-06-03 00:00:00', NULL, 'L', 'Navy', 'Jeans'),
(26, 'Floral Shirt', 'A vintage floral shirt. A unique find for the fashion forward male.', '29.99', '../images/cart/floralshirt.png', 'male', '2014-06-03 00:00:00', NULL, 'M', 'Floral', 'Shirts'),
(27, 'Red Wing boots', 'Genuine vintage Red Wing boots with refurbished soles', '159.99', '../images/cart/redwing.png', 'male', '2014-06-03 00:00:00', NULL, '11', 'Brown', 'Shoes'),
(28, 'Pork Pie Hat', 'A pork pie hat (sometimes known as a porkpie hat) is a term used to refer to three or four different styles of hat that have been popular in one context or another since the middle nineteenth century but all of which bear superficial resemblance to a culinary pork pie dish.', '49.99', '../images/cart/porkpie.png', 'male', '2014-06-03 00:00:00', NULL, 'L', 'Grey', 'Headwear'),
(29, 'Vintage watch necklace', 'A girls vintage pocket watch that can be worn as a necklace.', '39.99', '../images/cart/watch.png', 'female', '2014-06-03 00:00:00', NULL, 'One Size Fits All', 'Orange', 'Jewellery'),
(30, 'Emerald Dress', 'An emerald coloured vintage evening dress.', '49.99', '../images/cart/emeraldress.png', 'female', '2014-06-03 00:00:00', NULL, '8', 'Green', 'Dresses'),
(31, 'Bird cage necklace', 'A vintage style necklace featuring a bird cage design.', '19.99', '../images/cart/necklace.png', 'female', '2014-06-03 00:00:00', NULL, 'One Size Fits All', 'Orange', 'Jewellery'),
(32, 'Vintage handbag', 'A vintage handbag with a flower design.', '19.99', '../images/cart/bag1.png', 'female', '2014-06-03 00:00:00', NULL, 'One Size Fits All', 'Brown', 'Bags'),
(33, 'Vintage platforms', 'Authentic vintage platform heels.', '49.99', '../images/cart/ladiesshoes2.png', 'female', '2014-06-03 00:00:00', NULL, '7', 'Brown', 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `product_invoice`
--

CREATE TABLE IF NOT EXISTS `product_invoice` (
  `invoiceID` int(11) NOT NULL COMMENT 'The foreign key linking the product_invoice table with the product table',
  `productID` int(11) NOT NULL COMMENT 'The foreign key linking the product_invoice table with the product table',
  `quantity` int(11) NOT NULL COMMENT 'The quantity of the product purchased',
  PRIMARY KEY (`invoiceID`,`productID`),
  KEY `productID` (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_invoice`
--

INSERT INTO `product_invoice` (`invoiceID`, `productID`, `quantity`) VALUES
(39, 2, 1),
(41, 3, 1),
(41, 5, 1),
(46, 18, 1),
(47, 3, 1),
(48, 3, 1),
(49, 3, 1),
(50, 5, 1),
(51, 3, 1),
(52, 2, 1),
(52, 3, 1),
(56, 3, 1),
(57, 3, 1),
(58, 3, 1),
(58, 4, 1),
(59, 5, 1),
(60, 22, 1),
(61, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, auto incrementing',
  `username` varchar(10) NOT NULL COMMENT 'username',
  `password` varchar(64) NOT NULL COMMENT 'password',
  `firstName` varchar(20) NOT NULL COMMENT 'first name',
  `lastName` varchar(20) NOT NULL COMMENT 'last name',
  `email` varchar(100) NOT NULL COMMENT 'user''s email address',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `firstName`, `lastName`, `email`) VALUES
(1, 'admin', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Karl', 'Salisbury', ''),
(12, 'davey', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'davey', 'jones', 'dave@dave.com'),
(13, 'Cindypants', '8e5b57b7b620900e13dd84aae2390dea0eea199aa7f8d34f47b72824276e93f7', 'Cindy', 'Nicollet', 'cindy@cindyland.com'),
(14, 'jimmyjames', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Jimmy', 'Herd', 'jimmy@jimstah.com'),
(16, 'dudemanguy', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'dudeson', 'dude', 'dude@dude.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `category` (`catID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`authorID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`blogID`) REFERENCES `blog` (`blogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`authorID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_invoice`
--
ALTER TABLE `product_invoice`
  ADD CONSTRAINT `product_invoice_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_invoice_ibfk_2` FOREIGN KEY (`invoiceID`) REFERENCES `invoice` (`invoiceID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
