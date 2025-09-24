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
      <h1 class="card-title text-lg">Solicitud de Evacuacion de Titulo Supletorio</h1>
    </div>
    <span class="m-3 text-danger">Campos Obligatorios (*)</span>
    <form method="post" id="soli-ets" enctype="multipart/form-data">

      <div class="card-body">

        <div class="row">

          <?php

          $var->CodigoAcciones($usuario['id_usuario']);

          ?>
        </div>

        <hr>
        <p>Area Legal</p>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="tipo">*Tipo de Documento:</label>
              <select class="form-control" name="tipo_documento" id="tipo_documento">
                <option value="">--Seleccione un tipo--</option>
                <option value="1">Documento Registrado</option>
                <option value="2">Documento Notariado</option>
              </select>
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label>Inmueble</label>
              <select name="inmueble" id="inmueble" class="form-control select2 select2-danger"
                data-dropdown-css-class="select2-danger" style="width: 100%;">
                <option value="">--Seleccione un Inmueble--</option>
                <?php

                $select->InmueblePropietarioFicha($usuario['id_usuario'], 3);

                ?>
              </select>
            </div>
            <!-- /.form-group -->
          </div>
        </div>

        <input type="hidden" name="estado_inmueble" id="estado_inmueble" value="3">

        <div id="registradoForm" style="display: none;">
          <hr>
          <p><strong>Datos del Documento Tipo Registro (Privado)</strong></p>
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header bg-info">
                  <span>
                    <i class="icon fas fa-exclamation-circle"></i>
                    Como Rellenar esta sección del Formulario ?
                  </span>
                </div>
                <div class="card-body text-lightblue">
                  <ul>
                    Este inmueble fue registrado en el registro. Para continuar, es necesario que
                    proporcione
                    los siguientes datos:
                    <hr>
                    <li>Número del titulo supletorio: Este número identifica de manera única al Título Supletorio del
                      inmueble.</li>
                    <li>Fecha de la Evacuación: Esta fecha se encuentra especificada en el Título Supletorio del
                      inmueble.</li>
                  </ul>
                </div>
              </div>

            </div>

            <div class="col">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="tipo">*Número del titulo supletorio:</label>
                    <input type="text" class="form-control" name="numero_titulo_supletorio"
                      id="numero_titulo_supletorio">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="tipo">*fecha de evacuacion:</label>
                    <input type="date" class="form-control" name="fecha_evacuacion" id="fecha_evacuacion">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <input type="hidden" name="SoliEvac" id="SoliEvac">
        <input type="hidden" name="tipo_solicitud" id="tipo_solicitud" value="3">
        <input type="hidden" name="estado_solicitud" id="estado_solicitud" value="1">
        <input type="hidden" name="estado_inmueble" id="estado_inmueble" value="3">
        <input type="hidden" name="id_inmueble" id="id_inmueble">

        <div id="notariadoForm" style="display: none;">
          <hr>
          <p><strong>Datos del Documento Tipo Notaria (Municipal)</strong></p>
          
          <div class="row">

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Número de documento:</label>
                <input type="text" class="form-control" name="numero_documento" id="numero_documento">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Número de Folio:</label>
                <input type="text" class="form-control" name="numero_folio" id="numero_folio">
              </div>
            </div>
          </div>

          <br>
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Número de Tomo:</label>
                <input type="text" class="form-control" name="numero_tomo" id="numero_tomo">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="">*Número de Protocolo:</label>
                <input type="text" class="form-control" name="numero_protocolo" id="numero_protocolo">
              </div>
            </div>
          </div>


      </div>

      <div class="col-4">
      <label class=" text-danger">Maximo Peso de Documentos 1MB.</label>
        <div class="form-group">
          <label for="exampleInputFile">Cédula Escaneada</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="Cedula" id="Cedula" accept=".pdf">
              <label class="custom-file-label" for="exampleInputFile">Cargue la Cedula...</label>
            </div>
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

<!-- jQuery -->
<script src="../js/Validacion_STitulo.js"></script>


</html>