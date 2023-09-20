<?php
session_start(); // Inicia a sessão (se ainda não estiver iniciada)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o login normalmente
    
    // Validação do reCAPTCHA
    //$recaptchaSecretKey = "6LcFVxgoAAAAAOO_Fu70IZVUWdtI-dVvUq-MkVGR"; // Substitua pela sua chave secreta
   // $recaptchaToken = $_POST['g-recaptcha-response'];

    //$response = file_get_contents("https://www.recaptcha.net/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaToken");
    //$responseKeys = json_decode($response, true);

    //if (intval($responseKeys["success"]) !== 1) {
        // O reCAPTCHA falhou, tratamento de erro aqui (por exemplo, redirecionar de volta ao formulário de login com uma mensagem de erro)
       // echo "O reCAPTCHA falhou. Por favor, tente novamente.";
   // } else {
        // O reCAPTCHA foi bem-sucedido, continue com o processo de login

        // Conecte-se ao seu banco de dados (substitua essas informações pelas suas)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sale_car";

        // Obtenha os dados do formulário
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Crie uma conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifique a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Consulta para buscar o usuário com o e-mail fornecido
        $consulta = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($consulta);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // O usuário com o e-mail existe
            $row = $result->fetch_assoc();

            // Verifique a senha usando password_verify
            if (password_verify($senha, $row["senha"])) {
                // Senha correta, inicie a sessão do usuário
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["user_nome"] = $row["nome"];
                // Adicione quaisquer outras informações de usuário que você desejar
                
                // Redirecione para o painel de controle
                header("Location: dashboard.php");
                exit();
            } else {
                // Senha incorreta
                echo "Senha incorreta. Por favor, tente novamente.";
            }
        } else {
            // Usuário com o e-mail fornecido não encontrado
            echo "E-mail não encontrado. Por favor, verifique o e-mail e tente novamente.";
        }

        // Feche a conexão com o banco de dados
        $stmt->close();
        $conn->close();
    }

?>
