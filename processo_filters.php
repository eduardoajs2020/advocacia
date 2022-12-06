<?php

require_once("globals.php");
require_once("utils/db.php");
require_once("models/User.php");
require_once("models/Processo.php");
require_once("models/Advogados.php");
require_once("models/Message.php");
require_once("dao/ProcessDAO.php");


$message = new Message($BASE_URL);

$processDao = new ProcessDAO($conn, $BASE_URL);

//Resgata o tipo do formulario
$type = filter_input(INPUT_POST,'type');

//Verificação do tipo de formulario
if($type === "register"){

$nProcesso= filter_input(INPUT_POST, "nProcesso");
$nomeAdvogado= filter_input(INPUT_POST, "nomeAdvogado");
$oab= filter_input(INPUT_POST, "oab");
$nomeCliente= filter_input(INPUT_POST, "nomeCliente");
$cpf= filter_input(INPUT_POST, "cpf");
$cnpj= filter_input(INPUT_POST, "cnpj");
$email= filter_input(INPUT_POST, "email, FILTER_VALIDATE_EMAIL");
$telefone= filter_input(INPUT_POST, "telefone");
$poloAtivo= filter_input(INPUT_POST, "poloAtivo");
$poloPassivo= filter_input(INPUT_POST, "poloPassivo");
$litisconsorte= filter_input(INPUT_POST, "litisconsorte");
$tipoAcao= filter_input(INPUT_POST, "tipoAcao");
$objetoAcao= filter_input(INPUT_POST, "objetoAcao");
$vara= filter_input(INPUT_POST, "vara");
$comarca= filter_input(INPUT_POST, "comarca");
$rito= filter_input(INPUT_POST, "rito");
$foro= filter_input(INPUT_POST, "foro");
$andar= filter_input(INPUT_POST, "andar");
$area= filter_input(INPUT_POST, "area");
$fase= filter_input(INPUT_POST, "fase");
$situacao= filter_input(INPUT_POST, "situacao");
$instancia= filter_input(INPUT_POST, "instancia");
$valorCausa= filter_input(INPUT_POST, "valorCausa");
$dataDistribuicao= filter_input(INPUT_POST, "dataDistribuicao");
$dataBaixa= filter_input(INPUT_POST, "dataBaixa");
}
/*else{
  $_SESSION['msg'] = "<p style='color:red'>Os dados não foram enviados!</p>";
  header("Location:index.php");
}*/
