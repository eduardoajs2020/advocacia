<?php
// Iniciar a sessão
session_start();

// Conectar ao banco de dados usando PDO
require_once("utils/db.php");

// Verificar se a conexão foi bem-sucedida
if (!$conn) {
    die("Erro ao conectar ao banco de dados.");
}

// Verificar se o usuário já está logado
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: /principal.php");
    exit;
}

// Verificar se o formulário foi enviado via método POST e se os campos foram preenchidos
if (getenv("REQUEST_METHOD") == "POST" && !empty($_POST["username"]) && !empty($_POST["password"])) {

    // Receber os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Criptografar a senha fornecida pelo usuário
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Selecionar o usuário com o nome de usuário fornecido
    $stmt = $conn->prepare("SELECT
                                id
                                , username
                                , password
                                FROM usuarios
                                WHERE username = ?"
                              );
    $stmt->bindParam(1, $username);

    if (!$stmt->execute()) {
        // Exibir uma mensagem de erro em caso de falha na consulta
        $login_err = "Erro ao executar a consulta.";
    } else {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar se o usuário foi encontrado e a senha está correta
        if ($result && password_verify($password, $result["password"])) {

            // Iniciar a sessão e armazenar os dados do usuário
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $result["id"];
            $_SESSION["username"] = $result["username"];

            // Redirecionar para a página principal
            header("Location: /principal.php");
        } else {
            // Exibir uma mensagem de erro se o login falhar
            $login_err = "Nome de usuário ou senha incorretos.";
        }
    }

    // Fechar a conexão com o banco de dados
    $conn = null;
}
?>
