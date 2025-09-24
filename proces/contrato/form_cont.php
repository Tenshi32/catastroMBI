<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

require_once "../TopBar.php";

require_once '../../php/Model/ModeloInmueble.php';
require_once '../../php/Model/ModeloContrato.php';
require_once '../../php/Controller/ControlerContrato.php';
$contrato = new ControlerContrato();

date_default_timezone_set('America/Caracas');

$datos = unserialize($_POST['datos']);

?>

<body>

    <div class="card card-primary m-5">
        <div class="card-header">
            <h3 class="card-title"><i class="bi bi-currency-dollar"></i> CONTRATO COMPRA - VENTA</h3>
        </div>
        <div class="card-body">

            <span class="m-3 text-danger">Campos Obligatorios (*)</span>
            <form method="post" id="PContrato" enctype="multipart/form-data">
                <hr>

                <div class="row">

                    <?php

                    $var->CodigoAcciones($datos['id_usuario']);

                    ?>
                    <div class="row p-4">
                        <?php

                        $contrato->ModalInfoContrato($datos['id_direccion_inmueble']);

                        ?>
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-group">
                        <label for="tipo">*Fecha a Otorgar:</label>
                        <input type="date" class="form-control" name="fecha_otorgada" id="fecha_otorgada">
                        <input type="hidden" name="tipo_contrato" id="tipo_contrato"
                            value="<?php echo $datos['id_tipo_contrato'] ?>">

                        <input type="hidden" name="id_contrato" id="id_contrato"
                            value="<?php echo $datos['id_contrato'] ?>">

                        <input type="hidden" name="id_inmueble" id="id_inmueble"
                            value="<?php echo $datos['id_inmueble'] ?>">

                        <input type="hidden" name="actor2" id="actor2"
                            value="<?php echo $datos['cedula_actor'] ?>">

                        <input type="hidden" name="RegisContrato" id="RegisContrato">
                    </div>
                </div>

                <div id="contratocompraventaForm" style="display: none;">
                    <hr>
                    <p><strong>COMPRA - VENTA</strong></p>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">Registro Autorizado</label>
                                <input type="text" class="form-control" name="registro_autorizado"
                                    id="registro_autorizado"
                                    placeholder="Registro inmobiliario segundo(C.C.GALERIA PLAZA)" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">Arancele / timbre Fiscal (SETA)</label>
                                <input type="text" class="form-control" name="timbre_fiscal" id="timbre_fiscal"
                                    placeholder="2,5% DEL VALOR DE BIEN INMUEBLE(C.C.GALERIA PLAZA)" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">*Monto a Pagar:</label>
                                <input type="text" class="form-control" name="Monto_pago" id="Monto_pago">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputFile">*Carga de Recibo de Pago</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="recibo_pago_pdf"
                                            name="recibo_pago_pdf">
                                        <label class="custom-file-label" for="exampleInputFile">Cargue el
                                            Documento...</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="contratoarrendamientoForm" style="display: none;">
                    <hr>
                    <p><strong>Ente Arrendador</strong></p>
                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">Cuotas de Arrendamiento</label>
                                <input type="text" class="form-control" name="cuotas" id="cuotas">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">Periodo de restriccion*:</label>
                                <input type="text" class="form-control" name="periodo_r" id="periodo_r">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">Clausulas/Gravamenes*:</label>
                                <select class="select2" id="clausulas" name="clausulas"
                                    onchange="multiSelect(Clausula)" data-placeholder="Seleccione el motivo.."
                                    style="width: 100%;" multiple>
                                    <option value="">Seleccion de Clausulas</option>
                                    <?php

                                    $select->SelectBasic("tipo_clausula");

                                    ?>
                                </select>
                                <input type="hidden" id="clausulas_codigo" name="clausulas_codigo">
                                <input type="hidden" id="clausulas_texto" name="clausulas_texto">
                                <input type="hidden" id="clausulas_cantidad" name="clausulas_cantidad">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">Valor Nominal del Inmueble*:</label>
                                <input type="text" class="form-control" name="v_inmueble" id="v_inmueble">
                            </div>
                        </div>

                    </div>
                </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button class="btn btn-success" type="submit">Registrar
                <i class="fa fa-check"></i></button>
            <button class="btn btn-warning" type="reset">Limpiar
                <i class="bi bi-arrow-clockwise fa-lg"></i></button>
        </div>
    </div>
    </form>

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

<script src="../../js/Validacion_PContrato.js"></script>

</html>