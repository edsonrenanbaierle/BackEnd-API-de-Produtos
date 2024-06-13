CREATE DATABASE desafio3product;

CREATE TABLE categoria (
    idCategoria INT PRIMARY KEY AUTO_INCREMENT,
    nameCategoria VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE fabricante (
    idFabricante INT PRIMARY KEY AUTO_INCREMENT,
    nomeFantasia VARCHAR(255) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    pais VARCHAR(255) NOT NULL,
    cnpj VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE produto (
    idProduto INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco INT NOT NULL,
    estoque INT NOT NULL,
    pathImagem VARCHAR(255),
    idCategoria INT NOT NULL,
    idFabricante INT NOT NULL,
    FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria),
    FOREIGN KEY (idFabricante) REFERENCES fabricante(idFabricante)
);
