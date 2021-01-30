<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CV. InsanMulia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="<?php echo base_url()?>assets/select2/css/select2.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-green sidebar-collapse sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('index.php/admin/user')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span><img src="<?php echo base_url('assets/img/user.png')?>" width="30px" height="30px" alt="User Image">CV. InsanMulia</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><h4>CV. InsanMulia</h4></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/img/user.png')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/img/user.png')?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo $_SESSION['username'] ?>
                 
                </p>
              </li>
              <!-- Menu Body -->
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-color:#02a65a">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <br>
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="">
        <li class="treeview">
          <a href="#" style="color:#fff;">
            <i class="fa fa-cube"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-user-o"></i> <span>Data User</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/barang"><i class="fa fa-cube"></i> <span>Data Barang</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/pelanggan"><i class="fa fa-user-o"></i> <span>Data Pelanggan</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/vendor"><i class="fa fa-cube"></i> <span>Data Vendor</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/proyek"><i class="fa fa-cube"></i> <span>Data Proyek</span></a></li>
            <li class="treeview">
                <a href="#" style="color:#fff;">
                    <i class="fa fa-cube"></i>
                    <span>Akun</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>index.php/admin/akun"><i class="fa fa-pencil-square-o"></i> <span>Data Akun</span></a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin/akun_header"><i class="fa fa-pencil-square-o"></i> <span>Data Akun Header</span></a></li>
                <li><a href="<?php echo base_url(); ?>index.php/admin/akun_kelompok"><i class="fa fa-pencil-square-o"></i> <span>Data Akun Kelompok</span></a></li>
                </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/perihal"><i class="fa fa-cube"></i> <span>Data Perihal</span></a></li>
          </ul>
        </li>

        <li><a href="<?php echo base_url(); ?>index.php/admin/data_akun"><i class="fa fa-file"></i> <span>Data Saldo Akun</span></a></li>
        
        <li class="treeview">
          <a href="#" style="color:#fff;">
            <i class="fa fa-pencil-square-o"></i>
            <span>Input Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>index.php/admin/transaksi_penjualan"><i class="fa fa-pencil-square-o"></i> <span>Input Penjualan</span></a></li>
           <li><a href="<?php echo base_url(); ?>index.php/admin/transaksi_pembelian"><i class="fa fa-pencil-square-o"></i> <span>Input Pembelian</span></a></li>
           <li><a href="<?php echo base_url(); ?>index.php/admin/transaksi_pembayaran"><i class="fa fa-pencil-square-o"></i> <span>Input Pembayaran</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#" style="color:#fff;">
            <i class="fa fa-folder"></i>
            <span>Data Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>index.php/admin/data_penjualan"><i class="fa fa-file"></i> <span>Penjualan</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/data_pembelian"><i class="fa fa-file"></i> <span>Pembelian</span></a></li>
           <!--<li><a href="<?php echo base_url(); ?>index.php/admin/data_retur_penjualan"><i class="fa fa-folder"></i> <span>Retur Penjualan</span></a></li>-->
            <li><a href="<?php echo base_url(); ?>index.php/admin/data_retur_pembelian"><i class="fa fa-folder"></i> <span>Retur Pembelian</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/data_pembayaran"><i class="fa fa-folder"></i> <span>Pembayaran</span></a></li>
          </ul>
        </li>

         <li><a href="<?php echo base_url(); ?>index.php/admin/buku_besar"><i class="fa fa-folder"></i> <span>Data Buku Besar</span></a></li>
         <li><a href="<?php echo base_url(); ?>index.php/admin/jurnal_umum"><i class="fa fa-file"></i> <span>Jurnal Umum</span></a></li>
         <li><a href="<?php echo base_url(); ?>index.php/admin/laporan_proyek_cari"><i class="fa fa-file"></i> <span>Laporan Proyek</span></a></li>
      	<li class="treeview">
          <a href="#" style="color:#fff;">
            <i class="fa fa-pencil-square-o"></i>
            <span>Laba / Rugi - Neraca </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url(); ?>index.php/admin/neraca"><i class="fa fa-pencil-square-o"></i> <span>Neraca</span></a></li>
           <li><a href="<?php echo base_url(); ?>index.php/admin/laba_rugi"><i class="fa fa-pencil-square-o"></i> <span>Laba Rugi</span></a></li>
          </ul>
        </li>

	
	</ul>
    </section>
    <!-- /.sidebar -->
  </aside>
