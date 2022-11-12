CREATE TABLE users (
    users_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    users_alias TINYTEXT NOT NULL, 
    users_pwd LONGTEXT NOT NULL, 
    users_email TINYTEXT NOT NULL
);

CREATE TABLE cats (
    cats_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    cats_breed TINYTEXT NOT NULL, 
    cats_info LONGTEXT NOT NULL,
    cats_picture TINYTEXT NOT NULL
);