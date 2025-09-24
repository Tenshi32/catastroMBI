<?php

require_once '../../php/Model/ModeloUsuario.php';
require_once '../../php/Controller/ControlerSesion.php';
$session = new ControlerSession();

$usuario = $session->SesionActiva();

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catastro</title>

  <link rel="Shortcut Icon" type="image/x-icon" href="../../public/images/images.png"/>
  <link rel="stylesheet" href="../../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="../../public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../public/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../public/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../public/plugins/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">


</head>

<body class="hold-transition layout-top-nav">

  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class=" d-flex justify-content-center align-items-center">
        <a href="../../registrados.php"><button class="btn btn-danger"><i class="fa fa-arrow-left"></i>
            Regresar</button></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../registrados.php" class="nav-link"> <i class="fa fa-home"></i> Menu Principal</a>
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

        <a class="nav-link" data-toggle="dropdown">
          <i class="bi bi-person-circle" style="font-size: 20px;"></i>
          <?php echo $usuario['usuario']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <a href="../../perfil.php" class="dropdown-item"><i class="fas fa-user"></i> Perfíl
          </a>
          <div class="dropdown-divider"></div>
          <button class="dropdown-item" id="cerrar">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
          </button>
        </div>
      </li>

    </ul>
  </nav>

  <center>
    <h3 class="mr-3">
      <span class="badge badge-light mt-3">
        <i class="bi bi-clock"></i>
      </span>
      <span class="badge badge-warning mt-3">
        <div id="reloj"></div>
      </span>
    </h3>
  </center>

</body>

<script src="../../public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../public/plugins/jszip/jszip.min.js"></script>
<script src="../../public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jQuery -->

<!-- Bootstrap 4 -->
<script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>
<script src="../../public/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- InputMask -->
<script src="../../public/plugins/moment/moment.min.js"></script>
<script src="../../public/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- jquery-validation -->
<script src="../../public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../public/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="../../public/sweetalert/sweetalert2.js"></script>
<script src="../../public/sweetalert/sweetalert2.all.min.js"></script>
<!-- Select2 -->
<script src="../../public/plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>


<script>

  let CerrarSesion = {
    UrlControl: '../../php/Controller/ControlerSesion.php',
    UrlReturn: '../../login.php',
    Formulario: document.getElementById("CerrarSession"),
  };

</script>

<script src="../../js/session.js"></script>
<script src="../../js/Functions.js"></script>

</html>