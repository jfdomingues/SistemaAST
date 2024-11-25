<?php

namespace App\core;

class Site
{
    public function addRouter($pasta, $pagina)
    {        
        $caminho = '../../app/';
        $router = $caminho . $pasta . "/". $pagina;
        return require_once $router;
    }

    //Pagina Home
    public function home(){$this->addRouter('view','listarAcompanhamento.php');}

    //Usuário
    public function alterarSenha(){$this->addRouter('view','usuarioAlterarSenha.php');}
    public function listarUsuario(){$this->addRouter('view','listarUsuario.php');}
    public function usuarioCadastrar(){$this->addRouter('model','usuarioCadastrar.php');}

    //Acompanhamento
    public function listarAST(){$this->addRouter('view','listarAcompanhamento.php');}
    public function createAST(){$this->addRouter('view','createAST.php');}
    public function viewAST(){$this->addRouter('view','astView.php');}      

    //Area
    public function areaList(){$this->addRouter('view','areaList.php');}
    public function areaCreate(){$this->addRouter('view','areaCreate.php');}  
    public function areaEdit(){$this->addRouter('view','areaEdit.php');}   
    


    //Unidade
    public function unidade(){$this->addRouter('view','listarUnidade.php');}

    //Teste
    public function listarRelatorio(){$this->addRouter('view','testeRelatorio.php');}



    


}
