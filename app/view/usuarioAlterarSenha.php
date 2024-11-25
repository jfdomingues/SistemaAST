<!--Formulário para editar Perfil-->
<div class="container mt-3">
  <form method="POST" enctype="multipart/form-data" class="login-form text-center" action="../controller/ControllerUsuario.php">           
    
    <!--Nome-->
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo "{$_SESSION['id']}" ?>">
      <input type="text" name="nome" required readonly placeholder="<?php echo "{$_SESSION['nome']}" ?>" class="form-control form-control-lg" value="<?php echo "{$_SESSION['nome']}" ?>">
    </div>

    <!--Senhas-->
    <div class="form-group">
      <input type="password" name="senhaAtual" id="senhaAtual"  placeholder="Senha atual:" class="form-control form-control-lg" value="">
    </div>
    
    <div class="form-group">
    <input type="password" name="senhaNova" id="senhaNova"  placeholder="Nova senha:" class="form-control form-control-lg" value="">
    </div>

    <div class="form-group">
    <input type="password" name="senhaConfirmar" id="senhaConfirmar"  placeholder="Confirme a nova senha:" class="form-control form-control-lg" value="">
    </div>


    <!--Botão Atualizar Perfil -->
    <button type="submit" class="btn btn-success btn-lg" name="alterarSenha" value="alterarSenha">Salvar</button>
    <a class="btn btn-danger btn-lg" href="usuarioLista">Voltar</a>
  </form>
</div>