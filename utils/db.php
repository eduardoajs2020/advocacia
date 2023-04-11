<?php 

$db_name = "t_juris_proc";
$db_host = "localhost";
$db_user = "root";
$db_pass = "10205618";


$conn = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

//HABILITAR ERROS PDO

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);






?>