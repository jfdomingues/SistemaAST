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
    $u->setNotaPT($nullPT);
    $u->setNotaAPR($nullAPR);
    
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

//Gerar PDF
if(!empty($_POST['relatorioPDF']))
{  

    //carregar todas as classes do prjeto
    require_once '../../dompdf/autoload.inc.php';

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isJavascriptEnabled', true);
    $options->set('isRemoteEnabled', true);
    
    $dompdf = new Dompdf($options);
    //$dompdf->loadHtml("Helo Word!!!");
    $html = file_get_contents('../view/relatorioAcompanhamento.php');
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $nomeArquivo = 'Relatorio - ' . date('d-m-Y-H-i-s') . '.pdf';
    $dompdf->stream($nomeArquivo, ["Attachment" =>false]);
  
    /*
    $dompdf = new Dompdf();
    $html = file_get_contents('../view/relatorioAcompanhamento.php');
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('Relatorio',["Attachment" =>false]);
    */

    /*
    ob_start();
    require __DIR__ . "../../view/relatorioAcompanhamento.php";
    $dompdf->loadHtml(ob_get_clean());
    $dompdf->render();
    */


    /*
    //FUNCIONA BEM....
    //require_once '../../dompdf/autoload.inc.php';
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isJavascriptEnabled', true);
    $options->set('isRemoteEnabled', true);
    
    $dompdf = new Dompdf($options);
    //$dompdf->loadHtml("Helo Word!!!");
    $html = file_get_contents('../view/relatorioAcompanhamento.php');
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $nomeArquivo = 'Relatorio - ' . date('d-m-Y-H-i-s') . '.pdf';
    $dompdf->stream($nomeArquivo, ["Attachment" =>false]);

    //Estudar isto aqui!!!
    //https://www.youtube.com/watch?v=P2VLscuAxDo
    */
    
}
