<?php

require "../TopBar.php";
require '../php/ModelVersion/ModeloProducto.php';
$valor = new ProductoModelo();

?>

<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


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

</head>
<body class="hold-transition sidebar-mini">

    <!-- general form elements -->
    <div class="card card-primary m-5">
      <div class="card-header">
        <h1 class="card-title text-lg">Registro de Productos</h1>
      </div>
        <span class="m-3 text-danger">Campos Obligatorios (*)</span>
      <form method="post" id="registro-producto">

        <div class="card-body">

          <div class="row">

            <div class="col-4">
              <div class="form-group">
                <label for="codigo">Codigo Barra del Producto</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary">              
                      Cod.
                    </span>
                  </div>
                  <input type="text" name="barra" id="barra" class="form-control" value="TP-<?php echo $valor->CodigoProductoModelo();?>" readonly>
                  <input type="hidden" name="codigo" id="codigo" value="<?php $valor->CodigoProductoModelo();?>">
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-4">
              <div class="form-group">
                <label for="nombre">*Fecha Asignada</label>
                <input type="date" class="form-control" name="fecha_asignada" id="fecha_asignada" required>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="nombre">*Nombre del Producto</label>
                <input type="date" class="form-control" name="fecha_asignada" id="fecha_asignada" required>
              </div>
            </div>

            <div class="form-group">
              <label>*Turno Asignada</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i style="font-size: 20px;" class="fas fa-address-card"></i></span>
                </div>
                <select id="representativeChoice" name="representativeChoice" class="form-control">
                  <option selected="selected">--Seleccione un Inmueble--</option>
                  <option value="Titular">Titular</option>
                  <option value="Familiar">Familiar</option>
                  <option value="Legal Representative">Representante legal</option>
                </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="precio">*Precio del Producto <small>C/U</small></label>
                <div class="input-group">
                  <input type="text" class="form-control" name="precio" id="precio" data-inputmask='"mask": "999,99"' data-mask required>
                  <div class="input-group-append">
                    <span class="input-group-text">              
                      $
                    </span>
                  </div>
                </div>
              </div>
            </div>

          </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary" id="btn-producto">Submit</button>
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
    <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">La Toxica</a>.</strong> 
  </footer>




<!-- jQuery -->
<script src="../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.min.js"></script>
<script src="../public/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- InputMask -->
<script src="../public/plugins/moment/moment.min.js"></script>
<script src="../public/plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- jquery-validation -->
<script src="../public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../public/plugins/jquery-validation/additional-methods.min.js"></script>

<script src="../public/sweetalert/sweetalert2.js"></script>
<script src="../public/sweetalert/sweetalert2.all.min.js"></script>

<script>

  //Money Euro
  $('[data-mask]').inputmask()

  const form = document.getElementById("registro-producto");
  const btn_login = document.getElementById("btn-producto");

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
      fetch('../php/Controller/producto.php', {
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
              window.location.href = "../index.php"
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
          if(data.status == false){
             Swal.fire(
              'ERROR!',
              data.mensaje,
              'error'
            )
          }else{
            
          }
          
        });
    }


  })
  </script>

</body>
</html>
