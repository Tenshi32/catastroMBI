<!DOCTYPE html>
<html lang="es">

<head>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../../public/sweetalert/sweetalert2.min.css">

  <script src="../../public/plugins/jquery/jquery.min.js"></script>
  <script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<?php
session_start();
?>

<body>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-3 mt-md-4">
                <form action="" method="post" id="ToggleQuest">
                  <h2 class="fw-bold mb-2 ">Desbloqueo de Usuario </h2>
                  <h3 class="fw-bold mb-2 "> Usuario <?php echo $_SESSION["unlock"]["usuario"] ?></h3>
                  <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["unlock"]["userId"] ?>">

                  <br>
                  <div class="form-group">
                    <label class="form-label" for="type"><?php echo $_SESSION["unlock"]["pregunta1"] ?></label>

                    <input type="text" name="respuesta1" id="respuesta1" class="form-control bg-dark">
                  </div>
                  <br>
                  <div class="form-group">
                    <label class="form-label" for="type"><?php echo $_SESSION["unlock"]["pregunta2"] ?></label>

                    <input type="text" name="respuesta2" id="respuesta2" class="form-control bg-dark">
                  </div>
                  <br>
                  <div class="form-group">
                    <label class="form-label" for="type"><?php echo $_SESSION["unlock"]["pregunta3"] ?></label>

                    <input type="text" name="respuesta3" id="respuesta3" class="form-control bg-dark">
                  </div>
                  <br>
              </div>

              <input type="hidden" name="ToggleQuest" id="ToggleQuest">

              <input class="btn btn-outline-light btn-lg px-5" name="Ingresar" value="Enviar" type="submit"
                id="btn_login"> </input>
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
<script src="../../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>

<script src="../../public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../public/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../../public/sweetalert/sweetalert2.js"></script>
<script src="../../public/sweetalert/sweetalert2.all.min.js"></script>

<script src="../../js/Validacion_ToggleQuest.js"></script>

</html>