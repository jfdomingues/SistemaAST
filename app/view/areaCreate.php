<!--Formulário para editar Perfil-->
<div class="container mt-3">
  <form method="POST" enctype="multipart/form-data" class="login-form text-center" action="../controller/ControllerArea.php">           
    
  <div class="form-group">
    <input type="text" name="especialista" required readonly placeholder="<?php echo "{$_SESSION['nome']}" ?>" value="<?php echo "{$_SESSION['nome']}" ?>" class="form-control form-control-lg">
    <input type="hidden" name="idSession" value="<?php echo "{$_SESSION['id']}" ?>">
  </div>
  
  <!--Executivo -->
  <div class="form-group">
    <select class="form-control form-control-lg" name="executivo" aria-label="Default select example">
      <option selected>Executivo:</option>
      <option value="Produção de Celulose">Produção de Celulose</option>
      <option value="Biomassa e Águas">Biomassa e Águas</option>
      <option value="Recuperação, Energia e Caustificação">Recuperação, Energia e Caustificação</option>
      <option value="Pessoas e Serviços">Pessoas e Serviços</option>
    </select>
  </div>
  
  <!--Funcional -->
  <div class="form-group">
      <input type="text" name="funcional" placeholder="Funcional:" class="form-control form-control-lg">
  </div>
   
  <!--Botões -->
  <div class="form-group">
    <button type="submit" class="btn btn-success btn-lg" name="criarArea" value="criarArea">Salvar</button>
    <a class="btn btn-danger btn-lg" href="areaList">Voltar</a>
  </div>
  </form>
</div>