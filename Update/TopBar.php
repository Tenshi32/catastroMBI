<?php


require_once '../php/Model/ModeloUsuario.php';
require_once '../php/Controller/ControlerSesion.php';
$session = new ControlerSession();
$usuario = $session->SesionActiva();

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catastro</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="../public/images/images.png" />

  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../public/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../public/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../public/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../public/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="../public/plugins/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">
</head>

<body class="hold-transition layout-top-nav">

  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class=" d-flex justify-content-center align-items-center">
        <a href="#" onclick="window.history.back()"><button class="btn btn-danger"><i class="fa fa-arrow-left"></i>
            Regresar</button></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../registrados.php" class="nav-link"><i class="fa fa-home"></i> Menu Principal</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item mt-2">
        <a class="nav-link" data-slide="true" href="#" role="button">
          <div id="tu-contenedor"></div>
        </a>
      </li>

      <li class="nav-item dropdown m-1">

        <a class="nav-link" data-toggle="dropdown" href="../registrados.php">
          <i class="bi bi-person-circle" style="font-size: 20px;"></i>
          <?php echo $usuario["usuario"]; ?>
        </a>
        
      </li>

    </ul>
  </nav>


</body>

<script src="../public/plugins/jquery/jquery.min.js"></script>
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/dist/js/adminlte.min.js"></script>
<script src="../public/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="../public/plugins/moment/moment.min.js"></script>
<script src="../public/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="../public/sweetalert/sweetalert2.js"></script>
<script src="../public/sweetalert/sweetalert2.all.min.js"></script>
<script src="../public/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="../public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../public/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../public/plugins/select2/js/select2.full.min.js"></script>
<script src="../js/session.js"></script>
<script src="../js/TopBar.js"></script>

</html>