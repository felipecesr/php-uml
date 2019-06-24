-- Adminer 4.7.1 MySQL dump

CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)  ENGINE=INNODB;

INSERT INTO categorias (id, nome) VALUES
(1, 'Informatica'),
(2, 'Escritorio');

-- 2019-06-20 20:20:30
