<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<?php
  require "../TopBar.php";
  
  require "../../php/Model/ModeloRTT.php";
  require "../../php/Controller/ControlerRTT.php";
  $consulta = new ControlerRTT();

?>
<body class="hold-transition sidebar-mini">

    <div class="card card-primary m-5">
      <div class="card-header ">
        <h3 class="card-title">Solicitudes de Regulación de la Tenencia de Tierra
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>N°</th>
            <th>Propietario</th>
            <th>Inmueble</th>
            <th>Ocupante</th>
            <th>Accion</th>
          </tr>
          </thead>
          <tbody>
         
          <?php
            $consulta->ListaRTTModelo($usuario["id_usuario"]);
          ?>
          </tbody>
          <tfoot>
          <tr>
            <th>N°</th>
            <th>Propietario</th>
            <th>Inmueble</th>
            <th>Ocupante</th>
            <th>Accion</th>
          </tr>
          </tfoot>
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
