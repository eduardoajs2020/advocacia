<!--!DOCTYPE html>
<html lang="en" dir="ltr">
  head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maxmum-scale=1, user-scalable=no">
    <title>Contato</title>
    <link rel="stylesheet" href="assets/css/styles.css">
  </head-->
  <?php 
  require_once("templates/header.php");
  
  ?>

  <body>
     <!--formulario para contato -->
      <div id="main-container">
         <form id="contact-form">
          <h2>Informe os dados do Advogado!</h2><br><br>
          <label for="name">Nome:</label>
          <input type="text" name="name" placeholder="Informe o nome do Advogado">
          <label for="name">OAB:</label>
          <input type="text" name="oab" placeholder="Informe a OAB do Advogado">
          <label for="email">E-mail:</label>
          <input type="email" name="email" placeholder="Informe o email do Advogado">
          <label for="phone">Telefone:</label>
          <input type="text" name="phone" placeholder="Informe o Telefone do Advogado">
          <label for="msg">Informe os locais de Atuação:</label>
          <textarea name="msg" placeholder="Locais em que o Advogado atua"></textarea>
          <input  type="submit" value="Incluir">
          <input  type="submit" value="Atualizar">
          <input  type="submit" value="Excluir">
        </form>
      </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  </body>
  <?php 
  require_once("templates/footer.php");
  ?>
</html>
