<?php

//carregar todas as classes do prjeto
require_once '../../vendor/autoload.php';

use App\model\Usuario;
use App\model\UsuarioDAO;

# Novo Usuário
//solicitação de cadastro feito pelo usuário externo
if(!empty($_POST['usuarioNovo']))
{
    $u = new Usuario;
    $u->setMatricula($_POST['matricula']);
    $u->setNome($_POST['nome']);
    $u->setArea($_POST['area']);
    $u->setMail($_POST['mail']);
    $u->setSenha($_POST['senha']);
    $u->setStatus('bloqueado');
    $u->setNivel('usuario');

    $uDAO = new UsuarioDAO;
    $uDAO->dataInsert($u);

    echo "<script>location.href='../../UsuarioEntrar.html';</script>";
}

# Excluir Usuário
if (!empty($_POST['excluir']))
{
    $val = new UsuarioDAO;
    $val->validarExclusaoUsuario();

    $ex = new App\model\Database;
    $ex->deleteDate('usuario','id', $_POST['id']);
    echo "<script>location.href='../view/listarUsuario';</script>";

}

# Atualizar Usuário feito pelo administrador
if(!empty($_POST['atualizarUsuario']))
{
    $at = new Usuario;
    $at->setId($_POST['id']);
    $at->setMatricula($_POST['matricula']);
    $at->setNome($_POST['nome']);
    $at->setArea($_POST['area']);
    $at->setMail($_POST['mail']);
    $at->setStatus($_POST['status']);
    $at->setNivel($_POST['nivel']);   

    $atDAO = new UsuarioDAO;
    $atDAO->updateUser($at);
    
    echo "<script>location.href='../view/listarUsuario';</script>"; 
}

# Alterar senha
if(!empty($_POST['alterarSenha']))
{
    $senha = new UsuarioDAO;
    $senha->AlterarSenha();
}

# Logar no sistema
if(!empty($_POST['logar']))
{
    $mailFiltrada = filter_input(INPUT_POST,'mail', FILTER_DEFAULT);
    $senhaFiltrada = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);

    $logar = new \App\model\UsuarioDAO;
    $logar->userValidate($mailFiltrada,$senhaFiltrada);    
}

# Sair do sistema
if(!empty($_POST['sair']))
{
    $exit = new App\model\Usuario;
    $exit->setId($_POST['id']);

    $exitDAO = new UsuarioDAO;
    $exitDAO->destroyUser($exit);
}