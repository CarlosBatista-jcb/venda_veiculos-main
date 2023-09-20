<?php include '../includes/header_dashboard.php'; ?>
<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirecione para a página de login se não estiver autenticado
    header("Location: login.php");
    exit();
}

// Conecte-se ao banco de dados (substitua as informações do banco de dados pelas suas)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sale_car";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para buscar as informações do usuário logado
$user_id = $_SESSION['user_id'];
$consulta = "SELECT nome, email, telefone FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($consulta);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Dados do usuário foram encontrados
    $row = $result->fetch_assoc();
    $nome_do_usuario = $row["nome"];
    $email_do_usuario = $row["email"];
    $telefone_do_usuario = $row["telefone"];
} else {
    // Usuário não encontrado
    echo "Dados do usuário não encontrados.";
}


// Feche a conexão com o banco de dados
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Meu Perfil</title>
    <!-- Inclua os links para os arquivos CSS e JavaScript aqui, se necessário -->
</head>
<body>
    <div class="container mt-5">
        <div class="card">
        <div class="container p-3 my-3 bg-dark text-white">            
                <h1 class="card-title">Perfil do Usuário logado!</h1>
                <p>Nome do Usuário: <?php echo $nome_do_usuario; ?></p>
                <p>Email: <?php echo $email_do_usuario; ?></p>
                <p>Telefone: <?php echo $telefone_do_usuario; ?></p>
                <!-- Adicione aqui quaisquer outras informações do usuário -->
            </div>
        </div>
    </div>
</body>
</html>
