  <?php 
  require_once("templates/header.php");
  
  ?>

  <body>
     <!--formulario para contato -->
      <div id="main-container">
        <form id="contact-form">
          <h2>Prezado Cliente, envie-nos uma mensagem:</h2><br><br>
          <label for="name">Nome:</label>
          <input type="text" name="name" placeholder="Digite seu nome">
          <label for="name">Endereço:</label>
          <input type="text" name="address" placeholder="Digite seu Endereço">
          <label for="email">E-mail:</label>
          <input type="email" name="email" placeholder="Digite seu email">
          <label for="phone">Telefone:</label>
          <input type="text" name="phone" placeholder="Digite seu telefone">
          <label for="msg">Sua mensagem:</label>
          <textarea name="msg" placeholder="Como podemos te ajudar"></textarea>
          <input type="submit" value="Enviar mensagem">
        </form>
      </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  </body>
  <?php 
  require_once("templates/footer.php");
  ?>
</html>
