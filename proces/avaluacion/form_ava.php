<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php

require_once "../TopBar.php";

require_once '../../php/Model/ModeloInmueble.php';
require_once '../../php/Model/ModeloAvaluacion.php';
$tabuladores = new Tabulacion();

require_once '../../php/Model/ModeloInspeccion.php';
require_once '../../php/controller/ControlerAvaluo.php';
$Avaluo = new ControlerAvaluo();

date_default_timezone_set('America/Caracas');

$datos = unserialize($_POST['datos']);

?>

<body>

  <div class="card card-primary m-5">
    <div class="card-header">
      <h3 class="card-title"><i class="bi bi-currency-dollar"></i> Avaluo</h3>
    </div>
    <div class="card-body" id="soli-ets">

      <span class="m-3 text-danger">Campos Obligatorios (*)</span>
      <form method="post" id="ProceAvaluo">
        <hr>

        <div class="row">
          <?php

          $var->CodigoAcciones($datos['id_propietario']);
          ?>


          <div class="row p-4">
            <?php
            $Avaluo->ModalInfoAvaluo($datos['id_direccion_inmueble']);
            ?>
          </div>

          <input type="hidden" class="form-control" id="clase_inmueble" value="<?php echo $datos['clase_inmueble']; ?>">
        </div>



        <h5 class="m-3">Valoracion Económica del Terreno</h5>
        <hr>

        <div class="row">

          <div class="col">
            <div class="form-group">
              <label for="tipo"> *Tipología Del Terreno</label>
              <select class="form-control" name="TipologiaTerreno" id="TipologiaTerreno">
                <option value="">--Seleccionar la Tipología--</option>
                <?php
                $select->DatosSizeTerreno($datos['superficie_t']);
                ?>
              </select>

            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="tipo">Alicuota Anual Terreno (%)</label>
              <?php

              $tabuladores->AlicuotaAnualTerreno($datos['clase_inmueble']);

              ?>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col">
            <div class="form-group">
              <label for="tipo"> *Edad Efectiva</label>
              <input type="text" class="form-control" id="edad_efectiva" name="edad_efectiva">
            </div>
          </div>

          <input type="hidden" id="RegisAvaluo" name="RegisAvaluo">
          <input type="hidden" id="FactorTerreno" name="FactorTerreno">
          <input type="hidden" id="FactorConstruccion" name="FactorConstruccion">
          <input type="hidden" id="id_funcionario" name="id_funcionario" value="<?php echo $usuario["id_usuario"]; ?>">
          <input type="hidden" name="estado_inmueble" id="estado_inmueble" value="4">
          
          <div class="col">
            <div class="form-group">
              <label for="tipo"> *% de Refacción</label>
              <select class="form-control" id="refaccion" name="refaccion">
                <option value="">--Seleccionar el % de Refacción--</option>
                <?php
                $select->SelectBasic("tipo_porcentaje");
                ?>
              </select>
            </div>
          </div>

        </div>

        <h5 class="m-3">Valoracion Económica de la Construcción</h5>

        <hr>

        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="tipo"> *Tipología de la Construcción</label>
              <select class="form-control" name="TipologiaConstruccion" id="TipologiaConstruccion">
                <option value="">--Seleccionar la Tipología--</option>
                <?php
                $select->DatosTipoTipologia();
                ?>
              </select>

            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="tipo">*% Depresiación</label>
              <select class="form-control" name="depresiacion" id="depresiacion">
                <option value="">--Seleccionar el % Depresiación--</option>
                <?php
                $select->SelectBasic("tipo_porcentaje");
                ?>
              </select>
            </div>
          </div>

          <div class="col">
            <div class="form-group">
              <label for="tipo">Alicuota Anual Construcción (%)</label>
              <?php
              $tabuladores->AlicuotaAnualConstruccion($datos['clase_inmueble']);
              ?>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="form-group">
            <label for="tipo">*Observaciones</label>
            <textarea class="form-control" name="observacion_avaluo" id="observacion_avaluo" cols="30"
              rows="8"></textarea>
          </div>
        </div>


    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button class="btn btn-success BtnProceAvaluo" type="submit" name="btn-avaluo" id="btn-avaluo">Registrar
        <i class="fa fa-check"></i></button>

      <button class="btn btn-warning BtnProceAvaluo" type="reset" name="btn-avaluo" id="btn-avaluo">Limpiar
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
  <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.</strong>
</footer>

<script src="../../js/Validacion_PAvaluo.js"></script>

</html>