<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio | Alcaldia MBI</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="public/images/images.png" />
  <link rel="icon" href="public/images/logo.jpeg" class="brand-image img-circle elevation-3">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="public/plugins/fullcalendar/main.min.css">

  <link rel="stylesheet" href="public/plugins/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">

</head>
<?php

require "widget/Main/top-nav.php";

date_default_timezone_set('America/Caracas');

?>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                <li class="breadcrumb-item active">Top Navigation</li>
              </ol>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">

          <div class="row justify-content-center">

            <div class="col-lg-8">

              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <style>
                  .card-img-top {
                    object-fit: contain;
                    height: 415px;
                  }

                  .degradado-texto {
                    background-image: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0));
                  }
                </style>

                <div class="carousel-inner">
                  <div class="carousel-item active">

                    <div class="col-lg-12 col-xl-12">
                      <div class="card mb-2 ">
                        <img class="card-img-top" src="public/images/Torreon.jpeg" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end degradado-texto">
                          <h5 class="card-title text-primary text-white">Card Title</h5>
                          <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit sed do eiusmod tempor.</p>
                          <a href="#" class="text-white">Last update 2 mins ago</a>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="carousel-item">

                    <div class="col-lg-12 col-xl-12">
                      <div class="card mb-2 bg-gradient-dark">

                        <img class="card-img-top" src="public/images/concejo.jpg" alt="">

                        <div class="card-img-overlay d-flex flex-column justify-content-end degradado-texto">
                          <h5 class="card-title text-primary text-white">Card Title</h5>
                          <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit sed do eiusmod tempor.</p>
                          <a href="#" class="text-white">Last update 2 mins ago</a>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="carousel-item">
                    <div class="col-lg-12 col-xl-12">
                      <div class="card mb-2 bg-gradient-dark">
                        <img class="card-img-top" src="public/images/alcaldia.jpg" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end degradado-texto">
                          <h5 class="card-title text-primary text-white">Card Title</h5>
                          <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit sed do eiusmod tempor.</p>
                          <a href="#" class="text-white">Last update 2 mins ago</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="carousel-item">
                    <div class="col-lg-12 col-xl-12">
                      <div class="card mb-2 bg-gradient-dark">
                        <img class="card-img-top" src="public/images/catastro.jpg" alt="">
                        <div class="card-img-overlay d-flex flex-column justify-content-end degradado-texto">
                          <h5 class="card-title text-primary text-white">Card Title</h5>
                          <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit sed do eiusmod tempor.</p>
                          <a href="#" class="text-white">Last update 2 mins ago</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>


                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

                  <span class="sr-only">Siguiente</span>
                </a>

              </div>

            </div>

            <div class="col">
              <div class="card mt-3">
                <div class="card-header bg-primary">
                  <h4 class="text-center"> <i class="bi bi-clock"></i> Horario Laboral</h4>
                </div>
                <div class="card-body">

                  <br>
                  <ul class="mt-2">
                    <h5>
                      <label class="text-primary"> <i class="bi bi-sun fa-lg"></i> Horario Vespertino</label>
                      <br>
                      8:30am a 12:00pm
                      <hr>
                      <label class="text-success"><i class="bi bi-brightness-alt-high fa-lg"></i> Horario Tarde</label>
                      <br>
                      1:30am a 4:00pm
                    </h5>
                  </ul>

                </div>
                <div class="card-footer bg-warning">
                  <h4 class="text-center"> <i class="bi bi-calendar-week"></i> Lunes a Viernes</h4>
                </div>
              </div>
            </div>

          </div>

          <div class="row mt-3">

            <div class="col">

              <button class="btn btn-light btn-lg btn-block">
                <i class="bi bi-instagram fa-lg text-blue"></i>
              </button>

            </div>

            <div class="col">

              <button class="btn btn-light btn-lg btn-block">
                <i class="bi bi-facebook fa-lg text-blue"></i>
              </button>

            </div>

            <div class="col">

              <button class="btn btn-light btn-lg btn-block">
                <i class="bi bi-twitter-x fa-lg text-blue"></i>
              </button>

            </div>

          </div>

          <div class="row">

            <div class="col">
              <div id="carouselAreaLaboral" class="carousel slide" data-ride="carousel">

                <center>
                  <div class="carousel-inner m-4">

                    <div class="carousel-item active">
                      <div class="col-lg-12 col-xl-12">
                        <div class="card mb-2 bg-gradient-dark">
                          <img class="card-img-top" src="public/images/DEP.png" alt="">
                          <div class="card-img-overlay d-flex flex-column justify-content-end degradado-texto">
                            <h5 class="card-title text-primary text-white">Card Title</h5>
                            <p class="card-text text-white pb-2 pt-1">Lorem ipsum dolor sit amet, consectetur
                              adipisicing elit sed do eiusmod tempor.</p>
                            <a href="#" class="text-white">Last update 2 mins ago</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <h3 class="text-center">Dir. de Obras de Infraestructura</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">Dirección de Catastro</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">Dir. de Planeamiento Urbano</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">Dir. de Servicios Publicos</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <h3 class="text-center">Dir. para la Salud y Gestion Social</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">Dir. de Registro Civil</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">SPINNA</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">I.A.I.M.E.I.G.MAMA ROSA</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <h3 class="text-center">Dimesion de Economia y productividad</h3>
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <h3 class="text-center">Dir. de Desarrollo Economico Comunal</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">Dir. de Ecosocialismo y Turismo</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">Dir. para el Fortalecimiento del Poder Popular</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">Institutos Mercados Municipales</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <h3 class="text-center">Instituto de Cultura y Educación</h3>
                            </div>
                            <div class="col">
                              <h3 class="text-center">instituto de Deporte y Recreación</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                  </div>
                </center>

                <a class="carousel-control-prev" href="#carouselAreaLaboral" role="button" data-slide="prev">

                  <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselAreaLaboral" role="button" data-slide="next">

                  <span class="sr-only">Siguiente</span>
                </a>

              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
    <!-- /.content -->
  </div>
  <!-- Main Footer -->
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
          <button type="button" class="btn btn-lg btn-primary ml-2"><i class="fa fa-ruble-sign"></i></button>
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
  <!-- Main Footer -->

  </div>


  <script src="public/plugins/jquery/jquery.min.js"></script>


  <!-- Bootstrap 4 -->
  <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="public/dist/js/adminlte.min.js"></script>

  <script src="public/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="public/plugins/jquery-validation/additional-methods.min.js"></script>

  <!-- jQuery UI 1.11.4 -->
  <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <!-- Sparkline -->
  <script src="public/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- Summernote -->
  <script src="public/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

  <script src="public/plugins/fullcalendar/main.min.js"></script>

</body>

</html>