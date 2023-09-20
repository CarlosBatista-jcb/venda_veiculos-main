<?php
session_start(); // Inicie a sessão (se ainda não estiver iniciada)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecte-se ao banco de dados (use as informações fornecidas)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sale_car";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // ID do remetente (assumindo que o ID do remetente está na sessão)
    $remetente_id = $_SESSION["user_id"];

    // ID do destinatário (substitua pelo ID real do destinatário)
    $destinatario_id = $_POST["destinatario_id"]; // Vem do formulário

    // Mensagem enviada pelo remetente
    $mensagem = $_POST["mensagem"];

    // Prepare a consulta SQL para inserir a mensagem no banco de dados
    $sql = "INSERT INTO mensagens (remetente_id, destinatario_id, mensagem) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $remetente_id, $destinatario_id, $mensagem);

    if ($stmt->execute()) {
        // Mensagem enviada com sucesso
        header("Location: mensagens.php"); // Redirecionar de volta para a página de mensagens
        exit();
    } else {
        // Erro ao enviar a mensagem
        echo "Erro ao enviar a mensagem. Por favor, tente novamente.";
    }

    // Feche a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
