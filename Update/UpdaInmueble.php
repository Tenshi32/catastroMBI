<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<?php

require_once "TopBar.php";

require_once '../php/Model/ModeloCodigo.php';
$var = new ModeloCodigo();

require_once '../php/Model/ModeloSelect.php';
$select = new ModeloSelect();

$datos = unserialize($_POST['datos']);

?>

<body>

  <!-- general form elements -->
  <div class="card card-shadow elevation-5 card-dark m-5">

    <div class="card-header">
      <h1 class="card-title text-lg"><i class="bi bi-house-fill"></i> Registro del Inmueble</h1>
    </div>

    <form id="regist_inmueble">

      <div class="card-body">

        <div class="bs-stepper">

          <div class="bs-stepper-header" role="tablist">
            <!-- Datos del Terreno -->
            <div class="step" data-target="#DatosBasico-part">
              <button type="button" class="step-trigger" role="tab" aria-controls="DatosBasico-part"
                id="DatosBasico-part-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Inicio</span>
              </button>
            </div>

            <div class="line"></div>

            <!-- Datos del Generales -->
            <div class="step" data-target="#DatosDireccion-part">
              <button type="button" class="step-trigger" role="tab" aria-controls="DatosDireccion-part"
                id="DatosDireccion-part-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Direccion</span>
              </button>
            </div>

            <div class="line"></div>

            <!-- Datos del Estructurales -->
            <div class="step" data-target="#DatosTecnicos-part">
              <button type="button" class="step-trigger" role="tab" aria-controls="DatosTecnicos-part"
                id="DatosTecnicos-part-trigger">
                <span class="bs-stepper-circle">3</span>
                <span class="bs-stepper-label">Tecnico</span>
              </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#DatosMedidasLinderos-part">
              <button type="button" class="step-trigger" role="tab" aria-controls="DatosMedidasLinderos-part"
                id="DatosMedidasLinderos-part-trigger">
                <span class="bs-stepper-circle">4</span>
                <span class="bs-stepper-label">Medidas y Linderos</span>
              </button>
            </div>
          </div>

          <span class="m-2 text-danger">Campos Obligatorios (*)</span>
          <h5 class="m-3">Datos del Propietario</h5>

          <?php
          $var->CodigoAcciones($usuario['id_usuario']);
          ?>

          <hr>

          <div class="bs-stepper-content">

            <div id="DatosBasico-part" class="content" role="tabpanel" aria-labelledby="DatosBasico-part-trigger">

              <h5 class="m-3">Datos del Inmueble</h5>
              <div class="card card-body">
                <div class="row">
                  <div class="col">

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="tipo">Nombre vivienda <small>(Opcional)</small></label>
                          <input type="text" class="form-control" name="nombre_inmueble" id="nombre_inmueble"
                            value="<?php echo $datos['nombre_inmueble']; ?>">
                        </div>
                      </div>

                      <input type="hidden" name="id_inmueble" id="id_inmueble" value="<?php echo $datos['codigo']; ?>">
                      <input type="hidden" name="UpdateInmueble" id="UpdateInmueble">

                      <div class="col">
                        <div class="form-group">
                          <label for="n_civico">*N° Civico</label>
                          <input type="text" class="form-control" name="n_civico" id="n_civico"
                            value="<?php echo $datos['n_civico']; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="numero">Telefonia</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" name="numero_inmueble" id="numero_inmueble"
                              value="<?php echo $datos['telefono_inmueble']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <label for="estado_inmueble">*Estado del Hogar</label>
                      <textarea class="form-control" name="descripcion_inmueble" rows="5"
                        id="descripcion_inmueble"> <?php echo $datos['descripcion_inmueble']; ?> </textarea>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col">
                    <div class="form-group">
                      <label for="tipo">*Parroquia:</label>
                      <select class="form-control" name="parroquia" id="parroquia">
                        <option value="<?php echo $datos['parroquia']; ?>">
                          <?php echo $datos['parroquia'] . "# " . $datos['parroquia_n']; ?>
                        </option>
                        <?php
                        $select->Parroquia($datos['parroquia']);
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="tipo">*Residencia:</label>
                      <input type="text" class="form-control" name="residencia" id="residencia"
                        value="<?php echo $datos['residencia']; ?>">
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div id="DatosDireccion-part" class="content" role="tabpanel" aria-labelledby="DatosDireccion-part-trigger">

              <label for="direccion">Seccion de Datos de la Direccion del Inmueble</label>


              <div class="card card-body">
                <label for="numero">*Direccion Inmueble</label>
                <div class="row">
                  <label for="numero" class="mt-2 ml-2">El inmuble se ubica entre..</label>
                  <div class="col">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <select name="ubicacion_entre_tipo" id="ubicacion_entre_tipo" class="form-control">
                                  <option selected="selected" value="<?php echo $datos['ubicacion_entre_tipo']; ?>">
                                    <?php echo $datos['descripcion_ubicacion_entre']; ?>
                                  </option>
                                  <?php
                                  $select->SelectBasicUpdate("tipo_ubicacion_entre", $datos['ubicacion_entre_tipo']);
                                  ?>
                                </select>
                              </div>

                              <input type="text" class="form-control" name="ubicacion_entre_text"
                                id="ubicacion_entre_text" value="<?php echo $datos['ubicacion_entre_text']; ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <label for="numero" class="mt-2">Y..</label>
                  <div class="col">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <select name="ubicacion_y_tipo" id="ubicacion_y_tipo" class="form-control">
                                  <option selected="selected" value="<?php echo $datos['ubicacion_y_tipo']; ?>">
                                    <?php echo $datos['descripcion_ubicacion_y']; ?>
                                  </option>
                                  <?php
                                  $select->SelectBasicUpdate("tipo_ubicacion_entre", $datos['ubicacion_y_tipo']);
                                  ?>
                                </select>
                              </div>
                              <input type="text" class="form-control" name="ubicacion_y_text" id="ubicacion_y_text"
                                value="<?php echo $datos['ubicacion_y_text']; ?>">
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
                      <label for="numero">Ubicado en el lugar..</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <select name="lugar_inmuble_tipo" id="lugar_inmuble_tipo" class="form-control">
                                  <option selected="selected" value="<?php echo $datos['lugar_inmuble_tipo']; ?>">
                                    <?php echo $datos['descripcion_lugar']; ?>
                                  </option>
                                  <?php
                                  $select->SelectBasicUpdate("tipo_lugar_inmueble", $datos['lugar_inmuble_tipo']);
                                  ?>
                                </select>
                              </div>
                              <input type="text" class="form-control" name="lugar_inmuble_text" id="lugar_inmuble_text"
                                value="<?php echo $datos['lugar_inmuble']; ?>">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="punto_referencia">*Punto de Referencia</label>
                      <input type="text" class="form-control" name="punto_referencia" id="punto_referencia"
                        value="<?php echo $datos['punto_referencia']; ?>">
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div id="DatosTecnicos-part" class="content" role="tabpanel" aria-labelledby="DatosTecnicos-part-trigger">

              <label for="direccion">Sección de Datos Tecnicos del Inmueble</label>

              <div class="card card-body">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="numero">*Tipo de Construccion</label>
                      <select name="tipo_construccion_tipo" id="tipo_construccion_tipo" class="form-control">
                        <option selected="selected" value="<?php echo $datos['tipo_construccion_tipo']; ?>">
                          <?php echo $datos['descripcion_contruccion']; ?>
                        </option>
                        <?php
                        $select->SelectBasicUpdate("tipo_construccion", $datos['tipo_construccion_tipo']);
                        ?>
                      </select>

                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="tipo_registro">*Registro de vivienda:</label>
                      <select name="tipo_registro" id="tipo_registro" class="form-control">
                        <?php
                        $select->Tenencia($datos['tenencia']);
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="medida_inmueble">*Medida (Mtros<sup>2</sup>)</label>
                      <input type="text" class="form-control" name="medida_inmueble" id="medida_inmueble"
                        value="<?php echo $datos['medida_inmueble']; ?>">
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="numero">*Valor del Inmueble</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Bs.</span>
                        </div>
                        <input type="text" class="form-control" name="valor_inmueble" id="valor_inmueble"
                          value="<?php echo $datos['valor_inmueble']; ?>">
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div id="DatosMedidasLinderos-part" class="content" role="tabpanel"
              aria-labelledby="DatosMedidasLinderos-part-trigger">

              <label for="direccion">Seccion de Linderos y Medidas</label>

              <div class="row">
                <div class="col-4">
                  <div class="card">

                    <div class="card-header bg-info">
                      <span>
                        <i class="icon fas fa-exclamation-circle"></i>
                        Como Rellenar esta seccion del Formulario ?
                      </span>
                    </div>

                    <div class="card-body text-lightblue">

                      <ul>
                        <br>
                        <li>
                          En el primer campo (<i class="fas fa-pen"></i>) debes de escribir <strong>Que hay en ese
                            límite</strong>.
                          Por ejemplo, si tu terreno limita con una calle y su nombre correspondiante, escribes "Calle
                          Libertador".
                        </li>
                        <hr>
                        <li>
                          En el segundo campo (<i class="fas fa-ruler"></i>) debes de escribir <strong> Cuanto mide ese
                            límite</strong>.
                          Es decir, la longitud del lado de tu terreno que está tocando ese límite.
                          Por ejemplo, si el lado que limita con la calle mide 20 metros, escribes "20 metros".
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card card-body">
                    <center>
                      <div class="row">
                        <div class="col-6">
                          <label for="">La entrada del Inmueble es por el lindero...</label>
                          <div class="row">
                            <?php
                            $select->EntradaLindero($datos['entrada_lindero']);
                            ?>
                          </div>
                        </div>
                        <div class="col">
                          <img src="../public/images/CatVialidad2.png" width="100" height="100">
                        </div>
                      </div>
                    </center>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <label for="direccion">*Linderos del Norte</label>
                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" name="norte_descripcion" id="norte_descripcion"
                              value="<?php echo $datos['norte_descripcion']; ?>">
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-pen-fill"></i></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" title='Coloque la medida del Lateral Norte' class="form-control "
                              value="<?php echo $datos['norte_medida']; ?>" name="norte_medida" id="norte_medida"
                              data-inputmask='"mask": "999.99 Mtros"' data-mask>
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-rulers"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col">
                        <label for="direccion">*Linderos del Sur</label>
                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" name="sur_descripcion" id="sur_descripcion"
                              value="<?php echo $datos['sur_descripcion']; ?>">
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-pen-fill"></i></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" name="sur_medida" id="sur_medida"
                              value="<?php echo $datos['sur_medida']; ?>" data-inputmask='"mask": "999.99 Mtros"'
                              data-mask>
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-rulers"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <label for="direccion">*Linderos del Este</label>
                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" name="este_descripcion" id="este_descripcion"
                              value="<?php echo $datos['este_descripcion']; ?>">
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-pen-fill"></i></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" name="este_medida" id="este_medida"
                              value="<?php echo $datos['este_medida']; ?>" data-inputmask='"mask": "999.99 Mtros"'
                              data-mask>
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-rulers"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <label for="direccion">*Linderos del Oeste</label>
                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" name="oeste_descripcion" id="oeste_descripcion"
                              value="<?php echo $datos['oeste_descripcion']; ?>">
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-pen-fill"></i></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <input type="text" class="form-control" name="oeste_medida" id="oeste_medida"
                              value="<?php echo $datos['oeste_medida']; ?>" data-inputmask='"mask": "999.99 Mtros"'
                              data-mask>
                            <div class="input-group-append">
                              <span class="input-group-text bg-dark"><i class="bi bi-rulers"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-8"></div>

                <input type="hidden" class="form-control" name="Update" id="Update">

                <div class="col">
                  <button class="btn btn-success btn-block BtnRegisInm" type="submit" name="Update">Actualizar <i
                      class="fa fa-edit"></i></button>
                </div>
              </div>



            </div>

          </div>

        </div>

      </div>
    </form>
    <div class="card-footer">
      <div class="row">

        <div class="col">
          <button class="btn btn-primary btn-block toggleBack"><i class="fa fa-arrow-left"></i>
            Anterior</button>
        </div>

        <div class="col-6"></div>

        <div class="col">
          <button class="btn btn-primary btn-block toggleNextBasico">Siguiente <i
              class="fa fa-arrow-right"></i></button>
        </div>

      </div>
    </div>



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

  <script src="../js/Validacion_RInmueble.js"></script>

</body>

</html>