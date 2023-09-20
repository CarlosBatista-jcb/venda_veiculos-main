<?php
session_start(); // Inicie a sessão (se ainda não estiver iniciada)

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

// ID do destinatário (substitua pelo ID real do destinatário)
$destinatario_id = $_SESSION["user_id"]; // Assumindo que o ID do destinatário está na sessão

// Consulta SQL para buscar as mensagens trocadas com o destinatário
$sql = "SELECT * FROM mensagens WHERE destinatario_id = $destinatario_id ORDER BY data_envio DESC";

$result = $conn->query($sql);

// Exiba as mensagens
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Exiba as informações da mensagem (remetente, mensagem, data, etc.)
        $remetente_id = $row["remetente_id"];
        $mensagem = $row["mensagem"];
        $data_envio = $row["data_envio"];
        $lida = $row["lida"];

        // Aqui, você pode formatar e exibir as informações da mensagem
        echo "<p>";
        echo "Remetente: $remetente_id<br>";
        echo "Mensagem: $mensagem<br>";
        echo "Data de Envio: $data_envio<br>";
        if ($lida) {
            echo "Status: Lida";
        } else {
            echo "Status: Não Lida";
        }
        echo "</p>";
    }
} else {
    echo "Nenhuma mensagem encontrada.";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
