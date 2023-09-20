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

// Verifique se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver autenticado, redirecione para a página de login
    header("Location: pagina_de_sucesso.php");
    exit();
}

// Agora você pode acessar $_SESSION['user_id'] com segurança
$user_id = $_SESSION['user_id'];

// Resto do seu código aqui


    // Receba os dados do formulário
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $usuario_id = $_SESSION["user_id"]; // Obtenha o ID do usuário a partir da sessão

    // Trate o upload da imagem
    $imagem = "";
    if ($_FILES["imagem"]["error"] === 0) {
        $imagem = "../uploads/" . basename($_FILES["imagem"]["name"]);
        //$imagem = __DIR__ . "../uploads/" . basename($_FILES["imagem"]["name"]);
        move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);        
    }

    // Prepare a consulta SQL para inserir o anúncio no banco de dados
    $sql = "INSERT INTO anuncios (usuario_id, titulo, descricao, preco, imagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issds", $usuario_id, $titulo, $descricao, $preco, $imagem);

    if ($stmt->execute()) {
        // Anúncio inserido com sucesso
        header("Location: pagina_de_sucesso.php"); // Redirecionar para uma página de sucesso
        exit();
    } else {
        // Erro ao inserir o anúncio
        echo "Erro ao inserir o anúncio. Por favor, tente novamente.";
    }

    // Feche a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
