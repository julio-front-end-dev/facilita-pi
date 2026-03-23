CREATE DATABASE IF NOT EXISTS facilita_db;
USE facilita_db;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS profissionais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    profissao VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    whatsapp VARCHAR(20) NOT NULL
);

INSERT INTO usuarios (usuario, senha) VALUES ('admin', '$2y$10$S8K9.V8yV5X8O3/B1QG.9e.1jR.N5H2l8fL8XzQ5g4H/R5V7zS3mG');