  <?php 
  session_set_cookie_params(1800); // 1800 segundos = 30 minutos
  session_start();
  
  require_once('validate_login.php');
  require_once("templates/header.php");
  
  ?>

  <body>
     <!--formulario para contato -->
      <div id="main-container">
         <form id="contact-form">
          <h2>Informe os dados do Advogado!</h2><br><br>
          <label for="name">Nome:</label>
          <input type="text" name="name" placeholder="Informe o nome do Advogado">
          <label for="name">Sobrenome:</label>
          <input type="text" name="sobrenome" placeholder="Informe o sobrenome do Advogado">
          <label for="name">OAB:</label>
          <input type="text" name="oab" placeholder="Informe a OAB do Advogado">
          <label for="name">Endereço:</label>
          <input type="text" name="endereco" placeholder="Informe o Endereço">
          <label for="name">Número:</label>
          <input type="number" name="numero_endereco" placeholder="Informe o número do Endereço">
          <label for="name">CEP:</label>
          <input type="number" name="name" placeholder="Informe o CEP">
          <label for="name">Cidade:</label>
          <input type="text" name="cidade" placeholder="Informe a Cidade do Advogado">
          <label for="name">Estado:</label>
          <input type="text" name="name" placeholder="Informe o Estado do Advogado">
          <label for="email">E-mail:</label>
          <input type="email" name="email" placeholder="Informe o email do Advogado">
          <label for="phone">Telefone:</label>
          <input type="text" name="phone" placeholder="Informe o Telefone do Advogado">
          <label for="msg">Informe os locais de Atuação:</label>
          <textarea name="msg" placeholder="Locais em que o Advogado atua"></textarea>
          <label for="phone">Bio:</label>
          <textarea type="text" name="bio" placeholder="Descreva as atividades desenvolvidas"></textarea>
          <input  type="submit" value="Exibir">
          <input  type="submit" value="Incluir">
          <input  type="submit" value="Atualizar">
          <input  type="submit" value="Excluir">
          
          <!--Enviar para controller-> Advogado/advogado->-->
        </form>
      </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  </body>
  <?php 
  require_once("templates/footer.php");
  ?>
</html>
