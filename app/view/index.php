<?php

ob_start();
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['nome']))
{
    session_destroy();
      echo "<script>location.href='../../index.php';</script>";
    exit;
}

//carregar todas as classes do prjeto
require_once '../../vendor/autoload.php';

//include do cabeçalho      
require_once '../view/template/header.html';

//Rotas das paginas
$router = new App\core\Router;

//include do Rodapé
require_once '../view/template/footer.html';
