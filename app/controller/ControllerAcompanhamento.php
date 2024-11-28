<?php

//carregar todas as classes do prjeto
require_once '../../vendor/autoload.php';

use App\model\Acompanhamento;
use App\model\AcompanhamentoDAO;
use Dompdf\Dompdf;
use Dompdf\Options;

//Cadastrar AST
if(!empty($_POST['criarAST']))
{
    //Verificação ->Precisa ao menos uma nota para criar AST
    if (empty($_POST['notaPT']) && empty($_POST['notaBloqueio']) && empty($_POST['notaAPR'])) {
        echo "<script>alert('É necessário escolher uma nota!');</script>";
        echo "<script>window.open(document.referrer,'_self');</script>";
        exit;
    }

    //Transformar os Não Aplicável em null
    $nullPT = $_POST['notaPT'] === "" ? null : $_POST['notaPT'];
    $nullBoq = $_POST['notaBloqueio'] === "" ? null : $_POST['notaBloqueio'];
    $nullAPR = $_POST['notaAPR'] == "" ? null : $_POST['notaAPR'];

    $u = new Acompanhamento;
    $u->setAstArea($_POST['astArea']);
    $u->setLocal($_POST['local']);
    $u->setExecutante($_POST['executante']);
    $u->setEspecialista($_POST['id']);
    $u->setParticipantes($_POST['participantes']);
    $u->setAtividade($_POST['atividade']);
    $u->setNotaBloqueio($nullBoq);
    $u->setDesvioBloqueio($_POST['desvioBloqueio']);
    $u->setNotaPT($nullPT);
    $u->setDesvioPT($_POST['desvioPT']);
    $u->setNotaAPR($nullAPR);
    $u->setdesvioAPR($_POST['desvioAPR']);
    
    $nota = new AcompanhamentoDAO;
    $u->setNotaGeral($nota->calcularNotas());   

    $uDAO = new AcompanhamentoDAO;
    $uDAO->dataInsert($u);

    echo "<script>location.href='listarAST';</script>";
}

//Excluir AST
if (!empty($_POST['excluir']))
{
    $ex = new App\model\Database;
    $ex->deleteDate('ast','astId',$_POST['astId']);
    echo "<script>location.href='listarAST';</script>";
}