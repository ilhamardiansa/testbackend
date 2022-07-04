<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>plugins/summernote/summernote-bs4.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>dist/img/AdminLTELogo.png" alt="H" height="60" width="60">
  </div>

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
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php base_url() ?>" class="brand-link">
      <span class="brand-text font-weight-light"> WEB NAME</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php base_url() ?>" class="d-block">Hello , <?= $this->session->userdata('name'); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if($this->session->userdata('role') == 'admin'){
                $link = base_url('admin');
                echo "<li class='nav-item'>
                <a href='$link' class='nav-link'>
                  <i class='nav-icon fas fa-home'></i>
                  <p>
                   Dashboard
                  </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='$link/kendaraan' class='nav-link'>
                  <i class='nav-icon fas fa-bars'></i>
                  <p>
                   Data Kendaraan
                  </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='$link/driver' class='nav-link'>
                  <i class='nav-icon fas fa-bars'></i>
                  <p>
                   Data Driver
                  </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='$link/barang' class='nav-link'>
                  <i class='nav-icon fas fa-bars'></i>
                  <p>
                   Data Barang
                  </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='$link/sewa' class='nav-link'>
                  <i class='nav-icon fas fa-bars'></i>
                  <p>
                   Sewa
                  </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='$link/historisewa' class='nav-link'>
                  <i class='nav-icon fas fa-bars'></i>
                  <p>
                   Histori Sewa
                  </p>
                </a>
              </li>
              ";
               }elseif($this->session->userdata('role') == 'pegawai'){
                $link2 = base_url('pegawai');
                echo " <li class='nav-item'>
                <a href='$link2' class='nav-link'>
                  <i class='nav-icon fas fa-home'></i>
                  <p>
                   Dashboard
                  </p>
                </a>
              </li>
              <li class='nav-item'>
                <a href='$link2/konfirmasi' class='nav-link'>
                  <i class='nav-icon fas fa-bars'></i>
                  <p>
                   Konfirmasi Sewa
                  </p>
                </a>
              </li>
              <li class='nav-item'>
              <a href='$link2/historisewa' class='nav-link'>
                <i class='nav-icon fas fa-bars'></i>
                <p>
               Histori Sewa
                </p>
              </a>
            </li>
            ";
               } ?>
               <li class="nav-item">
                <a href="<?php echo base_url('auth/logout') ?>" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>
                 Logout
                  </p>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->