CREATE DATABASE library;

USE library;

CREATE TABLE typeUser (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(10) NOT NULL
);

INSERT INTO typeUser(name) VALUES ('admin');
INSERT INTO typeUser(name) VALUES ('student');

CREATE TABLE user(
    id VARCHAR(32) NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
	cpf VARCHAR(11) NOT NULL,
	email VARCHAR(50) NOT NULL,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(60) NOT NULL,
    typeUserID INT NOT NULL,
    FOREIGN KEY (typeUserID) REFERENCES typeUser(id)
);

CREATE TABLE book(
    id VARCHAR(32) NOT NULL PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    author VARCHAR(50) NOT NULL,
    publisher VARCHAR(50) NOT NULL,
    cover VARCHAR(60),
    reservation TINYINT(1),
    loan TINYINT(1)
);

CREATE TABLE reservation(
    id VARCHAR(32) NOT NULL PRIMARY KEY,
    userID VARCHAR(32) NOT NULL,
    booID VARCHAR(32) NOT NULL,
    FOREIGN KEY (userID) REFERENCES user(id),
    FOREIGN KEY (booID) REFERENCES book(id)
);

CREATE TABLE loan(
    id VARCHAR(32) NOT NULL PRIMARY KEY,
    userID VARCHAR(32) NOT NULL,
    booID VARCHAR(32) NOT NULL,
    FOREIGN KEY (userID) REFERENCES user(id),
    FOREIGN KEY (booID) REFERENCES book(id)
);