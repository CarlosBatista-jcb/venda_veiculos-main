CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    remetente_id INT,
    destinatario_id INT,
    mensagem TEXT,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lida BOOLEAN DEFAULT 0
);
