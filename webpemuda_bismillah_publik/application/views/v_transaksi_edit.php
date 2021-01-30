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
<body class="hold-transition skin-green sidebar-mini">
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
          <ul class="treeview-menu">
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

          
<div id="notifikasi"><?php echo $this->session->flashdata('message');?></div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">CV. InsanMulia</h3>
                             
              <h4 align="right">Tanggal Hari Ini:  <?php echo tgl_indo(date('Y-m-d')) ?></h4>
              <hr width="100%">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <a href="<?php echo base_url() ?>index.php/admin/cetak_transaksi/<?php echo $transaksi->id_transaksi ?>" class="btn btn-warning" target="_blank" style="display: none"><i class="glyphicon glyphicon-print">Cetak</i></a>

                <form method="post" action="<?php echo base_url() ?>index.php/admin/proses_edit_transaksi">
 
                  <table width="100%" border="0">
                    <tr>
                      <td width="50%">
                        <div class="form-group col-xs-6">
                          <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $transaksi->id_transaksi ?>">
                          <label for="text">ID Kostumer</label>
                          <select class="form-control" name="id_pelanggan" id="pelanggan">
                            <option value="" disabled selected>-- Pilih Kustomer --</option>
                            <?php                                
                            foreach ($pelanggan as $p)
                              {
                                echo "<option value='$p->id_pelanggan'";
                                echo $transaksi->id_pelanggan==$p->id_pelanggan?'selected':'';
                                          echo ">$p->id_pelanggan ".'-'." $p->nama_pelanggan</option>";
                              }
                              ?>
                        </select>
                        </div>
                      </td>
          
                      <td>
                        <div class="form-group col-xs-6" style="display: none">
                          <label for="text">Jenis Pelayanan</label>
                          <select class="form-control" name="jenis_pelayanan">
                            <option value="" disabled selected>-- Pilih Layanan --</option>
                            <?php
                              if($transaksi->jenis_pelayanan=='Biasa'){
                               echo  "<option value='Biasa' selected> Biasa </option>";
                                echo "<option value='Kilat'> Kilat </option> ";
                              }elseif($transaksi->jenis_pelayanan=='Kilat'){
                               echo  "<option value='Biasa'> Biasa </option>";
                                echo "<option value='Kilat' selected> Kilat </option> ";
                              }
                             ?>
                            
                          </select>
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">No. Nota</label>
                          <input type="text" class="form-control" name="no_nota" value="<?php echo $transaksi->no_nota ?>">
                        </div>
                      </td>

                      <tr>
                        <td>
                          <div class="col-xs-6">
                            <h4 class="data_pelanggan"></h4>
                            <h4 class="coba"></h4>
                          </div>
                        </td>
                        <td>
                          <div class="form-group col-xs-6">
                          <label for="text">Tanggal Diterima</label>
                          <input type="date" class="form-control" name="tgl_diterima" value="<?php echo $transaksi->tgl_diterima ?>">
                        </div>

                        <div class="form-group col-xs-6" style="display: none">
                          <label for="text">Tanggal Dikembalikan</label>
                          <input type="date" class="form-control" name="tgl_dikembalikan" value="<?php echo $transaksi->tgl_dikembalikan ?>">
                        </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="form-group col-xs-6" style="display: none">
                          <label for="text">ID Counter</label>
                          <select class="form-control" name="id_counter">
                            <option value="" disabled selected>-- Pilih Counter--</option>
                            <?php                                
                            foreach ($counter as $c)
                              {
                                echo "<option value='$c->id_counter'";
                                echo $transaksi->id_counter==$c->id_counter?'selected':'';
                                          echo ">$c->id_counter ".'-'." $c->nama_counter</option>";
                              }
                              ?>
                            </select>
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">ID MO</label>
                          <input type="text" class="form-control" name="id_mo" value="<?php echo $transaksi->id_mo ?>" readonly>
                        </div>
                        </td>
                        <td>
                          <div class="form-group col-xs-6" style="display: none">
                          <label for="text">Shift</label>
                          <select class="form-control" name="shift">
                            <option value="" disabled selected>-- Pilih Shift --</option>
                            <?php 
                            if ($transaksi->shift=='Pagi'){
                              echo "<option value='Pagi' selected> Pagi </option>";
                              echo "<option value='Sore'> Sore </option>"; 
                            }elseif ($transaksi->shift=='Sore'){
                              echo "<option value='Pagi'> Pagi </option>";
                              echo "<option value='Sore' selected> Sore </option>"; 
                            }
                            ?>
                            
                          </select>
                        </div>

                        <div class="form-group col-xs-6"  style="display: none">
                          <label for="text">Area Antar</label>
                          <select class="form-control" name="area_antar">
                            <option value="" disabled selected>-- Pilih Area --</option>
                            <?php 
                            if ($transaksi->area_antar=='DK'){
                              echo "<option value='DK' selected> DK </option>" ;
                              echo "<option value='PBB'> PBB </option>";
                              echo "<option value='LK'> LK </option>";
                            }elseif ($transaksi->area_antar=='PBB'){
                              echo "<option value='DK'> DK </option>" ;
                              echo "<option value='PBB' selected> PBB </option>";
                              echo "<option value='LK'> LK </option>";
                            }elseif ($transaksi->area_antar=='LK'){
                              echo "<option value='DK'> DK </option>" ;
                              echo "<option value='PBB'> PBB </option>";
                              echo "<option value='LK' selected> LK </option>";
                            }elseif ($transaksi->area_antar==''){
                              echo "<option value='DK'> DK </option>" ;
                              echo "<option value='PBB'> PBB </option>";
                              echo "<option value='LK'> LK </option>";
                            }
                            ?>
                          </select>
                        </div>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="2" style=" background-color: black;height: 3px"></td>
                      </tr>

                      <tr>
                        <td colspan="2"><h4><b>Data Transaksi Cucian</b></h4></td>
                      </tr>

                      <!-- Tabel Untuk Input Data Cucian -->
                      <tr>
                        <td colspan="2">
                          <table width="100%" border="1" class="table order-list table-bordered table-striped">
                            <thead>
                              <th width="10%">Keterangan</th>
                              <th width="10%" style="display: none">Merek</th>
                              <th width="10%" style="display: none">Warna</th>
                              <th width="10%">MemoOrder</th>
                              <th width="10%" style="display: none">Pelayanan</th>
                              <th width="10%">Harga</th>
                              <th width="10%">Jumlah Barang</th>
                              <th width="10%" style="display: none">Harga Kimia</th>

                              <th width="10%">Total Harga</th>
                              <th width="10%" style="display: none">Total Kimia</th>

                              <th width="10%" style="display: none">Sepasang</th>
                              <th>Aksi</th>
                            </thead>
                            <tbody>
                              <?php foreach ($barang_transaksi as $b) {?>
                              
                              <tr>
                                <td width="20%">
                                <select class="form-control" name="nama_barang[]" id="nama_barang0" onchange="get_harga(0)">
                                    <option value="" disabled selected>-- Pilih Barang --</option>
                                        <?php                                
                                        foreach ($barang as $row) {  
                                      echo "<option value='$row->id_barang'";
                                      echo $b->id_barang==$row->id_barang?'selected':'';
                                          echo ">$row->kode_barang ".'-'." $row->nama_barang</option>";
                                      
                                      }
                                   
                                    ?>
                                </select>
                                <td style="display: none"><input type="text" name="merek[]" id="merek0" class="form-control" value="<?php echo $b->merek?>"></td>
                                <td style="display: none"><input type="text" name="warna[]" id="warna0" class="form-control" value="<?php echo $b->warna?>"></td>
                                <td><input type="text" name="memo_order[]" id="memo_order0" class="form-control" value="<?php echo $b->memo_order?>"></td>
                                <td style="display: none">
                                  <select class="form-control" name="pelayanan[]" id="pelayanan0" onchange="get_harga(0)">
                                   <option value="" disabled diselected>-- Pilih Pelayanan--</option>
                                   <?php 
                                   if($b->pelayanan=='2'){
                                    echo "<option value='2' selected>Laundry</option>";
                                    echo "<option value='3'>Pressing</option>";
                                    echo "<option value='4'>Dry</option>";
                                   }elseif($b->pelayanan=='3'){
                                    echo "<option value='2'>Laundry</option>";
                                    echo "<option value='3' selected>Pressing</option>";
                                    echo "<option value='4'>Dry</option>";
                                   }elseif($b->pelayanan=='4'){
                                    echo "<option value='2'>Laundry</option>";
                                    echo "<option value='3'>Pressing</option>";
                                    echo "<option value='4' selected>Dry</option>";
                                  }?>
                                  </select>
                                </td>
                                <td><input type="text" name="harga[]" id="harga0" class="form-control" onkeyup="sum(0)" readonly="" value="<?php if($b->pelayanan=='2'){
                                    echo $b->harga_laundry;
                                   }elseif($b->pelayanan=='3'){
                                   echo $b->harga_pressing;
                                   }elseif($b->pelayanan=='4'){
                                    echo $b->harga_dry;
                                  } ?>"></td>
                                <td><input type="text" name="jumlah[]" id="jumlah0" class="form-control" onkeyup="sum(0)" value="<?php echo $b->jumlah ?>"></td>
                                <td style="display: none"><input type="text" name="harga_kimia[]" id="harga_kimia0" class="form-control" onkeyup="sum(0);" value="<?php echo $b->harga_kimia ?>"></td>

                                <td><input type="text" name="total_harga[]" id="totalharga0" class="form-control" readonly=""></td>
                                <td style="display: none"><input type="text" name="total_kimia[]" id="total_kimia0" class="form-control" readonly=""></td>

                                <td style="display: none"><input type="checkbox" name="sepasang[]" id="sepasang0" value="Ya" <?php if($b->sepasang == 'Ya'){echo 'checked';}?> ></td>

                                <td style="display: none"><input type="button" class="ibtnDel btn btn-md btn-danger" value="Hapus"></td>
                                <td class="col-sm-2"><a class="deleteRow"></a>
                                </td>
                              </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                              <tr style="display: none">
                                <td colspan="6">
                                  <label>Total Sementara</label>
                                </td>
                                <td><input type="text" name="alltotal" id="alltotal" class="form-control" readonly="" onclick="calculateGrandTotal()" ></td>
                              
                                <td><input type="text" name="j_barang" id="j_barang" class="form-control" readonly="" onclick="jumlah_barang()" ></td>
                              </tr>

                              <tr>
                                  <td colspan="10">
                                      <input type="button" class="btn btn-primary " id="addrow" value="Tambah" />
                                  </td>
                              </tr>
                              
                          </tfoot>
                          </table>
                        </td>
                      </tr>
                      <!-- Tabel Input Data Cucian Selesai -->

                    <tr>
                      <td colspan="2" style="padding-top: 10px"></td>
                    </tr>  
                    <tr>
                        <td colspan="2" style=" background-color: black;height: 3px"></td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group col-xs-12">
                          <label for="text">Memo</label>
                          <textarea name="memo" class="form-control"><?php echo $transaksi->memo ?></textarea>
                        </div>
                      </td>
                      <td>
                        <div class="form-group col-xs-12" style="display: none">
                          <label for="text">Permintaan</label>
                          <textarea name="permintaan" class="form-control"><?php echo $transaksi->permintaan ?></textarea>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group col-xs-6" style="display: none">
                          <label for="text">Diverifikasi Oleh</label>
                          <input type="text" name="petugas_lap" class="form-control" value="<?php echo $transaksi->petugas_lap ?>">
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Operator</label>
                          <input type="text" name="operator" class="form-control" value="<?php echo $_SESSION['username'] ?>" readonly>
                        </div>
                      </td>
                      <td>
                        <div class="form-group" style="display: none">
                          <div class="col-xs-6">
                            <label for="text">Biaya Antar Jemput (Tidak termasuk diskon)</label>
                          </div>
                          <div class="col-xs-6" align="right">
                            <input type="number" name="biaya_jemput" id="biaya_jemput" class="form-control" value="<?php echo $transaksi->biaya_jemput?>" onkeyup="total_keseluruhan()" required="" style="text-align: right;">
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <div class="col-xs-6">
                            <label for="text">Biaya</label>
                          </div>
                          <div class="col-xs-6">
                            <input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo $transaksi->biaya ?>" onclick="total_barang()" readonly="" style="text-align: right;">
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <div class="col-xs-3">
                            <label for="text"><h1><b>TOTAL</b></h1></label>
                          </div>

                          <div class="col-xs-9">
                            <textarea class="form-control" name="total" id="total" style="text-align: right;font-size: 26pt;font-weight: bold;"><?php echo $transaksi->tagihan ?></textarea>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <div class="col-xs-6">
                            <label for="text">Potongan(%)</label>
                          <input type="number" name="diskon1" id="diskon1" class="form-control" value="<?php echo $transaksi->diskon1?>" onkeyup="total_diskon()" required="" style="font-weight: bold;font-size:14pt">
                          </div>
                          <div class="col-xs-6">
                            <label for="text">Potongan(hasil)</label>
                            <input type="text" name="diskon2" id="diskon2"  class="form-control" value="<?php echo $transaksi->diskon2 ?>" style="text-align: right;font-weight: bold;font-size:14pt" readonly="">
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php
                    $diterima=$transaksi->tgl_diterima;
                    $jatuh_tempo=mktime(0, 0, 0, date("m",strtotime($diterima)), date("d",strtotime($diterima))+3, date("Y",strtotime($diterima)));

                    $jatuh_tempo = date("Y-m-d",$jatuh_tempo);
                    $jatuh_tempo=new DateTime($jatuh_tempo);
                    $sekarang=new DateTime ();

                    $perbedaan = $jatuh_tempo->diff($sekarang);
                   // $selesai=date('Y-m-d',$selesai);
                    //echo strtotime($masuk);
                    //$perbedaan = $selesai-$masuk;
                    ?>
                    <tr>
                        <td colspan="2"><hr width="100%"></td>
                      </tr>

                    <tr>
                        <td align="center" colspan="2"><h3><b>Data Konfirmasi</b></h3></td>
                      </tr>

                    <tr style="display: none">
                        <td style="padding-top: 30px">
                          <div class="form-group col-xs-6">
                          <label for="text">Konfirmasi Selesai</label>
                          <input type="hidden" class="form-control" name="id_konfirmasi" value="<?php if(isset($konfirmasi->id_konfirmasi)) echo $konfirmasi->id_konfirmasi ?>">
                          <input type="checkbox" name="konfirmasi_selesai" id="konfirmasi" value="Ya" onchange="konfirmasi_waktu_selesai()" <?php if(isset($konfirmasi->konfirmasi_selesai)) {
                              if($konfirmasi->konfirmasi_selesai == 'Ya'){
                                echo 'checked';}
                              }
                            ?>>
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Selesai Tgl</label>
                          <input type="date" class="form-control" value="<?php if(isset($konfirmasi->tgl_selesai)) echo $konfirmasi->tgl_selesai?>" name="tgl_selesai" id="tgl_selesai">
                        </div>
                        </td>
                        <td style="padding-top: 30px">
                          <div class="form-group col-xs-6">
                          <label for="text">Jam</label>
                          <input type="text" class="form-control" name="jam_selesai" id="jam_selesai" value="<?php if(isset($konfirmasi->jam_selesai)) echo $konfirmasi->jam_selesai ?>">
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Petugas Opr</label>
                          <input type="text" class="form-control" name="petugas_opr" value="<?php if(isset($konfirmasi->petugas_opr)) echo $konfirmasi->petugas_opr ?>">
                         </div>
                        </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="form-group col-xs-6">
                          <label for="text">Bon Status</label>
                          <input type="checkbox" name="bon_status" value="Ya" <?php if(isset($konfirmasi->bon_status)) {
                            if($konfirmasi->bon_status == 'Ya'){
                              echo 'checked';}
                            }?>>
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Tgl Lunas</label>
                          <input type="date" class="form-control" name="tgl_lunas" value="<?php if(isset($konfirmasi->tgl_lunas)) echo $konfirmasi->tgl_lunas ?>">
                        </div>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="2"><hr width="100%"></td>
                      </tr>

                      <tr style="display: none">
                        <td>
                          <div class="form-group col-xs-6">
                          <label for="text">Konfirmasi Terima</label>
                          <input type="checkbox" name="konfirmasi_terima" value="Ya" id="konfirmasi_terima" onchange="konfirmasi_waktu_terima()" <?php if(isset($konfirmasi->konfirmasi_terima)) {
                            if($konfirmasi->konfirmasi_terima == 'Ya'){
                              echo 'checked';}
                            }?>>
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Tgl Terima</label>
                          <input type="date" class="form-control" name="tgl_terima" value="<?php if(isset($konfirmasi->tgl_terima))echo $konfirmasi->tgl_terima ?>">
                        </div>
                        </td>
                        <td>
                          <div class="form-group col-xs-6">
                          <label for="text">Jam Terima</label>
                          <input type="text" class="form-control" name="jam_terima" id="jam_terima" value="<?php if(isset($konfirmasi->jam_terima))echo $konfirmasi->jam_terima?>">
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Pending</label>
                          <input type="checkbox" name="pending" value="Ya" <?php if(isset($konfirmasi->pending)) {
                            if($konfirmasi->pending == 'Ya'){
                              echo 'checked';}
                            }?>>
                         </div>
                        </div>
                        </td>
                      </tr>

                      <tr style="display: none">
                        <td colspan="2"><hr width="100%"></td>
                      </tr>
                      
                      <tr style="display: none">
                        <td>
                          <div class="form-group col-xs-6">
                          <label for="text">Sisa Hari</label>
                          <input type="text" class="form-control" name="sisa_hari" value="<?php 
                         if($sekarang>$jatuh_tempo){
                          echo "-".$perbedaan->d." Hari";
                        }else{
                          echo $perbedaan->d." Hari";
                        }?>">
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Status Diskon</label>
                          <input type="checkbox" name="status_diskon" value="Ya" id="status_diskon" onchange="status_diskon_tampil()" <?php if(isset($konfirmasi->status_diskon)) {
                            if($konfirmasi->status_diskon == 'Ya'){
                              echo 'checked';}
                            }?>>
                          <input type="text" class="form-control" name="tampil_diskon" id="tampil_diskon" value="<?php if(isset($transaksi->status_diskon)) echo $transaksi->status_diskon?> %">
                        </div>
                        </td>
                      </tr>
                    

            

                      <div class="form-group">
                      </div>
                      
                     
                      </td>
                    </tr>

                    <tr>
                      <td style="padding-top: 10px">
                        <div class="form-group col-xs-6">
                          <input class="btn btn-success" type="submit" name="submit" value="Simpan">
                        </div>
                      </td>
                    </tr>
                  </table>
              </form>
            </div>
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
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">CV. InsanMulia</a>.</strong>
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

<script type="text/javascript">
  function status_diskon_tampil()
  {
      if (document.getElementById('status_diskon').checked) 
    {
        document.getElementById('tampil_diskon').value = "<?php if(isset($transaksi->status_diskon))echo $transaksi->status_diskon;  ?> %";
    } else {
        document.getElementById('tampil_diskon').value = "";
    }
  }

  function konfirmasi_waktu_terima()
  {
      var date = new Date();
      var jam=date.getHours();
      var menit=date.getMinutes();
      var detik=date.getSeconds();

      if (document.getElementById('konfirmasi_terima').checked) 
    {
        document.getElementById('jam_terima').value = jam+":"+menit+":"+detik;
    } else {
        document.getElementById('terima').value = "";
    }
  }

function konfirmasi_waktu_selesai()
  {
      var date =new Date();
      var jam=date.getHours();
      var menit=date.getMinutes();
      var detik=date.getSeconds();

      if (document.getElementById('konfirmasi').checked) 
    {
        document.getElementById('jam_selesai').value = jam+":"+menit+":"+detik;
    } else {
        document.getElementById('jam_selesai').value = "";
    }
    //console.log("Sukses");
  }
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#pelanggan').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url();?>index.php/admin/get_pelanggan",
                method : "POST",
                data : {id: id},
                dataType : 'json',
                success: function(data){
                  console.log(data);
                    //var obj=JSON.parse(data)
                   // var html = '<b>Nama: ' + obj.nama_pelanggan + '<br>Alamat: ' + obj.alamat + '<br>Telp: ' + obj.telp;
                   var html='';
                   var diskon='';
                   var i;
                    for(i=0; i<data.length; i++){
                        html += '<b> Nama : '+data[i].nama_pelanggan+'<br/>'+
                                'Alamat : '+data[i].alamat+'<br/>'+
                                'Telp : '+data[i].telp+' </b><br/>';
                        diskon += data[i].status_diskon;
                    }
                    $('.data_pelanggan').html(html);
                    $('[name="diskon1"]').val(diskon);
                }
            });
        });
    });
</script>

<script type="text/javascript">

  
function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name="total_harga[]"]').each(function () {
        grandTotal += +$(this).val();
    });
    console.log(grandTotal);
    $("#alltotal").val(grandTotal.toFixed(2));
    total_barang();
}

function jumlah_barang() {
    var grandTotal = 0;
    $("table.order-list").find('input[name="total_kimia[]"]').each(function () {
        grandTotal += +$(this).val();
    });
    console.log(grandTotal);
    $("#j_barang").val(grandTotal.toFixed(2));
    total_barang();
}

function total_barang(){
    var totharga    = parseFloat(document.getElementById('alltotal').value);
    var totkimia   = parseFloat(document.getElementById('j_barang').value);

    var hitung = totharga + totkimia ;
    console.log(hitung);
    document.getElementById('biaya').value = hitung;
    total_diskon();
  }


  function total_diskon(){
    var biaya    = parseFloat(document.getElementById('biaya').value);
    var diskon   = parseFloat(document.getElementById('diskon1').value);

    var hitung = (diskon * biaya)/100;
   // var hasil = biaya - hitung;
    console.log(diskon);
    document.getElementById('diskon2').value = hitung;
    document.getElementById('biaya_jemput').value = 0;
    total_keseluruhan();
  }

  function total_keseluruhan(){
    var biaya    = parseFloat(document.getElementById('biaya').value);
    var biaya_jemput    = parseFloat(document.getElementById('biaya_jemput').value);
    var diskon2   = parseFloat(document.getElementById('diskon2').value);

    var hasil = biaya + biaya_jemput - diskon2;
    console.log(hasil);
    document.getElementById('total').value = hasil;
  }

function sum(id) {
      var index = id;
      var harga = document.getElementById('harga'+index).value;
      var jumlah = document.getElementById('jumlah'+index).value;
      var kimia = document.getElementById('harga_kimia'+index).value;

      var result = parseInt(harga) * parseInt(jumlah);
      var result2 = parseInt(kimia) * parseInt(jumlah);

      if (!isNaN(result)) {
         document.getElementById('totalharga'+index).value = result;
      }

      if (!isNaN(result2)) {
         document.getElementById('total_kimia'+index).value = result2;
      }
      index++;
      console.log(result);
     jumlah_barang();
     calculateGrandTotal();
}


function get_harga(id) {
    //get selected layanan
    var pelayanan = 'pelayanan'+id;
    var posisi = 'nama_barang'+id;
    var harga = 'harga'+id;
    var id_barang = $('#'+posisi).val();
    var id_pelayanan = $('#'+pelayanan).val();
    console.log(id_pelayanan);
    $.get('<?php echo base_url();?>index.php/api/getHargaBarang', {
        id_barang: id_barang,id_pelayanan: id_pelayanan
    },
        function(data, status){
           console.log(data);
          $('#'+harga).val(data);
           //var obj = JSON.parse(data);
           //console.log(obj);
           //$('#harga_pelayanan'+id).val(data);
           });
    
}

  $(document).ready(function () {
    var counter = 1;
    var no=2;

    $("#addrow").on("click", function () {
      //console.log('Ok')
        var newRow = $("<tr>");
        var cols = "";
        
        cols += '<td><select class="form-control" required name="nama_barang[]" id="nama_barang'+counter+'" onchange="get_harga('+counter+')">';
    cols += '<option disabled selected>- Pilih Barang -</option>';
    
                    cols += '<?php                                
                                        foreach ($barang as $row) {  
                                      echo '<option value="'.$row->id_barang.'">'.$row->nama_barang.'</option>';
                                      }
                    ?>';
                    cols +='</select></td>';
        cols += '<td><input class="form-control" type="text" name="merek[]" id="merek'+counter+'"></td>';

        cols += '<td><input class="form-control" type="text" name="warna[]" id="warna'+counter+'"></td>';

        cols += '<td><input class="form-control" type="text" name="memo_order[]" id="memo_order'+counter+'"></td>';

        cols += '<td><select class="form-control" required name="pelayanan[]" id="pelayanan'+counter+'" onchange="get_harga('+counter+')">';
    cols += '<option disabled diselected>- Pilih layanan -</option>';
  
                    cols += '<option value="2">Laundry</option><option value="3">Pressing</option><option value="4">Dry</option>';
          cols +=  '</select></td>';

        cols += '<td><input class="form-control" type="text" name="harga[]" id="harga'+counter+'" onkeyup="sum('+counter+')" readonly></td>';

        cols += '<td><input class="form-control" type="text" name="jumlah[]" id="jumlah'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td><input class="form-control" type="text" name="harga_kimia[]" id="harga_kimia'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td style="display: none"><input type="hidden" name="total_harga[]" id="totalharga'+counter+'" class="form-control" readonly=""></td>';

        cols += '<td style="display: none"><input type="hidden" name="total_kimia[]" id="total_kimia'+counter+'" class="form-control" readonly=""></td>';

        cols += '<td><input type="checkbox" name="sepasang[]" id="sepasang'+counter+'" value="Ya"></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger" value="Hapus"></td>';
        console.log(cols);  
        newRow.append(cols);
        $("table.order-list").append(newRow);
        no++;
        counter++;
        ; 
    }); 



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        //counter -= 1
    });


});
</script>




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
