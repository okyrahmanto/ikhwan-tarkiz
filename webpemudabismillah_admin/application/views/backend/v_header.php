<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | DataTables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pemuda_bismillah/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pemuda_bismillah/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/pemuda_bismillah/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-th-large"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?php echo base_url('index.php/login/logout'); ?>" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Keluar
              <span class="float-right text-muted text-sm">keluar kelaman login</span>
            </a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/pemuda_bismillah/img/putih.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Bismillah Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url() ?>index.php/manager/management_event" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Manajemen Event
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Manajemen Tiket
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/manager/peserta_masuk" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Data Masuk
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/manager/peserta_konfirmasi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Data Terkonfirmasi
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/manager/peserta_tiket_used" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Tiket telah Tergunakan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/manager/peserta_tiket_expire" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Tiket Kadaluarsa
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url() ?>index.php/manager/peserta_batal" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Peserta Batal
                    </p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>