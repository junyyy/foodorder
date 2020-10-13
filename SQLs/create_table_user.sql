CREATE TABLE user (
    user_id INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL DEFAULT '',
    password VARCHAR(50) NOT NULL DEFAULT '',
    email VARCHAR(50) DEFAULT NULL,
    firstname VARCHAR(50) DEFAULT NULL,
    lastname VARCHAR(50) DEFAULT NULL,
    signature TEXT NOT NULL,
    PRIMARY KEY (signup_id),
    UNIQUE KEY user_login (login)
);