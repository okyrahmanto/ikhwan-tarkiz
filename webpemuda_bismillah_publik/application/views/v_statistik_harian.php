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

      <ul class="sidebar-menu" style="font-size: 12pt"> 
      <li><a href="<?php echo base_url(); ?>index.php/admin/transaksi"><i class="fa fa-pencil-square-o"></i> <span style="color:#fff">Input Transaksi</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/data_transaksi"><i class="fa fa-file"></i> <span style="color:#fff">Data Transaksi</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/user"><i class="fa fa-user-o"></i> <span style="color:#fff">Data User</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/pelanggan"><i class="fa fa-user-o"></i> <span style="color:#fff">Data Pelanggan</span></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/admin/barang"><i class="fa fa-cube"></i> <span style="color:#fff">Data Barang</span></a></li>
         <li><a href="<?php echo base_url(); ?>index.php/admin/counter"><i class="fa fa-map-marker"></i> <span style="color:#fff">Data Counter</span></a></li>
         <li><a href="<?php echo base_url(); ?>index.php/admin/laporannota"><i class="fa fa-map-marker"></i> <span style="color:#fff">Laporan Nota</span></a></li>
         <li><a href="<?php echo base_url(); ?>index.php/admin/laporanharian"><i class="fa fa-map-marker"></i> <span style="color:#fff">Laporan Harian</span></a></li>
         <li><a href="<?php echo base_url(); ?>index.php/admin/data_faktur_filter"><i class="fa fa-file"></i> <span style="color:#fff">Laporan Faktur</span></a></li>
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

          
<div id="notifikasi"><?php echo $this->session->flashdata('message');?></div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Arba Laundry-Dry Clean</h3>
              <h4 align="right">Tanggal Hari Ini:  <?php echo tgl_indo(date('Y-m-d')) ?></h4>
              <hr width="100%">
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <form method="post" action="<?php echo base_url('index.php/admin/statistik_harian_filter')?>">
                    <div class="form-group col-xs-10">
                       <div class="col-xs-2"><label class="control-label">Tahun</label> </div>
                       <div class="col-xs-2"><input type="text" class="form-control" name="tahun"/> </div>

                        <div class="col-xs-2"><label class="control-label">Bulan</label> </div>
                        <div class="col-xs-2"><input type="text" class="form-control" name="bulan"/> </div>

                        <div class="form-group col-sm-2">
                          <input type="submit" name="submit" value="cari" class="btn btn-primary" />
                        </div>
                    </div>
                  </form>


                  <table width="100%" border="0" id="table_id" class="table table-bordered table-striped">
                    <thead>
                      <th>Tanggal</th>
                      <th>Shift</th>
                      <th>TotLembar</th>
                      <th>JumNota</th>
                      <th>NotaLunas</th>
                      <th>TotTunai</th>
                      <th>NotaBon</th>
                      <th>TotBon</th>
                      <th>TotNilaiTransaksi</th>
                      <th>DataOK</th>
                      <th>BelumSiap</th>
                      <th>Diterima</th>
                      <th>Pending</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                    </thead>
                    <tbody>
                      <?php foreach ($statistik as $data) {
                     ?>
                      <tr>
                        <td><?php echo $data->tgl_transaksi ?></td>
                        <td><?php echo $data->shift ?></td>
                        <td><?php echo $data->totLembar ?></td>
                        <td><?php echo $data->jumNota ?></td>
                        <td><?php echo $data->notalunas ?></td>
                        <td>Belum Tahu</td>
                        <td><?php echo $data->notaBon ?></td>
                        <td>Belum Tahu</td>
                        <td><?php echo rupiah($data->nilaiTransaksi); ?></td>
                        <td><?php echo $data->dataOK ?></td>
                        <td><?php echo $data->dalamProses ?></td>
                        <td></td>
                        <td></td>
                        <td><?php $m=date('m',strtotime($data->tgl_transaksi)); echo ubah_bulan($m) ?></td>
                        <td><?php $y=date('Y',strtotime($data->tgl_transaksi)); echo $y  ?></td>
                      </tr>
                   <?php } ?>
                  </tbody>
                  </table>
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
<!-- Modal Tambah-->

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

<script src="<?php echo base_url()?>assets/adminlte/bower_components/dataTables.responsive.js"></script>
<script src="<?php echo base_url()?>assets/adminlte/bower_components/responsive.bootstrap.js"></script>
<!-- page script -->
<?php
function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}

function ubah_bulan($bulan){
  if($bulan=='01') {echo "Januari";}
  elseif($bulan=='02') {echo "Februari";}
  elseif($bulan=='03') {echo "Maret";}
  elseif($bulan=='04') {echo "April";}
  elseif($bulan=='05') {echo "Mei";}
  elseif($bulan=='06') {echo "Juni";}
  elseif($bulan=='07') {echo "Juli";}
  elseif($bulan=='08') {echo "Agustus";}
  elseif($bulan=='09') {echo "September";}
  elseif($bulan=='10') {echo "Oktober";}
  elseif($bulan=='11') {echo "November";}
  elseif($bulan=='12') {echo "Desember";}
}

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
    $('#table_id').DataTable({
      "order" : [[ 0, "desc" ]],
      "scrollX": true
    })
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
