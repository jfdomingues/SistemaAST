<?php
namespace App\model;
use \App\model\Conexao;

if(!empty($_POST['editar']))
{ 
  $codigo = $_POST['id'];
  $sql = 'SELECT * FROM area WHERE id = '.$codigo;
  $enviar = Conexao::getInstance()->prepare($sql);
  $enviar->execute();
  $row = $enviar->fetch();

  //Consulta para retornar nome do usuário
  $sql2 = 'SELECT id, nome  FROM usuario WHERE id = '.$row['id_usuario'];
  $enviar2 = Conexao::getInstance()->prepare($sql2);
  $enviar2->execute();
  $row2 = $enviar2->fetch();
}
?>

<!--Formulário para editar Perfil-->
<div class="container mt-3">
  <form method="POST" enctype="multipart/form-data" class="login-form" action="../controller/ControllerArea.php">           
    
  <p>
    Identidicador: <?php echo "{$row['id']}"?><br>
    Criado em:  <?php echo date('d/m/Y H:i:s', strtotime($row['dataCriacao'])) ?><br>
    Criado por: <?php echo "{$row2['nome']}"?><br><br>
  </p>
  

  <!--Executivo -->
  <div class="form-group">
    <label>Executivo:</label>  
    <select class="form-control form-control-lg" name="executivo" aria-label="Default select example">
      <option <?php if($row['executivo'] == 'Produção de Celulose'){echo 'selected';}?> value="Produção de Celulose">Produção de Celulose</option>
      <option <?php if($row['executivo'] == 'Biomassa e Águas'){echo 'selected';}?> value="Biomassa e Águas">Biomassa e Águas</option>
      <option <?php if($row['executivo'] == 'Recuperação, Energia e Caustificação'){echo 'selected';}?> value="Recuperação, Energia e Caustificação">Recuperação, Energia e Caustificação</option>
      <option <?php if($row['executivo'] == 'Pessoas e Serviços'){echo 'selected';}?> value="Pessoas e Serviços">Pessoas e Serviços</option>
    </select><br>
  </div>
  
  <!--Funcional -->
  <div class="form-group">
    <label>Funcional:</label>  
    <input type="text" name="funcional" placeholder="Funcional:" class="form-control form-control-lg" value="<?php echo "{$row['funcional']}"?>">
    <br>
  </div>

  <!--Status-->
  <div class="form-group">
    <label>Status:</label> 
    <select name="status" class="form-control form-control-lg" aria-label=".form-select-sm example">
      <option <?php if($row['status'] == 'Ativado'){echo 'selected';}?> value="Ativado">Ativado</option>
      <option <?php if($row['status'] == 'Bloqueado'){echo 'selected';}?> value="Bloqueado">Bloqueado</option>
    </select>
</div>
   
  <!--Botões -->
  <div class="form-group text-center">
    <input type="hidden" name="id" value="<?php echo "{$row['id']}"?>">
    <input type="hidden" name="idSession" value="<?php echo "{$_SESSION['id']}" ?>">
    <button type="submit" class="btn btn-success btn-lg" name="updateArea" value="updateArea">Atualizar</button>
    <a class="btn btn-danger btn-lg" href="areaList">Voltar</a>
  </div>
  </form>
</div>