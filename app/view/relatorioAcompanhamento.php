<?php

//carregar todas as classes do prjeto
//require_once '../../vendor/autoload.php';
//require_once '../../vendor/dompdf/autoload.inc.php';
//require_once '../../dompdf/autoload.inc.php';

?>
<html lang="pt-br">
  <head>
    <title>OnSoluções</title>
    <link rel="icon" type="imagem/png" href="../../public/img/favicon.jpg" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Criando PDF-AAA</h1>
<h5>Dentro do arquivo em php</h5>

<img src="../../../../public/img/logo.png">
<img src="../../../../public/img/favicon.jpg">
<img src="../../public/img/logo.png">

<img src="'.$_SERVER['DOCUMENT_ROOT'].'/sistema/hst/public/img/logo.png" width="200" height="100">
<img src="../../../hst/public/img/logo.png" width="200" height="100" >

<br><br>

<img src="'.$_SERVER['DOCUMENT_ROOT'].'/sistema/hst/public/img/favicon.jpg"/>
<img src="'.$_SERVER['DOCUMENT_ROOT'].'\sistema/hst/public/img/favicon.jpg"/>
<img src="'.$_SERVER['DOCUMENT_ROOT'].'./sistema/hst/public/img/favicon.jpg"/>
<img src="{{ public_path('../../public/img/favicon.jpg') }}" />
<img src="../../public/img/logo.png"  width="200" height="100" />
<br><br>
<img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/hst/sistema/hst/public/img/favicon.jpg';?>"/>
<img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'\hst/sistema/hst/public/img/favicon.jpg';?>"/>
<img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'./hst/sistema/hst/public/img/favicon.jpg';?>"/>
<img id="logo" src="./localhost:8080/hst/sistema/hst/public/img/logo.png" width="50">
<br>
<img src='../../../localhost:8080/hst/sistema/hst/public/img/logo.png' />

<table border=1>
    <tr>
        <td><img src="../../public/img/favicon.jpg"  width="400" height="341" /></td>
        <td>AST - AUDITORIA DE SEGURANÇA NA TAREFA</td>
        <td>NÚMERO<BR>162/2022</td>
    </tr>        
</table>
</body>
</html>

