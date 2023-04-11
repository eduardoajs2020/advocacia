<?php 
session_set_cookie_params(1800); // 1800 segundos = 30 minutos

session_start();

if(isset($_GET['erro'])){
    $erro = 'ALERTA: É necessário efetuar o login para acessar a página !';
}

?>
<div class="msg-erro-1">
    <?php  echo $erro ?? ''; ?>
</div>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T-Juris-Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <header>
    <?php
        require_once("templates/header.php");
    ?>
  </header>
  <body>
    <div id="form-container-senha">
        <span>
            <form action="autenticator_main.php" method="POST" class="login-senha">
                <div class="login-senha-1">
                    <label for="username">Informe o Usuário:</label>
                    <input type="text" name="username" placeholder="Usuário" required>
                    </div>
                <div class="login-senha-2">
                    <label for="senha">Informe a senha:</label>
                    <input type="password" name="password" placeholder="Senha" required>
                </div>
                <div class="login-senha-2">
                    <label for="senha">Confirme a senha:</label>
                    <input type="password" name="confirm_password" placeholder="Confirme a Senha" required>
                </div>
                <div>
                    <a href="#" id="forgot-pass">Esqueceu a senha?</a>
                </div>
                <div class="login-senha-button">

                    <input type="submit" class="login-senha-button-2" value="Login" >
                </div>
                <div id="register">
                    <p>Ainda não tem Cadastro?</p>
                    <a href="new_user.php" class="registrar">Registrar</a>
                </div>

            </form>
        </span>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/js/bootstrap.js" integrity="sha512-sVtqu//5Nt9ezFxWXCLcYjITUpvE2uin3m6zeClCHkHfWOshi732EGhrim4qL7kawS5ipwU/rmQo7ZirKzDvfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </body>
  <footer>
    <?php
        require_once("templates/footer.php");
    ?>
  </footer>
</html>
