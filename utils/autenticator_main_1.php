<?php
// Iniciar a sessão
session_start();

// Conectar ao banco de dados usando PDO
require_once('db.php');

//define variaveis
$username = $password = $confirm_password ="";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
//Validar nome de usuario
if(empty(trim($_POST["username"]))){
    $username_err = "Digite um usuário valido";
}elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
  $username_err = "O nome de usuário pode conter apenas letras e numeros";
}else{
  //Prepare select
   $sql = "SELECT * FROM usuarios WHERE username = :username";

  if($stmt = $conn->prepare($sql)){
    //Vincular as variaveis ao prepare com parametros
    $stmt->bindParam("username", $param_user, PDO::PARAM_STR);

    //Definir parametros
    $param_username = trim($_POST["username"]);

    // Tente executar a declaração preparada
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este nome de usuário já está em uso.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
          unset($stmt);
  }

}

// Validar senha
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor insira uma senha.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validar e confirmar a senha
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não confere.";
        }
    }


    // Verifique os erros de entrada antes de inserir no banco de dados
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

            // Prepare uma declaração de inserção
            $sql = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";

            if($stmt = $conn->prepare($sql)){
                // Vincule as variáveis à instrução preparada como parâmetros
                $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);

                // Definir parâmetros
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Tente executar a declaração preparada
                if($stmt->execute()){
                    // Redirecionar para a página de login
                    header("location: ../principal.php");
                } else{
                    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
                }

                // Fechar declaração
                unset($stmt);
            }
        }

        // Fechar conexão
        unset($conn);
    }
    ?>
