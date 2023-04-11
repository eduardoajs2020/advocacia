<?php
session_set_cookie_params(1800); // 1800 segundos = 30 minutos

// Iniciar a sessão
session_start();

// Conectar ao banco de dados usando PDO
require_once("utils/db.php");


// Verificar se o usuário já está logado
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: /principal.php");
    exit;
}

// Verificar se o formulário foi enviado via método POST e se os campos foram preenchidos
if (isset($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {

    // Receber os dados do formulário e filtrá-los
    $username = filter_var($_POST["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //var_dump($username);
    //var_dump($password);


    // Selecionar o usuário com o nome de usuário fornecido
    $stmt = $conn->prepare("SELECT
                                  id
                                , username
                                , password
                                FROM usuarios
                                WHERE 
                            
                                username = :username"
                                
                              );
    
    $stmt->bindParam(':username', $username);
    

    $stmt->execute();

    /*var_dump($result = $stmt->fetch(PDO::FETCH_ASSOC));
    var_dump($username);
    var_dump($password);*/
    
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result){

        // Verificar se o usuário foi encontrado e a senha está correta
        if  (password_verify($password, $result ['password'])) {

            // Iniciar a sessão e armazenar os dados do usuário
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $result["id"];
            $_SESSION["username"] = $result["username"];
            //$_SESSION["access_level"] = $result["access_level"]; // adicionar esta linha


            // Verificar o nível de acesso do usuário e redirecioná-lo para a página correta
      /*  if ($_SESSION["access_level"] == "tipo1") {

            header("Location: /pagina_tipo1.php");
        } 
          elseif ($_SESSION["access_level"] == "tipo2") {

            header("Location: /pagina_tipo2.php");
        } 
          elseif ($_SESSION["access_level"] == "tipo3") {

            header("Location: /pagina_tipo3.php");
        } 
          elseif ($_SESSION["access_level"] == "superuser") {

             header("Location: /pagina_superuser.php");
        } 
          else {
    // Exibir uma mensagem de erro em caso de nível de acesso inválido
            $login_err = "Nível de acesso inválido!";
        }*/

            // Redirecionar para a página principal
            header("Location: /principal.php");
            exit();

        } else {
            // Exibir uma mensagem de erro se o login falhar
            $login_err = "Senha incorreta!";
        }
    } else {
        // Exibir uma mensagem de erro em caso de falha na consulta
        $login_err = "Nome do usuário não encontrado!";
    }
    
}
// Fechar a conexão com o banco de dados
$conn = null;
?>
