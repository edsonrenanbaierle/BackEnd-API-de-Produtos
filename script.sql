CREATE DATABASE desafio3product;

CREATE TABLE categoria (
    idCategoria INT PRIMARY KEY,
    nameCategoria VARCHAR(255) NOT NULL
);

CREATE TABLE fabricante (
    idFabricante INT PRIMARY KEY,
    nomeFantasia VARCHAR(255) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(255) NOT NULL,
    pais VARCHAR(255) NOT NULL,
    cnpj VARCHAR(20) NOT NULL
);

CREATE TABLE produto (
    idProduto INT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    preco INT NOT NULL,
    estoque INT,
    pathImagem VARCHAR(255),
    idCategoria INT NOT NULL,
    idFabricante INT NOT NULL,
    FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria),
    FOREIGN KEY (idFabricante) REFERENCES fabricante(idFabricante)
);
