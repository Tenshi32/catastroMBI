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
      <h1 class="card-title text-lg">Solicitud de Contratos</h1>
    </div>
    <span class="m-3 text-danger">Campos Obligatorios (*)</span>
    <form method="post" id="SoliContratos" enctype="multipart/form-data">

      <div class="card-body">

        <?php

        $var->CodigoAcciones($usuario['id_usuario']);

        ?>

        <div class="row">

          <div class="col">
            <div class="form-group">
              <label>Inmueble</label>
              <select name="inmueble" id="inmueble" class="form-control select2 select2-danger"
                data-dropdown-css-class="select2-danger" style="width: 100%;">
                <option value="">--Seleccione un Inmueble--</option>
                <?php

                $select->InmueblePropietarioFicha($usuario['id_usuario'], 4);

                ?>
              </select>
            </div>
            <!-- /.form-group -->
          </div>

          <div class="col">
            <div class="form-group">
              <label>Contratos</label>
              <select name="contrato" id="contrato" class="form-control" style="width: 100%;">
                <option value="">--Seleccione un contrato--</option>
                <?php

                $select->SelectBasic("tipo_contrato");

                ?>
              </select>
            </div>
            <!-- /.form-group -->
          </div>
        </div>



        <div id="contratocompraventaForm" style="display: none;">
          <hr>
          <p><strong>Datos del Comprador</strong></p>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Cedula de Identidad:</label>
                <input type="text" class="form-control" name="cedula_comprador" id="cedula_comprador">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Nombre Completo:</label>
                <input type="text" class="form-control" name="nombre_comprador" id="nombre_comprador">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Apellido Completo:</label>
                <input type="text" class="form-control" name="apellido_comprador" id="apellido_comprador">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Numero de Telefono:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" name="numero_comprador" id="numero_comprador">
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" name="SoliContrato" id="SoliContrato">
          <input type="hidden" name="tipo_solicitud" id="tipo_solicitud" value="4">
          <input type="hidden" name="estado_solicitud" id="estado_solicitud" value="1">
          <input type="hidden" name="estado_inmueble" id="estado_inmueble" value="4">
          <input type="hidden" name="id_inmueble" id="id_inmueble">

          <hr>
          <p><strong>Datos del Abogado</strong></p>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Cédula de Identidad:</label>
                <input type="text" class="form-control" name="cedula_legal" id="cedula_legal">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Nombre Completo:</label>
                <input type="text" class="form-control" name="nombre_legal" id="nombre_legal">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Apellido Completo:</label>
                <input type="text" class="form-control" name="apellido_legal" id="apellido_legal">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Número de Telefono:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" name="numero_legal" id="numero_legal"
                    data-inputmask='"mask": "(9999) 999-99 99"' data-mask>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Inpre del Abogado:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-person-vcard-fill"></i></span>
                  </div>
                  <input type="text" class="form-control" name="numero_inpre" id="numero_inpre">
                </div>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Correo del Abogado:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-person-vcard-fill"></i></span>
                  </div>
                  <input type="email" class="form-control" name="correo_abogado" id="correo_abogado">
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Fecha de Entrega del Inmueble:</label>
                <input type="date" class="form-control" name="fecha_entrega" id="fecha_entrega">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Metodo de Pago:</label>
                <input type="text" class="form-control" name="metodo_pago" id="metodo_pago">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Monto a pagar:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><strong>Bs.</strong></span>
                  </div>
                  <input type="text" class="form-control" name="monto_pago" id="monto_pago">
                </div>
              </div>
            </div>
          </div>

          <label class="mt-3 text-danger">Maximo Peso de Documentos 1MB.</label>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputFile">Compra Venta Privada</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="Compra_Venta" name="Compra_Venta" accept=".pdf">
                    <label class="custom-file-label" for="exampleInputFile">Cargue el Documento...</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="exampleInputFile">*Compra Venta Anterior </label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="Compra_Venta_Anterior" name="Compra_Venta_Anterior"
                      accept=".pdf">
                    <label class="custom-file-label" for="exampleInputFile">Cargue el Documento...</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="exampleInputFile">*Documento del Inmueble</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="Propiedad_Documento " name="Propiedad_Documento"
                      accept=".pdf">
                    <label class="custom-file-label" for="exampleInputFile">Cargue el Documento...</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="contratoarrendamientoForm" style="display: none;">
          <hr>
          <p><strong>Ente arrendador</strong></p>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Duración del contrato :</label>
                <select name="duracion_contrato" id="duracion_contrato" class="form-control" style="width: 100%;">
                  <option selected="selected" value="">--Seleccione una Duración del Contrato--</option>
                  <option value="1">1 año</option>
                  <option value="2">2 años</option>
                  <option value="3">3 años</option>
                  <option value="4">4 años</option>
                  <option value="5">5 años</option>
                  <option value="6">6 años</option>
                  <option value="7">7 años</option>
                  <option value="8">8 años</option>
                  <option value="9">9 años</option>
                  <option value="10">10 años</option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Objeto del contrato:</label>
                <input type="text" class="form-control" name="objeto_contrato" id="objeto_contrato"
                  placeholder="Inmueble Seleccionado" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="tipo">*Tipo de Pago:</label>
                <input type="text" class="form-control" name="tipo_pago" id="tipo_pago">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="exampleInputFile">*Documento Venta/Plazo (<span class="mt-4 text-danger">Maximo Peso de
                    Documentos 1MB.</span>)</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="Venta_Plazo" name="Venta_Plazo" accept=".pdf">
                    <label class="custom-file-label" for="exampleInputFile">Cargue el Documento...</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <hr>
        <p><strong>Documentos a Cargar</strong></p>

        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">

                <div class="form-group">
                  <label>Desea Habilitar Contrato?<br>
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary" name="opcion1" value="si">
                      <label for="radioPrimary">
                        Si
                      </label>
                    </div>
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary0" name="opcion1" value="no">
                      <label for="radioPrimary0">
                        No
                      </label>
                    </div>
                  </label>
                </div>

              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>Posee Constancia Catastral?<br>
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary1" name="opcion2" value="si">
                      <label for="radioPrimary1">
                        Si
                      </label>
                    </div>
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary2" name="opcion2" value="no">
                      <label for="radioPrimary2">
                        No
                      </label>
                    </div>
                  </label>
                </div>
                <div id="formulario2" style="display:none;">
                  <hr>
                  <div class="col">
                    <div class="form-group">
                      <label for="exampleInputFile">Ficha Catastral (<span class="mt-4 text-danger">Maximo Peso de
                          Documentos 1MB.</span>)</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="Constancia_Catastral"
                            name="Constancia_Catastral" accept=".pdf">
                          <label class="custom-file-label" for="exampleInputFile">Cargue el Documento...</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label>Esta inscrito en la Gran Misión Vivienda Venezuela?
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary3" name="opcion3" value="si">
                      <label for="radioPrimary3">
                        Si
                      </label>
                    </div>
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary4" name="opcion3" value="no">
                      <label for="radioPrimary4">
                        No
                      </label>
                    </div>
                  </label>
                </div>
                <div id="formulario3" style="display:none;">
                  <hr>
                  <div class="col">
                    <div class="form-group">
                      <label for="tipo">*Código de la Gran Misión Vivienda Venezuela</label>
                      <input type="text" class="form-control" name="codigo_mision" id="codigo_mision">
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="exampleInputFile">Vauche de la Misión Vivienda (<span class="mt-4 text-danger">Maximo
                          Peso de Documentos 1MB.</span>)</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="vauche_vivienda" name="vauche_vivienda"
                            accept=".pdf">
                          <label class="custom-file-label" for="exampleInputFile">Cargue el Documento...</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
  <strong>Copyright &copy; 2020 -
    <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.
  </strong>
</footer>

<script src="../js/Validacion_SContrato.js"></script>

</html>