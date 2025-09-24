<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catastro</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="public/images/images.png" />
  <link rel="stylesheet" href="public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="public/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="public/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="public/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="public/plugins/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
</head>

<?php
require_once 'php/Model/ModeloUsuario.php';
require_once 'php/Controller/ControlerSesion.php';
$session = new ControlerSession();
$usuario = $session->SesionActiva();

?>


<body class="hold-transition layout-top-nav">

  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class=" d-flex justify-content-center align-items-center">
        <a href="#" onclick="window.history.back()"><button class="btn btn-danger"><i class="fa fa-arrow-left"></i>
            Regresar</button></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="registrados.php" class="nav-link"><i class="fa fa-home"></i> Menu Principal</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item mt-2">
        <a class="nav-link" data-slide="true" href="#" role="button">
          <div id="tu-contenedor"></div>
        </a>
      </li>

      <li class="nav-item dropdown m-1">

        <a class="nav-link" data-toggle="dropdown" href="registrados.php">
          <i class="bi bi-person-circle" style="font-size: 20px;"></i>
          <?php echo $usuario["usuario"]; ?>
        </a>

      </li>

    </ul>
  </nav>

  <div class="content-wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" style="border-radius: 1rem" src="public/images/images.png" alt="AdminLTELogo"
        height="200" width="200">
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-shadow elevation-5 card-primary m-5">
          <div class="card-header ">

            <div class="card-title">
              <i class="bi bi-graph-up-arrow"></i> estadisticas
            </div>

          </div>
          <div class="card-body">
            <div class="mt-5">
              <div class="row">
                <div class="col">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Por Metodo de Inscripcion
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body-->
                  </div>
                </div>
                <div class="col">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Por Tenencia
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="Tenencias"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body-->
                  </div>
                </div>
                <div class="col">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Por Parroquia
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="Parroquias"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body-->
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <!-- Bar chart -->
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Bar Chart
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="areaChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body-->
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Por Clase del Inmueble
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="Clase"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body-->
                  </div>
                </div>
                <div class="col">
                  <div class="card card-primary card-outline">
                    <div class="card-header">
                      <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Por Tipo de Contrato
                      </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <canvas id="Contrato"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body-->
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
  </div>
  </section>
  </div>

  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.</strong>
  </footer>

  </div>

  <!-- jQuery -->
  <script src="public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="public/dist/js/adminlte.min.js"></script>

  <script src="public/plugins/chart.js/Chart.min.js"></script>

  
  <script>

    var Citas = <?php echo $citas_json; ?>;

    let CerrarSesion = {
      UrlControl: 'php/Controller/ControlerSesion.php',
      UrlReturn: 'login.php',
      Formulario: document.getElementById("CerrarSession"),
    };


  </script>

  <script src="js/session.js"></script>
  <script src="js/Functions.js"></script>
  <script src="js/estadisticas.js"></script>

</body>

</html>