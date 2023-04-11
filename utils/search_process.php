<?php

// cria uma instância do cURL
$curl = curl_init();

// define a URL do site que deseja acessar
$url = file_get_contents('https://www.tjmg.jus.br/portal-tjmg/processos/andamento-processual/#.ZANXnBXMLrc');

// define as opções do cURL
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// faz a requisição e obtém o conteúdo da página
$page_content = curl_exec($curl);

// fecha a instância do cURL
curl_close($curl);

// faz o parse do conteúdo da página com DOMDocument
$dom = new DOMDocument();
$dom->loadHTMLFile($page_content);

// encontra o elemento que deve ser clicado
$select_element = $dom->getElementById('filtro_tipo_parte');
$select_element_options = $select_element->getElementsByTagName('option');
foreach ($select_element_options as $option) {
    if ($option->getAttribute('value') == 'parte') {
        $option->setAttribute('selected', 'selected');
        break;
    }
}

// envia o formulário para realizar a consulta
$form_data = array(
    'filtro_tipo_parte' => 'parte',
    'filtro_comarca' => 'Belo Horizonte',
    'filtro_pessoa_nome' => 'Eduardo dos Anjos Souza',
    'filtrar' => '',
);
$form_query = http_build_query($form_data);
$form_action = $dom->getElementById('frm_pesquisa_processos')->getAttribute('action');
$submit_url = 'https://www.tjmg.jus.br' . $form_action . '?' . $form_query;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $submit_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

// exibe o resultado da consulta
echo $result;
?>