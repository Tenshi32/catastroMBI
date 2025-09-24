<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../../public/plugins/jquery/jquery.min.js"></script>
</head>
<?php

require "../TopBar.php";

date_default_timezone_set('America/Caracas');
$hoy = strtotime('now');

// Sumar un día al timestamp (86400 segundos = 24 horas)
$manana = $hoy + 86400;
?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h1 class="card-title text-lg">Inscripción Catastral</h1>
    </div>
    <span class="m-3 text-danger">Campos Obligatorios (*)</span>
    <form method="post" id="ProceInscrip" enctype="multipart/form-data">

      <div class="card-body">

        <div class="row">
          <?php

          $var->CodigoAcciones($usuario['id_usuario']);

          ?>

        </div>

        <hr>
        <h5 class="m-3">Datos de la Inscripción</h5>

        <div class="row">
          <div class="col-4">
            <div class="card card-body">

              <p class="text-lightblue"><i class="fa fa-exclamation-triangle text-warning"></i> Estas 3 preguntas que
                vas
                a responder son muy importantes porque nos ayudan a tener toda la información
                necesaria para inscribir tu propiedad en el registro catastral. Imagina que es como llenar un formulario
                para que tu casa o terreno tenga una identificación oficial. Esta información nos servirá para conocer
                las
                características de tu propiedad y así poder ubicarla correctamente en un mapa.</p>

              <div class="row card p-4 m-2 callout callout-danger">
                <label>1) El Propietario Posee más de una construcción ?
                  <br>
                  <div class="form-group">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" name="parcela" value="si"
                        onclick="mostrarFormularioParcela()">
                      <label for="radioPrimary1">
                        Si
                      </label>
                    </div>

                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary2" name="parcela" value="no"
                        onclick="mostrarFormularioParcela()">
                      <label for="radioPrimary2">
                        No
                    </div>
                  </div>
                </label>
              </div>

              <div class="row card p-4 m-2 callout callout-danger">
                <label>2) El inmueble cuenta con mas de una construcción dentro de la parcela?
                  <br>
                  <div class="form-group">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary3" name="subparcela" value="si"
                        onclick="mostrarFormularioSubParcela()">
                      <label for="radioPrimary3">
                        Si
                      </label>
                    </div>

                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary4" name="subparcela" value="no"
                        onclick="mostrarFormularioSubParcela()">
                      <label for="radioPrimary4">
                        No
                      </label>
                    </div>
                  </div>
                </label>
              </div>

              <div class="row card p-4 m-2 callout callout-danger">
                <label>3) El inmueble cuenta con mas de un nivel o piso ?
                  <br>
                  <div class="form-group">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary5" name="nivel" value="si" onclick="mostrarFormularioNivel()">
                      <label for="radioPrimary5">
                        Si
                      </label>
                    </div>

                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary6" name="nivel" value="no" onclick="mostrarFormularioNivel()">
                      <label for="radioPrimary6">
                        No
                      </label>
                    </div>
                  </div>
                </label>
              </div>

            </div>
          </div>

          <div class="col">
            <div class="card card-body">
            <label class="mt-4 text-danger">Maximo Peso de Documentos 1MB.</label>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Inmueble a Inscribir...</label>
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
                    <label for="titulo_supletorio">Documento de Propiedad del Inmueble</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="Propiedad_Documento" name="Propiedad_Documento"
                          accept=".pdf">
                        <label class="custom-file-label" for="Propiedad_Documento"></label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="tipo">Estado</label>
                    <input type="text" class="form-control" value="05# Aragua" readonly>
                    <input type="hidden" name="estado_codigo" id="estado_codigo" value="005">

                    <input type="hidden" name="estado" id="estado" value="1">
                    <input type="hidden" name="estado_inmueble" id="estado_inmueble" value="2">
                    <input type="hidden" name="id_inmueble" id="id_inmueble">
                    <input type="hidden" name="RegisFicha" id="RegisFicha">
                    <input type="hidden" name="parcela_codigo" id="parcela_codigo">
                    <input type="hidden" name="subparcela_codigo" id="subparcela_codigo">
                    <input type="hidden" name="nivel_codigo" id="nivel_codigo">
                    <input type="hidden" name="unidad_codigo" id="unidad_codigo">
                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php $usuario["id_usuario"]; ?>">

                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="tipo">Municipio</label>
                    <input type="text" class="form-control" value="08# Mario Briceño Iragorry" readonly>
                    <input type="hidden" class="form-control" name="municipio_codigo" id="municipio_codigo" value="008">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="tipo">*Parroquia</label>
                    <select class="form-control" name="parroquia" id="parroquia">
                      <option value="">--Seleccione una parroquia--</option>
                      <option value="001">01# El Limon</option>
                      <option value="002">02# Caña Azucar</option>
                    </select>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="tipo">Ámbito</label>
                    <input type="text" class="form-control" value="U-01" readonly>
                    <input type="hidden" class="form-control" name="ambito_codigo" id="ambito_codigo" value="U01">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div id="sectores" class="form-group">
                    <label>*Sector</label>
                    <select id='sector' name='sector' class='form-control'>
                    </select>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="tipo">Manzana <small>(Opcional)</small> :</label>
                    <input type="text" class="form-control" name="manzana_codigo" id="manzana_codigo" maxlength="3">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group" id="parcela_u" style="display:block;">
                    <label for="tipo">*Parcela:</label>
                    <input type="text" class="form-control" name="parcela_no" id="parcela_no" value="001" readonly>
                  </div>

                  <div class="form-group" id="parcela_mayor" style="display:none;">
                    <label for="tipo">*Parcela:</label>
                    <input type="text" class="form-control" name="parcela_si" id="parcela_si" maxlength="3">
                  </div>
                </div>

                <div class="col">
                  <div class="form-group" id="subparcela_u" style="display:block;">
                    <label for="tipo">*Sub Parcela/Lote:</label>
                    <input type="text" class="form-control" name="subparcela_no" id="subparcela_no" value="001"
                      readonly>
                  </div>

                  <div class="form-group" id="subparcela_mayor" style="display:none;">
                    <label for="tipo">*Sub Parcela/Lote:</label>
                    <input type="text" class="form-control" name="subparcela_si" id="subparcela_si" maxlength="3">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group" id="nivel_pb" style="display:block;">
                    <label for="tipo">*Nivel:</label>
                    <input type="text" class="form-control" value="Planta Baja" readonly>
                    <input type="hidden" class="form-control" name="nivel_no" id="nivel_no" value="001" readonly>
                  </div>

                  <div class="form-group" id="nivel_mayor" style="display:none;">
                    <label for="tipo">*Nivel:</label>
                    <input type="text" class="form-control" name="nivel_si" id="nivel_si" maxlength="3">
                  </div>
                </div>

                <div class="col">
                  <div class="form-group" id="unidad_pb" style="display:block;">
                    <label for="tipo">*Unidad:</label>
                    <input type="text" class="form-control" name="unidad_no" id="unidad_no" value="001" readonly>
                  </div>

                  <div class="form-group" id="unidad_mayor" style="display:none;">
                    <label for="tipo">*Unidad:</label>
                    <input type="text" class="form-control" name="unidad_si" id="unidad_si" maxlength="3">
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="tipo">Clase de Operación de la Inscripción</label>
                    <select class="form-control select2 select2-danger" name="clases_operaciones"
                      id="clases_operaciones">
                      <option value="">--Seleccione una clase de operación--</option>
                      <option value="Venta">Venta</option>
                      <option value="Donacion">Donacion</option>
                      <option value="Herencia">Herencia</option>
                      <option value="Permuta">Permuta</option>
                      <option value="Judicial">Judicial</option>
                      <option value="En pago">En pago</option>
                      <option value="Particion">Particion</option>
                      <option value="Ejecucion hipoteca">Ejecucion hipoteca</option>
                      <option value="Otros">Otros</option>
                    </select>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="tipo">*Valor .BsF:</label>
                    <input type="text" class="form-control" name="valor_inmueble" id="valor_inmueble">
                  </div>
                </div>

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

          <div class="col">            <button class="btn btn-warning btn-lg btn-block" type="reset">Limpiar
          <i class="bi bi-arrow-clockwise fa-lg"></i></button></div>

          <div class="col">
            <button class="btn btn-success btn-lg btn-block" type="submit">Registrar 
              <i class="fa fa-check"></i></button>

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

<script src="../direccion/select_sectores.js"></script>
<script src="../../js/Validacion_PInscripcion.js"></script>

</html>