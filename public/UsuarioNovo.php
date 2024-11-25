<!doctype html>
<html lang="pt-br">
  <head>
    <title>HST</title>
    <link rel="icon" type="imagem/png" href="img/favicon.jpg"/>
   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>

    <!--Formulário para criar nova conta-->
    <div class="login-container d-flex justify-content-center align-items-center">
        <form method="POST" enctype="multipart/form-data" class="login-form text-center" action="../app/controller/ControllerUsuario.php">
          <h1 class="mb-3 font-weight-light text-uppercase">Novo</h1>
            
          <div class="form-group">
            <input type="text" name="matricula" required placeholder="Matrícula:" class="form-control form-control-lg">
          </div>
          
          <div class="form-group">
            <input type="text" name="nome" required placeholder="Nome:" class="form-control form-control-lg">
          </div>

          <div class="form-group">
            <select class="form-control form-control-lg" name="area" aria-label="Default select example">
              <?php
              //carregar todas as classes do prjeto
              require_once '../vendor/autoload.php';
              
              //carrega todas as áreas funcionais
              $list = new App\model\AreaDAO;
              $list->listarFuncional();              
              ?>
            </select>
          </div>

          <div class="form-group">
            <input type="text" name="mail" required placeholder="E-mail corporativo:" class="form-control form-control-lg">
          </div>
            
          <div class="form-group">
            <input type="password" name="senha" id="senha" required placeholder="Senha:" class="form-control form-control-lg">
          </div>

            <button type="submit" class="btn-custom btn mt-1 btn-lg btn-block text-uppercase" name="usuarioNovo" value="usuarioNovo">Cadastrar</button>
            <p class="mt-3 font-weight-normal"><a href="../UsuarioEntrar.html">Já tenho uma conta!</a></p>
        </form>
    </div>
</div>    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>