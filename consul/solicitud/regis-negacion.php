<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../public/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../public/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../public/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">

</head>
<?php

require "../TopBar.php";

$datos = unserialize($_POST['datos']);

?>
<body class="hold-transition sidebar-mini">

    <!-- general form elements -->
    <div class="card card-danger m-5">
      <div class="card-header">
        <h1 class="card-title text-lg">Negacion de la Solicitud de la Cita</h1>
      </div>
        <span class="m-3 text-danger">Campos Obligatorios (*)</span>
      <form method="post" id="NegarSoli">

        <div class="card-body">

          
			    <div class="row">
			    	<div class="col-3">
			    	  <div class="form-group">
			    		<label for="nombre">Codigo de la Cita</label>
			    		<input type="text" class="form-control" value="CS-<?php echo $datos['id_solicitud']; ?>" readonly>
			    		<input type="hidden" class="form-control" name="codigo" id="codigo" value="<?php echo $datos['id_solicitud']; ?>" readonly>
			    		<input type="hidden" class="form-control" name="id_funcionario" id="id_funcionario" value="<?php echo $usuario['id_usuario']; ?>" readonly>
			    		<input type="hidden" class="form-control" name="fecha" id="fecha" value="<?php date("d-m-y"); ?>" readonly>
			    		<input type="hidden" class="form-control" name="estado_solicitud" id="estado_solicitud" value="3" readonly>
			    		<input type="hidden" class="form-control" name="NegarSoli" id="NegarSoli" >
			    	  </div>
			    	</div>
			    </div>


          <div class="row">
						<div class="col-5">
						  <div class="form-group">
							<label for="nombre">Propietraio</label>
							<input type="text" class="form-control" value="<?php echo $datos['nombre_usuario'] ." ". $datos['apellido_usuario']; ?>" readonly>
						  </div>
						</div>
				
						<div class="col-3">
						  <div class="form-group">
							<label for="nombre">Cedula</label>
							<input type="text" class="form-control" placeholder="Ingrese el nombre..." value="CI: <?php echo $datos['id_usuario']; ?>" 	readonly>
							<input type="hidden" class="form-control" name="cedula_propietario" id="cedula_propietario" value="<?php $datos['id_usuario']; ?>" readonly>
						  </div>
						</div>

            <div class="col-3">
						  <div class="form-group">
							<label for="nombre">Fecha de la Solicitud</label>
							<input type="text" class="form-control" value="<?php echo $datos['fecha_solicitud']; ?>" 	readonly>
						  </div>
						</div>

					</div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="direccion">*Razon de la Negacion de la solicitud</label>
                <textarea name="razon_negacion" id="razon_negacion" class="form-control"></textarea>
              </div>
            </div>
          </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary" id="btn-producto">Enviar</button>
        </div>
      </form>
    </div>

      <!-- /.card-body -->
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

<script src="../../js/Validacion_NegarSoli.js"></script>

</body>
</html>
