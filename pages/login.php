<?php
session_start();

// Verifique se o usuário já está logado
if (isset($_SESSION['usuario_logado'])) {
    // Se já estiver logado, redirecione para o dashboard.php
    header("Location: dashboard.php");
    exit; // Certifique-se de sair para evitar que o restante do código seja executado
}

// O restante do código do login continua aqui
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Login</title>
    <!-- Inclua os links para os arquivos CSS do Bootstrap aqui -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <!-- Inclua o script do reCAPTCHA aqui -->
    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <!-- Formulário de Login -->
                    <form method="post" action="process_login.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" required>
                            <small class="form-text text-muted">
                                Sua senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e caracteres especiais.
                            </small>
                        </div>
                        <!-- Adicione o CAPTCHA aqui -->
                        <!--<div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LcFVxgoAAAAAAUm0prR57YBw4Y1UTnrcpHQSMr6"></div>
                        </div>-->
                        <!-- Botão de envio do formulário -->
                        <button type="submit" class="btn btn-primary" onclick="onClick(event)">Entrar</button>
                       
                    </form>
                    <!-- Fim do Formulário de Login -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Inclua os links para os arquivos JavaScript do Bootstrap aqui, se necessário -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
