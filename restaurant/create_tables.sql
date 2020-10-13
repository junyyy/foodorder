
CREATE TABLE `foodorder`.`category` (
    `cat_id` INT(11) NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(40) NOT NULL ,
     PRIMARY KEY (`cat_id`),
     UNIQUE KEY (`name`)
) ENGINE = InnoDB;

CREATE TABLE `foodorder`.`food` (
    `food_id` INT(11) NOT NULL AUTO_INCREMENT ,
    `category_id` INT(11) NOT NULL ,
    `name` VARCHAR(40) NOT NULL ,
    `price` DECIMAL(3,2) NOT NULL ,
    `quantity` VARCHAR(20) NOT NULL ,
    `info` INT DEFAULT NULL,
     PRIMARY KEY (`food_id`),
     FOREIGN KEY (category_id) REFERENCES `category`(`cat_id`),
     UNIQUE KEY (`name`)
) ENGINE = InnoDB;

CREATE TABLE `foodorder`.`order` (
    `order_id` INT(11) NOT NULL AUTO_INCREMENT ,
    `table` INT(2) NOT NULL ,
    `food_id` INT(11) NOT NULL ,
    `number` INT(2) NOT NULL,
    `timestamp` TIMESTAMP DEFAULT CURRENT_TIME,
    `is_served` BOOLEAN NOT NULL DEFAULT false,
     PRIMARY KEY (`order_id`, `food_id`),
     FOREIGN KEY (food_id) REFERENCES food(`food_id`)
) ENGINE = InnoDB;

