CREATE DATABASE `testedb`;
USE `testedb`;

DROP TABLE IF EXISTS `categorias`;
DROP TABLE IF EXISTS `produtos`;
DROP TABLE IF EXISTS `produtos_categorias`;

CREATE TABLE IF NOT EXISTS categorias (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    preco FLOAT(10,2),
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS produtos_categorias (
    produto_id INT NOT NULL,
    categoria_id INT NOT NULL,
    PRIMARY KEY (produto_id, categoria_id),
    FOREIGN KEY (produto_id) REFERENCES produtos (id),
    FOREIGN KEY (categoria_id) REFERENCES categorias (id)
);

INSERT INTO categorias (id, nome) VALUES
(1, 'Informatica'),
(2, 'Escritorio');

INSERT INTO produtos (id, nome, preco) VALUES
(1, 'Computador', 2000),
(2, 'Impressora', 800),
(3, 'Mouse', 80);

INSERT INTO produtos_categorias (produto_id, categoria_id) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1);
