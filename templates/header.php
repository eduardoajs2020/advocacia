<?php

/*require_once("globals.php");
require_once("utils/db.php");
require_once("models/Message.php");
require_once("dao/AdvogadosDAO.php");


$message = new Message($BASE_URL);

$flassMessage = $message->getMessage();
if(!empty($flassMessage["msg"])){
    //Limpar a mensagem
    $message->clearMessage();
}

$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken();*/


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>T-Juris-Controller</title>
        <link rel="short icon" href="assets/img/justice-icon.jpg"/>
        <!--Bootstrap do projeto -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.1/css/bootstrap.css" integrity="sha512-tBwPRcI1t+0jTsIMtf//+V1f0xAWHh7pvPE82A2n5FcBrzl6b0LRE6XnxUTRHti59y4Js7z4Wb/zal2HBsVVOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--CSS do projeto -->
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <header>
            <nav id="main-navbar" class="navbar navbar-expand-lg">
                <a href="<?= $BASE_URL?>" class="navbar-brand">
                <img src ="assets/img/justice-logo.svg" alt="Justice" id="logo">
                <span id="t-juris-title">T-Juris-Controller</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <form action="search.php" method="GET" id="search-form" class="form-inline my-2 my-lg-0">
                    <input type="text" name="q" id="search" class="form-control mr-sm-2" type="search" placeholder="Buscar cliente/processo" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav">
                        <?php if($userData): ?>
                            <li class="nav-item">
                        <a href="newmovie.php" class="nav-link">
                            <i class="far fa-plus-square"></i> Incluir Filme
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?= $BASE_URL?>dashboard.php" class="nav-link">Meus Filmes</a>
                        </li>
                        <li class="nav-item">
                        <a href="<?= $BASE_URL?>editprofile.php" class="nav-link bold"><?= $userData->name ?></a>
                        </li>
                        <li class="nav-item">
                        <a href="<?= $BASE_URL?>logout.php" class="nav-link">Sair</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                        <a href="<?= $BASE_URL?>/utils/auth.php" class="nav-link">Entrar/ Cadastrar</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>
        <?php if(!empty($flassMessage["msg"])): ?>
        <div class="msg-container">
        <p class="msg <?= $flassMessage['type']?>"><?= $flassMessage['msg'] ?></p>
        </div>
        <?php endif; ?>
