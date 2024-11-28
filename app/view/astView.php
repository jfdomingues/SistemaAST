
<?php

//Mostar AST apartir do código ID
$verAST = new App\model\AcompanhamentoDAO;
$verAST->astView();

?>

<!--Formulário para editar Perfil-->
<div class="container mt-3">
  <form method="POST" enctype="multipart/form-data" action="../controller/ControllerAcompanhamento.php">           
 
  <p>
    Identidicador: <?php {echo $verAST->id;}?><br>
    Criado em:  <?php echo date('d/m/Y H:i:s', strtotime($verAST->data)) ?><br>
    Criado por: <?php {echo $verAST->especialista;}?><br><br>
  </p>

  
  <div class="form-group">
    <label>Atividade:</label>  
    <input type="text" name="atividade" required readonly placeholder="Atividade:" class="form-control form-control-lg" value="<?php {echo $verAST->atividade;}?>">
  </div>

  <div class="form-group">
    <label>Área:</label>  
    <input type="text" name="area" required readonly placeholder="Area:" class="form-control form-control-lg" value="<?php {echo $verAST->area;}?>">
  </div>
    
  <div class="form-group">
    <label>Local:</label>  
    <input type="text" name="local" required readonly placeholder="Local:" class="form-control form-control-lg" value="<?php {echo $verAST->local;}?>">
  </div>

  <div class="form-group">
    <label>Executante:</label> 
    <input type="text" name="executante" required readonly placeholder="Executante:" class="form-control form-control-lg" value="<?php {echo $verAST->executante;}?>">
  </div>
    
  <div class="form-group">
    <label>Participantes:</label> 
    <input type="text" name="participantes" required readonly placeholder="Participantes:" class="form-control form-control-lg" value="<?php {echo $verAST->participantes;}?>">
  </div>
  <br>


  <?php
  if(isset($verAST->notaBloqueio)){
    echo "
      <label>Bloqueio de Fonte de Energia:</label>
      <div class='progress' style='height: 30px;'>
        <div class='progress-bar' role='progressbar' style='width:{$verAST->notaBloqueio}%;' 
        aria-valuenow='{$verAST->notaBloqueio}' aria-valuemin='0'
        aria-valuemax='100'>{$verAST->notaBloqueio}%</div>
        </div>
      ";
    }
    if (isset($verAST->desvioBloqueio) && ($verAST->notaBloqueio !== '100.00')) {
      echo "<p style='color:red; border=0; padding=0'>Desvio: {$verAST->desvioBloqueio}</p>";
    }


  if(isset($verAST->notaPT)){
    echo "
      <br><label>Permissão de Trabalho:</label>
      <div class='progress' style='height: 30px;'>
        <div class='progress-bar' role='progressbar' style='width:{$verAST->notaPT}%;' 
        aria-valuenow='{$verAST->notaPT}' aria-valuemin='0'
        aria-valuemax='100'>{$verAST->notaPT}%</div>
      </div>
    ";
  }
  if (isset($verAST->desvioPT) && ($verAST->notaPT !== '100.00')) {
    echo "<p style='color:red; border=0; padding=0'>Desvio: {$verAST->desvioPT}</p>";
  }

  if(isset($verAST->notaAPR)){
    echo "
      <br><label>Análise Preliminar de Risco:</label>
      <div class='progress' style='height: 30px;'>
        <div class='progress-bar' role='progressbar' style='width:{$verAST->notaAPR}%;' 
        aria-valuenow='{$verAST->notaAPR}' aria-valuemin='0'
        aria-valuemax='100'>{$verAST->notaAPR}%</div>
      </div>
    ";
  }
  if (isset($verAST->desvioAPR) && ($verAST->notaAPR !== '100.00')) {
    echo "<p style='color:red; border=0; padding=0'>Desvio: {$verAST->desvioAPR}</p>";
  }
  ?>

    <!--Nota Geral-->
    <br>
    <label>Nota: Geral: </label>
    <div class="progress" style="height: 30px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php {echo $verAST->notaGeral;}?>%;" 
      aria-valuenow="<?php {echo $verAST->notaGeral;}?>" aria-valuemin="0"
      aria-valuemax="100"><?php {echo $verAST->notaGeral;}?>%</div>
    </div>
    <br>

    <!--Botões -->
    <div class="form-group login-form text-center">
    <a class="btn btn-danger btn-lg" href="listarAST">Voltar</a>
    </div>
  </form>
</div>