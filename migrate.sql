CREATE DATABASE flashevents;

CREATE TABLE addresses
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    city VARCHAR(100) NOT NULL,
    zip_code VARCHAR(50),
    street_name VARCHAR(100),
    street_number VARCHAR(50),
    latitude VARCHAR(50),
    longitude VARCHAR(50)
);
CREATE TABLE events
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100),
    id_provider INT(11),
    id_address INT(11),
    start_date VARCHAR(100),
    end_date VARCHAR(100),
    cost VARCHAR(50),
    event_link VARCHAR(250),
    description TEXT,
    picture VARCHAR(250),
    rating INT(11)
);
CREATE TABLE friends
(
    id_user INT(11),
    id_friends INT(11)
);
CREATE TABLE providers
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);
CREATE TABLE tokens
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    token VARCHAR(250) NOT NULL,
    id_provider INT(11) NOT NULL,
    id_user INT(11)
);
CREATE TABLE users
(
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    id_address INT(11) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100)
);
CREATE UNIQUE INDEX users_email_uindex ON users (email);
CREATE UNIQUE INDEX users_id_address_uindex ON users (id_address);