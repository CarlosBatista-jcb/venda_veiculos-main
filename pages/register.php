<?php include '../includes/header_dashboard.php'; ?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <!-- Inclua os links para os arquivos CSS do Bootstrap aqui -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Cadastro de Usuário</div>
                <div class="card-body">
                    <!-- Formulário de Registro -->
                    <form method="post" action="process_register.php">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone de Contato</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirma_senha" class="form-label">Confirme a Senha</label>
                            <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    <!-- Fim do Formulário de Registro -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Inclua os links para os arquivos JavaScript do Bootstrap aqui, se necessário -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
