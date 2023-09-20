CREATE TABLE anuncios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    titulo VARCHAR(255),
    descricao TEXT,
    preco DECIMAL(10, 2),
    imagem VARCHAR(255),
    data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
