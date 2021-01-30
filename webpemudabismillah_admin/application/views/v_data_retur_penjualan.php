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
                  <table width="100%" border="0" id="table_id" class="table table-bordered table-striped">
                    <thead>
                      <th>No Nota</th>
                      <th>Tgl Masuk</th>
                      <th style="display: none">Tgl Selesai</th>
                      <th>Nama Kostumer</th>
                      <th style="display: none">Status Konfirmasi</th>
                      <th style="display: none">Shift</th>
                      <th>Tagihan</th>
                      <th style="display: none">Lunas</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;       
                        foreach($transaksi as $tampil){
                    ?>
                        <tr>
                            <td><?php echo $tampil->no_kontrak ?></td>
                            <td><?php
                            $tgl_terima=date_create($tampil->tgl_diterima); echo date_format($tgl_terima,"d-m-Y") ?></td>
                            <td style="display: none"><?php 
                            $tgl_kembali=date_create($tampil->tgl_dikembalikan); echo date_format($tgl_kembali,"d-m-Y"); ?></td>
                            <td><?php echo $tampil->nama_pelanggan ?></td>
                            <td style="display: none"><?php echo $tampil->status_konfirmasi ?></td>
                            <td style="display: none"><?php echo $tampil->shift ?></td>
                            <td align="right"><?php echo $tampil->tagihan ?></td>
                            <td style="display: none"><?php echo $tampil->status_lunas ?></td>
                            <td>
                              <a href="javascript:;"
                                  data-toggle="modal" data-target="#">
                                  <button  data-toggle="modal" data-target="#konfirmasi<?php echo $tampil->id_transaksi ?>" class="btn btn-info">Konfirmasi</button>
                              </a>
                              <a style="display:none;"  href="<?php echo base_url() ?>index.php/admin/edit_transaksi/<?php echo $tampil->id_transaksi ?>" class="btn btn-success" style="display: none">Detail</a>
                              <a href="<?php echo base_url() ?>index.php/admin/cetak_transaksi/<?php echo $tampil->id_transaksi ?>" class="btn btn-warning" target="_blank" style="display: none"><i class="glyphicon glyphicon-print"></i></a>

                              <a href="javascript:;"
                                  data-toggle="modal" data-target="#">
                                  <button  data-toggle="modal" data-target="#hapus<?php echo $tampil->id_transaksi ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                              </a>
                            </td>
                        </tr>

                     
                         <?php } ?>
                    
                    <?php
                    foreach($transaksi as $tampil){
                    $diterima=$tampil->tgl_diterima;
                    $jatuh_tempo=mktime(0, 0, 0, date("m",strtotime($diterima)), date("d",strtotime($diterima))+3, date("Y",strtotime($diterima)));

                    $jatuh_tempo = date("Y-m-d",$jatuh_tempo);
                    $jatuh_tempo=new DateTime($jatuh_tempo);
                    $sekarang=new DateTime ();

                    $perbedaan = $jatuh_tempo->diff($sekarang);
                   // $selesai=date('Y-m-d',$selesai);
                    //echo strtotime($masuk);
                    //$perbedaan = $selesai-$masuk;
                    }?>
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
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">CV. InsanMulia</a>.</strong>
  </footer>
<!-- Modal Tambah-->
<?php foreach ($transaksi as $tampil) {
  ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="konfirmasi<?php echo $tampil->id_transaksi ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Konfirmasi Transaksi</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/input_konfirmasi/')?><?php echo $tampil->id_transaksi ?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">

                    <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $tampil->id_transaksi ?>">
                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Konfirmasi Selesai</label> </div>
                         <div class="col-xs-6"><input type="checkbox" name="konfirmasi_selesai" id="konfirmasi" value="Ya" onchange="konfirmasi_waktu_selesai()"></div>
                      </div>
                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Selesai Tgl</label> </div>
                         <div class="col-xs-6"><input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" name="tgl_selesai" id="tgl_selesai"></div>
                      </div>
                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Jam</label> </div>
                         <div class="col-xs-6"><input type="text" class="form-control" name="jam_selesai" id="jam_selesai"></div>
                      </div>
                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Petugas Opr</label> </div>
                         <div class="col-xs-6"><input type="text" class="form-control" name="petugas_opr"></div>
                      </div>
                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Bon Status</label> </div>
                         <div class="col-xs-6"><input type="checkbox" name="bon_status" value="Ya"></div>
                      </div>
                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Tgl Lunas</label> </div>
                         <div class="col-xs-6"><input type="date" class="form-control" name="tgl_lunas" value="<?php echo date('Y-m-d') ?>"></div>
                      </div>

                      
                         <hr width="100%">
                    

                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Konfirmasi Terima</label> </div>
                         <div class="col-xs-6"><input type="checkbox" name="konfirmasi_terima" value="Ya" id="konfirmasi_terima" onchange="konfirmasi_waktu_terima()"></div>
                      </div>
                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Tgl Terima</label> </div>
                         <div class="col-xs-6"><input type="date" class="form-control" name="tgl_terima" value="<?php echo date('Y-m-d') ?>"></div>
                      </div>
                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Jam Terima</label> </div>
                         <div class="col-xs-6"><input type="text" class="form-control" name="jam_terima" id="jam_terima"></div>
                      </div>
                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Pending</label> </div>
                         <div class="col-xs-6"><input type="checkbox" name="pending" value="Ya"></div>
                      </div>

                      
                         <hr width="100%">

                      <div class="form-group" style="display: none">
                        
                         <div class="col-xs-4"><label class="control-label">Sisa Hari</label> </div>
                         <div class="col-xs-6"><input type="text" class="form-control" name="sisa_hari" value="<?php 
                         if($sekarang>$jatuh_tempo){
                          echo "-".$perbedaan->d." Hari";
                        }else{
                          echo $perbedaan->d." Hari";
                        }?>"></div>
                      </div>
                      
                      <div class="form-group" style="display: none">
                         <div class="col-xs-4"><label class="control-label">Status Diskon</label> </div>
                         <div class="col-xs-4"><input type="checkbox" name="status_diskon" value="Ya" id="status_diskon" onchange="status_diskon_tampil()"></div>

                         <div class="col-xs-4"><input type="text" name="tampil_diskon" id="tampil_diskon"></div>
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" type="submit"> Simpan&nbsp;</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                  </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Tambah -->

<!-- Modal Tambah-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus<?php echo $tampil->id_transaksi ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Yakin ingin menghapus data ?</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/hapus_transaksi_retur_penjualan/')?><?php echo $tampil->id_transaksi ?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">

                  
                      <button class="btn btn-success" type="submit"> Ya &nbsp;</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Tambah -->
  
<?php } ?>
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
    $('#table_id').DataTable({
      "order" : [[ 1, "desc" ]]
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

<script type="text/javascript">
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

  function status_diskon_tampil()
  {
      if (document.getElementById('status_diskon').checked) 
    {
        document.getElementById('tampil_diskon').value = "<?php foreach($transaksi as $tampil){ echo $tampil->status_diskon; }  ?> %";
    } else {
        document.getElementById('tampil_diskon').value = "";
    }
  }
</script>
</body>
</html>
