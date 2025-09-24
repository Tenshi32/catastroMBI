<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesion</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="public/images/images.png" />

  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <link href="public/sweetalert/sweetalert2.css" rel="stylesheet">
  <link rel="stylesheet" href="public/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="public/css/s.css">

</head>
<?php

session_start();

if (isset($_SESSION['token'])) {
  header("Location: registrados.php");
}

?>

<body class="hold-transition layout-top-nav" style="background-color: #00000;">
  <!--Cintillo del Gobierno-->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

    <div class="ml-3 d-flex justify-content-left align-items-left h-100">
      <img src="public/images/GBV2.jpeg" class="img-fluid" width="70">
    </div>
    <div class="col-2 d-flex justify-content-left align-items-left h-100">
      <h5 class="mt-1">Gobierno <strong>Bolivariano</strong> de Venezuela </h5>
    </div>

    <img src="linea_vertical.png" style="width: 3px; height: 50px; background-color: gray;">

    <div class="col-2 d-flex justify-content-left align-items-left h-100">
      <h5 class="mt-1">Gobierno <strong>Bolivariano</strong> de Aragua </h5>
    </div>

    <img src="linea_vertical.png" style="width: 3px; height: 50px; background-color: gray;">

    <div class="col-2 d-flex justify-content-left align-items-left h-100">
      <h5 class="mt-1">Alcaldía del <strong>Municipio</strong> Mario Briceño Irragorry </h5>
    </div>

    <div class="col"></div>

    <div class="d-flex justify-content-right align-items-right h-100">
      <img src="public/images/200BC.png" class="img-fluid mr-2" width="200">
    </div>

  </nav>

  <!--Topbar de Navegacion-->
  <nav class="main-header navbar navbar-expand-md navbar-blue navbar-white">
    <div class="col-1"></div>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="home.php" class="nav-link">INICIO <i class="fa fa-home"></i></a>
        </li>

        <li class="nav-item">
          <a href="signup.php" class="nav-link">REGITRARSE <i class="fa fa-user-plus"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <section class="vh-90">
    <div class="container mb-5 mt-5 h-90">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-widget card-shadow elevation-5 text-blue" style="border-radius: 1rem; opacity: .95">
            <div class="card-body p-4 text-center">

              <div class="row">

                <div class="col">

                  <div class="row justify-content-center align-items-center">
                    <div class="col mt-1">

                      <img src="public/images/images.png" class="img-fluid" width="200" height="200">


                      <h2 class="fw-bold mb-4">INICIO DE SESIÓN</h2>

                    </div>
                  </div>

                  <div class="m-3">
                    <form method="post" id="CreateLogin">

                      <input type="hidden" name="InicioSesion">

                      <div class="row justify-content-center align-items-center">
                        <div class="col">
                          <p class="m-4">Por favor introducir Usuario y Contraseña!</p>
                          <div class="mb-4">
                            <div class="form-group">
                              <label>Usuario</label>
                              <input type="text" name="usuario" class="form-control" require>
                            </div>
                          </div>

                          <div class="mb-4">
                            <div class="form-group">
                              <label>Contraseña</label>
                              <input type="password" name="Passwd" class="form-control" require>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row justify-content-center align-items-center">
                        <button class="btn btn-outline-primary btn-lg px-5" type="submit" id="btn_login">INICIAR
                          SESION</button>
                      </div>
                    </form>
                  </div>


                </div>

                <div class="col-1"></div>

                <div class="col-4">

                  <div class="row">
                    <div class="col-lg ml-5 mt-5">
                      <!-- small card -->
                      <a href="signup.php">
                        <div class="small-box bg-primary">
                          <div class="inner">

                            <h4 class="m-4">¿Eres Nuevo ?</h4>

                          </div>
                          <div class="icon">
                            <i class="fas fa-user-plus"></i>
                          </div>
                          <div class="p-3 small-box-footer">
                            <h5>Regístrate aquí <i class="fas fa-arrow-circle-right"></i></h5>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg ml-5 mt-3">
                      <!-- small card -->
                      <div class="small-box bg-green">
                        <div class="inner">

                          <h4 class="m-4">¿Olvidó Contraseña?</h4>

                        </div>
                        <div class="icon">
                          <i class="fas fa-cogs"></i>
                        </div>
                        <a href="restar/TogglePass/ToggleFirts.php" class="p-3 small-box-footer">
                          <h5>Restrablecer aquí <i class="fas fa-arrow-circle-right"></i></h5>
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg ml-5 mt-3">
                      <!-- small card -->
                      <div class="small-box bg-danger">
                        <div class="inner">

                          <h4 class="m-4">¿Bloqueó su
                            usuario?</h4>

                        </div>
                        <div class="icon">
                          <i class="fas fa-unlock"></i>
                        </div>
                        <a href="restar/Unlock/UnlockFirts.php" class="p-3 small-box-footer">
                          <h5>Desbloquear aquí <i class="fas fa-arrow-circle-right"></i></h5>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>
  </section>
  </div>

  </div>

</body>
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Anything you want
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2020 -
    <?= date("Y"); ?> <a class="text-primary">Catastro Mario Briceño Iragorry</a>.
  </strong>
</footer>

<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
<script src="public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="public/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="public/sweetalert/sweetalert2.js"></script>
<script src="public/sweetalert/sweetalert2.all.min.js"></script>
<script src="js/Validacion_Login.js"></script>
<script src="js/Functions.js"></script>

<script>

</script>

</html>
