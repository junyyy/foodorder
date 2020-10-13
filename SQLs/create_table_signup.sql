CREATE TABLE signup (
    signup_id INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL DEFAULT '',
    password VARCHAR(50) NOT NULL DEFAULT '',
    email VARCHAR(50) DEFAULT NULL,
    firstname VARCHAR(50) DEFAULT NULL,
    lastname VARCHAR(50) DEFAULT NULL,
    signature TEXT NOT NULL,
    confirm_code VARCHAR(40) NOT NULL DEFAULT '',
    created INT(11) NOT NULL DEFAULT '0',
    PRIMARY KEY (signup_id),
    UNIQUE KEY confirm_code (confirm_code),
    UNIQUE KEY user_login (login),
    UNIQUE KEY email (email)
);