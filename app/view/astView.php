
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


  <label>Bloqueio de Fonte de Energia:</label>
  <div class="progress" style="height: 30px;">
    <div class="progress-bar" role="progressbar" style="width: <?php {echo $verAST->notaBloqueio;}?>%;" 
    aria-valuenow="<?php {echo $verAST->notaBloqueio;}?>" aria-valuemin="0"
    aria-valuemax="100"><?php {echo $verAST->notaBloqueio;}?>%</div>
  </div>
  <br>

  <label>Permissão de Trabalho:</label>
  <div class="progress" style="height: 30px;">
    <div class="progress-bar" role="progressbar" style="width: <?php {echo $verAST->notaPT;}?>%;" 
    aria-valuenow="<?php {echo $verAST->notaPT;}?>" aria-valuemin="0"
    aria-valuemax="100"><?php {echo $verAST->notaPT;}?>%</div>
  </div>
  <br>

  <label>Análise Preliminar de Risco:</label>
  <div class="progress" style="height: 30px;">
    <div class="progress-bar" role="progressbar" style="width: <?php {echo $verAST->notaAPR;}?>%;" 
    aria-valuenow="<?php {echo $verAST->notaAPR;}?>" aria-valuemin="0"
    aria-valuemax="100"><?php {echo $verAST->notaAPR;}?>%</div>
  </div>
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