<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Importar BD</title>

  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="public/css/s.css">
  <link href="public/sweetalert/sweetalert2.css" rel="stylesheet">
  <link rel="stylesheet" href="public/sweetalert/sweetalert2.min.css">

</head>

<body>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-3 mt-md-4 pb-5">

                <div class="row">
                  <div class="col">
                    <button class="btn btn-light" id="btn-importar" name="btn-importar" value="Mostrar"
                      onclick="Importar()">Importa BD
                      <i class="fa fa-database ml-2 mr-2"></i>
                    </button>
                  </div>

                  <div class="col">
                    <button class="btn btn-light" id="btn-exportar" name="btn-exportar" value="Mostrar"
                      onclick="Exportar()">Exportar BD
                      <i class="fa fa-database ml-2 mr-2"></i>
                    </button>
                  </div>
                </div>

                <div id="Importar" style="display:none;">
                  <form action="config/cargar_bd.php" method="post" id="create-importar" enctype="multipart/form-data">
                    <h2 class="fw-bold mb-2 mt-5">Importacion del BD <i class="fa fa-database"></i></h2>
                    <p class="text-white-50 mb-5">Por favor Seleccione el Archivo a Importar!</p>

                    <div class="row mb-4">
                      <div class="col-sm-12">
                        <div class="form-group row">

                          <!-- AQUI EMPIEZAS LAS RECOLECCIÓN DE LA ID DE LOS PROFESORES -->

                          <div class="col">
                            <label for="nombre">Usuario</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                          </div>

                          <div class="col">
                            <label for="passwd">Contraseña</label>
                            <input type="password" class="form-control" id="passwd" name="passwd" required>
                          </div>

                        </div>
                      </div>
                    </div>

                    <label for="sql_file">Base de datos</label>
                    <div class="row mb-5">
                      <div class="input-group col">
                        <input type="file" name="sql_file" id="sql_file" class="form-control bg-dark" require
                          accept=".sql">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fa fa-database"></i></span>
                        </div>
                      </div>
                    </div>


                    <button class="btn btn-outline-light btn-lg px-5" type="submit"
                      id="submit_importar">Importar</button>
                  </form>
                </div>

                <div id="Exportar" style="display:none;">
                  <form action="" method="post" id="create-exportar" enctype="multipart/form-data">
                    <h2 class="fw-bold mb-2 mt-5">Exportacion de la BD <i class="fa fa-database"></i></h2>
                    <p class="text-white-50 mb-5">Por favor Ingrese su usuario y contraseña para Exportar la base de
                      datos!</p>

                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group row">

                          <!-- AQUI EMPIEZAS LAS RECOLECCIÓN DE LA ID DE LOS PROFESORES -->

                          <div class="col">
                            <label for="nombre">Usuario</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                          </div>

                          <div class="col">
                            <label for="passwd">Contraseña</label>
                            <input type="password" class="form-control" id="passwd" name="passwd" required>
                          </div>

                        </div>
                      </div>
                    </div>

                    <button class="btn btn-outline-light btn-lg px-5" type="submit"
                      id="submit_exportar">Exportar</button>
                  </form>
                </div>

              </div>

              <a href="registrados.php" class="btn btn-outline-danger btn-lg"><i class="fa fa-arrow-left"></i> Regresar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>

<script src="public/sweetalert/sweetalert2.js"></script>
<script src="public/sweetalert/sweetalert2.all.min.js"></script>

<script>
  function Importar() {
    let Exportar2 = document.getElementById("Exportar");
    let Importar2 = document.getElementById("Importar");
    let btnimportar = document.getElementById("btn-importar");

    if (Importar2.style.display == "none") {

      Importar2.style.display = "block";
      btnimportar.value = "Ocultar";

      if (Exportar2.style.display == "block") {

        Exportar2.style.display = "none";
        btnexportar.value = "Ocultar";

      }
    } else {
      Importar2.style.display = "none";
      btnimportar.value = "Mostrar";
    }
  }

  function Exportar() {
    let Importar2 = document.getElementById("Importar");
    let Exportar2 = document.getElementById("Exportar");
    let btnexportar = document.getElementById("btn-exportar");

    if (Exportar2.style.display == "none") {

      Exportar2.style.display = "block";
      btnexportar.value = "Ocultar";

      if (Importar2.style.display == "block") {

        Importar2.style.display = "none";
        btnimportar.value = "Ocultar";

      }
    } else {
      Exportar2.style.display = "none";
      btnexportar.value = "Mostrar";
    }
  }
</script>


<script>
  const form = document.getElementById("create-exportar");
  const btn_login = document.getElementById("submit_exportar");

  form.addEventListener("submit", (event) => {
    event.preventDefault()
    const data = new FormData(form)
    const info = Object.fromEntries(data)
    console.log(info)
    if (info.clave === "" || info.usuario === "") {
      Swal.fire(
        'ERROR!',
        'debes ingresar todos los datos!',
        'error'
      )
    } else {
      fetch('config/descargar_bd.php', {
        method: 'POST',
        body: JSON.stringify(info)
      })
        .then(response => response.json())
        .then(data => {
          console.log(data);

          if (data.status == true) {
            Swal.fire(
              'EXITOSO!',
              data.mensaje,
              'success'
            )
            setTimeout(() => {
              window.location.href = "registrados.php"
            }, 1000);
          } else if (data.status == false) {
            Swal.fire(
              'ERROR!',
              data.mensaje,
              'error'
            )
          } else {
            Swal.fire(
              'ERROR!',
              data.mensaje,
              'warning'
            )
          }
        })
        .catch(error => {
          console.error('Error:', error);
          if (data.status == false) {
            Swal.fire(
              'ERROR!',
              data.mensaje,
              'error'
            )
          } else {

          }

        });
    }


  })
</script>

</html>