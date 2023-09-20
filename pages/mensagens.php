<?php include('../includes/header.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Mensagens</title>
    <!-- Inclua os links para os arquivos CSS do Bootstrap aqui -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Sistema de Mensagens</h1>

    <!-- Exiba mensagens trocadas com o destinatário -->
    <?php
    // Coloque aqui o código PHP para recuperar e exibir as mensagens
    include("../pages/exibir_mensagens.php");
    ?>

    <!-- Formulário para enviar novas mensagens -->
    <form method="post" action="processar_mensagem.php">
        <div class="mb-3">
            <label for="mensagem" class="form-label">Nova Mensagem</label>
            <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
        </div>
        <input type="hidden" name="destinatario_id" value="ID_DO_DESTINATARIO">
        <!-- Substitua ID_DO_DESTINATARIO pelo ID real do destinatário -->
        <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
    </form>
</div>

<!-- Inclua os links para os arquivos JavaScript do Bootstrap aqui, se necessário -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
<?php include('../includes/footer.php'); ?>
</body>
</html>
