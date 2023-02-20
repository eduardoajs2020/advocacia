<!DOCTYPE html>
<html lang="pt-br">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Chatbot</title>
    
  </head>
  
  <body class="bg-secondary bg-gradient">
    <div class="container-fluid">

      <div class="card card-primary text-center mt-4">
        <div class="card-header text-white bg-primary bg-gradient">
          Faça sua pergunta ao Bot
        </div>
        <div class="card-body">
          <div id="container-chat" class="position-relative" style="overflow-y:scroll; height: 420px;">
            
          </div>
        </div>
        <div class="card-footer text-muted">
          <div class="input-group mb-3">
            <input type="text" id="input-pergunta" class="form-control" placeholder="Digite a sua pergunta"
            onkeydown="if(event.keyCode == 13)$('#btn-envia-pergunta').trigger('click')">
            <button class="btn btn-primary" id="btn-envia-pergunta" type="button" onClick="btnEnviarPergunta($('#input-pergunta').val())">
                <i class="bi bi-send"></i>
            </button>
          </div>
        </div>
      </div>

    </div>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- JavaScript Chatbot -->
    <script>
        function rolarScroolContainderChat(){
            $("#container-chat").animate({
            scrollTop: $('#container-chat')[0].scrollHeight - $('#container-chat')[0].clientHeight
            }, 1000);
        }

        function renderizarWidgetMensagemChat(usuarioOrigem, mensagem, url_imagem) {
            if (usuarioOrigem == 'bot') {
                icone = 'robot';
                posicao = 'right-0 ';
                cor = 'success';
            } else {
                icone = 'person-fill';
                posicao = 'left-0';
                cor = 'info';
            }

            var widget_mensagem = `<br><br><br><br><br><br>
                                   <div class="badge bg-${cor} bg-gradient text-wrap text-left position-absolute ${posicao}-0 start-0 mt-4">
                                    <i class="bi bi-${icone}"style="font-size: 1rem; color: white;"></i>
                                    ${mensagem}
                                   </div>`;

            $('#container-chat').append(widget_mensagem);

            if(url_imagem){
                var imagem = `<br><br><br><br>
                          <a href="${url_imagem}" target="_blank" class="position-absolute ${posicao}-0 start-0 mt-4" style="cursor: zoom-in;">
                              <img class="thumbnail w-25" src="${url_imagem}">
                          </a>`;
                $('#container-chat').append(imagem);
            }


            rolarScroolContainderChat();
        }

        function loadingResposta(){
            $("#input-pergunta").val('Aguarde, o Bot está respondendo a sua pergunta...').prop('readonly', true);
            $("#btn-envia-pergunta").prop('disabled', true);
        }

        function resetLoading(){
            $("#input-pergunta").val('').prop('readonly', false);
            $("#btn-envia-pergunta").prop('disabled', false);
        }

        function btnEnviarPergunta(pergunta){
            if(pergunta){
                renderizarWidgetMensagemChat('usuario', pergunta);
                loadingResposta();
                $.getJSON('http://localhost:5000/chatbot', {
                    pergunta: pergunta
                }, function(data) {
                    console.log(data);
                    console.log(data.resposta);
                    console.log(data.url_imagem)
                    renderizarWidgetMensagemChat('bot', data.resposta, data.url_imagem);
                    resetLoading();
                });
                return false;
            }
        }
    </script>
  </body>
</html>