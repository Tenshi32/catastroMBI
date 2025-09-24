<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>

  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../../public/sweetalert/sweetalert2.min.css">

  <script src="../../public/plugins/jquery/jquery.min.js"></script>
  <script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


</head>

<body class="hold-transition layout-top-nav vh-100">
  <!--Cintillo del Gobierno-->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

    <div class="ml-3 d-flex justify-content-left align-items-left h-100">
      <img src="../../public/images/GBV2.jpeg" class="img-fluid" width="70">
    </div>
    <div class="col-2 d-flex justify-content-left align-items-left h-100">
      <h5 class="mt-1">Gobierno <strong>Bolivariano</strong> de Venezuela </h5>
    </div>

    <img src="linea_vertical.png" style="width: 3px; height: 50px; background-color: gray;">

    <div class="col-2 d-flex justify-content-left align-items-left h-100">
      <h5 class="mt-1">Gobierno <strong>Bolivariano</strong> de Aragua </h5>
    </div>

    <img src="../../linea_vertical.png" style="width: 3px; height: 50px; background-color: gray;">

    <div class="col-2 d-flex justify-content-left align-items-left h-100">
      <h5 class="mt-1">Alcaldía del <strong>Municipio</strong> Mario Briceño Irragorry </h5>
    </div>

    <div class="col"></div>

    <div class="d-flex justify-content-right align-items-right h-100">
      <img src="../../public/images/200BC.png" class="img-fluid mr-2" width="200">
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
          <a href="login.php" class="nav-link">INICIAR SESION <i class="fa fa-key"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-3 mt-md-4 pb-5">
                <form action="" method="post" id="UnlockUsuario">
                  <h2 class="fw-bold mb-2 ">Desbloqueo de Usuario</h2>
                  <p class="text-white-50 mb-5">Indique su nombre de usuario</p>
                  <div class="form-outline form-white mb-4">
                    <br>
                    <div class="form-group">
                      <label class="form-label" for="type">Usuario</label>

                      <input type="text" name="usuario" id="usuario"
                        class="form-control bg-dark">
                      </div>
                      <input type="hidden" name="UnlockUser" id="UnlockUser">
                  </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit" id="btn_login">Enviar</button>
                  <a class="btn btn-outline-light btn-lg px-5" href="../../login.php" id="btn_login">Volver</a>

              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

<footer class="main-footer text-white" style="background-color: #183C1A;">
  <div class="row">
    <div class="col ml-5 mt-5 mr-5">

      <h5>
        <p>Dirección</p>
        <p>Calle Leonardo Ruiz Pineda, Edif. 30-1, Urb. Las Mayas, El Limón, Edo. Aragua, Zona Postal 2105</p>
        <br>
        <p>RIF: G200029897</p>
      </h5>

      <div class="row ml-5 mt-5">
        <button type="button" class="btn btn-lg btn-primary"><i class="fab fa-facebook-f"></i></button>
        <button type="button" class="btn btn-lg btn-primary ml-2"><i class="fab fa-twitter"></i></button>
        <button type="button" class="btn btn-lg btn-primary ml-2"><i class="fab fa-instagram"></i></button>
      </div>

    </div>

    <div class="col">
      <!-- To the right -->
      <div class="justify-content-right align-items-right d-none d-sm-inline">

        <div class="row m-3">
          <div class="col-3">
            <h5>

              <div class="col"><strong>Noticias</strong></div>

              <div class="col mt-3">POLITICA Y SEGURIDAD</div>
              <div class="col mt-3">OBRAS Y SERVICIOS</div>
              <div class="col mt-3">ECONOMIA Y PRODUCTIVA</div>
              <div class="col mt-3">HUMANO Y SOCIAL</div>
              <div class="col mt-3">HISTORICO Y CULTURAL</div>

            </h5>
          </div>

          <div class="col-3 ml-5">
            <h5>

              <div class="col"><strong>Navegación</strong></div>

              <div class="col mt-3">INICIO</div>
              <div class="col mt-3">QUIENES SOMOS</div>
              <div class="col mt-3">DESCARGAS</div>
              <div class="col mt-3">NOTICIAS</div>
              <div class="col mt-3">GALERIA</div>
              <div class="col mt-3">CONSEJOS COMUNALES</div>
              <div class="col mt-3">CONTACTO</div>

            </h5>
          </div>

          <div class="col-3 ml-5">
            <h5>
              <div class="col"><strong>Enlaces de interés</strong></div>


              <div class="col mt-3">GOBERNACIÓN DE ARAGUA</div>
              <div class="col mt-3">INSAJUV</div>
              <div class="col mt-3">CORPOSALUD</div>
              <div class="col mt-3">SETA</div>
              <div class="col mt-3">SENIAT</div>
              <div class="col mt-3">SACS</div>

            </h5>
          </div>
        </div>

        <center>
          <h3><strong>!Pueblo Organizado y Consciente!</strong></h3>
        </center>
      </div>
    </div>
  </div>
  <br>
  <br>
  <!-- Default to the left -->
  <center><strong> &copy; 2024 Alcaldía de Mario Briceño Iragorry – Todos los derechos reservados.</strong></center>
  <br>

</footer>

<script src="../../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>

<script src="../../public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../public/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../../public/sweetalert/sweetalert2.js"></script>
<script src="../../public/sweetalert/sweetalert2.all.min.js"></script>

<script src="../../js/Validacion_UnlockUsuario.js"></script>

</html>