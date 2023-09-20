<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Anúncio</title>
    <!-- Inclua o link para o Bootstrap aqui -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Barra de Navegação (se você tiver uma) -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Seu Logo</a>
</nav>

<div class="container mt-5">
    <?php
    // Recupere os detalhes do anúncio do banco de dados com base no ID do anúncio
    $anuncioId = $_GET['id']; // Supondo que você passe o ID do anúncio pela URL

    // Consulta SQL para recuperar os detalhes do anúncio com base no ID
    // Substitua 'sua_query_sql' pela consulta real
    $sql = "SELECT * FROM anuncios WHERE id = $anuncioId";

    // Execute a consulta e recupere os detalhes do anúncio
    // Substitua 'sua_conexao' pela conexão real com o banco de dados
    $resultado = mysqli_query(sua_conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $anuncio = mysqli_fetch_assoc($resultado);
    ?>
    <h1><?php echo $anuncio['titulo']; ?></h1>
    <p>Descrição: <?php echo $anuncio['descricao']; ?></p>
    <p>Preço: R$ <?php echo number_format($anuncio['preco'], 2, ',', '.'); ?></p>

    <!-- Carrossel de Imagens usando Bootstrap -->
    <div id="carouselImages" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselImages" data-slide-to="0" class="active"></li>
            <!-- Adicione mais indicadores aqui para cada imagem -->
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/<?php echo $anuncio['imagem1']; ?>" class="d-block w-100" alt="Imagem 1">
            </div>
            <!-- Adicione mais itens de carrossel aqui para cada imagem -->
        </div>
        <a class="carousel-control-prev" href="#carouselImages" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselImages" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>

    <a href="pagina_de_anuncios.php" class="btn btn-primary mt-3">Voltar para Anúncios</a>

    <?php
    } else {
        echo "<p>Este anúncio não existe ou foi removido.</p>";
    }
    ?>
</div>

<!-- Inclua o link para os arquivos JavaScript do Bootstrap aqui, se necessário -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
