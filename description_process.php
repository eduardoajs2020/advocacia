<?php 
session_set_cookie_params(1800); // 1800 segundos = 30 minutos
session_start();

require_once("templates/header.php");
?>

<body id="description-proccess-id">
<div class="description-proccess-class">
<label for="msg">Dados Processuais:</label>
<iframe src="projects/RASCUNHO PROJETO.TXT" frameborder="0" scrolling="yes" height="400" width="850" class="text-proccess" name="msg" ></iframe>
<input type="submit" class="msg-button" value="Buscar Dados">
</div>

</body>

<?php 
require_once("templates/footer.php");

?>