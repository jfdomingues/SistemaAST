<?php

namespace App\model;

use \App\model\Conexao;
use \App\model\Database;
use \App\model\Usuario;

class UsuarioDAO
{

    # Listar Usuários
    function listarUsuario()
    {

        //ação do botão buscar
        if (!empty($_POST['buscar'])){

            //caso exista dados no botão buscar
            $sql = "SELECT usuario.*, area.funcional
            FROM usuario
            INNER JOIN area ON area.id = usuario.area
            WHERE usuario.id LIKE '%$_POST[buscar]%' OR
                  usuario.nome LIKE '%$_POST[buscar]%' OR
                  usuario.status LIKE '%$_POST[buscar]%' OR
                  area.funcional LIKE '%$_POST[buscar]%'
            ";       
        }else{  
            // caso não exista dados no botão buscar 
            $sql = "SELECT usuario.*, area.funcional
            FROM usuario
            INNER JOIN area ON area.id = usuario.area
            ORDER BY usuario.id DESC";
            }

            //retorna o $sql (com ou sem ação buscar)
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute();        
        
        echo "
            <br>
            <table border=0 width=80% align=center>
                <tr>
                <form action='' method='POST'>
                    <td width=100%>                        
                        <input type=text name='buscar' placeholder=Buscar class=form-control form-control-lg>
                    </td>
                    <td>
                        <button type=submit class='btn btn-success' name='ok' value='ok'>Buscar</button>
                    </td>
                </form>
                </tr>
            </table>
            <br>";
        
            while($row = $enviar->fetch()){
            
        echo "
            <table border=0 width=80% align=center cellpadding=0 style='font-size:12px;'>
                <tr>
                    <td valign=top width=30>{$row['id']}</td>
                    <td valign=top>
                        <strong>{$row['matricula']} | {$row['nome']}</strong><br>
                        Área: {$row['funcional']}<br>
                        {$row['mail']}<br>
                        Criado em: ". date('d/m/Y H:i:s', strtotime($row['dataInsert'])) ."<br>
                        "; 
                                                    
                        //Data de quando entrou:
                        echo "Entrou em: ";
                            if(isset($row['dataEnter']))
                            {
                                echo date('d/m/Y H:i:s', strtotime($row['dataEnter']))."<br>";
                            }else{
                                echo "<br>";
                            }

                        //Data de quando Saiu
                        echo "Saiu em: ";
                            if(isset($row['dataExit']))
                            {
                                echo date('d/m/Y H:i:s', strtotime($row['dataExit']))."<br>";
                            }else{
                                echo "<br>";
                            }
                        
                        //Status
                        echo "Status: ";
                            if($row['status'] == 'aguardando' || $row['status'] == 'bloqueado'){
                                echo "<span class='text-danger'>{$row['status']}<br></span>";
                            }else{
                                echo "{$row['status']}<br>";
                            }                    
                        ;"

                        ";                  
                        echo "                   
                        Nível: {$row['nivel']}
                    </td>
                    
                    <td valign=top align=right>
                        
                        <div class='btn-group'>
                            <button class='btn btn-success dropdown-toggle btn-sm' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></button>

                                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
                                    <button type='button' class='dropdown-item' data-toggle='modal' data-target='#excluir".$row['id']."'>Excluir</button>
                                
                                    <form enctype='multipart/form-data' action='usuarioCadastrar' method='POST'>
                                        <input type='hidden' name='id' value=" .$row['id']. " />
                                        <button type='submit' class='dropdown-item'  name='editar' value='editar'>Editar</button>
                                    </form>
                                </div>
                        </div>

                    </td>
                    <tr><td colspan=3><hr></td>
                </tr>
            </table>";
               
                //Janelas Modal
                $md = new Database;         
                $md->modalJanela('excluir','Excluir','Deseja realmente excluir o usuário:',$row['id'],$row['nome'],null,'../controller/ControllerUsuario.php');
            }
    }

   # Verifica se existe AST do usuário antes de excluí-lo
    function validarExclusaoUsuario()
    {
        if(!empty($_POST['id']))
        {
            $sql = "SELECT * FROM ast WHERE especialista = '{$_POST['id']}'";
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute();

                if($enviar->fetchColumn() > 0){
                    echo "<script>alert('Desculpa mas o usuário não pode ser excluído!\\nAinda existe AST criada em seu nome.');</script>";
                    echo "<script>window.open(document.referrer,'_self');</script>";
                    exit;
                }

        }
        
    }
     
    # Listar Funcionais
    function listarFuncional()
    {
        $sql = "SELECT * FROM area WHERE situacao='on' ORDER BY nome ASC";
        $enviar = Conexao::getInstance()->prepare($sql);
        $enviar->execute();

        echo "<option value='' selected>Área:</option>";
        while ($registro = $enviar->fetch()) {
            echo "<option value='{$registro['nome']}'>{$registro['nome']}</option>";
        }
    }

    # Validar dados do formulário "Novo Usuário"
    function validarDados()
    {
        //Verificar se o campo está em branco
        if(empty($_POST['matricula']) OR (empty($_POST['nome']) OR (empty($_POST['mail']) OR (empty($_POST['area'])))))
        {
            echo "<script>alert('Preencha todos os campos!');</script>";
            echo "<script>window.open(document.referrer,'_self');</script>";
            exit;
        }

        //Verifica se existe uma matrícula já cadastrado
        if(!empty($_POST['matricula']))
        {
            $sql = "SELECT * FROM usuario WHERE matricula = '{$_POST['matricula']}'";
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute();

                if($enviar->fetchColumn() > 0){
                    echo "<script>alert('Desculpa mas a matrícula {$_POST['matricula']} já foi cadastrado!');</script>";
                    echo "<script>window.open(document.referrer,'_self');</script>";
                    exit;
                }
        }

        //Verifica se existe um e-mail já cadastrado
        if(!empty($_POST['mail']))
        {
            $sql = "SELECT * FROM usuario WHERE mail = '{$_POST['mail']}'";
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute();

                if($enviar->fetchColumn() > 0){
                    echo "<script>alert('Desculpa mas o e-mail {$_POST['mail']} já foi cadastrado!');</script>";
                    echo "<script>window.open(document.referrer,'_self');</script>";
                    exit;
                }
        }
    }
    
    # Cadastrar Usuários
    function dataInsert(Usuario $u)
    {
        //Função Validar dados
        $this->validarDados();

        //define a data
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');

        //Cadastrar dados no banco
        $sql = 'INSERT INTO usuario VALUES (?,?,?,?,?,?,?,?,?,?,?)';
        $enviar = Conexao::getInstance()->prepare($sql);
        $enviar->bindValue(1, null);
        $enviar->bindValue(2, $u->getMatricula());
        $enviar->bindValue(3, $u->getArea());
        $enviar->bindValue(4, $u->getNome());
        $enviar->bindValue(5, $u->getMail());
        $enviar->bindValue(6, password_hash($u->getSenha(),PASSWORD_DEFAULT));
        $enviar->bindValue(7, $data);
        $enviar->bindValue(8, null);
        $enviar->bindValue(9, null);
        $enviar->bindValue(10, $u->getStatus());
        $enviar->bindValue(11, $u->getNivel());
        $enviar->execute();
    }

    # Logar Usuário
    function userValidate($mail, $senha)
    {
        $this->$mail  = $mail;
        $this->$senha = $senha;
        
        // Verifica se houve POST e se o email ou a senha é(são) vazio(s)
        if(!empty($_POST) AND (empty($mail) OR empty($senha)))
        {
            echo "<script>alert('Preencha todos os campos!');</script>";
            echo "<script>window.open(document.referrer,'_self');</script>";
            exit;       
        }

        //Se existe POST usuário e senha
        if(isset($mail) AND isset($senha))
        {
            //verifica no banco e existe um email e senha já cadastrado com o status ativado          
            $sql = "SELECT * FROM usuario WHERE mail = '$mail' AND status = 'ativado' LIMIT 1";
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute();
            
            if((($row = $enviar->fetch()) != 0) && (password_verify($senha, $row['senha']))){
                       
                //define a data
                $data = date('Y-m-d H:i:s');
                
                //Grava a data e hora de entrada do usuário no sistema
                $sql2 = "UPDATE usuario SET dataEnter ='$data', dataExit=null WHERE id=".$row['id'];
                $update = Conexao::getInstance()->prepare($sql2);
                //$update->bindParam(8, $data, PDO::PARAM_STR);  
                //$update->bindParam(8, null, PDO::PARAM_STR);  
                $update->execute();
                
                // Salva os dados encontrados na sessão
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['nivel'] = $row['nivel'];

                echo "<script>location.href='../site/';</script>";
                exit;                
            }else{

                //Caso o usuário não exista no banco ou status inválido
                echo "<script>alert('E-mail e/ou senha inválido(s)');</script>";
                echo "<script>window.open(document.referrer,'_self');</script>";
                exit;                
            }
        
        }
    }

    # Destruir Usuário e sessões    
    function destroyUser(Usuario $u)
    {
        //define a data
        $data = date('Y-m-d H:i:s');

        //Grava a data e hora de saída do usuário no sistema
        $sql = "UPDATE usuario SET dataExit ='$data' WHERE id = {$u->getId()}";
        $update = Conexao::getInstance()->prepare($sql);
        $update->execute();

        //Destroi sessões
        session_start();
        session_destroy();
        unset($_SESSION);
        header("Location: ../../index.php");
        exit;
    }
    
    # Atualizar Usuários
    function updateUser(Usuario $u)
    {
        $sql = "UPDATE usuario SET
        matricula = '{$u->getMatricula()}',
        nome = '{$u->getNome()}',
        mail = '{$u->getMail()}',
        status = '{$u->getStatus()}',
        nivel = '{$u->getNivel()}'
        WHERE id = {$u->getId()}";
        $update = Conexao::getInstance()->prepare($sql);
        $update->execute();
    }

    # Alterar Senha do Usuário
    function AlterarSenha()
    {
        // Verifica se os campos senhaAtual, senhaNova e SenhaConfirmar estão vazios
        if(empty($_POST['senhaAtual']) OR (empty($_POST['senhaNova']) OR (empty($_POST['senhaConfirmar']))))
        {
            echo "<script>alert('Preencha todos os campos!');</script>";
            echo "<script>window.open(document.referrer,'_self');</script>";
            exit;
        }

        //Verificar se senhaAtual é igual senhaNova
        if($_POST['senhaAtual'] == $_POST['senhaNova'])
        {
            echo "<script>alert('A nova senha deverá ser diferente da senha atual!');</script>";
            echo "<script>window.open(document.referrer,'_self');</script>";
            exit;
        }

        //Verificar se senhaNova é diferente da senhaConfirmar
        if($_POST['senhaNova'] != $_POST['senhaConfirmar'])
        {
            echo "<script>alert('A confirmação da senha deverá ser igual a nova senha!');</script>";
            echo "<script>window.open(document.referrer,'_self');</script>";
            exit;
        }
        
        //Verificar no banco se senhaAtual está correta                     
        if(!empty($_POST['senhaAtual']))
        {
            $senhaAtual = $_POST['senhaAtual']; 
            $senhaNova  = $_POST['senhaNova'];
            $id         = $_POST['id'];  
            $sql = "SELECT * FROM usuario WHERE id = '$id' AND status = 'ativado' LIMIT 1";
            $enviar = Conexao::getInstance()->prepare($sql);
            $enviar->execute();

            //Verificar se está correto a senha atual
            if((($row = $enviar->fetch()) != 0) && (password_verify($senhaAtual, $row['senha']))){

                //Grava no banco a nova senha
                $hash    = password_hash($senhaNova, PASSWORD_DEFAULT );                
                $sql2 = "UPDATE usuario SET
                    senha = '{$hash}'
                    WHERE id = {$id}";
                    $update2 = Conexao::getInstance()->prepare($sql2);
                    $update2->execute();  
                   
            }else{
                //Caso a senhaAltual estiver incorreta
                echo "<script>alert('Senha atual incorreta!');</script>";
                echo "<script>window.open(document.referrer,'_self');</script>";                    
                exit;
            } 
            
            //Destroi sessões
            session_start();
            session_destroy();
            unset($_SESSION);
            header("Location: ../../index.php");
            exit;
        }
    }
    
    # Ao clicar em Editar (consulta o usuário apartir do ID)
    function ListarPerfil()
    {
        $codigo = $_POST['id'];

        $sql = 'SELECT * FROM usuario WHERE id = '.$codigo;
        $enviar = Conexao::getInstance()->prepare($sql);
        $enviar->execute();

        while($row = $enviar->fetch()){
            $this->id = $row['id'];
            $this->matricula = $row['matricula'];
            $this->area = $row['area'];
            $this->nome = $row['nome'];
            $this->mail = $row['mail'];
            $this->senha = $row['senha'];
            $this->nivel = $row['nivel'];
            $this->status = $row['status'];
        }
    }

}
