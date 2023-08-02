<?php
session_start();
$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dbName = "woodflowers";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed " . mysqli_connect_error());
}

if (isset($_SESSION['userId'])) {
  $sql = "select idUtilizador from utilizadores where idUsers=" . $_SESSION['userId'];
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row['idUtilizador'] == 1) {
      header("Location: ../index.php");
    }
  }
} else {
  header("Location: ../index.php");
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
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Procurar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
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
            <?php
            $idUsers = $_SESSION['userId'];
            $sql = "Select pNome, uNome from utilizadores where idUsers=$idUsers";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
            ?>
              <a class="d-block"><?php echo $row['pNome'];
                                  echo ' ';
                                  echo $row['uNome']; ?></a>
            <?php
            }
            ?>
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
                    <i class="far fa-file nav-icon"></i>
                    <p>Listar Utilizadores</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./NovoUtilizador.php" class="nav-link">
                    <i class="far fa-list-alt nav-icon"></i>
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
              <h1 class="m-0 text-dark">Administração</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="scripts/logout.php" name="sair">Sair</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(idEncomenda) as nprodutos FROM encomendas;";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    $idx = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $idx++;
                  ?>
                      <h3><?php echo $row['nprodutos']; ?></h3>
                  <?php
                    }
                  }
                  ?>
                  <p>Encomendas</p>
                </div>
                <div class="icon">
                  <i class="ion-android-cart"></i>
                </div>
                <a href="./encomendas.php" class="small-box-footer">Mais informação <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(idProduto) as nprodutos FROM produtos;";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    $idx = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $idx++;
                  ?>
                      <h3><?php echo $row['nprodutos']; ?></h3>
                  <?php
                    }
                  }
                  ?>
                  <p>Produtos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="./produtos.php" class="small-box-footer">Mais informação <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <?php
                  $sql = "SELECT COUNT(idUsers) as nutilizadores FROM utilizadores;";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    $idx = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $idx++;
                  ?>
                      <h3><?php echo $row['nutilizadores']; ?></h3>
                  <?php
                    }
                  }
                  ?>
                  <p>Utilizadores</p>
                </div>
                <div class="icon">
                  <i class="ion-person-add"></i>
                </div>
                <a href="./utilizadores.php" class="small-box-footer">Mais informação <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <!-- /.row (main row) -->
          <div class="col-12">
            <!-- /.card-header -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="encomendas" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Número da Encomenda</th>
                      <th>Cliente</th>
                      <th>Data</th>
                      <th>Estado</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT idEncomenda,idEstadoEncomenda,pNome,dataEncomenda FROM encomendas,utilizadores where encomendas.idUtilizador=utilizadores.idUsers";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      $idx = 0;
                      while ($row = mysqli_fetch_assoc($result)) {
                        $idx++;
                        if ($idx > 10) break;
                    ?>
                        <tr>
                          <td><a name="idEncomenda" id="idEncomenda" href="./EditarEncomendas.php?idEncomenda=<?php echo $row['idEncomenda'] ?>"><?php echo $row['idEncomenda']; ?></a></td>
                          <td><?php echo $row['pNome']; ?></td>
                          <td><?php echo $row['dataEncomenda']; ?></td>
                          <td><?php if ($row['idEstadoEncomenda'] == 1) {
                                echo "A ser processada";
                              } else if ($row['idEstadoEncomenda'] == 2) {
                                echo "Enviada";
                              } else if ($row['idEstadoEncomenda'] == 3) {
                                echo "Entregue";
                              } ?></td>
                          <td>
                            <a href="scripts/eliminarEncomenda.php?idEncomenda=<?php echo $row['idEncomenda'] ?>" name="Remove" id="Remove" class="link" style="background-color:transparent; border:none;">
                              <i class="fas fa-trash text-danger" data-toogle="tooltip" title="Eliminar"></i>
                            </a>
                          </td>
                        </tr>
                  </tbody>
              <?php
                      }
                    } else {
                      echo 'Erro';
                    }
              ?>

                </table>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card-body -->
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
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
  <script>
    $(document).ready(function() {
      $('#encomendas').DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
</body>

</html>
