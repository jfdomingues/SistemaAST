<?php

//carregar todas as classes do prjeto
require_once '../../vendor/autoload.php';

use App\model\Area;
use App\model\AreaDAO;

//Cadastrar Área
if(!empty($_POST['criarArea']))
{
    $u = new Area;
    $u->setExecutivo($_POST['executivo']);
    $u->setFuncional($_POST['funcional']);
    $u->setStatus('Ativado');
    $u->setId_usuario($_POST['idSession']);

    $uDAO = new AreaDAO;
    $uDAO->areaInsert($u);

    echo "<script>location.href='../view/areaList';</script>";
}

//Editar Área
if(!empty($_POST['updateArea']))
{
    $up = new Area;
    $up->setId($_POST['id']);
    $up->setExecutivo($_POST['executivo']);
    $up->setFuncional($_POST['funcional']);
    $up->setStatus($_POST['status']);
    $up->setId_usuario($_POST['idSession']);

    $upDAO = new AreaDAO;
    $upDAO->areaUpdate($up);

    echo "<script>location.href='../view/areaList';</script>";
}

//Excluir Área
if (!empty($_POST['excluir']))
{
    $ex = new App\model\Database;
    $ex->deleteDate('area',$_POST['id']);
    echo "<script>location.href='../view/areaList';</script>";
}