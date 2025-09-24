<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

</head>

<?php

require '../php/Model/ModeloUsuario.php';

if (isset($_POST['fecha1'])) {

  $valor1 = $_POST['fecha1'];
  $valor2 = $_POST['fecha2'];

} else {

  $valor2 = date("d-m-Y");
  $valor1 = ModeloUsuario::UltimaFecha();

}

require "../php/Model/ModeloMoneda.php";
$moneda = new ModeloMoneda;
// $moneda ->VerDolarModelo();}

require '../php/Model/ModeloNotif.php';
$notificacion = new NotifiModelo();

require '../php/Model/ModeloSelect.php';
$select = new ModeloSelect();

require '../php/Model/ModeloSolicitud.php';
$Citas = new ModeloSolicitud();

require "TopBar.php";
date_default_timezone_set('America/Caracas');

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h3 class="card-title">Auditoria de Usuarios</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

      <span>Introduzca los <b>datos</b> para el <i class="fa fa-filter"></i> filtrado:</span>
      <hr>

      <div class="row">
        <label for="accion" class="form-label"> Filtro por Fecha </label>
      </div>

      <div class="row mb-3">
        <div class="row ">

          <div class="col">
            <div class="form-group">
              <label>Desde:</label>
              <input type="text" class="buscador form-control mb-3" id="fecha2" name="fecha2"
                value="<?php echo $valor2; ?>">
            </div>
          </div>
          <input type="hidden" id="Tipo" name="Tipo" value="1">
          <div class="col">
            <div class="form-group">
              <label>Hasta:</label>
              <input type="text" class="buscador form-control mb-3" id="fecha1" name="fecha1"
                value="<?php echo $valor1; ?>">
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="accion" class="form-label"> Filtro por Acción </label>
              <select id="accion" name="accion" class="form-control">
                <option value=" ">seleccione una Accion</option>
                <option value="Sesion">Inicio o Cierre de Sesion</option>
                <option value="Avaluo">Avaluo</option>
                <option value="Solicitud">Solicitud</option>
                <option value="Inspeccion">Inspeccion</option>
                <option value="inscripcion">Inscripcion</option>
                <option value="Contrato">Contrato</option>
                <option value="Empadronamiento">Empadronamiento</option>
                <option value="Regulacion">Regualcion de la Tenencia de la Tierra</option>
                <option value="horario">Horario</option>
              </select>
            </div>
          </div>
        </div>

      </div>

      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>N°</th>
            <th>Codigo Cita</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Eventos</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
          <tr>
            <th>N°</th>
            <th>Codigo Cita</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Eventos</th>
            <th>Acción</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

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

</body>

</html>