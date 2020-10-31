
CREATE DATABASE `foodorder`


-- foodorder.category definition

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB;


-- foodorder.food definition

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `info` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`food_id`),
  UNIQUE KEY `name` (`name`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `food_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`cat_id`)
) ENGINE=InnoDB;


-- foodorder.`order` definition

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `table` int(2) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_served` tinyint(1) NOT NULL DEFAULT 0,
  `note` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`food_id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`food_id`)
) ENGINE=InnoDB;


-- foodorder.order_id_log definition

CREATE TABLE `order_id_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

