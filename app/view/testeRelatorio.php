<?php


//== Funcionando ==============================================================

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
echo '<pre>';print_r(listar()); echo '</pre>';

//=============================================================================




//== Funcionando ==============================================================
/*
use \App\model\Conexao;

function listar()
{
    $sql = 'SELECT * FROM usuario';
    $enviar = Conexao::getInstance()->prepare($sql);
    $enviar->execute();

    if($enviar->rowCount() > 0){
        $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
    }
}

//Imprimir
echo '<pre>';print_r(listar()); echo '</pre>';
*/
//=============================================================================




//== Funcionando ==============================================================
/*
function listar()
{
    $con = mysqli_connect('localhost', 'root', '', 'hst');
    $sql = "SELECT * FROM unidade";
    $resultado = mysqli_query($con,$sql);
        
    while ($registro = mysqli_fetch_array($resultado))
    {
        echo $registro['id'] ."-". $registro['nome'] . "<br>";
    }
}

//Imprimir
echo '<pre>';print_r(listar()); echo '</pre>';
*/
//=============================================================================



     
/*
//Funcionando perfeitamente
function listar()
{
    $conexao = new PDO('mysql:host=localhost;dbname=onsolu73_on','onsolu73_adm','zn1Zz6R69u');
    $sql = 'SELECT * FROM login';
    $enviar = $conexao->prepare($sql);
    
    $enviar->execute();

    if($enviar->rowCount() > 0){
        $resultado = $enviar->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
    }
    return [];
}

//lista os registro no banco de dados
echo '<pre>';
print_r(listar());
*/