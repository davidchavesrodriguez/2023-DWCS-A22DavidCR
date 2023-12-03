-- DATABASE
CREATE DATABASE IF NOT EXISTS review;
USE review;
-- TABLES
CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200)
);
CREATE TABLE product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200),
    description VARCHAR(250),
    picture VARCHAR(250),
    idCategory INT,
    FOREIGN KEY (idCategory) REFERENCES category(id)
);
CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    dni VARCHAR(200),
    name VARCHAR(250),
    address VARCHAR(250),
    login VARCHAR(250) NOT NULL UNIQUE,
    password VARCHAR(250) NOT NULL,
    admin BOOLEAN NOT NULL
);
-- USER
CREATE USER gestor @localhost IDENTIFIED BY "abc123.";
GRANT ALL PRIVILEGES ON review.* TO gestor @localhost;
-- INSERTS
INSERT INTO category (id, name)
VALUES (1, 'Book');
INSERT INTO category (id, name)
VALUES (2, 'Movie');
INSERT INTO category (id, name)
VALUES (3, 'Game');
INSERT INTO product (name, description, picture, idCategory)
VALUES (
        'Nineteen Eighty Four',
        'Dystopian novel and cautionary tale by English writer George Orwell',
        '1984.jpg',
        1
    );
INSERT INTO product (name, description, picture, idCategory)
VALUES (
        'To Kill a Mockingbird',
        'Classic novel by Harper Lee',
        'mockingbird.jpg',
        1
    );
INSERT INTO product (name, description, picture, idCategory)
VALUES (
        'The Shawshank Redemption',
        'Drama film directed by Frank Darabont',
        'shawshank.jpg',
        2
    );
INSERT INTO product (name, description, picture, idCategory)
VALUES (
        'The Legend of Zelda: Breath of the Wild',
        'Action-adventure video game for Nintendo Switch',
        'zelda.jpg',
        3
    );
INSERT INTO product (name, description, picture, idCategory)
VALUES (
        'Inception',
        'Science fiction action film directed by Christopher Nolan',
        'inception.jpg',
        2
    );
INSERT INTO product (name, description, picture, idCategory)
VALUES (
        'Chess',
        'Classic chess game',
        'chess.jpg',
        3
    );
INSERT INTO user
VALUES(
        1,
        "12345678Z",
        "Pepinho",
        "Santiago de Compostela",
        "pepinho",
        "abc123.",
        true
    );