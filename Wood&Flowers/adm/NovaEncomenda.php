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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Encomendas</h1>
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
      <!-- Main content -->
      <section class="content">
        <form action="scripts/novaencomenda.php" method="post">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Nova Encomenda</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="idUtilizador">Nome</label>
                    <select class="form-control custom-select" id="idUtilizador" name="idUtilizador">
                      <option selected disabled>Selecione Cliente</option>
                      <?php
                      $sql = "SELECT idUsers,pNome FROM utilizadores";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                          <option value="<?php echo $row['idUsers'] ?>"><?php echo $row['pNome'] ?></option>
                      <?php
                        }
                      } else {
                        echo 'Erro';
                      }
                      ?>
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    <label for="inputName">Data Encomenda</label>
                    <input type="text" id="dataEnc" name="data" class="form-control" value="">
                  </div> -->
                  <!-- <div class="form-group">
                    <label for="inputName">Data Encomenda</label>
                    <input class="form-control" type="date" id="example-date-input" name="dataEnc">
                  </div> -->
                  <div class="form-group row">
                    <label for="example-date-input" class="col-2 col-form-label">Data</label>
                    <div class="col-12">
                      <input class="form-control" id="dataEnc" name="dataEnc" type="date" value="<?php echo date("Y-m-d") ?>">
                    </div>
                  </div>
                  <div class=" form-group">
                    <label for="inputStatus">Estado</label>
                    <select class="form-control custom-select" id="estado" name="estado">
                      <option selected disabled>Selecione Estado</option>
                      <option value="Processada">A ser Processada</option>
                      <option value="Enviada">Enviada</option>
                      <option value="Recebido">Recebido</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="idProduto">Produto</label>
                    <select onchange="adicionaPreco()" class="form-control custom-select" id="idProduto" name="idProduto">
                      <option selected disabled>Selecione Produto</option>
                      <?php
                      $sql = "SELECT idProduto,nomeProduto,precoProduto FROM produtos where idEstadoProduto=1";
                      $result = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                          if (isset($_POST['idProduto'])) {
                            if ($_POST['idProduto'] == $row['idProduto']) {
                      ?>
                              <option selected value="<?php echo $row['idProduto'] . ',' . $row['precoProduto'] ?>"><?php echo $row['nomeProduto'] ?></option>
                            <?php
                            } else { ?>
                              <option value="<?php echo $row['idProduto'] . ',' . $row['precoProduto'] ?>"><?php echo $row['nomeProduto'] ?></option>
                            <?php
                            }
                          } else { ?>
                            <option value="<?php echo $row['idProduto'] . ',' . $row['precoProduto'] ?>"><?php echo $row['nomeProduto'] ?></option>
                      <?php
                          }
                        }
                      } else {
                        echo 'Erro';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputName">Quantidade</label>
                    <input type="text" id="quantidade" name="quantidade" class="form-control" value="1">
                  </div>
                  <div class="form-group">
                    <label for="inputName">Preço</label>
                    <input disabled type="text" id="preco" name="preco" class="form-control" value="">
                  </div>
                  <div class="form-group">
                    <input onclick="AdicionaProduto();" type="button" name="adicionar" id="adicionar" class="btn btn-primary" value="Adicionar Produto">
                  </div>
                  <table name="produtos" id="produtos" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="row">
            <div class="col-12">
              <input onclick="inserirEncomenda();" type="button" name="read" class="btn btn-success" value="Gravar">
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


    <script src="dist/js/jquery.json-2.4.min.js"></script>


    <script>
      function AdicionaProduto() {
        // Find a <table> element with id="myTable":
        var table = document.getElementById("produtos");
        var idProduto = document.getElementById("idProduto").value;
        var valor = idProduto.split(",");
        var quantidade = document.getElementById("quantidade").value;
        var preco = document.getElementById("preco").value;

        var existe = 0;
        for (i = 0; i < table.rows.length; i++) {
          if (table.rows[i].cells[0].innerHTML == valor[0]) {
            existe = i;
          }
        }

        if (existe != 0) {
          table.rows[existe].cells[1].innerHTML = quantidade;
        } else {
          // Create an empty <tr> element and add it to the 1st position of the table:
          var row = table.insertRow();
          // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);

          // Add some text to the new cells:
          cell1.innerHTML = valor[0];
          cell2.innerHTML = quantidade;
          cell3.innerHTML = preco;
          cell4.innerHTML = "<a  onclick='apagaProduto(" + valor[0] + ")' href='#' name='Remove' id='Remove' class='link' style='background-color:transparent; border:none;'><i class='fas fa-trash text-danger' data-toogle='tooltip' title='Eliminar'></i> </a>";

        }
      }

      function apagaProduto(idProduto) {
        var table = document.getElementById("produtos");
        for (i = 0; i < table.rows.length; i++) {
          if (table.rows[i].cells[0].innerHTML == idProduto) {
            document.getElementById("produtos").deleteRow(i);
            exit();
          }
        }

      }

      function adicionaPreco() {
        var idProduto = document.getElementById("idProduto").value;
        var valor = idProduto.split(",");
        document.getElementById("preco").value = valor[1];
      }



      function inserirEncomenda() {
        var TableData = '';

        $('#tbTableValues').val(''); // clear textbox
        $('#produtos tr').each(function(row, tr) {
          TableData = TableData +
            $(tr).find('td:eq(0)').text() + ' ' // Task No.
            +
            $(tr).find('td:eq(1)').text() + ' ' // Date
            +
            $(tr).find('td:eq(2)').text() + ' ' // Description
            +
            '\n';
        });
        storeAndShowTableValues();
        convertArrayToJSON();
        sendTblDataToServer();
      }

      function storeAndShowTableValues() {
        var TableData;
        TableData = storeTblValues();
      }

      function storeTblValues() {
        var TableData = new Array();

        $('#produtos tr').each(function(row, tr) {
          TableData[row] = {
            "idProduto": $(tr).find('td:eq(0)').text(),
            "quantidade": $(tr).find('td:eq(1)').text(),
            "preco": $(tr).find('td:eq(2)').text()
          }
        });
        TableData.shift(); // first row will be empty - so remove
        return TableData;
      }

      function convertArrayToJSON() {
        var TableData;
        TableData = $.toJSON(storeTblValues());
      }

      function sendTblDataToServer() {
        var TableData;
        TableData = $.toJSON(storeTblValues());
        var idUtilizador = $("#idUtilizador").val();
        var dataEnc = $("#dataEnc").val();
        var estado = $("#estado").val();
        $.ajax({
          type: "POST",
          url: "scripts/novaencomenda.php",
          data: "pTableData=" + TableData + "&idUtilizador=" + idUtilizador + "&dataEnc=" + dataEnc + "&estado=" + estado // post TableData to server script
        });


      }
    </script>


</body>

</html>
