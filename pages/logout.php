<?php
session_start(); // Inicia a sessão (se ainda não estiver iniciada)

// Verifica se o usuário está logado (você pode ajustar isso conforme necessário)
if (isset($_SESSION["user_id"])) {
    // Encerra a sessão
    session_destroy();
    
    // Redireciona para a página de login ou qualquer outra página desejada
    header("Location: login.php");
    exit();
} else {
    // Se o usuário não estiver logado, você pode redirecioná-lo para alguma página de erro ou página inicial
    header("Location: index.php");
    exit();
}
?>
