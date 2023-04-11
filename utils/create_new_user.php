<?php
session_start();
require_once('db.php');

// Verificar se os campos de nome de usuário e senha foram preenchidos
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Por favor, preencha todos os campos.";
        exit();
    }


        // Conectar ao banco de dados usando PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se o usuário já existe
        $stmt = $conn->prepare("SELECT * FROM usuarios
                                         WHERE username =
                                         :username"
                                       );
        $stmt->bindParam(':username', $_POST["username"]);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "Nome de usuário já existe.";
        } else {
            // Inserir novo usuário
            $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO usuarios
                                                (username
                                                , password)
                                                VALUES
                                                (:username
                                                , :password)"
                                              );
            $stmt->bindParam(':username', $_POST["username"]);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->execute();

            echo "Usuário cadastrado com sucesso.";
        }


    }

    $conn = null;

?>
