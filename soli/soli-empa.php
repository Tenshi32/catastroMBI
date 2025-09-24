<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

require "TopBar.php";


date_default_timezone_set('America/Caracas');

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h1 class="card-title text-lg">Solicitud de Empadronamiento</h1>
    </div>
    <span class="m-3 text-danger">Campos Obligatorios (*)</span>

    <form method="post" id="SoliEts" enctype="multipart/form-data">

      <div class="card-body">

        <?php

        $var->CodigoAcciones($usuario['id_usuario']);

        ?>

        <hr>
        <p><strong>Datos de la Solicitud de Empadronamiento</strong></p>
        <label class=" text-danger">Maximo Peso de Documentos 1MB.</label>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Inmueble</label>
              <select name="inmueble" id="inmueble" class="form-control select2 select2-danger"
                data-dropdown-css-class="select2-danger" style="width: 100%;">
                <option value="">--Seleccione un Inmueble--</option>
                <?php

                $select->InmueblePropietarioFicha($usuario['id_usuario'], 1);

                ?>
              </select>
            </div>
            <!-- /.form-group -->
          </div>

          <div class="col">
            
            <div class="form-group">
              <label for="titulo_supletorio">*Documento del Inmueble</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="Propiedad_Documento" name="Propiedad_Documento" accept=".pdf">
                  <label class="custom-file-label" for="Propiedad_Documento"></label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" name="SoliEmpa" id="SoliEmpa">
        <input type="hidden" name="tipo_solicitud" id="tipo_solicitud" value="2">
        <input type="hidden" name="estado_solicitud" id="estado_solicitud" value="1">
        <input type="hidden" name="estado_inmueble" id="estado_inmueble" value="2">
        <input type="hidden" name="id_inmueble" id="id_inmueble">

        <hr>
        <p><strong>Datos del Ocupante</strong></p>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" class="form-control" id="nombre_ocupante" name="nombre_ocupante">
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label>Apellido</label>
              <input type="text" class="form-control" id="apellido_ocupante" name="apellido_ocupante">
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label>CI / RIF</label>
              <input type="text" class="form-control" id="id_ocupante" name="id_ocupante">
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label>Telefono</label>
              <input type="text" class="form-control" id="Telefono_ocupante" name="Telefono_ocupante">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="direccion">*Razón de la Solicitud</label>
              <textarea name="razon_solicitud" id="razon_solicitud" class="form-control"></textarea>
            </div>
          </div>
        </div>

      </div>

      <div class="card-footer">
        <div class="row">

          <div class="col">
            <a class="btn btn-danger btn-lg btn-block" href="#" onclick="window.history.back()"><i
                class="fa fa-arrow-left"></i> Regresar </a>
          </div>

          <div class="col"></div>

          <div class="col">
            <button class="btn btn-success btn-lg btn-block" type="submit" name="submit" id="btn_login">Registrar <i
                class="fa fa-check"></i></button>
          </div>

        </div>
      </div>

    </form>

  </div>
  <!-- ./wrapper -->
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

<script src="../js/Validacion_SEmpadronamiento.js"></script>

</html>