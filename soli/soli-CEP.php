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
            <h1 class="card-title text-lg">Cambio de Estructura Parcelaria</h1>
        </div>
        <span class="m-3 text-danger">Campos Obligatorios (*)</span>

        <form method="post" id="Soli-CEP" enctype="multipart/form-data">

            <div class="card-body">

                <?php

                $var->CodigoAcciones($usuario['id_usuario']);

                ?>

                <hr>
                <p><strong>Datos de la Solicitud de Cambio de Estructura Parcelaria</strong></p>
                <label class=" text-danger">Maximo Peso de Documentos 1MB.</label>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Inmueble</label>
                            <select name="inmueble" id="inmueble" class="form-control select2 select2-danger"
                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="">--Seleccione un Inmueble--</option>
                                <?php

                                $select->DatosInmueblePropietario($usuario['id_usuario'], 1);

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
                                    <input type="file" class="custom-file-input" id="doc_propiedad"
                                        name="doc_propiedad">
                                    <label class="custom-file-label" for="titulo_supletorio"></label>
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
                                    <label>Estado Civil </label><br>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input type="radio" id="Casado" name="estado_civil" value="casado(a)"
                                            onchange="mostrarEstadoCivil()">
                                        <label for="Casado">
                                            Casado(a)
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input type="radio" id="Soltero" name="estado_civil" value="soltero(a)"
                                            onchange="mostrarEstadoCivil()">
                                        <label for="Soltero">
                                            Soltero(a)
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input type="radio" id="Viudo" name="estado_civil" value="viudo(a)"
                                            onchange="mostrarEstadoCivil()">
                                        <label for="Viudo">
                                            Viudo(a)
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input type="radio" id="Divorciado" name="estado_civil" value="divorciado(a)"
                                            onchange="mostrarEstadoCivil()">
                                        <label for="Divorciado">
                                            Divorciado(a)
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>En caso de que el propietario halla fallecido, posee Declaracion
                                        Sucesoral?</label><br>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input type="radio" id="si" name="doc_declaracion" value="si"
                                            onchange="mostrarDeclaracionSucesoral()">
                                        <label for="si">
                                            Si
                                        </label>
                                    </div>
                                    <div class="icheck-primary d-inline mr-2">
                                        <input type="radio" id="no" name="doc_declaracion" value="no"
                                            onchange="mostrarDeclaracionSucesoral()">
                                        <label for="no">
                                            No
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <p><strong>Datos de Constancia de Residencia</strong></p>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>*Nombre del Concejo Comunal</label>
                            <input type="text" class="form-control" id="nombre_cc" name="nombre_cc">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>*Dirección del Concejo Comunal</label>
                            <input type="text" class="form-control" id="direccion_cc" name="direccion_cc">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>*Tlfn del Lider del Concejo Comunal</label>
                            <input type="text" class="form-control" id="telefono_cc" name="telefono_cc">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>*Fecha de Emision</label>
                            <input type="date" class="form-control" id="fecha_emision" name="fecha_emision">
                        </div>
                    </div>

                </div>


                <div id="ActaMatrimonio" style="display: none;">
                    <hr>
                    <p><strong>Datos de Acta de Matrimonio</strong></p>
                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label>*Folio</label>
                                <input type="text" class="form-control" id="folio_AM" name="folio_AM">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>*Tomo</label>
                                <input type="text" class="form-control" id="tomo_AM" name="tomo_AM">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>*Nº de Acta</label>
                                <input type="text" class="form-control" id="n_acta_AM" name="n_acta_AM">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>*Fecha del Acta</label>
                                <input type="text" class="form-control" id="fecha_acta_AM" name="fecha_acta_AM">
                            </div>
                        </div>

                    </div>
                </div>

                <div id="SetenciaDivorcio" style="display: none;">
                    <hr>
                    <p><strong>Datos de Sentencia de Divorcio</strong></p>
                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label>*Folio</label>
                                <input type="text" class="form-control" id="folio_SD" name="folio_SD">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>*Tomo</label>
                                <input type="text" class="form-control" id="tomo_SD" name="tomo_SD">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>*Nº de Acta</label>
                                <input type="text" class="form-control" id="n_acta_SD" name="n_acta_SD">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>*Fecha del Acta</label>
                                <input type="text" class="form-control" id="fecha_acta_SD" name="fecha_acta_SD">
                            </div>
                        </div>

                    </div>
                </div>

                <div id="DeclaracionSucesoral" style="display: none;">
                    <hr>
                    <p><strong>Datos de Declaración Sucesoral</strong></p>
                    <div class="row">

                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>*RIF Sucesoral</label>
                                        <input type="text" class="form-control" id="rif_DS" name="rif_DS">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>*Fecha de la Declaración</label>
                                        <input type="text" class="form-control" id="fecha_DS" name="fecha_DS">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>*Descripcion de la Sucesión</label>
                                <textarea name="descripcion_DS" id="descripcion_DS" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
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
                        <button class="btn btn-success btn-lg btn-block" type="submit" name="submit"
                            id="btn_login">Registrar <i class="fa fa-check"></i></button>
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

<script src="../js/Validacion_SRTT.js"></script>

</html>