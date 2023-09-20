<?php include '../includes/header_dashboard.php'; ?>
<?php
// Verifique se o usuário está autenticado e obtenha seu ID
session_start();
if (!isset($_SESSION['user_id'])) {
    // Se o usuário não estiver autenticado, redirecione para a página de login
    header("Location: login.php");
    exit;
}

// Conecte-se ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sale_car";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para obter os detalhes do usuário (substitua com sua consulta real)
$query = "SELECT nome FROM usuarios WHERE id = ?"; // Supondo que você tenha um campo 'id' para identificar o usuário
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION["user_id"]); // Supondo que você tenha armazenado o ID do usuário na sessão
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $nome_do_usuario = $row["nome"];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container mt-5">
        <!-- Formulário de edição de perfil -->
        <h1>Editar Perfil</h1>
        <form method="post" action="process_edit_profile.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome_do_usuario; ?>" required>
            </div>
            <!-- Outros campos do formulário aqui -->
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
