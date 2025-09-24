<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../public/images/logo.jpeg" class="brand-image img-circle elevation-3">

</head>
<?php

require "../TopBar.php";

require_once '../../php/Model/ModeloRTT.php';
require_once '../../php/Controller/ControlerRTT.php';
$consulta = new ControlerRTT();

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header ">
      <h3 class="card-title">Regulacion de la Tenencia de la Tierra</h3>
    </div>
    <div class="card-body">
      <a href="../../soli/soli-RTT.php">
        <button type="button" class="btn btn-primary mb-3">
          <i class="fa fa-plus"></i> Solicitar RTT
        </button>
      </a>
      <!-- /.card-header -->

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>N°</th>
            <th>N° Catastral</th>
            <th>N° de Titulo Supletorio</th>
            <th>Propietario</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $consulta->BuscarRTTModelo($usuario["id_usuario"]);
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>N° Catastral</th>
            <th>N° de Titulo Supletorio</th>
            <th>Propietario</th>
            <th>Acción</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <!-- Main Footer -->
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