CREATE DATABASE `blog`;
USE `blog`;

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)  ENGINE=INNODB;

INSERT INTO categorias (id, nome) VALUES
(1, 'Informatica'),
(2, 'Escritorio');
