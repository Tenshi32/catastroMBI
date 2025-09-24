<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="public/plugins/fullcalendar/main.min.css">

  <link rel="stylesheet" href="public/plugins/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="hold-transition ">
  <?php


  require 'php/Model/ModeloUsuario.php';
  require 'php/Controller/ControlerSesion.php';
  $session = new ControlerSession();
  $usuario = $session->SesionActiva();

  require "php/Model/ModeloMoneda.php";
  $moneda = new ModeloMoneda;

  require 'php/Model/ModeloNotif.php';
  $notificacion = new NotifiModelo();

  require 'php/Model/ModeloSelect.php';
  $select = new ModeloSelect();

  require_once 'php/Model/ModeloSolicitud.php';
  require_once 'php/Controller/ControlerCita.php';
  $Citas = new ControlerCita();

  switch ($usuario['nivel']) {

    case 0:
      
      require "widget/Main/TopBar-SuperAdmin.php";
      break;

    case 1:
      require "widget/Main/TopBar-Admin.php";
      break;

    case 2:
      require "widget/Main/TopBar-Secre.php";
      break;

    case 3:
      require "widget/Main/TopBar-Inpec.php";
      break;

    case 4:
      require "widget/Main/TopBar-Avaluo.php";
      break;

    case 5:
      require "widget/Main/TopBar-RTT.php";
      break;

    default:
      require "widget/Main/TopBar-Usuario.php";
      break;

  }

  date_default_timezone_set('America/Caracas');

  ?>


  <div class="row">
    <div class="col">
      <div class="small-box bg-green elevation-5">
        <div class="inner">
          <h5 class="m-4">Desea <strong>Solicitar</strong> una Cita <i class="fa fa-edit"></i> ?</h5>
        </div>
        <div class="icon">
          <i class="float-left bi bi-calendar2-date-fill"></i>
        </div>
        <a href="soli/soli-cita.php" class="p-3 small-box-footer">
          <h5>
            Solicítelo aquí <i class="fas fa-arrow-circle-right"></i></h5>
        </a>
      </div>
    </div>

    <div class="col">
      <div class="small-box bg-red elevation-5">
        <div class="inner">
          <h5 class="m-4">Desea <strong>registrar</strong> un inmueble <i class="fa fa-edit"></i> ?</h5>
        </div>
        <div class="icon">
          <i class="float-left bi bi-house-fill"></i>
        </div>
        <a href="regis/RegisInmueble.php" class="p-3 small-box-footer">
          <h5>Registrelo aquí <i class="fas fa-arrow-circle-right"></i></h5>
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card card-primary direct-chat elevation-5">
        <div class="card-header">

          <h3 class="card-title"> <strong>
              <i class="bi bi-card-checklist"></i> Citas Aprobadas</strong></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-warning btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="card-body p3">
          <table id="example1" class="table table-hover">
            <thead>
              <tr class="card-header">
                <th>N°</th>
                <th>Inmueble</th>
                <th>Fecha Solicitud</th>
                <th>Codigo(s) Motivos</th>
                <th>Estado de la Cita</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $Citas->BuscarCita($usuario["id_usuario"]);

              $citas_json = $Citas->CalendarioCita($usuario["id_usuario"]);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  </div>



  <div class="col">
    <section class="connectedSortable">
      <div class="card bg-dark elevation-5">
        <div class="card-header border-0">
          <h3 class="card-title">
            <i class="bi bi-calendar3"></i>
            Calendario
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="bg-light card-body pt-0">

          
          <div id="calendar" class=""></div>
        </div>

      </div>
    </section>
  </div>

  <div class="buzon-sugerencias">
    <button type="button" class="btn btn-primary rounded-circle btn-lg" data-toggle="modal" data-target="#modalSugerencias">
      <i class="bi bi-chat-left-text"></i>
    </button>
  </div>

  </div>
  </div>
  </section>
  </div>

  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 -
      <?= date("Y"); ?> <a class="text-primary">Catastro Mario Briceño Iragorry</a>.
    </strong>
  </footer>

  </div>

  <div class="modal fade modal-primary" id="modalSugerencias">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title">Buzón de Sugerencias</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <span class="m-3 text-danger">Campos Obligatorios (*)</span>
        <div class="modal-body">

          <form method="post" id="registroSugerencia">

            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $usuario["id_usuario"] ?>">

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <textarea class="form-control" id="sugerencia" name="sugerencia"
                    placeholder="Escribe tu sugerencia aquí..." rows="3"></textarea>
                </div>
              </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between bg-dark">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-primary" id="btn-dolar">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="public/dist/js/adminlte.min.js"></script>

  <script src="public/sweetalert/sweetalert2.js"></script>
  <script src="public/sweetalert/sweetalert2.all.min.js"></script>


  <script src="public/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="public/plugins/jquery-validation/additional-methods.min.js"></script>

  <!-- jQuery UI 1.11.4 -->
  <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <!-- Sparkline -->
  <script src="public/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- Summernote -->
  <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


  <script src="public/plugins/fullcalendar/main.min.js"></script>

  <script src="js/Validacion_Sugerencia.js"></script>

  <script>

    var Citas = <?php echo $citas_json; ?>;

    let CerrarSesion = {
      UrlControl: 'php/Controller/ControlerSesion.php',
      UrlReturn: 'login.php',
      Formulario: document.getElementById("CerrarSession"),
    };


  </script>

  <script src="js/tobbar.js"></script>
  <script src="js/Functions.js"></script>

</body>

</html>