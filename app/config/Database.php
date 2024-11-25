<?php

namespace App\config;

class Database
{
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
}