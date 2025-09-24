<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

require_once "../TopBar.php";

require_once '../../php/Model/ModeloInmueble.php';
require_once "../../php/Model/ModeloInspeccion.php";
require_once '../../php/Controller/ControlerInspeccion.php';
$inspeccionM = new ModeloInspeccion();
$inspeccion = new ControlerInspeccion();

date_default_timezone_set('America/Caracas');

$datos = unserialize($_POST['datos']);

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h3 class="card-title">Inspección</h3>
    </div>
    <div class="card-body">

      <div class="bs-stepper">
        <div class="bs-stepper-header" role="tablist">
          <!-- Datos del Terreno -->
          <div class="step" data-target="#DatosTerreno-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="DatosTerreno-part"
              id="DatosTerreno-part-trigger">
              <span class="bs-stepper-circle">1</span>
              <span class="bs-stepper-label">Terreno</span>
            </button>
          </div>
          <div class="line"></div>
          <!-- Datos del Generales -->
          <div class="step" data-target="#DatosGenerales-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="DatosGenerales-part"
              id="DatosGenerales-part-trigger">
              <span class="bs-stepper-circle">2</span>
              <span class="bs-stepper-label">Generales</span>
            </button>
          </div>
          <div class="line"></div>
          <!-- Datos del Estructurales -->
          <div class="step" data-target="#DatosComplementario-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="DatosComplementario-part"
              id="DatosComplementario-part-trigger">
              <span class="bs-stepper-circle">3</span>
              <span class="bs-stepper-label">Complementario</span>
            </button>
          </div>
          <div class="line"></div>
          <div class="step" data-target="#OtrosDatos-part">
            <button type="button" class="step-trigger" role="tab" aria-controls="OtrosDatos-part"
              id="OtrosDatos-part-trigger">
              <span class="bs-stepper-circle">4</span>
              <span class="bs-stepper-label">Otros Datos</span>
            </button>
          </div>
        </div>

        <form method="post" id="ProceInspe">
          <span class="m-3 text-danger">Campos Obligatorios (*)</span>

          <div class="row">
            <?php

            $var->CodigoAcciones($datos['id_propietario']);

            ?>

            <div class="row p-4">
              <?php

              $inspeccion->ModalInfoInspec($datos['id_direccion_inmueble']);

              ?>
            </div>
          </div>

          <div class="bs-stepper-content">

            <div id="DatosTerreno-part" class="content" role="tabpanel" aria-labelledby="DatosTerreno-part-trigger">
              <div class="card card-body">
                <h5><img src="../../public/images/terreno-1.png" alt="User Avatar" width="70" height="70">Datos del
                  terreno</h5>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>1) Topografía del Inmueble</label>
                      <select name="topografia" id="topografia" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Topografía--</option>
                        <?php

                        $select->SelectBasic("tipo_topografia");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>2) Acceso al Inmueble</label>
                      <select name="acceso" id="acceso" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Acceso--</option>
                        <?php

                        $select->SelectBasic("tipo_acceso");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>3) Forma del Inmueble</label>
                      <select name="forma" id="forma" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Forma--</option>
                        <?php

                        $select->SelectBasic("tipo_forma");

                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label>4) Ubicación del Inmuble</label>
                      <select name="ubicacion" id="ubicacion" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Ubicación--</option>
                        <?php

                        $select->SelectBasic("tipo_ubicacion");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>5) Entorno Físico</label>
                      <select name="entorno" id="entorno" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Entorno--</option>
                        <?php

                        $select->SelectBasic("tipo_entorno");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>6) Mejora del Terreno</label>
                      <select name="mejora" id="mejora" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Mejora--</option>
                        <?php

                        $select->SelectBasic("tipo_mejora");

                        ?>
                      </select>
                    </div>
                  </div>


                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>7) Tenencia del Terreno</label>
                      <select name="tenecia_terreno" id="tenecia_terreno" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Tenencia--</option>
                        <?php

                        $select->SelectBasic("tipo_tenencia");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>8) Régimen de Propiedad</label>
                      <select name="regimen" id="regimen" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Régimen--</option>
                        <?php

                        $select->SelectBasic("tipo_regimen");

                        ?>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label>9) Servicio Público del Inmueble</label>
                      <select class="select2" id="servicio_publico" name="servicio_publico"
                        data-placeholder="Seleccione el motivo.." style="width: 100%;" onchange="actualizarCamposServicio()" multiple>
                        <?php

                        $select->SelectBasic("tipo_servicio_publico");

                        ?>
                      </select>
                    </div>
                    <input type="hidden" id="servicio_codigo" name="servicio_codigo">
                    <input type="hidden" id="servicio_cantidad" name="servicio_cantidad">
                    <input type="hidden" id="servicio_texto" name="servicio_texto">
                    <input type="hidden" id="RegisInspec" name="RegisInspec">
                    <input type="hidden" id="id_funcionario" name="id_funcionario"
                      value="<?php echo $usuario["id_usuario"]; ?>">
                    <input type="hidden" name="estado_inmueble" id="estado_inmueble" value="3">
                    <input type="hidden" name="id_inmueble" id="id_inmueble">
                  </div>
                </div>

              </div>
            </div>

            <div id="DatosGenerales-part" class="content" role="tabpanel" aria-labelledby="DatosGenerales-part-trigger">
              <div class="row">
                <div class="col">
                  <div class="card card-body">
                    <h5><img src="../../public/images/construccion.png" alt="User Avatar" width="70" height="70">
                      Datos
                      Generales de la Construcción</h5>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Tipo Construcción</label>
                          <select name="tipo_construccion" id="tipo_construccion" class="form-control"
                            style="width: 100%;">
                            <option value="">--Seleccione un Tipo de Construcción--</option>
                            <?php

                            $select->SelectBasic("tipo_construccion_generales");

                            ?>
                          </select>

                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label>Descripción de Uso del Inmueble</label>
                          <select name="descripcion_uso" id="descripcion_uso" class="form-control" style="width: 100%;">
                            <option value="">--Seleccione un Descripcion de Uso--</option>
                            <?php

                            $select->SelectBasic("tipo_descripcion_uso");

                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row">


                      <div class="col">
                        <div class="form-group">
                          <label>Régimen del Propiedad</label>
                          <select name="regimen_construccion" id="regimen_construccion" class="form-control"
                            style="width: 100%;">
                            <option value="">--Seleccione un Tipo de Regimen--</option>
                            <?php

                            $select->SelectBasic("tipo_regimen");

                            ?>
                          </select>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="col">

                  <div class="row">

                    <div class="card card-body">
                      <h5><img src="../../public/images/estructura.png" alt="User Avatar" width="60" height="60">
                        Datos
                        Estructurales de la Construcción</h5>

                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label>Tipo Techo del Inmueble</label>
                            <select name="techo_inmueble" id="techo_inmueble" class="form-control" style="width: 100%;">
                              <option value="">--Seleccione un Tipo Techo--</option>
                              <?php

                              $select->SelectBasic("tipo_techo");

                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label>Tipo de Estructura del Inmueble</label>
                            <select name="soporte_inmueble" id="soporte_inmueble" class="form-control"
                              style="width: 100%;">
                              <option value="">--Seleccione un Tipo de Soporte--</option>
                              <?php

                              $select->SelectBasic("tipo_estructura");

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <div class="row ">


                        <div class="col">
                          <div class="form-group">

                            <label>Tipo de Cubierta del Inmueble</label>
                            <select name="cubierta_inmueble" id="cubierta_inmueble" class="form-control"
                              style="width: 100%;">
                              <option value="">--Seleccione un Tipo de Externo--</option>
                              <?php

                              $select->SelectBasic("tipo_cubierta");

                              ?>
                            </select>
                          </div>
                        </div>



                      </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>

            <div id="DatosComplementario-part" class="content" role="tabpanel"
              aria-labelledby="DatosComplementario-part-trigger">
              <div class="card card-body">
                <h5><img src="../../public/images/construccionC.png" alt="User Avatar" width="70" height="70"> Datos
                  Complementarios de la Construcción</h5>
                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label>Paredes del Inmueble</label>
                      <select name="paredes_inmueble" id="paredes_inmueble" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Paredes--</option>
                        <?php

                        $select->SelectBasic("tipo_paredes");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>Acabado del Inmueble</label>
                      <select name="acabado_inmueble" id="acabado_inmueble" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Acabado--</option>
                        <?php

                        $select->SelectBasic("tipo_acabado");

                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Pintura del Inmueble</label>
                      <select name="pintura_inmueble" id="pintura_inmueble" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo Pintura--</option>
                        <?php

                        $select->SelectBasic("tipo_pintura");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>Instalaciones Electricas del Inmueble</label>
                      <select name="instalaciones_electricas_inmueble" id="instalaciones_electricas_inmueble"
                        class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo Instalaciones Electricas--</option>
                        <?php

                        $select->SelectBasic("tipo_instalaciones_electricas");

                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Piso del Inmueble</label>
                      <select name="piso_inmueble" id="piso_inmueble" class="form-control" style="width: 100%;">
                        <option value="">--Seleccione un Tipo de Piso--</option>
                        <?php

                        $select->SelectBasic("tipo_piso");

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label>Conservación del Inmueble</label>
                      <select name="conservacion_inmueble" id="conservacion_inmueble" class="form-control"
                        style="width: 100%;">
                        <option value="">--Seleccione un Tipo de conservación--</option>
                        <?php

                        $select->SelectBasic("tipo_conservacion");

                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <hr>

                <?php

                $inspeccionM->MostrarXNivel($datos['tipo_contruccion'], $datos['nivel_expe']);

                ?>                          
                
                <input type="hidden" id="niveles" name="niveles" value="<?php echo $datos['nivel_expe']?> ">
                
                <hr>

                <div class="row">
                  <div class="col">
                    <div class="card card-body">

                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label><img src="../../public/images/puerta.png" alt="User Avatar" width="70"
                                height="70">Tipos
                              de Puertas</label>
                            <select class="select2" id="puerta" name="puerta" data-placeholder="Seleccione el motivo.."
                              onchange="actualizarCamposPuerta()" style="width: 100%;" multiple>
                              <?php

                              $select->SelectBasic("tipo_puerta");

                              ?>
                            </select>

                          </div>
                          <input type="hidden" id="puerta_codigo" name="puerta_codigo">
                          <input type="hidden" id="puerta_cantidad" name="puerta_cantidad">
                          <input type="hidden" id="puerta_texto" name="puerta_texto">
                        </div>

                        <div class="col">
                          <div class="form-group">
                            <label><img src="../../public/images/ventana.png" alt="User Avatar" width="70"
                                height="70">Tipos
                              de Ventanas</label>
                            <select class="select2" id="ventana" name="ventana"
                              data-placeholder="Seleccione el motivo.." onchange="actualizarCamposVentana()"
                              style="width: 100%;" multiple>
                              <?php

                              $select->SelectBasic("tipo_ventana");

                              ?>
                            </select>

                          </div>
                          <input type="hidden" id="ventana_codigo" name="ventana_codigo">
                          <input type="hidden" id="ventana_cantidad" name="ventana_cantidad">
                          <input type="hidden" id="ventana_texto" name="ventana_texto">
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div id="OtrosDatos-part" class="content" role="tabpanel" aria-labelledby="OtrosDatos-part-trigger">

              <div class="card card-body">
                <h5><img src="../../public/images/otroDatos.png" alt="User Avatar" width="70" height="70"> Otros
                  Datos
                </h5>

                <div class="row">

                  <div class="col">

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="tipo">Años de construcciòn</label>
                          <input type="text" class="form-control" id="anno_construccion" name="anno_construccion">
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="tipo">Años de Refacciòn</label>
                          <input type="text" class="form-control" id="anno_refaccion" name="anno_refaccion">
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col">
                        <div class="form-group">
                          <label for="tipo">Nº de Inmuebles</label>
                          <input type="text" class="form-control" id="n_edificaciones" name="n_edificaciones">
                        </div>
                      </div>

                    </div>

                    <p><img class="mr-2" src="../../public/images/planoMensura.png" width="60" height="60"><strong>Datos
                        del
                        Plano Mensura</strong></p>

                    <div class="row">

                      <div class="col">
                        <div class="form-group">
                          <label for="tipo">*Tipo de Escala:</label>
                          <select class="form-control" name="tipo_escala" id="tipo_escala">
                            <option value="">--Seleccione un tipo de Escala--</option>
                            <?php

                            $select->SelectBasic("tipo_escala");

                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="plano_mensura">Plano Mensura</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="Plano_Mensura" name="Plano_Mensura" accept=".png,.jpg">
                              <label class="custom-file-label" for="Plano_Mensura"></label>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>

                  <div class="col">
                    <label for="tipo">*Observaciones</label>
                    <textarea class="form-control" name="observacion" id="observacion" cols="30" rows="7"
                      onclick="actualizardistribucion_espacial()"></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="tipo">*Superficie Total Mtrs2 (Construccion)</label>
                      <input type="text" class="form-control" name="area_m2_c" id="area_m2_c">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="tipo">*Superficie Total Mtrs2 (Terreno)</label>
                      <input type="text" class="form-control" name="area_m2_t" id="area_m2_t">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="tipo">Manzana</label>
                      <input type="text" class="form-control" id="manzana" name="manzana">
                      <input type="hidden" id="distribucion_espacial" name="distribucion_espacial">
                    </div>
                  </div>
                </div>

                <div class="card p-4 m-2 callout callout-danger">
                  <div class="row">
                    <div class="col">
                      <label>1) El inmueble cuenta con Ascensor?
                        <br>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary1" name="Azotea" value="si">
                          <label for="radioPrimary1">
                            Si
                          </label>
                        </div>

                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary2" name="Azotea" value="no">
                          <label for="radioPrimary2">
                            No
                          </label>
                        </div>
                      </label>
                    </div>

                    <div class="col">
                      <label>1) Propiedad horizontal ?
                        <br>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary8" name="horizontal" value="si">
                          <label for="radioPrimary8">
                            Si
                          </label>
                        </div>

                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary9" name="horizontal" value="no">
                          <label for="radioPrimary9">
                            No
                          </label>
                        </div>
                      </label>
                    </div>

                    <div class="col">
                      <label>2) El inmueble cuenta con Sótano?
                        <br>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary3" name="Sotano" value="si">
                          <label for="radioPrimary3">
                            Si
                          </label>
                        </div>

                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary4" name="Sotano" value="no">
                          <label for="radioPrimary4">
                            No
                          </label>
                        </div>
                      </label>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col">
                      <label>3) El inmueble es....?
                        <br>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary5" name="clase_inmueble" value="Residencial">
                          <label for="radioPrimary5">
                            Residencial
                          </label>
                        </div>

                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary6" name="clase_inmueble" value="Comercial">
                          <label for="radioPrimary6">
                            Comercial
                          </label>
                        </div>

                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary7" name="clase_inmueble" value="Mixto">
                          <label for="radioPrimary7">
                            Mixto
                          </label>
                        </div>

                        <div id="Mixto" style="display: none;">
                          <br>
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="tipo">*Superficie Total Mtrs2 (Construcción Residencial)</label>
                                <input type="text" class="form-control" name="area_cr" id="area_cr">
                              </div>
                            </div>

                            <div class="col">
                              <div class="form-group">
                                <label for="tipo">*Superficie Total Mtrs2 (Terreno Residencial)</label>
                                <input type="text" class="form-control" name="area_tr" id="area_tr">
                              </div>
                            </div>

                            <div class="col">
                              <div class="form-group">
                                <label for="tipo">*Superficie Total Mtrs2 (Construcción Comercial)</label>
                                <input type="text" class="form-control" name="area_cc" id="area_cc">
                              </div>
                            </div>

                            <div class="col">
                              <div class="form-group">
                                <label for="tipo">*Superficie Total Mtrs2 (Terreno Comercial)</label>
                                <input type="text" class="form-control" name="area_tc" id="area_tc">
                              </div>
                            </div>
                          </div>
                        </div>

                      </label>
                    </div>
                  </div>
                </div>

              </div>

              <button class="btn btn-success BtnProceInspe" type="submit" name="BtnProceInspe"
                id="BtnProceInspe">Registrar
                <i class="fa fa-check"></i>
              </button>
            </div>

          </div>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">

          <div class="col">
            <button class="btn btn-primary btn-block toggleBack"><i class="fa fa-arrow-left"></i>
              Regresar
            </button>
          </div>

          <div class="col">
            <button class="btn btn-primary btn-block toggleNextBasico">Siguiente <i class="fa fa-arrow-right"></i>
            </button>
          </div>

        </div>
      </div>

    </div>
  </div>

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

<script src="../../js/Validacion_PInspeccion.js"></script>

</html>