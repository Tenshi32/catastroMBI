<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../public/images/logo.jpeg" class="brand-image img-circle elevation-3">

  <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<?php

require "../TopBar.php";

require_once '../../php/Model/ModeloSolicitud.php';
require_once "../../php/Controller/ControlerCita.php";
$consulta = new ControlerCita();

?>

<body class="hold-transition sidebar-mini">

  <div class="card card-primary m-5">
    <div class="card-header ">
      <h3 class="card-title">Consultas de Cita En Espera</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>N° de Solicitud</th>
            <th>Inmueble</th>
            <th>Fecha Solicitud</th>
            <th>Tipo de Solicitud</th>
            <th>Estado de la Solicitud</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $consulta->ConsultaSoliUsuario($usuario["id_usuario"]);
          ?>
          <tfoot>
            <tr>
              <th>#</th>
              <th>N° de Solicitud</th>
              <th>Inmueble</th>
              <th>Fecha Solicitud</th>
              <th>Tipo de Solicitud</th>
              <th>Estado de la Solicitud</th>
            </tr>
          </tfoot>

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.</strong>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../public/dist/js/adminlte.min.js"></script>

  <script src="../public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>


</body>

</html>