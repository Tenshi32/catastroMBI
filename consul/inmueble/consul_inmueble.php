<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
<?php

require "../TopBar.php";

require "../../php/Model/ModeloInmueble.php";
require "../../php/Controller/ControlerInmueble.php";
$consulta = new ControlerInmueble();

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h3 class="card-title">Consultas de Inmuebles</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    
    <a href="../../regis/RegisInmueble.php">
      <button type="button" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i> Registrar Inmueble
      </button>
    </a>
      
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>N°</th>
            <th>N° Civico</th>
            <th>Parroquia</th>
            <th>Resicendia</th>
            <th>Tenencia</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $consulta->ConsultaInmueble($usuario["id_usuario"]);
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>N° Civico</th>
            <th>Parroquia</th>
            <th>Resicendia</th>
            <th>Tenencia</th>
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