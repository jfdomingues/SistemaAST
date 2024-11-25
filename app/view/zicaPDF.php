<?php

/*
DOMPFD
1º este https://www.youtube.com/watch?v=R3OhMI9P4-s
2º este https://www.youtube.com/watch?v=CDbtKYbm-8Q

https://www.youtube.com/watch?v=R3OhMI9P4-s
*/

//estudar
//https://www.youtube.com/watch?v=bM3y5TY-7_k
//https://www.youtube.com/watch?v=R3OhMI9P4-s
//https://www.youtube.com/watch?v=oRsmarXlwfw


//carregar todas as classes do prjeto
require_once '../../vendor/autoload.php';
require_once '../../dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$html = '
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="'.$_SERVER['DOCUMENT_ROOT'].'/sistema/hst/public/img/logo.png" width="200" height="100">
<img src="../../../hst/public/img/logo.png" width="200" height="100" >

<h1>Criando PDF</h1>
<h5>Dentro do arquivo em php</h5>
<table border=1>
    <tr>
        <td>AA</td>
        <td>AST - AUDITORIA DE SEGURANÇA NA TAREFA</td>
        <td>NÚMERO<BR>162/2022</td>
    </tr>        
</table>
    
</body>
</html>';


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isJavascriptEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$nomeArquivo = 'Relatorio - ' . date('d-m-Y-H-i-s') . '.pdf';
$dompdf->stream($nomeArquivo, ["Attachment" =>false]);



/*

//carregar todas as classes do prjeto
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use \App\model\Conexao;

function listar()
{
    $sql = "SELECT * FROM unidade";
    $enviar = Conexao::getInstance()->prepare($sql);
    $enviar->execute();
    
    while($registro = $enviar->fetch())
    {
        echo $registro['id'] ."-". $registro['nome'] . "<br>";
    }    
}


//Imprimir
//echo '<pre>';print_r(listar()); echo '</pre>';
//$html = ' . $registro["nome"] . ';
//$html  = "<td>' . print_r(listar()) . '</td>";
$html = '<img src="{{url("/http://localhost:8080/sistema/hst/public/img/logo.png")}}">';
$html .= '<img src="'.$_SERVER['DOCUMENT_ROOT'].'/public/img/logo.png">';
$html .= '<img src="{{ base_path() }}/../../public/img/logo.png" />';
$html .= '<img src="{{ public_path("../app/view/logo.png") }}" />';
$html .= '<img src="<?php echo $url;?>" />';
$html .= '
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<img 
<h1>Criando PDF</h1>
<h5>Dentro do arquivo em php</h5>
<img src="'.$_SERVER['DOCUMENT_ROOT'].'logo.png">
<img src="../../public/img/logo.png"  width="200" height="100" />
<table border=1>
    <tr>
        <td>AA</td>
        <td>AST - AUDITORIA DE SEGURANÇA NA TAREFA</td>
        <td>NÚMERO<BR>162/2022</td>
    </tr>        
</table>
    
</body>
</html>';


$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isJavascriptEnabled', true);
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$nomeArquivo = 'Relatorio - ' . date('d-m-Y-H-i-s') . '.pdf';
$dompdf->stream($nomeArquivo, ["Attachment" =>false]);

//https://www.youtube.com/watch?v=bM3y5TY-7_k
//https://www.youtube.com/watch?v=D5nnrGSDUzI

*/

?>