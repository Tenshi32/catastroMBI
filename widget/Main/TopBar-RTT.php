<!DOCTYPE html>

<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="public/images/images.png" />

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
      <h3>
        <span class="badge badge-dark mt-3">
          <i class="bi bi-clock"></i>
        </span>
        <span class="badge badge-warning mt-3">
          <div id="reloj"></div>
        </span>
      </h3>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i style="font-size: 20px;" class="far fa-bell"></i>
            <span id="mySpan" class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones <i class="far fa-bell"></i></span>
            <div class="dropdown-divider"></div>

            <?php $notificacion->NotificacionSolicitud(); ?>


          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-slide="true" href="#" role="button">
            <div id="tu-contenedor"></div>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <?php echo $usuario["usuario"]; ?>
            <img src="public/images/images.png" alt="AdminLTE Logo" class="img-circle" width="35" height="35">
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a href="perfil.php" class="dropdown-item"><i class="fas fa-user"></i> Perfíl
            </a>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" id="TopBarCerrar">
              <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </button>
          </div>
        </li>

      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a class="brand-link bg-light">
        <span class="brand-text ml-3 font-weight-light "><img src="public/images/siddcambi.png" alt="AdminLTE Logo"
            width="200" height="50"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="public/images/images.png" alt="AdminLTE Logo" class="img-circle elevation-3" style="opacity: .8"
              width="100" height="100">
          </div>
          <div class="info">
            <a class="d-block">
              <?php echo $usuario["usuario"]; ?>
            </a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar btn-success text-white">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item menu mb-1">
              <a href="#" class="nav-link active">
                <i class="nav-icon bi bi-folder-check"></i>
                <p>
                  Solicitudes
                  <i class="right bi bi-chevron-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              
                <li class="nav-item">
                  <a href="soli/soli-RTT.php" class="nav-link">
                    <i class="bi bi-person-lines-fill nav-icon"></i>
                    <p>Regulación de Tenencia de Tierra</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item menu mb-1">
              <a href="#" class="nav-link active">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>
                  Procesos
                  <i class="right bi bi-chevron-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="proces/empadronamiento/consul_empa.php" class="nav-link">
                    <i class="bi bi-inboxes nav-icon"></i>
                    <p>Regulacion de la Tenencia de la Tierra</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item menu mb-1">
              <a href="#" class="nav-link active">
                <i class="nav-icon bi bi-gear-wide-connected"></i>
                <p>
                  Servicios
                  <i class="right bi bi-chevron-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="servic/SoporteTecnico.php" class="nav-link">
                    <i class="bi bi-wrench-adjustable-circle nav-icon"></i>
                    <p>Soporte Tecnico</p>
                  </a>
                </li>

              </ul>
            </li>

            <hr>
            <li class="nav-item fixed">
              <a href="perfil.php" class="nav-link">
                <i class="fas fa-user"></i>
                <p>
                  Perfíl
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" style="border-radius: 1rem" src="public/images/images.png" alt="AdminLTELogo"
          height="200" width="200">
      </div>

      
      <section class="content mt-3">
        <div class="container-fluid">
          <div class="row">

            <div class="col">

</body>

</html>