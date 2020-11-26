<?php 
session_start();
require_once "models/Conexao.php";
require_once "models/Manager.php";

$manager = new Manager();

if (isset($_SESSION['login'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CO-SAFE</title>
   <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="public/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/dashboard.css" rel="stylesheet">
    <link href="public/css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check" id="icone"><img src="public/img/icone.png"></label>

    <div class="barra">
        <nav>
            <a href="#"><div class="link"><i class="fa fa-home"></i> Home</div></a>
            <a href="usuario_list.php"><div class="link"><i class="fa fa-users"></i> Cadastrar Usuários</div></a>
            <a href=""><div class="link" onclick="fnExcelReport()"><i class="fa fa-address-book"></i> Exportar Relatório</div></a>
            <a href="controllers/logoutController.php"><div class="link"><i class="fa fa-sign-out"></i> Sair do Sistema</div></a>
        </nav> 
    </div>
    <div class="container-fluid">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

        <div class="col-lg-12">
            <div class="text-center"><h3>Medição:</h3></div>
            <div id="valor" class="progress mx-auto" data-value='50'>
              <span class="progress-left">
                            <span class="progress-bar border-success"></span>
              </span>
              <span class="progress-right">
                            <span class="progress-bar border-success"></span>
              </span>
              <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                <div id="ppm" class="h2 font-weight-bold">0<sup class="small"><b>ppm</b></sup></div>
              </div>
            </div>  
        </div>

        </div>
        <h2>Histórico de Ocorrências</h2>
        <div class="table-responsive">
            <form action="" method="post" accept-charset="utf-8">
                <table class="table table-striped table-sm" id="datatable">
                    <thead>
                    <tr>
                        <th class="text-center">Medição</th>
                        <th class="text-center">Data</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($manager->listar_historicos('historico'))): ?>
                        <?php foreach($manager->listar_historicos('historico') as $item): ?>
                                <tr>
                                    <td class="text-center"><?= $item['valor'] ?><sup>ppm</sup></td>
                                    <td class="text-center"><?= date('d/m/Y H:i:s', strtotime($item['data'])) ?></td>
                                </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="public/dist/js/jquery-slim.min.js"><\/script>')</script>
<script src="public/dist/js/popper.min.js"></script>
<script src="public/dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->
<script src="public/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
</body>
</html>
<?php 
}
else 
{
   header('Location: login.php?negado');
}

?>   