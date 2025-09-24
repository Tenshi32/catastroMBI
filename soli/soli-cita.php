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
      <h1 class="card-title text-lg">Solicitud de Cita</h1>
    </div>
    <span class="m-3 text-danger">Campos Obligatorios (*)</span>
    <form method="post" id="SoliCita" enctype="multipart/form-data">

      <div class="card-body">

        <?php

        $var->CodigoAcciones($usuario['id_usuario']);

        ?>

        <div class="row">

          <div class="col">
            <div class="form-group">
              <label>Inmueble</label>
              <select name="inmueble" id="inmueble" class="form-control">
                <option selected="selected" value="">--Seleccione un Inmueble--</option>
                <?php

                $select->DatosInmueblePropietario($usuario['id_usuario'], 1);

                ?>
              </select>
            </div>
            <!-- /.form-group -->
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Representante legal que asistira a la cita ?</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i style="font-size: 20px;" class="fas fa-address-card"></i></span>
                </div>
                <select id="representativeChoice" name="representativeChoice" class="form-control">
                  <option selected="selected" value="">--Seleccione un Inmueble--</option>
                  <option value="Titular">Titular</option>
                  <option value="Legal Representative">Representante legal</option>
                </select>
              </div>
            </div>
            <!-- /.form-group -->
          </div>
        </div>

        <div id="legalRepresentativeForm" style="display: none;">
          <hr>
          <p><strong>Datos del Representante Legal</strong></p>
          <div class="row">

            <div class="col">
              <div class="form-group">
                <label for="exampleInputFile">Autorizacion del Propietario</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="Autorizacion" name="Autorizacion" accept=".pdf">
                    <label class="custom-file-label" for="exampleInputFile">Cargue el Documento...</label>
                  </div>
                </div>
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
                <label for="tipo">*Cédula de Identidad:</label>
                <input type="text" class="form-control" name="cedula_legal" id="cedula_legal">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="tipo">*Número de Telefono:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control" name="numero_legal" id="numero_legal">
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-7">
            <div class="form-group">
              <label>Motivos para la Solicitud de la Cita</label>
              <select class="select2" id="motivos" name="motivos" onchange="MotivosCitas()"
                data-placeholder="Seleccione el motivo.." style="width: 100%;" multiple>
                <?php

                $select->SelectBasic("tipo_motivo");

                ?>
              </select>
            </div>
            <p class="mt-4 text-md badge badge-primary"><span id="resultado"></span> de 6 Motivos Maximo</p>
            <input type="hidden" id="motivo_codigo" name="motivo_codigo">
            <input type="hidden" id="motivo_texto" name="motivo_texto">
            <input type="hidden" id="motivo_cantidad" name="motivo_cantidad">
          </div>
        </div>

        <input type="hidden" id="RegistrarCita" name="RegistrarCita">
        <input type="hidden" name="tipo_solicitud" id="tipo_solicitud" value="1">
        <input type="hidden" name="estado_solicitud" id="estado_solicitud" value="1">
        <input type="hidden" name="id_inmueble" id="id_inmueble">

        <div class="row">
          <div class="col-5">
            <div class="card">

              <div class="card-header bg-info">
                <span>
                  <i class="icon fas fa-exclamation-circle"></i>
                  Como Rellenar esta sección del Formulario ?
                </span>
              </div>

              <div class="card-body text-lightblue">
                <ul>

                  Para que su cita se procese de manera eficiente, es muy importante que cargue los
                  siguientes documentos requeridos:
                  <br>
                  <li>Documento del Inmueble (como puede ser la escritura pública, contrato de compraventa, etc.).</li>
                  <li>RIF (Registro de Información Fiscal).</li>
                  <li>Cédula de Identidad (del titular).</li>
                  <br>
                  Además, le pedimos que también cargue los siguientes documentos (si ya el inmueble los posee), ya que
                  son de suma
                  importancia para la correcta gestión de su solicitud:
                  <br>
                  <li>Título Supletorio.</li>
                  <li>Constancia de Inscripción Catastral.</li>
                  <br>
                  La carga completa y correcta de estos documentos garantizará que su solicitud sea atendida de manera
                  rápida y sin inconvenientes. <strong> <i class="bi bi-exclamation-circle-fill"
                      style="color: red;"></i> Recuerde que, además de cargar los documentos digitalmente, es
                    imprescindible que lleve los originales en formato físico a su cita </strong>. Esto es necesario
                  para verificar
                  su autenticidad. Si no cuenta con alguno de estos documentos, por favor indíquelo en la razón de su
                  cita.
                </ul>
              </div>
            </div>
          </div>

          <div class="col">
            <div id="CargarDocumento">
            <span class="ml-1 text-danger">Maximo Peso de Documentos 1MB.</span>

                <div class="row mt-2">

                <div class="col">
                  <div class="form-group">
                    <label for="cedula_pdf">Cédula</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="Cedula" name="Cedula" accept=".pdf">
                        <label class="custom-file-label" for="Cedula">Cargue el Documento...</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="rif_pdf">Rif</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="Rif" name="Rif" accept=".pdf">
                        <label class="custom-file-label" for="Rif">Cargue el Documento...</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="form-group">
                    <label for="documento_pdf">Documento del Inmueble</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="Propiedad_Documento" name="Propiedad_Documento"
                          accept=".pdf">
                        <label class="custom-file-label" for="Propiedad_Documento">Cargue el Documento...</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Posee Título Supletorio?</label><br>
                        <div class="icheck-primary d-inline mr-2">
                          <input type="radio" id="radioPrimary1" name="opcion1" value="si">
                          <label for="radioPrimary1">
                            Si
                          </label>
                        </div>
                        <div class="icheck-primary d-inline mr-2">
                          <input type="radio" id="radioPrimary2" name="opcion1" value="no">
                          <label for="radioPrimary2">
                            No
                          </label>
                        </div>
                        <div id="formulario1" style="display:none;">
                          <hr>
                          <div class="col">
                            <div class="form-group">
                              <label for="titulo_img">Titulo Supletorio</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="Titulo_Supletorio"
                                    name="Titulo_Supletorio" accept=".pdf">
                                  <label class="custom-file-label" for="Titulo_Supletorio">Cargue el
                                    Documento...</label>
                                </div>
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
                        <label>Posee Constancia Catastral?</label><br>
                        <div class="icheck-primary d-inline mr-2">
                          <input type="radio" id="radioPrimary3" name="opcion2" value="si">
                          <label for="radioPrimary3">
                            Si
                          </label>
                        </div>
                        <div class="icheck-primary d-inline mr-2">
                          <input type="radio" id="radioPrimary4" name="opcion2" value="no">
                          <label for="radioPrimary4">
                            No
                          </label>
                        </div>

                        <div id="formulario2" style="display:none;">
                          <hr>
                          <div class="col">
                            <div class="form-group">
                              <label for="ficha_img">Ficha Catastral</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="Constancia_Catastral"
                                    name="Constancia_Catastral" accept=".pdf">
                                  <label class="custom-file-label" for="Constancia_Catastral">Cargue el
                                    Documento...</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div id="MostrarDocumento"></div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="direccion">*Razón de la Solicitud</label>
                  <textarea name="razon_solicitud" id="razon_solicitud" class="form-control"></textarea>
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

<script src="../js/Validacion_SCita.js"></script>

</html>