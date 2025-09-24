<?php
require_once 'php/Model/ModeloUsuario.php';
require_once 'php/Controller/ControlerSesion.php';
$session = new ControlerSession();
$usuario = $session->SesionActiva();

require "php/Model/ModeloMoneda.php";
$moneda = new ModeloMoneda;

require 'php/Model/ModeloDoc.php';
$DocM = new ModeloDoc();

require 'php/Model/ModeloNotif.php';
$notificacion = new NotifiModelo();

date_default_timezone_set('America/Caracas');

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Catastro</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="../public/images/images.png" />
  <link rel="stylesheet" href="public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="public/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="public/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="public/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="public/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="public/plugins/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="hold-transition layout-top-nav">

  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">

      <li class="d-flex justify-content-center align-items-center">
        <a href="#" onclick="window.history.back()"><button class="btn btn-danger"><i class="fa fa-arrow-left"></i>
            Regresar</button></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="registrados.php" class="nav-link"><i class="fa fa-home"></i> Menu Principal</a>
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

        <a class="nav-link" data-toggle="dropdown" href="registrados.php">
          <i class="bi bi-person-circle" style="font-size: 20px;"></i>
          <?php echo $usuario["usuario"]; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

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
  <div class="content-wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" style="border-radius: 1rem" src="public/images/images.png" alt="AdminLTELogo"
        height="200" width="200">
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="card card-shadow elevation-5 card-primary m-5">
          <div class="card-header ">

            <div class="card-title">
              <i class="fa fa-user "></i> Perfil del Usuario
            </div>

          </div>
          <div class="card-body">
            <div class="mt-5 row">
              <div class="col">
                <div class="row">
                  <!--datos del usuario-->
                  <div class="col">
                    <div class="form-group">
                      <label for="dia">Nombre de usuario</label>
                      <input type="text" class="form-control" name="dia" id="dia"
                        value="<?php echo $usuario["usuario"]; ?>" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="hora">Contraseña</label>
                      <input type="password" class="form-control" name="hora" id="hora"
                        value="<?php echo "V-" . $usuario["id_usuario"]; ?>" readonly>
                    </div>
                  </div>
                </div>
                <hr>
                <div id="perfil_readonly" style="display:block;">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="dia">Nombre completo</label>
                        <input type="text" class="form-control" name="dia" id="dia" value="<?php echo $usuario["nombre"] . " " . $usuario["apellido"];
                        ; ?>" readonly>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="hora">Cedula</label>
                        <input type="text" class="form-control" name="hora" id="hora"
                          value="<?php echo "V-" . $usuario["id_usuario"]; ?>" readonly>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="hora">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" name="hora" id="hora"
                          value="<?php echo $usuario["fecha_nacimiento"]; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="hora">Direccion</label>
                        <input type="text" class="form-control" name="hora" id="hora"
                          value="<?php echo $usuario["direccion"]; ?>" readonly>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label for="hora">Correo electrónico</label>
                        <input type="text" class="form-control" name="hora" id="hora"
                          value="<?php echo $usuario["correo"]; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <button onclick="mostrarActualizar()" class='btn btn-primary btn-block'>
                    <i class='fa fa-edit'></i> Editar
                  </button>

                </div>

                <div id="perfil" style="display:none;">
                  <form id="UpdateUsuario" method="post">
                    <div class="row">

                      <div class="col">
                        <div class="form-group">
                          <label for="dia">Nombre completo</label>
                          <input type="text" class="form-control" name="dia" id="dia"
                            value="<?php echo $usuario["nombre"]; ?>" readonly>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="dia">Apellido completo</label>
                          <input type="text" class="form-control" name="dia" id="dia"
                            value="<?php echo $usuario["apellido"]; ?>" readonly>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="numero">Cedula</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">V-</span>
                            </div>
                            <input type="text" class="form-control" name="cedula" id="cedula"
                              data-inputmask='"mask": "99.999.999"' data-mask
                              value="<?php echo $usuario["id_usuario"]; ?>" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group">
                          <label for="hora">Fecha de Nacimiento</label>
                          <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="<?php echo $usuario["fecha_nacimiento"]; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="hora">Direccion</label>
                          <input type="text" class="form-control" name="direccion" id="direccion"
                            value="<?php echo $usuario["direccion"]; ?>">
                        </div>
                      </div>

                      <input type="hidden" name="UpdateUsuario" id="UpdateUsuario">

                      <div class="col">
                        <div class="form-group">
                          <label for="hora">Correo electrónico</label>
                          <input type="text" class="form-control" name="correo" id="correo"
                            value="<?php echo $usuario["correo"]; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col">
                        <button type="button" onclick="mostrarCancelar()" class='btn btn-danger btn-block'>
                          <i class='bi bi-x-circle'></i> Cancelar
                        </button>
                      </div>
                      <div class="col">
                        <button type="submit" class='btn btn-success btn-block'>
                          <i class='fa fa-edit'></i> Actualizar
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <hr>

              <div class="col">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Inmueble(s) </th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $DocM->buscar_archivos_inmuebles($usuario["id_usuario"]);

                    ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Inmueble(s) </th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.</strong>
  </footer>

  </div>

  <!-- jQuery -->
  <script src="public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="public/dist/js/adminlte.min.js"></script>

  <script src="public/sweetalert/sweetalert2.js"></script>
  <script src="public/sweetalert/sweetalert2.all.min.js"></script>

  <!-- InputMask -->
  <script src="public/plugins/moment/moment.min.js"></script>
  <script src="public/plugins/inputmask/jquery.inputmask.min.js"></script>

  <!-- Sparkline -->
  <script src="public/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="public/plugins/fullcalendar/main.min.js"></script>

  <script src="public/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="public/plugins/jquery-validation/additional-methods.min.js"></script>

  <script src="js/Validacion_UpPerfil.js"></script>

  <script>

    var Citas = <?php echo $citas_json; ?>;

    let CerrarSesion = {
      UrlControl: 'php/Controller/ControlerSesion.php',
      UrlReturn: 'login.php',
      Formulario: document.getElementById("CerrarSession"),
    };


  </script>

  <script src="js/session.js"></script>
  <script src="js/Functions.js"></script>
</body>

</html>