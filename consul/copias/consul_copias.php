<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

require "../TopBar.php";

require "../../php/Model/ModeloSolicitud.php";
require "../../php/Controller/ControlerCita.php";
$consulta = new ControlerCita();

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header ">
      <h3 class="card-title">Consultas de Estado de Cita</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

      <a href="../../soli/soli-OCC.php">
        <button type="button" class="btn btn-primary mb-3">
          <i class="fa fa-plus"></i> Solicitar Copias
        </button>
      </a>
      
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>N°</th>
            <th>Codigo Cita</th>
            <th>Inmueble</th>
            <th>Fecha de la Solicitud</th>
            <th>Código de los Motivo</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $consulta->BuscarOCC($usuario["id_usuario"]);
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>Codigo Cita</th>
            <th>Inmueble</th>
            <th>Fecha de la Solicitud</th>
            <th>Código de los Motivo</th>
            <th>Acción</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  </div>

</body>

<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.</strong>
</footer>

</html>