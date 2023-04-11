  <?php 
  session_set_cookie_params(1800); // 1800 segundos = 30 minutos
  session_start();
  require_once('validate_login.php');
  require_once("templates/header.php");
  
  ?>

  <body>
     <!--formulario para contato -->
      <div id="main-container">
        <form id="contact-form" >
          <h2>Preencha os dados do cliente para Cadastro:</h2><br><br>
          <label for="name">Foto:</label>
          <input type="file" name="image" placeholder="Inclua a Sua foto">
          <label for="name">Nome:</label>
          <input type="text" name="nome" placeholder="Digite seu nome">
          <label for="name">Sobrenome:</label>
          <input type="text" name="sobrenome" placeholder="Digite seu Endereço">
          <label for="name">Endereço:</label>
          <input type="text" name="endereco" placeholder="Digite seu Endereço">
          <label for="name">Numero:</label>
          <input type="number" name="numero_endereco" placeholder="Digite o número">
          <label for="name">Cidade:</label>
          <input type="text" name="cidade" placeholder="Digite sua Cidade">
          <label for="name">Estado:</label>
          <input type="text" name="estado" placeholder="Digite seu Estado">
          <label for="name">CEP:</label>
          <input type="number" name="cep" placeholder="Digite o CEP">
          <label for="name">CPF:</label>
          <input type="number" name="cpf" placeholder="Informe seu CPF">
          <label for="email">E-mail:</label>
          <input type="email" name="email" placeholder="Digite seu email">
          <label for="phone">Telefone:</label>
          <input type="text" name="telefone" placeholder="Digite seu telefone">
          <label for="name">Bio:</label>
          <textarea type="text" name="bio" placeholder="Breve descrição sobre o cliente"></textarea>
          <label for="msg">Sua mensagem:</label>
          <textarea name="msg" placeholder="Como podemos te ajudar"></textarea>
          <input  type="submit" value="Exibir">
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
