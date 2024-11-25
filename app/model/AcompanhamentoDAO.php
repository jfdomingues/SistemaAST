<?php

namespace App\model;

use \App\model\Conexao;
use \App\model\Acompanhamento;
use \App\config\Database;

class AcompanhamentoDAO 
{
    //Listar AST cadastrada -> Pagina astView.php
    function astView()
    {
        $codigo = $_POST['astId'];

        $sql = 'SELECT * FROM ast
            INNER JOIN usuario ON ast.especialista = usuario.id 
            INNER JOIN area ON ast.astArea = area.id         
        WHERE astId = '.$codigo;
        $enviar = Conexao::getInstance()->prepare($sql);
        $enviar->execute();

        while($row = $enviar->fetch()){
            $this->id = $row['astId'];
            $this->area = $row['funcional'];
            $this->data = $row['astData'];
            $this->local = $row['local'];
            $this->executante = $row['executante'];
            $this->especialista = $row['nome'];
            $this->participantes = $row['participantes'];
            $this->atividade = $row['atividade'];
            $this->notaBloqueio = $row['notaBloqueio'];
            $this->desvioBloqueio = $row['desvioBloqueio'];
            $this->notaPT = $row['notaPT'];
            $this->desvioPT = $row['desvioPT'];
            $this->notaAPR = $row['notaAPR'];
            $this->desvioAPR = $row['desvioAPR'];
            $this->notaGeral = $row['notaGeral'];
        }
    }

    //Listar Acompanhamento
    function listarAST()
    {
        //Janela Modal Nova Unidade
        //$md = new AcompanhamentoDAO;
        //$md->modalNovaAST();

        //ação do botão buscar
        if (!empty($_POST['buscar'])){

            //caso exista dados no botão buscar
            $sql = "SELECT * FROM ast
            INNER JOIN usuario ON ast.especialista = usuario.id 
            INNER JOIN area ON ast.astArea = area.id
            WHERE
                ast.astId LIKE '%$_POST[buscar]%' OR
                ast.astData LIKE '%$_POST[buscar]%' OR
                usuario.nome LIKE '%$_POST[buscar]%' OR
                area.funcional LIKE '%$_POST[buscar]%' 
            ";            
        }else{  
            // caso não exista dados no botão buscar       
            $sql = "SELECT * FROM ast 
                INNER JOIN usuario ON ast.especialista = usuario.id 
                INNER JOIN area ON ast.astArea = area.id 
                ORDER BY astId DESC";
        }

            //retorna o $sql (com ou sem ação buscar)
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute();
            
            echo
            "
                <br>
                <table border=0 width=80% align=center>
                    <tr>
                        <form action='' method='POST'>
                            <td width=100%>
                                <input type=text name='buscar' placeholder=Buscar class=form-control form-control-lg>
                            </td>
                            <td>
                                <button type='submit' class='btn btn-success' name='ok' value='ok'>Buscar</button>
                            </td>
                            <td>
                                <a class='btn btn-success' href='createAST'>Criar AST</a>
                            </td>
                        </form>
                    </tr>
                </table>
            ";

            echo
            "
                <br>
                <div class='table-responsive-sm container clearfix'>
                <table class='table table-sm table-hover' style='font-size:12px;'>
                <thead class='table-active'><tr>
                    <th scope='col'>#</th>
                    <th scope='col'>Criada em:</th>
                    <th scope='col'>Criado por:</th>                    
                    <th scope='col'>Área:</th>
                    <th scope='col'>Bloq.:</th>
                    <th scope='col'>PT:</th>
                    <th scope='col'>APR:</th>
                    <th scope='col'>Nota:</th>
                    <th scope='col'></th>
                </thead></tr>
            ";
                      
        while($registro = $enviar->fetch()){
            echo
            "
                <tbody>
                <tr>
                    <th scope='row'>{$registro['astId']}</th>
                    <td>". date('d/m/Y H:i:s', strtotime($registro['astData'])) ."</td>
                    <td>{$registro['nome']}</td>
                    <td>{$registro['funcional']}</td>
                    <td>" . (isset($registro['notaBloqueio']) ? $registro['notaBloqueio'] : 'NA') . "</td>
                    <td>" . (isset($registro['notaPT']) ? $registro['notaPT'] : 'NA') . "</td>
                    <td>" . (isset($registro['notaAPR']) ? $registro['notaAPR'] : 'NA') . "</td>
                    <td>{$registro['notaGeral']}</td>
                    <td valign=top align=right>                       
                        <div class='btn-group'>
                            <button class='btn btn-success dropdown-toggle btn-sm' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></button>

                                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>                                
                                    <!--<button type='button' class='dropdown-item' data-toggle='modal' data-target='#modalExemplo'>Ver</button>-->
                                    
                                    <form enctype='multipart/form-data' action='viewAST' method='POST'>
                                        <input type='hidden' name='astId' value=" .$registro['astId']. " />
                                        <button type='submit' class='dropdown-item'  name='ver' value='ver'>Ver</button>
                                    </form>
                                    
                                    <form enctype='multipart/form-data' action='../controller/ControllerAcompanhamento.php' method='POST'>
                                        <input type='hidden' name='astId' value=" .$registro['astId']. " />
                                        <button type='submit' class='dropdown-item'  name='excluir' value='excluir'>Excluir</button>
                                    </form>
                                </div>
                        </div>
                    </td>
                </tr>
                <tbody>
            ";
        }   
            echo "</table></div>";
    }

        //Listar Acompanhmento ->Janela Modal
        function modalNovaAST()
        {

            $sql = "SELECT * FROM ast WHERE id='4'";
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute(); 
            $registroModal = $enviar->fetch();
           
            echo "
            <div class='modal fade' id='modalExemplo' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>AST - {$registroModal['id']}</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'> 
                    <table border=1 width=80% align=center>
                        <tr>Data: {$registroModal['data']}<br></tr>
                        <tr>Especialista: {$registroModal['especialista']}<br></tr>
                        <tr>Área: {$registroModal['area']}<br></tr>
                        <tr>Atividade: {$registroModal['atividade']}<br><br></tr>
                        <tr>Bloqueio de Fonte de Energia: {$registroModal['notaBloqueio']}%<br></td>
                        <tr>Permissão de Trabalho: {$registroModal['notaPT']}%<br></tr>
                        <tr>Análise Preliminar de Risco: {$registroModal['notaAPR']}%<br><br></tr>
                        <tr>Nota: {$registroModal['notaGeral']}%</tr>
                    </table>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                </div>
                </div>
            </div>
            </div>
            ";
            
        }
   
    //Cadastrar Acompanhamento
    function dataInsert(Acompanhamento $u)
    {
        //Função Validar dados
        //$this->validarDados();
 
        //define a data
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');
 
        //Cadastrar dados no banco
        $sql = 'INSERT INTO ast VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $enviar = Conexao::getInstance()->prepare($sql);
        $enviar->bindValue(1, null);
        $enviar->bindValue(2, $u->getAstArea());
        $enviar->bindValue(3, $u->getLocal());
        $enviar->bindValue(4, $u->getExecutante());
        $enviar->bindValue(5, $data);
        $enviar->bindValue(6, $u->getEspecialista());
        $enviar->bindValue(7, $u->getParticipantes());
        $enviar->bindValue(8, $u->getAtividade());
        $enviar->bindValue(9, $u->getNotaBloqueio());
        $enviar->bindValue(10, $u->getDesvioBloqueio());
        $enviar->bindValue(11, $u->getNotaPT());
        $enviar->bindValue(12, $u->getDesvioPT());
        $enviar->bindValue(13, $u->getNotaAPR());
        $enviar->bindValue(14, $u->getDesvioAPR());
        $enviar->bindValue(15, $u->getNotaGeral());
        $enviar->execute();        
    }

        //Cadastrar Acompanhamento ->Calcular Notas
        function calcularNotas()
        {
            //recebe todas as notas do post
            $notas = array(
                ($_POST['notaBloqueio']), 
                ($_POST['notaPT']), 
                ($_POST['notaAPR'])
            );
            
            //excluir os POST vazio e null do array
            $notasTratadas = array_filter($notas, function($value) {
                return ($value !== null && $value !== false && $value !== '' && $value !== ' ');
            });
    
            //Soma as notas e divide pela quantidade de notas válidas
            return $notasFinal = ((array_sum($notasTratadas)) / count($notasTratadas));            
        }
    
}