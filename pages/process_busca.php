<?php
// Receba os critérios de busca da URL
$modelo = $_GET["modelo"];
$ano = $_GET["ano"];
$preco = $_GET["preco"];

// Conecte-se ao banco de dados (use as informações fornecidas)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sale_car";

$conn = new mysqli($servername, $username, $password, $dbname);

// Construa a consulta SQL dinâmica
$sql = "SELECT * FROM anuncios WHERE 1=1"; // 1=1 é usado para simplificar a construção da consulta

if (!empty($modelo)) {
    $sql .= " AND modelo = '$modelo'";
}

if (!empty($ano)) {
    $sql .= " AND ano = '$ano'";
}

if (!empty($preco)) {
    $sql .= " AND preco <= '$preco'";
}

// Execute a consulta SQL
$result = $conn->query($sql);

// Exiba os resultados na página
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Exiba informações do anúncio (por exemplo, título, descrição, preço, etc.)
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
