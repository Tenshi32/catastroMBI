<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../public/images/logo.jpeg" class="brand-image img-circle elevation-3">

</head>
<?php

  require "../TopBar.php";

  require "../../php/Model/ModeloEmpadronamiento.php";
  require "../../php/Controller/ControlerEmpa.php";
  $consulta = new ControlerEmpa();

?>
<body>

    <div class="card card-primary m-5">
      <div class="card-header ">
        <h3 class="card-title">Certificacdo de Empadronamineto</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>N°</th>
              <th>N° Civico</th>
              <th>Parroquia</th>
              <th>Residencia</th>
              <th>Tenencia</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>

            <?php
              $consulta->ConsultaEmpa();
            ?>

          </tbody>
          <tfoot>
            <tr>
              <th>N°</th>
              <th>N° Civico</th>
              <th>Parroquia</th>
              <th>Residencia</th>
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