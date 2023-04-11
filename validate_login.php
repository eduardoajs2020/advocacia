<?php 

if(!isset($_SESSION['username'])){
    header('location: index.php?erro=true');
    exit;
  }




?>