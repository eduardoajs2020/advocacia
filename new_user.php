<?php 
session_set_cookie_params(1800); // 1800 segundos = 30 minutos
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxmum-scale=1, user-scalable=no">
    <title>T-Juris-Usuario</title>
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <header>
    <?php
        require_once("templates/header.php");
    ?>
  </header>
<body>
    <div id="form-container-senha">
	<h1 class="name-titulo-1">Cadastro de novo Usuário</h1>
	<form class="login-senha" method="post" action="utils\create_new_user.php">
    <div class="login-senha-1">
		<label for="username">Nome de usuário:</label>
		<input type="text" id="username" name="username" required>
    <br><br>
    </div>
     <div class="login-senha-2">
		<label for="password">Senha:</label>
		<input type="password" id="password" name="password" required><br><br>
     </div>
     <div class="login-senha-button">
		<input class="login-senha-button-2" type="submit" value="Cadastrar">
     </div>
	</form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/js/bootstrap.js" integrity="sha512-sVtqu//5Nt9ezFxWXCLcYjITUpvE2uin3m6zeClCHkHfWOshi732EGhrim4qL7kawS5ipwU/rmQo7ZirKzDvfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </div>
</body>
<footer>
    <?php
        require_once("templates/footer.php");
    ?>
  </footer>
</html>
