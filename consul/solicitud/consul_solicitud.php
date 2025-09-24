<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

require "../TopBar.php";

require_once '../../php/Model/ModeloSolicitud.php';
require_once "../../php/Controller/ControlerCita.php";
$consulta = new ControlerCita();

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h3 class="card-title">Consulta de Solicitudes</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>N°</th>
            <th>Propietario</th>
            <th>Inmueble</th>
            <th>Tipo Solicitud</th>
            <th>Estado de la Cita</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $consulta->ConsultaSoli($usuario["id_usuario"]);
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>Propietario</th>
            <th>Inmueble</th>
            <th>Tipo Solicitud</th>
            <th>Estado de la Cita</th>
          </tr>
        </tfoot>
      </table>

    </div>

  </div>


</body>

<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.</strong>
</footer>

</html>