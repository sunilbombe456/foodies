-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 18, 2019 at 09:21 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_address`
--

DROP TABLE IF EXISTS `c_address`;
CREATE TABLE IF NOT EXISTS `c_address` (
  `adress_id` int(50) NOT NULL AUTO_INCREMENT,
  `u_id` int(50) NOT NULL,
  `uname` text NOT NULL,
  `uphone` text NOT NULL,
  `uaddress` text NOT NULL,
  `upincode` text NOT NULL,
  `ulocality` text NOT NULL,
  `ucity` text NOT NULL,
  PRIMARY KEY (`adress_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_address`
--

INSERT INTO `c_address` (`adress_id`, `u_id`, `uname`, `uphone`, `uaddress`, `upincode`, `ulocality`, `ucity`) VALUES
(1, 12, 'Rahul Narhe', '8605705665', '																																								at post pimparkhed  tal:shirur Dist:Pune\r\nsant tukaram nagar pimpri pune,411018																																										', '410504', 'pimperkhed', 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `c_confirm_order`
--

DROP TABLE IF EXISTS `c_confirm_order`;
CREATE TABLE IF NOT EXISTS `c_confirm_order` (
  `co_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `rest_id` text NOT NULL,
  `rest_name` text NOT NULL,
  `odate` text NOT NULL,
  `odish_name_quantity` text NOT NULL,
  `o_total_price` text NOT NULL,
  `card_details` text NOT NULL,
  `odelivery_address` text NOT NULL,
  `payment_status` text NOT NULL,
  `d_boy_id` text NOT NULL,
  `delivery_status` text NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_confirm_order`
--

INSERT INTO `c_confirm_order` (`co_id`, `user_id`, `rest_id`, `rest_name`, `odate`, `odish_name_quantity`, `o_total_price`, `card_details`, `odelivery_address`, `payment_status`, `d_boy_id`, `delivery_status`) VALUES
(25, '12', '1', 'Swagat Restaurant', '19/01/18', '<ul><li> dish:Tomato Pizza (1)</li><li> dish:Onion Roll (1)</li><li> dish:Chicken Burger (1)</li><li> dish:chicken Burger (1)</li></ul>', '410', '', '<ul><li>Name:Rahul Narhe</li><li>Phone:8605705665</li><li>Address:																																								at post pimparkhed  tal:shirur Dist:Pune\r\nsant tukaram nagar pimpri pune,411018																																										</li><li>PinCode:410504</li><li>Locality:pimperkhed</li><li>City:Pune</li></ul>', 'incomplete', '2', 'Success'),
(26, '12', '4', 'Vaijanath Restaurant', '19/01/18', '<ul><li> dish:Masala Maggi (1)</li><li> dish:Masala Dosa (1)</li><li> dish:Pulav Rice (1)</li><li> dish:Chicken Burger (1)</li><li> dish:Masala Panner  (1)</li></ul>', '460', '', '<ul><li>Name:Rahul Narhe</li><li>Phone:8605705665</li><li>Address:																																								at post pimparkhed  tal:shirur Dist:Pune\r\nsant tukaram nagar pimpri pune,411018																																										</li><li>PinCode:410504</li><li>Locality:pimperkhed</li><li>City:Pune</li></ul>', 'incomplete', '2', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `c_temp_order`
--

DROP TABLE IF EXISTS `c_temp_order`;
CREATE TABLE IF NOT EXISTS `c_temp_order` (
  `o_id` int(50) NOT NULL AUTO_INCREMENT,
  `dimage` text NOT NULL,
  `dname` text NOT NULL,
  `dprice` text NOT NULL,
  `dquantity` int(100) NOT NULL,
  `dsubtotal` int(100) NOT NULL,
  `rest_id` int(100) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c_user`
--

DROP TABLE IF EXISTS `c_user`;
CREATE TABLE IF NOT EXISTS `c_user` (
  `u_id` int(100) NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `uphone` text NOT NULL,
  `uemail` text NOT NULL,
  `upwd` text NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_user`
--

INSERT INTO `c_user` (`u_id`, `uname`, `uphone`, `uemail`, `upwd`) VALUES
(11, 'rahul narhe', '87878675756', 'rahulnarhe456@gmail.com', '439ed537979d8e831561964dbbbd7413'),
(12, 'SUNIL BOMBE', '8605705665', 'sunilbombe456@gmail.com', 'b0b86080c976aa7651bffe0801644d74');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

DROP TABLE IF EXISTS `delivery_boy`;
CREATE TABLE IF NOT EXISTS `delivery_boy` (
  `d_id` int(100) NOT NULL AUTO_INCREMENT,
  `dname` text NOT NULL,
  `dphone` text NOT NULL,
  `dcity` text NOT NULL,
  `dpwd` text NOT NULL,
  `admin_id` text NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`d_id`, `dname`, `dphone`, `dcity`, `dpwd`, `admin_id`) VALUES
(1, 'Nitin Narhe', '9665180276', 'pune', 'nitin', '1'),
(2, 'nitin narhe', '8605705665', 'Pune', 'b585c4415b1fe50f2c31fa1698b271b7', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rest_admin`
--

DROP TABLE IF EXISTS `rest_admin`;
CREATE TABLE IF NOT EXISTS `rest_admin` (
  `a_id` int(50) NOT NULL AUTO_INCREMENT,
  `aname` text NOT NULL,
  `acity` text NOT NULL,
  `aemail` text NOT NULL,
  `apwd` text NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_admin`
--

INSERT INTO `rest_admin` (`a_id`, `aname`, `acity`, `aemail`, `apwd`) VALUES
(1, 'RUSHI PAWADE', 'pune', 'rushipawade456@gmail.com', 'foodhub');

-- --------------------------------------------------------

--
-- Table structure for table `rest_details`
--

DROP TABLE IF EXISTS `rest_details`;
CREATE TABLE IF NOT EXISTS `rest_details` (
  `rd_id` int(100) NOT NULL AUTO_INCREMENT,
  `rest_address` text NOT NULL,
  `rest_causines` text NOT NULL,
  `rest_start_hour` text NOT NULL,
  `rest_close_hour` text NOT NULL,
  `rest_featured` text NOT NULL,
  `rest_discount` text NOT NULL,
  `rest_promotion` text NOT NULL,
  `rest_image1` text NOT NULL,
  `rest_image2` text NOT NULL,
  `rest_image3` text NOT NULL,
  `rest_image4` text NOT NULL,
  `rest_id` int(100) NOT NULL,
  PRIMARY KEY (`rd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_details`
--

INSERT INTO `rest_details` (`rd_id`, `rest_address`, `rest_causines`, `rest_start_hour`, `rest_close_hour`, `rest_featured`, `rest_discount`, `rest_promotion`, `rest_image1`, `rest_image2`, `rest_image3`, `rest_image4`, `rest_id`) VALUES
(1, '																																				Sant Tukaram nagar Pimpri																																									', 'Asian, North Indian, Chinese, Mughlai, Seafood', '10 pm ', '6:30pm', 'Pan-Asian Delicacies, Best food, Best of Pune', '15% off on your first order', '50% off * on Food & Soft Beverages [T&C]', 'pexels-photo-1739748.jpeg', 'food-holiday-love-holidays.jpg', 'pexels-photo-941861 (1).jpeg', 'pexels-photo-460537.jpeg', 1),
(3, 'Neharu Nagar Pimpri pune 18													', 'Asian, North Indian, Panjabi ', '8 am', '11 pm', 'Testy Food in Low Price ', '25% off on your first order', 'we are deliver smile', 'menu-restaurant-france-eating-9315.jpg', 'pexels-photo-460537.jpeg', 'pexels-photo-545058.jpeg', 'pexels-photo-580613.jpeg', 5),
(2, '																											Near Y C M Hospital pimpri pune 18																																					', 'chinise, maharashtrain, south', '8 am', '12 pm', 'good quality vej, non vej food', '10 % discount on first order', '15% off * on Food & Soft Beverages [T&C]', 'food-holiday-love-holidays.jpg', 'pexels-photo.jpg', 'pexels-photo-205961.jpeg', 'pexels-photo-941861 (1).jpeg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rest_dishes`
--

DROP TABLE IF EXISTS `rest_dishes`;
CREATE TABLE IF NOT EXISTS `rest_dishes` (
  `d_id` int(100) NOT NULL AUTO_INCREMENT,
  `dname` text NOT NULL,
  `dtype` text NOT NULL,
  `dprice` text NOT NULL,
  `ddiscount` text NOT NULL,
  `dimage` text NOT NULL,
  `ddetails` text NOT NULL,
  `rest_id` int(100) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_dishes`
--

INSERT INTO `rest_dishes` (`d_id`, `dname`, `dtype`, `dprice`, `ddiscount`, `dimage`, `ddetails`, `rest_id`) VALUES
(5, 'Maxican Burger', 'vej', '80', '20%', 'pexels-photo-376464.jpeg', 'crispy burger', 1),
(4, 'Chicken Burger', 'non-veg', '150', '10%', 'pexels-photo-156114.jpeg', 'more delicious', 1),
(3, 'Onion Roll', 'Veg', '60', '20%', 'pexels-photo-461198.jpeg', 'We Deliver Smile', 1),
(6, 'Tomato Pizza', 'veg', '100', '15%', 'pexels-photo-803290.jpeg', 'More spicy', 1),
(7, 'Maggi Noodles', 'veg', '70', '10%', 'pexels-photo-769969.jpeg', 'More Delicious', 1),
(8, 'Chinies Noodle', 'Non-veg', '120', '20%', 'pexels-photo-1279330.jpeg', 'More Teasty', 1),
(9, 'Tomato chise Pizza ', 'vej', '150', '10%', 'pexels-photo-803290.jpeg', 'delicious', 5),
(10, 'maggi Noodles', 'veg', '50', '5%', 'pexels-photo-769969.jpeg', 'spicy', 5),
(11, 'Maxican Burger', 'veg', '80', '5%', 'pexels-photo-376464.jpeg', 'Pure Veg Maxican with Extra Chilli', 5),
(12, 'Non Veg Burger', 'veg', '90', '5%', 'pexels-photo-156114.jpeg', 'with Extra Chicken', 5),
(13, 'chicken Burger', 'non-veg', '100', '10%', 'pexels-photo-156114.jpeg', 'more delicious', 1),
(14, 'Pulav Rice', 'veg', '100', '10%', 'kimchi-fried-rice-fried-rice-rice-korean-53121.jpeg', 'more spicy', 4),
(15, 'Chicken Burger', 'non-veg', '120', '12%', 'pexels-photo-156114.jpeg', 'more tasty', 4),
(16, 'Masala Panner ', 'veg', '130', '10%', 'pexels-photo-209540.jpeg', 'spicy', 4),
(17, 'Masala Dosa', 'veg', '60', '5%', 'pexels-photo-221143.jpeg', 'Popular South Indian Masala Dosa', 4),
(18, 'Veggie Burger', 'veg', '70', '25%', 'pexels-photo-376464.jpeg', 'delicious to taste', 4),
(19, 'Kanda Poha', 'veg', '30', '0%', 'pexels-photo-461326.jpeg', 'Quick filling Breakfast', 4),
(20, 'Idli Sambar', 'veg', '60', '20%', 'pexels-photo-674574.jpeg', 'Popular South Indian Dish', 4),
(21, 'Masala Maggi', 'veg', '50', '5%', 'pexels-photo-769969.jpeg', 'Quick Filling Breakfast', 4),
(22, 'Tomato Pizza', 'veg', '80', '50%', 'pexels-photo-803290.jpeg', 'It is absolutely delicious', 4),
(23, 'Mexican Pizza', 'veg', '12', '30%', 'pexels-photo-905847.jpeg', '', 4),
(24, 'Puran Poli', 'veg', '30', '4%', 'pexels-photo-1117862.jpeg', 'Popular Maharashtrian', 4),
(25, 'Chinese Noodles', 'veg', '80', '10%', 'pexels-photo-1279330.jpeg', 'Popular Chinese Food', 4),
(26, 'Sandwiches', 'veg', '70', '20%', 'pexels-photo-1600711.jpeg', 'Perfect Breakast Food', 4),
(27, 'Chocolate Cake', 'veg', '60', '30%', 'pexels-photo-291528.jpeg', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rest_user`
--

DROP TABLE IF EXISTS `rest_user`;
CREATE TABLE IF NOT EXISTS `rest_user` (
  `r_id` int(100) NOT NULL AUTO_INCREMENT,
  `rname` text NOT NULL,
  `remail` text NOT NULL,
  `rphone` text NOT NULL,
  `rcity` text NOT NULL,
  `rpwd` text NOT NULL,
  `admin_id` text NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_user`
--

INSERT INTO `rest_user` (`r_id`, `rname`, `remail`, `rphone`, `rcity`, `rpwd`, `admin_id`) VALUES
(1, 'Swagat Restaurant', 'swagat@gmail.com', '8605705665', 'Pune', 'e87c5fcfbc99dd425dc0c436bd6e5840', '1'),
(5, 'Food Palace Restaurant', 'foodpalace456@gmail.com', '7218332379', 'Pune', '6a1fa5bc608b3c88d8408d575226f724', '1'),
(4, 'Vaijanath Restaurant', 'vaijanath@gmail.com', '8956456334', 'pune', '1b0257b24cff49dd7da5af89e34b142f', '1'),
(7, 'Mamta Cafe', 'mamtacafe@gmail.com', '98878787676', 'pune', '565fdb43462efef831c018f2e91cecbb', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
