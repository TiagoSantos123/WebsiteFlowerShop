<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dbName = "woodflowers";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed " . mysqli_connect_error());
}
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administração | Wood&Flowers</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="home.php" class="nav-link">Inicio</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="home.php" class="brand-link">
        <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Administração</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Tiago Santos</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Utilizadores
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./utilizadores.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Utilizadores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./NovoUtilizador.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Novo Utilizador</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-shopping-basket"></i>
                <p>
                  Produtos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./produtos.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Produtos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./NovoProduto.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Novo Produto</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Encomendas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./encomendas.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar Encomendas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./NovaEncomenda.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Nova Encomenda</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Produtos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="scripts/logout.php" name="sair">Sair</a></li>
              </ol>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <form action="scripts/novoproduto.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Novo Produto</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <?php
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == "camposporpreencher") {
                    echo '<p style=font-size:16px!important;color:#ff0000>Ficaram campos por preencher</p>';
                  }
                  if ($_GET['error'] == "PreenchaEmpresa") {
                    echo '<p style=font-size:16px!important;color:#ff0000>Tem que selecionar a empresa</p>';
                  }
                  if ($_GET['error'] == "PreenchaEstado") {
                    echo '<p style=font-size:16px!important;color:#ff0000>Tem que selecionar o estado</p>';
                  }
                  if ($_GET['error'] == "SelecioneImagem") {
                    echo '<p style=font-size:16px!important;color:#ff0000>Tem que selecionar a imagem</p>';
                  }
                  if ($_GET['error'] == "apenasletrasN") {
                    echo '<p style=font-size:16px!important;color:#ff0000>O nome só pode conter letras</p>';
                  }
                  if ($_GET['error'] == "apenasnumero") {
                    echo '<p style=font-size:16px!important;color:#ff0000>O preço só pode conter números</p>';
                  }
                  if ($_GET['error'] == "apenasletrasD") {
                    echo '<p style=font-size:16px!important;color:#ff0000>A descrição só pode conter letras</p>';
                  }
                }
                ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputStatus">Empresa</label>
                    <select class="form-control custom-select" id="empresa" name="empresa">
                      <option selected value="NadaSelecionado1">Selecione Empresa</option>
                      <option value="Wood_Flowers">Wood&Flowers</option>
                      <option value="Carpintaria">Carpintaria</option>
                    </select>
                  </div>
                  <?php
                  if (isset($_GET['nomeProduto'])) {
                    $nomeProduto = $_GET['nomeProduto'];
                    echo '<div class="form-group">
                    <label for="inputName">Nome</label>
                    <input type="text" value="' . $nomeProduto . '" id="nome" name="nome" class="form-control">
                  </div>';
                  } else {
                    echo '<div class="form-group">
                    <label for="inputName">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control">
                  </div>';
                  }

                  if (isset($_GET['preco'])) {
                    $preco = $_GET['preco'];
                    echo '<div class="form-group">
                          <label for="inputName">Preço</label>
                          <input type="text" value="' . $preco . '" id="preco" name="preco" class="form-control">
                          </div>';
                  } else {
                    echo '<div class="form-group">
                          <label for="inputName">Preço</label>
                          <input type="text" id="preco" name="preco" class="form-control">
                          </div>';
                  }

                  if (isset($_GET['descricao'])) {
                    $descricao = $_GET['descricao'];
                    echo '<div class="form-group">
                          <label for="inputName">Descricao</label>
                          <input type="text" value="' . $descricao . '" id="descricao" name="descricao" class="form-control">
                          </div>';
                  } else {
                    echo '<div class="form-group">
                          <label for="inputName">Descricao</label>
                          <input type="text" id="descricao" name="descricao" class="form-control">
                          </div>';
                  }
                  ?>
                  <div class="form-group">
                    <label for="inputStatus">Estado</label>
                    <select class="form-control custom-select" id="estado" name="estado">
                      <option selected value="NadaSelecionado2">Selecione Estado</option>
                      <option value="Existe">Existe</option>
                      <option value="NaoExiste">Não Existe</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Imagem</label>
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" name="novo-utilizador" class="btn btn-success">Criar</button>
              <!-- <input type="submit" value="Create new Porject" class="btn btn-success float-right"> -->
            </div>
          </div>
        </form>
      </section>

      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.4
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="dist/js/demo.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#utilizadores').DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
    </script>

</body>

</html>
