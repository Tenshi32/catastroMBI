<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../../public/images/logo.jpeg" class="brand-image img-circle elevation-3">

  <link rel="stylesheet" href="../../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>
<?php
  require "../TopBar.php";
  
  require "../../php/Model/ModeloInspeccion.php";
  require "../../php/Controller/ControlerInspeccion.php";
  $consulta = new ControlerInspeccion();
?>
<body class="hold-transition sidebar-mini">

    <div class="card card-primary m-5">
      <div class="card-header ">
        <h3 class="card-title">Consultas de Inspección</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>N° de Identificacion</th>
            <th>Propietario</th>
            <th>Vivienda</th>
            <th>Accion</th>
          </tr>
          </thead>
          <tbody>
         
          <?php
            $consulta->ConsultaSoliInspec($usuario["id_usuario"]);
          ?>
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

</body>
</html>
