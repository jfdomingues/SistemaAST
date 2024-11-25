<?php

namespace App\model;

use \App\model\Conexao;

//https://gist.github.com/n0m4dz/6b0ae1f02c71c168cf46
class Database
{

    function deleteDate($tabela, $campo, $post)
    {
        $this->tabela         = $tabela;
        $this->campo          = $campo;
        $this->post           = $post;

        $sql = "DELETE FROM " . $tabela . " WHERE ". $campo . " = " . $post;
        $apaga = Conexao::getInstance()->prepare($sql);
        $apaga->execute();
    }

    
    function deleteDateArquivo($tabela, $where, $id, $arquivo, $caminhoArquivo)
    {
        $this->tabela         = $tabela;
        $this->where          = $where;
        $this->id             = $id;
        $this->arquivo        = $arquivo;
        $this->caminhoArquivo = $caminhoArquivo;

        $uploaddir = '' . $caminhoArquivo . '' . $arquivo . '';

        $sql = "DELETE FROM " . $tabela . " WHERE " . $where . " = " . $id;
        $apaga = Conexao::getInstance()->prepare($sql);
        $apaga->bindParam('$where', $id);
        @unlink($uploaddir);
        $apaga->execute();
    }

    function modalJanela($nomeJanela, $tituloJanela, $textoJanela, $id, $campo1, $arquivo, $url)
    {
        echo "
            <div class='modal fade' id='$nomeJanela$id' tabindex='-1' role='dialog' aria-labelledby='TituloModalCentralizado' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>

                        <div class='modal-header'>
                            <h4 class='modal-title' id='modalLabel'>$tituloJanela</h4>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'><span aria-hidden='true'>&times;</span></button>
                        </div>
                        
                        <div class='modal-body'>
                            $textoJanela<br>
                            $id | $campo1
                        </div>

                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Não</button>                
                            <form enctype='multipart/form-data' action='$url' method='POST'>
                                <input type='hidden' name='id' value='$id' />
                                <input type='hidden' name='arquivo' value='$arquivo' />
                                <button type='submit' class='btn btn-primary' name='$nomeJanela' value='$nomeJanela'>Sim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
        ";
    }

    function dataBase()
    {
        //define a data
        date_default_timezone_set('America/Sao_Paulo');
        //$data = date('Y-m-d H:i:s');
        return date('Y-m-d H:i:s');

    }

    function dd($params = [], $die = true)
    {
        echo '<pre>';
            print_r($params);
        echo '</pre>';
        if ($die) die();
    }

}

