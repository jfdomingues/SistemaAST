<?php

namespace App\model;

use \App\model\Conexao;
use \App\model\Area;

class AreaDAO 
{
    # Listar Áreas -> "UsuárioNovo.php"
    function listarFuncional()
    {
        $sql = "SELECT * FROM area WHERE status = 'ativado' ORDER BY funcional ASC";
        $enviar = Conexao::getInstance()->prepare($sql);
        $enviar->execute();

        echo "<option value='' selected>Área:</option>";
        while ($registro = $enviar->fetch()) {
            echo "<option value='{$registro['id']}'>{$registro['funcional']}</option>";
        }
    }

   # Listar Area
   function listarArea()
   {
        //ação do botão buscar
        if (!empty($_POST['buscar'])){

           //caso exista dados no botão buscar
           $sql = "SELECT * FROM area WHERE 
               id LIKE '%$_POST[buscar]%' OR 
               executivo LIKE '%$_POST[buscar]%' OR
               funcional LIKE '%$_POST[buscar]%' OR
               status LIKE '%$_POST[buscar]%' OR
               dataCriacao LIKE '%$_POST[buscar]%'
           ";            
       }else{  
           // caso não exista dados no botão buscar       
           $sql = "SELECT * FROM area ORDER BY id DESC";
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
                               <a class='btn btn-success' href='areaCreate'>Criar Area</a>
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
                   <th scope='col'>Executivo:</th>                    
                   <th scope='col'>Funcional:</th>
                   <th scope='col'>Status:</th>
                   <th scope='col'></th>
               </thead></tr>
           ";
                     
       while($registro = $enviar->fetch())
       {
               
           echo
           "
               <tbody>
               <tr>
                   <th scope='row'>{$registro['id']}</th>
                   <td>". date('d/m/Y H:i:s', strtotime($registro['dataCriacao'])) ."</td>
                   <td>{$registro['executivo']}</td>
                   <td>{$registro['funcional']}</td>
                   <td>{$registro['status']}</td>
                   <td valign=top align=right>                       
                       <div class='btn-group'>
                            <button class='btn btn-success dropdown-toggle btn-sm' type='button' id='dropdownMenuButton2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></button>
                                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton2'>                                                                
                                    
                                    <form enctype='multipart/form-data' action='areaEdit' method='POST'>
                                        <input type='hidden' name='id' value=" .$registro['id']. " />
                                        <!--<button type='submit' class='dropdown-item'  name='excluir' value='excluir'>Excluir</button>-->
                                        <button type='submit' class='dropdown-item'  name='editar' value='editar'>Editar</button>

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

    # Validar campos ao cadastrar novas Areas
    function areaValidate()
    {
        // Verifica o campo Executivo
        if($_POST['executivo'] === 'Executivo:')
        {
            echo "<script>alert('Escolha uma opção no campo Executivo');</script>";
            echo "<script>window.open(document.referrer,'_self');</script>";
            exit;       
        }

        // Verifica campo Funcional
        if(empty($_POST['funcional']))
        {
            echo "<script>alert('Preencha o campo Funcional');</script>";
            echo "<script>window.open(document.referrer,'_self');</script>";
            exit;       
        }
    }

   # Criar Área
   function areaInsert(Area $u)
   {
        //Função Validar dados
        $this->areaValidate();

        //define a data
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');

        //Cadastrar dados no banco
        $sql = 'INSERT INTO area VALUES (?,?,?,?,?,?)';
        $enviar = Conexao::getInstance()->prepare($sql);
        $enviar->bindValue(1, null);
        $enviar->bindValue(2, $u->getExecutivo());
        $enviar->bindValue(3, $u->getFuncional());
        $enviar->bindValue(4, $data);
        $enviar->bindValue(5, $u->getStatus());
        $enviar->bindValue(6, $u->getId_usuario());
        $enviar->execute();
   }

   # Update Área
   function areaUpdate(Area $u)
   {
        //define a data
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');

        $sql = "UPDATE area SET
            executivo = '{$u->getExecutivo()}',
            funcional = '{$u->getFuncional()}',
            dataCriacao = '$data',
            status = '{$u->getStatus()}',
            id_usuario = '{$u->getId_usuario()}'
        WHERE id = {$u->getId()}";
        $update = Conexao::getInstance()->prepare($sql);
        $update->execute();
   }
   
}