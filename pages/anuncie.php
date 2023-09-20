<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Inclua os links para os arquivos CSS do Bootstrap aqui -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <!-- Inclua o script do reCAPTCHA aqui -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    
    <form method="post" action="../pages/process_anuncio.php" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título do Anúncio</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input type="text" class="form-control" id="preco" name="preco" required>
    </div>
    <div class="mb-3">
        <label for="imagem" class="form-label">Imagem do Carro</label>
        <input type="file" class="form-control" id="imagem" name="imagem" required>
    </div>
    <button type="submit" class="btn btn-primary">Publicar Anúncio</button>
</form>

<!-- Inclua os links para os arquivos JavaScript do Bootstrap aqui, se necessário -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
