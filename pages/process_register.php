<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecte-se ao seu banco de dados (substitua essas informações pelas suas)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sale_car";

    // Crie uma conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtenha os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirma_senha"];

    // Validação básica
    if ($senha !== $confirmaSenha) {
        echo "As senhas não coincidem. Por favor, tente novamente.";
    } else {
        // Verifique se o e-mail já está em uso
        $verificaEmail = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($verificaEmail);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Este e-mail já está em uso. Por favor, escolha outro.";
        } else {
            // Hash da senha (use uma biblioteca de hashing segura)
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Insira os dados no banco de dados (substitua pelos campos da sua tabela)
            $inserirUsuario = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($inserirUsuario);
            $stmt->bind_param("ssss", $nome, $email, $telefone, $senhaHash);

            if ($stmt->execute()) {
                echo "Cadastro realizado com sucesso! Você pode fazer login agora.";
                // Redirecione para a página de login
                header("Location: login.php");
                exit();
            } else {
                echo "Erro ao cadastrar o usuário: " . $stmt->error;
            }
        }

        // Feche o resultado da consulta
        $result->close();
    }

    // Feche a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
