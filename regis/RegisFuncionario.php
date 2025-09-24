<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Funcionario</title>

</head>
<?php

require "TopBar.php";

?>

<body>

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-shadow elevation-5" style="border-radius: 1rem;">

          <div class="card-header bg-primary">
            <h1 class="card-title text-lg"><i class="fa fa-user-plus"></i> Registro de Funcionarios</h1>
          </div>

          <div class="card-body p-5 text-center">

            <form id="regis_funcionario" method="post">
              <h5 class="text-left mb-3">Datos Personales</h5>

              <div class="row">
                <div class="col-3 form-group mb-4">
                  <label class="form-label" for="type"><i class="fa fa-th"></i> Cédula</label>
                  <input type="text" id="cedula" name="cedula" class="form-control" pattern="[0-9]*">
                </div>

                <div class="col form-group mb-4">
                  <label class="form-label" for="type"><i class="fa fa-user"></i> Nombre</label>
                  <input type="text" id="nombre" name="nombre" class="form-control">
                </div>

                <input type="hidden" id="RegisUsuario" name="RegisUsuario">
                <input type="hidden" id="tipo_usuario" name="tipo_usuario" value="2">
                <input type="hidden" id="estado" name="estado" value="1">

                <div class="col form-group mb-4">
                  <label class="form-label" for="type"><i class="fa fa-user"></i> Apellido</label>
                  <input type="text" id="apellido" name="apellido" class="form-control">
                </div>

              </div>

              <div class="row">
                <div class="col form-group mb-4">
                  <label class="form-label" for="type"><i class="fa fa-user"></i> Fecha de Nacimiento</label>
                  <input type="date" id="fecha_nac" name="fecha_nac" class="form-control">
                </div>

                <div class="col form-group mb-4">
                  <label class="form-label" for="type"><i class="fa fa-user"></i> Correo Electrónico</label>
                  <input type="email" id="correo" name="correo" class="form-control" minlength="5" required>
                </div>

                <div class="col form-group mb-4">
                  <label class="form-label" for="type"><i class="fa fa-user"></i> Dirección</label>
                  <input type="text" id="direccion" name="direccion" class="form-control" minlength="5" required>
                </div>
              </div>

              <hr>
              <h5 class="text-left mb-3">Datos para el Usuario</h5>

              <div class="row">
                <div class="col form-group mb-4">
                  <label class="form-label" for="type"><i class="fa fa-user"></i> Usuario</label>
                  <input type="text" id="usuario" name="usuario" class="form-control" maxlength="10" minlength="5"
                    required>
                </div>

                <div class="col form-group">
                  <label>Roles</label>
                  <select class="form-control select2bs4" name="nivel" id="nivel" style="width: 100%;" required>
                    <option value="">Seleccione un Rol</option>
                    <option value="2">Secretaria</option>
                    <option value="3">Fiscal Inspector</option>
                    <option value="4">Fiscal Avaluo</option>
                    <option value="5">Fiscal RTT</option>
                  </select>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col form-group">
                  <label class="form-label" for="typePasswordX-2"> <i class="fa fa-key"></i>Contraseña</label>
                  <input type="password" id="Passwd" name="Passwd" class="form-control" maxlength="12" minlength="5"
                    required>
                </div>

                <div class="col form-group">
                  <label class="form-label" for="typePasswordX-2"> <i class="fa fa-lock"></i> Confirmar
                    Contraseña</label>
                  <input type="password" id="PasswdConfirm" name="PasswdConfirm" class="form-control" maxlength="12"
                    minlength="5" required>
                </div>

              </div>

              <div class="row mb-3 form-group">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" onclick="togglepassword()">
                  <label for="customCheckbox1" class="custom-control-label"><embed>MOSTRAR CONTRASEÑA</embed></label>
                </div>
              </div>

              <div class="row">
                <div class="col-4 form-group mt-4 mb-4">
                  <label class="form-label" for="type"> Pregunta N°1<i class="fa fa- form-control-lg"></i></label>
                  <select class="form-control select2bs4" id="pregunta1" name="pregunta1" style="width: 100%;">
                    <option value="">Seleccione una Pregunta</option>
                    <option value="1">Cual es el modelo de su carro favorito ?</option>
                    <option value="2">Cual es su mascota favorita ?</option>
                    <option value="3">En que ciudad nació su padre ?</option>
                    <option value="4">Nombre de su primer jefe ?</option>
                    <option value="5">Cual es el nombre de su abuela materna ?</option>
                    <option value="6">Cual es su color favorito ?</option>
                  </select>
                  <br>
                  <input type="text" id="repuesta1" name="repuesta1" class="form-control" />
                </div>

                <div class="col-4 form-group mt-4 mb-4">
                  <label class="form-label" for="type"> Pregunta N°2<i class="fa fa- form-control-lg"></i></label>
                  <select class="form-control select2bs4" id="pregunta2" name="pregunta2" style="width: 100%;">
                    <option value="">Seleccione una Pregunta</option>
                    <option value="1">Cual es el modelo de su carro favorito ?</option>
                    <option value="2">Cual es su mascota favorita ?</option>
                    <option value="3">En que ciudad nació su padre ?</option>
                    <option value="4">Nombre de su primer jefe ?</option>
                    <option value="5">Cual es el nombre de su abuela materna ?</option>
                    <option value="6">Cual es su color favorito ?</option>
                  </select>
                  <br>
                  <input type="text" id="repuesta2" name="repuesta2" class="form-control" />
                </div>

                <div class="col-4 form-group mt-4 mb-4">
                  <label class="form-label" for="type"> Pregunta N°3<i class="fa fa- form-control-lg"></i></label>
                  <select class="form-control select2bs4" id="pregunta3" name="pregunta3" style="width: 100%;">
                    <option value="">Seleccione una Pregunta</option>
                    <option value="1">Cual es el modelo de su carro favorito ?</option>
                    <option value="2">Cual es su mascota favorita ?</option>
                    <option value="3">En que ciudad nació su padre ?</option>
                    <option value="4">Nombre de su primer jefe ?</option>
                    <option value="5">Cual es el nombre de su abuela materna ?</option>
                    <option value="6">Cual es su color favorito ?</option>
                  </select>
                  <br>
                  <input type="text" id="repuesta3" name="repuesta3" class="form-control" />
                </div>
              </div>

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

  </form>

  </div>

  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 - <?= date("Y"); ?> <a href="">Catastro Mario Briceño Iragorry</a>.</strong>
  </footer>

</body>

<script src="../js/Validacion_RFuncionario.js"></script>