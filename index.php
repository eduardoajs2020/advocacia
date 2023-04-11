<?php

session_start();
$session_timeout = 1800; // 1800 segundos = 30 minutos

if (isset($_SESSION['username'])) {
    include_once('principal.php');
} else {
    include_once('login.php');
}
exit;

?>
