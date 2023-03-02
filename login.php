<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxmum-scale=1, user-scalable=no">
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
            <form class="login-senha" form action="<?=$BASE_URL?>principal.php" method="POST">
                <div class="login-senha-1">
                    <label for="user">Informe o Usuário:</label>
                    <input type="text" name="user" placeholder="Usuário">
                </div>
                <div class="login-senha-2">
                    <label for="senha">Informe a senha:</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <div>
                    <a href="#" id="forgot-pass">Esqueceu a senha?</a>
                </div>
                <div class="login-senha-button">
                   
                    <a href="<?=$BASE_URL?>principal.php" class="login-senha-button-2"><span>Login</span></a>            
                </div>
                <div id="register">
                    <p>Ainda não tem Cadastro?</p>
                    <a href="#" class="registrar">Registrar</a>
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
