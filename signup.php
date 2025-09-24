<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>

  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="public/sweetalert/sweetalert2.min.css">

  <script src="public/plugins/jquery/jquery.min.js"></script>
  <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


</head>

<body class="hold-transition layout-top-nav vh-100">
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
          <a href="login.php" class="nav-link">INICIAR SESION <i class="fa fa-key"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="row">

    <div class="col container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-md-8 col-lg-6 col-xl-10">
          <div class="card card-primary card-shadow elevation-5 " style="border-radius: 1rem;">

            <div class="card-header p-4 text-center">
              <h1 class="card-title text-lg">Registro de Usuario</h1>
            </div>

            <div class="card-body p-5 text-center">


              <form id="create-login" method="post">

                <h4 class="text-left mb-5">Datos Personales</h4>
                <div class="row">
                  <div class="col-3 form-group mb-4">
                    <label class="form-label" for="type"><i class="fa fa-th"></i> Cédula</label>
                    <input type="text" id="cedula" name="cedula" class="form-control">
                  </div>
                  <div class="col form-group mb-4">
                    <label class="form-label" for="type"><i class="fa fa-user"></i> Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                  </div>

                  <div class="col form-group mb-4">
                    <label class="form-label" for="type"><i class="fa fa-user"></i> Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="col-3 form-group mb-4">
                    <label class="form-label" for="type"><i class="fa fa-user"></i> Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" class="form-control">
                  </div>

                  <div class="col-3 form-group mb-4">
                    <label class="form-label" for="type"><i class="fa fa-user"></i> Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control">
                  </div>

                  <div class="col form-group mb-4">
                    <label class="form-label" for="type"><i class="fa fa-user"></i> Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nac" name="fecha_nac" class="form-control">
                  </div>
                </div>

                <hr>
                <h4 class="text-left mb-3">Datos para el Usuario</h4>

                <div class="row">
                  <div class="col-4 form-group mb-4">
                    <label class="form-label" for="type"><i class="fa fa-user"></i> Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control">
                    <input type="hidden" id="nivel" name="nivel" value="7">
                    <input type="hidden" id="tipo_usuario" name="tipo_usuario" value="1">
                    <input type="hidden" id="RegisUsuario" name="RegisUsuario">
                    <input type="hidden" id="estado" name="estado" value="1">

                  </div>
                </div>

                <div class="row mb-4">
                  <div class="col form-group">
                    <label class="form-label" for="typePasswordX-2"> <i class="fa fa-key"></i>Contraseña</label>
                    <input type="password" id="Passwd" name="Passwd" class="form-control">
                  </div>

                  <div class="col form-group">
                    <label class="form-label" for="typePasswordX-2"> <i class="fa fa-lock"></i> Confirmar
                      Contraseña</label>
                    <input type="password" id="PasswdConfirm" name="PasswdConfirm" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="customCheckbox1" onclick="togglepassword()">
                    <label for="customCheckbox1" class="custom-control-label"><embed>MOSTRAR CONTRASEÑA</embed></label>
                  </div>
                </div>


                <input type="hidden" name="nivel" id="nivel" value="7">

                <div class="row">
                  <div class="col-4 form-group mt-4 mb-4">
                    <label class="form-label" for="type"> Pregunta N°1<i class="fa fa- form-control-lg"></i></label>
                    <select class="form-control select2bs4" id="pregunta1" name="pregunta1" style="width: 100%;">
                      <option value="">Seleccione una Pregunta</option>
                      <option value="1">Cuál es el modelo de su carro favorito ?</option>
                      <option value="2">Cuál es su mascota favorita ?</option>
                      <option value="3">En que ciudad nacio su padre ?</option>
                      <option value="4">Nombre de su primer jefe ?</option>
                      <option value="5">Cuál es el nombre de su abuela materna ?</option>
                      <option value="6">Cuál es su color favorito ?</option>
                    </select>
                    <br>
                    <input type="text" id="repuesta1" name="repuesta1" class="form-control" />
                  </div>

                  <div class="col-4 form-group mt-4 mb-4">
                    <label class="form-label" for="type"> Pregunta N°2<i class="fa fa- form-control-lg"></i></label>
                    <select class="form-control select2bs4" id="pregunta2" name="pregunta2" style="width: 100%;">
                      <option value="">Seleccione una Pregunta</option>
                      <option value="1">Cuál es el modelo de su carro favorito ?</option>
                      <option value="2">Cuál es su mascota favorita ?</option>
                      <option value="3">En que ciudad nacio su padre ?</option>
                      <option value="4">Nombre de su primer jefe ?</option>
                      <option value="5">Cuál es el nombre de su abuela materna ?</option>
                      <option value="6">Cuál es su color favorito ?</option>
                    </select>
                    <br>
                    <input type="text" id="repuesta2" name="repuesta2" class="form-control" />
                  </div>

                  <div class="col-4 form-group mt-4 mb-4">
                    <label class="form-label" for="type"> Pregunta N°3<i class="fa fa- form-control-lg"></i></label>
                    <select class="form-control select2bs4" id="pregunta3" name="pregunta3" style="width: 100%;">
                      <option value="">Seleccione una Pregunta</option>
                      <option value="1">Cuál es el modelo de su carro favorito ?</option>
                      <option value="2">Cuál es su mascota favorita ?</option>
                      <option value="3">En que ciudad nacio su padre ?</option>
                      <option value="4">Nombre de su primer jefe ?</option>
                      <option value="5">Cuál es el nombre de su abuela materna ?</option>
                      <option value="6">Cuál es su color favorito ?</option>
                    </select>
                    <br>
                    <input type="text" id="repuesta3" name="repuesta3" class="form-control" />
                  </div>
                </div>
                <hr>
                <div class="row">

                  <div class="col">
                    <a class="btn btn-danger btn-lg btn-block" href="#" onclick="window.history.back()"><i
                        class="fa fa-arrow-left"></i> Regresar </a>
                  </div>

                  <div class="col"></div>

                  <div class="col">
                    <button class="btn btn-success btn-lg btn-block" type="submit" name="submit"
                      id="btn_login">Registrarse <i class="fa fa-check"></i></button>
                  </div>

                </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </form>

  </div>

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

<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>

<!-- jquery-validation -->
<script src="public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="public/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="public/sweetalert/sweetalert2.min.js"></script>
<script src="js/Validacion_RUsuario.js"></script>
<script src="js/functions.js"></script>
</html>