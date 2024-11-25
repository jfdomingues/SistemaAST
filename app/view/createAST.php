<!--Formulário para editar Perfil-->
<div class="container mt-3">
  <form method="POST" enctype="multipart/form-data" class="login-form text-center" action="../controller/ControllerAcompanhamento.php">           
    
  
  <div class="form-group">
    <input type="hidden" name="id" required readonly placeholder="<?php echo "{$_SESSION['id']}" ?>" value="<?php echo "{$_SESSION['id']}" ?>" class="form-control form-control-lg">
  </div>
  
  <div class="form-group">
    <input type="text" name="especialista" required readonly placeholder="<?php echo "{$_SESSION['nome']}" ?>" value="<?php echo "{$_SESSION['nome']}" ?>" class="form-control form-control-lg">
  </div>

  <div class="form-group">
      <input type="text" name="atividade" placeholder="Atividade:" class="form-control form-control-lg">
  </div>

  <div class="form-group">
  <select class="form-control form-control-lg" name="astArea" aria-label="Default select example">
    <?php
    //carregar todas as classes do prjeto
    require_once '../../vendor/autoload.php';
    
    //carrega todas as áreas funcionais
    $list = new App\model\AreaDAO;
    $list->listarFuncional();              
    ?>
  </select>
  </div>
    
    <div class="form-group">
      <input type="text" name="local" required placeholder="Local:" class="form-control form-control-lg">
    </div>

    <div class="form-group">
      <input type="text" name="executante" placeholder="Executante:" class="form-control form-control-lg">
    </div>
    
    <div class="form-group">
      <input type="text" name="participantes" placeholder="Participantes:" class="form-control form-control-lg">
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-8">
          <select class="form-control form-control-lg" name="notaBloqueio" aria-label="Default select example">
            <option value="" selected>Bloqueio:</option>
            <option value="100.00">Excelente</option>
            <option value="66.67">Bom</option>
            <option value="0">Ruim</option>    
            <option value="">Não Aplicável</option>
          </select>
        </div>
        <div class="col">
          <select class="form-control form-control-lg" name="desvioBloqueio" aria-label="Default select example">
            <option selected>Desvio:</option>
            <option value="Operador">Operador</option>
            <option value="Executante">Executante</option>
          </select>
        </div>
      </div>
    </div>


    <div class="form-group">
      <div class="row">
        <div class="col-8">
          <select class="form-control form-control-lg" name="notaPT" aria-label="Default select example">
            <option value="" selected>Permissão de Trabalho:</option>
            <<option value="100.00">Excelente</option>
            <option value="66.67">Bom</option>
            <option value="0">Ruim</option>    
            <option value="">Não Aplicável</option>
          </select>
        </div>
        <div class="col">
          <select class="form-control form-control-lg" name="desvioPT" aria-label="Default select example">
            <option selected>Desvio:</option>
            <option value="Operador">Operador</option>
            <option value="Executante">Executante</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="row">
        <div class="col-8">
          <select class="form-control form-control-lg" name="notaAPR" aria-label="Default select example">
            <option value="" selected>APR:</option>
            <option value="100.00">Excelente</option>
            <option value="66.67">Bom</option>
            <option value="0">Ruim</option>    
            <option value="">Não Aplicável</option>
          </select>
        </div>
        <div class="col">
          <select class="form-control form-control-lg" name="desvioAPR" aria-label="Default select example">
            <option selected>Desvio:</option>
            <option value="Operador">Operador</option>
            <option value="Executante">Executante</option>
          </select>
        </div>
      </div>
    </div>

    <!--Botões -->
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg" name="criarAST" value="criarAST">Salvar</button>
    <a class="btn btn-danger btn-lg" href="listarAST">Voltar</a>
    </div>
  </form>
</div>