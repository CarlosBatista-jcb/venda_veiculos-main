-- Cria o banco de dados
CREATE DATABASE IF NOT EXISTS sale_car;
USE sale_car;

-- Cria a tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Garante que o campo de e-mail seja único para evitar duplicatas
ALTER TABLE usuarios ADD UNIQUE (email);
