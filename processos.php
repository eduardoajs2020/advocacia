  <?php
  require_once("templates/header.php");
  require_once("utils/db.php");
  require_once("globals.php");
  require_once("processo_filters.php");


  ?>

  <body>
    <div id="main-container">

      <!--formulario para contato -->
      <div id="form-container">
        <h2>Cadastro de Processos</h2>
        <form id="contact-form" action="<?=$BASE_URL?>models/Processo.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="type" value="update">
          <div class="teste-processo">
            <label for="processo">Processo:</label>
            <input type="text" name="nProcesso" placeholder="Digite aqui o numero do processo">
          </div>
          <div class="teste-processo-2">
            <label for="advogado">Advogado Responsável:</label>
            <input type="text" name="nomeAdvogado">
            <label for="numero-oab">OAB:</label>
            <input type="number" name="oab">
          </div>
          <div>
            <label for="name">Nome do cliente:</label>
          <input type="text" name="nomeCliente" placeholder="Digite o nome do cliente">
          </div>
          <div>
            <label for="number">CPF/CNPJ do cliente:</label>
          <input type="number" name="cpf" placeholder="Digite o cpf/cnpj do cliente">
          </div>
          <div>
            <label for="email">E-mail:</label>
          <input type="email" name="email" placeholder="Digite o email do cliente">
          </div>
          <div>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" placeholder="Digite o telefone do cliente">
          </div>
          <div>
            <label for="polo-ativo">Polo Ativo:</label>
            <input type="text" name="poloAtivo" >
          </div>
          <div>
            <label for="polo-passivo">Polo Passivo:</label>
            <input type="text" name="poloPassivo">
          </div>
          <div>
            <label for="litisconsorte">Litisconsorte:</label>
            <input type="text" name="litisconsorte" placeholder="Digite o nome do litisconsorte, se houver">
          </div>
          <div>
            <label for="tipo-acao">Tipo de Ação:</label>
            <input type="text" name="tipoAcao" placeholder="Digite o tipo de lide">
          </div>
          <div>
            <label for="objeto">Objeto da Ação:</label>
            <input type="text" name="objetoAcao" placeholder="Informe o objeto da Ação">
          </div>
          <div>
            <label for="vara">Vara:</label>
            <input type="text" name="vara" placeholder="Digite a vara do processo">
          </div>
          <div>
            <label for="comarca">Comarca:</label>
            <input type="text" name="comarca" placeholder="Digite a Comarca do processo">
          </div>
          <div>
            <label for="rito">Rito:</label>
            <input type="text" name="rito" placeholder="Digite o Rito do processo">
          </div>
          <div>
            <label for="foro">Foro:</label>
            <input type="text" name="foro" placeholder="Digite o foro em que corre o processo">
          </div>
          <div>
            <label for="andar">Andar:</label>
            <input type="text" name="andar">
          </div>
          <div>
            <label for="area">Area:</label>
            <input type="text" name="area" placeholder="Digite de aul area é o processo. Ex: Civel">
          </div>
          <div>
            <label for="fase">Fase:</label>
            <input type="text" name="fase" placeholder="Digite em que fase se encontra o processo. Ex: Contestação">
          </div>
          <div>
            <label for="situacao">Situação:</label>
          <input type="text" name="situacao" placeholder="Digite se o processo está ativo ou baixado.">
          </div>
          <div>
            <label for="instancia">Instância:</label>
            <input type="text" name="instancia" placeholder="Digite em qual instância se encontra o processo.">
          </div>
          <div>
            <label for="valor">Valor da Causa:</label>
            <input type="number" name="valorCausa" placeholder="Digite o Valor da Causa"></div>
          <div>
            <label for="data">Data de Distribuição:</label>
            <input type="date" name="dataDistribuicao">
          </div>

          <div>
            <label for="data">Data de Baixa:</label>
            <input type="date" name="dataBaixa">
          </div>

          <div>
            <label for="msg">Observações relevantes:</label>
            <textarea name="msg"></textarea>
          </div>
          <div>
            <input type="submit" value="Cadastrar">
            <input type="submit" value="Informações Processuais">
          </div>
        </form>
      </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  </body>
  <?php
  require_once("templates/footer.php");
  ?>
</html>
