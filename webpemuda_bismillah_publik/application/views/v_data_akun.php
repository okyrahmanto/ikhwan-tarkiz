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
            <div class="col-xs-12" style="margin-bottom: 10px">
             <a href="javascript:;"
               data-toggle="modal" data-target="#">
               <button  data-toggle="modal" data-target="#tambah" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
            </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <table width="100%" border="0" id="table_id" class="table table-bordered table-striped">
                    <thead>
                      <th>Tanggal</th>
                      <th>No. Akun</th>
                      <th>Nama Akun</th>
                      <th>Tipe Akun</th>
                      <th>Saldo Awal</th>
                      <th>Opsi</th>
                    </thead>
                    <tbody>
                    <?php 
                        foreach($data_akun as $tampil){
                    ?>
                        <tr>
                            <td><?php echo $tampil->tgl ?></td>
                            <td><?php echo $tampil->no_akun ?></td>
                            <td><?php echo $tampil->nama_akun ?></td>
                            <td><?php echo $tampil->tipe_akun ?></td>
                            <td align="right"><?php echo rupiah($tampil->saldo_awal) ?></td>
                            <td align="center">
                              <a href="javascript:;"
                                  data-toggle="modal" data-target="#">
                                  <button  data-toggle="modal" data-target="#edit<?php echo $tampil->id_data_akun ?>" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                              </a>
                              <a href="javascript:;"
                                  data-toggle="modal" data-target="#">
                                  <button  data-toggle="modal" data-target="#hapus<?php echo $tampil->id_data_akun ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                              </a>
                            </td>
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
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">CV. InsanMulia</a>.</strong>
  </footer>
<!-- Modal Tambah-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Data Akun</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/tambah_data_akun/')?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">

                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Tanggal</label> </div>
                         <div class="col-xs-6"><input type="date" name="tgl" id="tgl" class="form-control"></div>
                      </div>
                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Nama Akun</label> </div>
                         <div class="col-xs-6">
                           <select class="form-control" name="id_akun" id="id_akun">
                                <option value="" disabled selected>-- Pilih Akun --</option>
                                <?php                                
                                foreach ($akun as $data) {  
                              echo "<option value='".$data->id_akun."'>".$data->id_akun." - ".$data->nama_akun."</option>";
                              }
                            ?>
                            </select>
                         </div>
                      </div>

                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Saldo Awal</label> </div>
                         <div class="col-xs-6"><input type="text" class="form-control" name="saldo_awal" id="saldo_awal"></div>
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

<!-- Modal Edit-->
<?php                                
  foreach ($data_akun as $data) {  ?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?php echo $data->id_data_akun ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Edit Data Akun</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/edit_data_akun')?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">

                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">ID Data Akun</label> </div>
                         <div class="col-xs-6"><input type="text" name="id_data_akun" id="id_data_akun" class="form-control" readonly="" value="<?php echo $data->id_data_akun ?>"></div>
                      </div>

                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Tanggal</label> </div>
                         <div class="col-xs-6"><input type="date" name="tgl" id="tgl" class="form-control" value="<?php echo $data->tgl ?>"></div>
                      </div>

                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Nama Akun</label> </div>
                         <div class="col-xs-6">
                           <select class="form-control" name="id_akun" id="id_akun">
                                <option value="" disabled selected>-- Pilih Akun --</option>
                                <?php                                
                                 foreach ($akun as $row) {  
                                      echo "<option value='$row->id_akun'";
                                      echo $data->id_akun==$row->id_akun?'selected':'';
                                          echo ">$row->id_akun ".'-'." $row->nama_akun</option>";
                                      }
                            ?>
                            </select>
                         </div>
                       </div>

                      <div class="form-group">
                         <div class="col-xs-4"><label class="control-label">Saldo Awal</label> </div>
                         <div class="col-xs-6"><input type="text" class="form-control" name="saldo_awal" id="saldo_awal" value="<?php echo $data->saldo_awal ?>"></div>
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
<?php }?>
<!-- END Modal Edit -->

<?php                                
  foreach ($data_akun as $data) {  ?>
<!-- Modal Hapus-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus<?php echo $data->id_data_akun ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Yakin ingin menghapus data ?</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('index.php/admin/hapus_data_akun/')?><?php echo $data->id_data_akun ?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">

                  
                      <button class="btn btn-success" type="submit"> Ya &nbsp;</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Hapus -->
  
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
function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
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
