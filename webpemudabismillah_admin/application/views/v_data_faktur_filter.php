<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Arba Laundry</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/bootstrap/dist/css/checkbox.css">
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('index.php/admin/user')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span><img src="<?php echo base_url('assets/img/user.png')?>" width="30px" height="30px" alt="User Image">ARBA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><h4>ARBA</h4></span>
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
  <aside class="main-sidebar" style="background-color:#a93322">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <br>
    <!-- sidebar: style can be found in sidebar.less -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" style="font-size:14pt"> 
        <li><a href="<?php echo base_url(); ?>index.php/admin/transaksi" style="color:#fff"><i class="fa fa-pencil-square-o"></i> <span style="color:#fff">Input Pemasukan</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/transaksi" style="color:#fff"><i class="fa fa-pencil-square-o"></i> <span style="color:#fff">Input Pengeluaran</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/data_transaksi" style="color:#fff"><i class="fa fa-file"></i> <span style="color:#fff">Data Pemasukan</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/data_transaksi" style="color:#fff"><i class="fa fa-file"></i> <span style="color:#fff">Data Pengeluaran</span></a></li>

         <li style="display: none"><a href="<?php echo base_url(); ?>index.php/admin/counter" style="color:#fff"><i class="fa fa-map-marker"></i> <span>Data Counter</span></a></li>
         <li style="display: none"><a href="<?php echo base_url(); ?>index.php/admin/laporannota" style="color:#fff"><i class="fa fa-map-marker"></i> <span>Laporan Nota</span></a></li>
         <li style="display: none"><a href="<?php echo base_url(); ?>index.php/admin/laporanharian" style="color:#fff"><i class="fa fa-map-marker"></i> <span>Laporan Harian</span></a></li>
         <li style="display: none"><a href="<?php echo base_url(); ?>index.php/admin/data_faktur_filter" style="color:#fff"><i class="fa fa-file"></i> <span>Laporan Faktur</span></a></li>

        <li class="treeview">
          <a href="#" style="color:#fff">
            <i class="fa fa-cube"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="background-color:#eeeeee">
            <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-user-o"></i> <span>Data User</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/pelanggan"><i class="fa fa-user-o"></i> <span>Data Pelanggan</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/barang"><i class="fa fa-cube"></i> <span>Data Barang</span></a></li>
            <li><a href="<?php echo base_url(); ?>index.php/admin/suplyer"><i class="fa fa-cube"></i> <span>Data Suplyer</span></a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Arba Laundry-Dry Clean</h3>
              <h4 align="right">Tanggal Hari Ini:  <?php echo tgl_indo(date('Y-m-d')) ?></h4>
              <hr width="100%">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <form method="post" action="<?php echo base_url('index.php/admin/data_faktur')?>">

                    <div class="form-group col-xs-6">
                       <div class="col-xs-3"><label class="control-label">Tgl Terima</label> </div>
                       <div class="col-xs-1"><input type="radio" name="terima" value="tgl_diterima" ></div>

                        <div class="col-xs-3"><label class="control-label">Tgl Selesai</label> </div>
                        <div class="col-xs-1"><input type="radio" name="terima" value="tgl_dikembalikan"></div>
                  </div>

                 
                    <div class="form-group col-xs-10">
                       <div class="col-xs-2"><label class="control-label">Mulai Tgl</label> </div>
                       <div class="col-xs-3"><input type="date" class="form-control" name="tgl_mulai"/> </div>

                        <div class="col-xs-2"><label class="control-label">Sampai Tgl</label> </div>
                        <div class="col-xs-3"><input type="date" class="form-control" name="tgl_sampai"/> </div>
                    </div>

                    <div class="form-group col-xs-3">
                    <select name="pelanggan" class="form-control"> 
                      <option value="" disabled="" selected="">-- Pilih Pelanggan --</option>
                    <?php                                
                            foreach ($pelanggan as $data) {  
                          echo "<option value='".$data->id_pelanggan."'>".$data->id_pelanggan." - ".$data->nama_pelanggan."</option>";
                          }
                        ?>
                    </select>
                  </div>

                  <div class="form-group col-sm-2">
                    <input type="submit" name="submit" value="cari" class="btn btn-primary" />
                  </div>
                    
                  </form>
            </div>
            <div class="box-body">
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Administrasi Arba Laundry</a>.</strong>
  </footer>



      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- groery crud -->
<!-- groery crud -->
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>


<script>
  $(function () {
    $('#table_id').DataTable()
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
