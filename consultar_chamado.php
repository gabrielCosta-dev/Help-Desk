<?php require_once "validador_acesso.php" ?>

<?php 

  //Lista de chamados
  $chamados = array();

  $arquivo = fopen('php_back/arquivo.hd', 'r');

  while (!feof($arquivo)) {
    //Linhas
    $valor = fgets($arquivo);

    // Divide o registro em partes separadas por '#'
    $chamado = explode('#', $valor);

    // Verifica se há dados suficientes no registro
    if (count($chamado) >= 4) {
      // Verifica se o perfil do usuário é de usuário comum (perfil_id = 2)
      if ($_SESSION['id_perfil'] == 2) {
          // Verifica se o chamado foi criado pelo usuário atual
          if ($_SESSION['id'] != $chamado[0]) {
              // Se não foi criado pelo usuário atual, continue para o próximo registro
              continue;
          }
      }
      // Adiciona o chamado ao array de chamados
      $chamados[] = $valor;
    }
   }

  fclose($arquivo);
  $chamados = array_filter($chamados);
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

      <?php include_once "incluir_saida.php" ?>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php foreach ($chamados as $valor) {
                $chamado = explode('#', $valor);

                /* if (count($chamado) < 3) {
                  continue;
                } */
              ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?= $chamado[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado[2] ?></h6>
                  <p class="card-text"><?= $chamado[3] ?></p>

                </div>
              </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="http://localhost/_App-Help-Desk/home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>