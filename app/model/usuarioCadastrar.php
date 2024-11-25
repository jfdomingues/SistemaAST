<!--Formulário para Criar/Editar nova conta-->
<?php
if(!empty($_POST['atualizarPerfil']) OR !empty($_POST['editar']))
{ 
  $per = new App\model\UsuarioDAO;
  $per->ListarPerfil();
}
?>

<div class="container mt-3">
  <form method="POST" enctype="multipart/form-data" class="login-form text-center" action="../controller/ControllerUsuario.php">           
    
    <!--matricula-->
    <div class="form-group">
      <input type="text" name="matricula" required placeholder="Matrícula:" class="form-control form-control-lg" 
      value="<?php if(!empty($_POST['atualizarPerfil']) OR !empty($_POST['editar'])){echo $per->matricula;}?>">
    </div>
    
    <!--Nome-->
    <div class="form-group">
      <input type="text" name="nome" required placeholder="Nome:" class="form-control form-control-lg" 
      value="<?php if(!empty($_POST['atualizarPerfil']) OR !empty($_POST['editar'])){echo $per->nome;}?>">
    </div>

    <!--area-->
    <div class="form-group">
      <input type="text" name="area" required placeholder="Área:" class="form-control form-control-lg" 
      value="<?php if(!empty($_POST['atualizarPerfil']) OR !empty($_POST['editar'])){echo $per->area;}?>">
    </div>

    <!--Email-->
    <div class="form-group">
      <input type="text" name="mail" required placeholder="E-mail:" class="form-control form-control-lg"
      value="<?php if(!empty($_POST['atualizarPerfil']) OR !empty($_POST['editar'])){echo $per->mail;}?>">
    </div>
    
    
    <?php if(!empty($_POST['editar'])){?>
    <!--Status-->
    <div class="form-group">
      <select name="status" class="form-control form-control-lg" aria-label=".form-select-sm example">
        <option <?php if($per->status == 'ativado'){echo 'selected';}?> value="ativado">Ativado</option>
        <option <?php if($per->status == 'bloqueado'){echo 'selected';}?> value="bloqueado">Bloqueado</option>
      </select>
    </div>

    <!--Nível-->
    <div class="form-group">
      <select name="nivel" class="form-control form-control-lg" aria-label=".form-select-sm example">
        <option <?php if($per->nivel == 'usuario'){echo 'selected';}?> value="usuario">Usuario</option>
        <option <?php if($per->nivel == 'administrador'){echo 'selected';}?> value="administrador">Administrador</option>
      </select>
    </div>
    <?php }?>

    <!--Senhas-->
    <?php if(!empty($_POST['atualizarPerfil'])){?>
    <div class="form-group">
      <input type="password" name="senhaAtual" id="senhaAtual"  placeholder="Senha atual:" class="form-control form-control-lg" value="">
    </div>
    
    <div class="form-group">
    <input type="password" name="senhaNova" id="senhaNova"  placeholder="Nova senha:" class="form-control form-control-lg" value="">
    </div>

    <div class="form-group">
    <input type="password" name="senhaConfirmar" id="senhaConfirmar"  placeholder="Confirme a nova senha:" class="form-control form-control-lg" value="">
    </div>

    <?php } ?>

    <!--Botão Atualizar Perfil -->
    <?php if(!empty($_POST['atualizarPerfil'])){?>
    <input type="hidden" name="id" value="<?php if(!empty($_POST['atualizarPerfil']) OR !empty($_POST['editar'])){echo $per->id;}?>">
    <button type="submit" class="btn btn-success btn-lg" name="atualizarPerfil" value="atualizarPerfil">Atualizar</button>
    <?php }?>

    <!--Botão Atualizar Usuário-->
    <?php if(!empty($_POST['editar'])){?>
    <button type="submit" class="btn btn-success btn-lg" name="atualizarUsuario" value="atualizarUsuario">Atualizar</button>
    <input type="hidden" name="id" value="<?php echo $per->id;?>">
    <a class="btn btn-danger btn-lg" href="listarUsuario">Voltar</a>
    <?php }?>

    <!--Cadastrar Usuário Interno-->
    <?php if(empty($_POST['atualizarPerfil']) AND empty($_POST['editar'])) { ?>
      <div class="form-group">
      <select name="nivel" class="form-control form-control-lg" aria-label=".form-select-sm example">
        <option value="usuario">Usuario:</option>
        <option value="administrador">Administrador:</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success btn-lg" name="cadastrar2" value="cadastrar2">Salvar</button>
    <input type="hidden" name="id" value="<?php echo $per->$id;?>">
    <a class="btn btn-danger btn-lg" href="usuarioLista">Voltar</a>
    <?php }?>
  </form>
</div>