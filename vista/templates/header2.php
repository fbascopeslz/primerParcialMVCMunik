<?php
/*
if (strlen(session_id()) < 1) 
  session_start();
  */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../../public/img/favicon.png">
  <title>MI PROYECTO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 3.3.5 
  <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
  -->
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  -->

  <!-- Icons -->    
  <link rel="stylesheet" href="../../public/css/simple-line-icons.min.css"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  
  <!-- DATATABLES -->
  <link href="../../public/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">    
  <link href="../../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
  <link href="../../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>     
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="nav-item dropdown user user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="../../public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs">pepito</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../../public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              <p>
                Pepito Grillo                 
              </p>
            </li>              
            <!-- Menu Footer-->
            <li class="user-footer">                
              <div class="pull-right">
                <a class="btn btn-default btn-flat"  href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                
                <form id="logout-form" action="#" method="POST" style="display: none;">
                  @csrf
                </form> 
              
              </div>
            </li>
          </ul>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> 

       

      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../../public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
        <span class="brand-text font-weight-light">PROYECTO 2021</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
              <div class="info">
            <a href="#" class="d-block">pepito</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="tipoActividad.php" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Tipo Actividad
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="curso.php" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Curso
                  </p>
                </a>
              </li>	
              <li class="nav-item">
                <a href="profesor.php" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Profesor
                  </p>
                </a>
              </li>		
              <li class="nav-item">
                <a href="materia.php" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Materia
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="actividad.php" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Actividad
                  </p>
                </a>
              </li>				
          </ul>
        </nav>
        <!-- /.sidebar-menu -->            
      </div>
      <!-- /.sidebar -->
    </aside>