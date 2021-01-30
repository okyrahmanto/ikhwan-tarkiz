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
              <form method="post" action="<?php echo base_url('index.php/admin/data_jurnal_umum_range')?>">
                <div class="form-group col-xs-6">
                 <div class="col-xs-2"><label class="control-label">Mulai Tgl</label> </div>
                 <div class="col-xs-4"><input type="date" class="form-control" name="tgl_mulai"/> </div>

                 <div class="col-xs-2"><label class="control-label">Sampai Tgl</label> </div>
                 <div class="col-xs-4"><input type="date" class="form-control" name="tgl_sampai"/> </div>
               </div>

               <div class="form-group col-sm-2">
                <input type="submit" name="submit" value="cari" class="btn btn-primary" />
              </div>
            </form>

            <div class="col-xs-12">
              <table border="0" id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th rowspan="2" style="text-align: center">Tanggal</th>
                    <th rowspan="2" style="text-align: center">Perihal</th>
                    <th rowspan="2" style="text-align: center">Keterangan</th>
                    <th rowspan="2" style="text-align: center">Harga</th>
                    <th rowspan="2" style="text-align: center">Jumlah</th>
                    <th rowspan="2" style="text-align: center">Id Akun</th>
                    <th rowspan="2" style="text-align: center">Nama Akun</th>
                    <th colspan="2" style="text-align: center">Keterangan</th>
                    <th rowspan="2" style="text-align: center">Aksi</th>
                  </tr>
                  <tr>
                    <th style="text-align: center">Debet</th>
                    <th style="text-align: center">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;       
                  foreach($jurnal as $tampil){
                    ?>
                    <tr>
                      <td><?php echo $tampil->tgl_jurnal ?></td>
                      <td><?php echo $tampil->perihal ?></td>
                      <td><?php echo $tampil->keterangan ?></td>
                      <td><?php echo $tampil->harga ?></td>
                      <td><?php echo $tampil->jumlah ?></td>
                      <td><?php echo $tampil->id_akun ?></td>
                      <td><?php echo $tampil->nama_akun ?></td>
                      <td><?php if($tampil->keterangan=='Debet'){ echo $tampil->total; }else{ echo "-";} ?></td>
                      <td><?php if($tampil->keterangan=='Kredit'){ echo $tampil->total; }else{ echo "-";} ?></td>
                      <td>
                         <a href="<?php echo base_url() ?>index.php/admin/edit_jurnal_umum/<?php echo $tampil->id_barang_jurnal?>"><button class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</button></a>
                        <a href="javascript:;"
                        data-toggle="modal" data-target="#" style="display: none;">
                        <button  data-toggle="modal" data-target="#edit<?php echo $tampil->id_jurnal ?>" class="btn btn-info">Edit</button>
                      </a>

                      <a href="javascript:;"
                      data-toggle="modal" data-target="#">
                      <button  data-toggle="modal" data-target="#hapus<?php echo $tampil->id_barang_jurnal ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                    </a>
                  </td>
                </tr>


              <?php } ?>
            </tbody>
          </table>
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
<!-- Modal Tambah-->
<?php foreach ($jurnal as $tampil) {
  ?>
  <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit<?php echo $tampil->id_jurnal ?>" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Edit Jurnal Umum</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('index.php/admin/proses_edit_jurnal_umum/')?><?php echo $tampil->id_jurnal ?>" method="post" enctype="multipart/form-data" role="form">
          <div class="modal-body">
            <input type="hidden" class="form-control" name="id_jurnal" value="<?php echo $tampil->id_jurnal ?>">

            <div class="form-group">
             <div class="col-xs-3"><label class="control-label">Tgl Jurnal</label> </div>
             <div class="col-xs-6"><input type="date" class="form-control" name="tgl" value="<?php echo $tampil->tgl_jurnal ?>"></div>
           </div>

           <div class="form-group">
             <div class="col-xs-3"><label class="control-label">Perihal</label> </div>
             <div class="col-xs-6"><input type="text" class="form-control" name="perihal" value="<?php echo $tampil->perihal ?>"></div>
           </div>

           <div class="form-group">
             <div class="col-xs-3"><label class="control-label">Keterangan</label> </div>
             <div class="col-xs-6">
              <select name="keterangan" class="form-control">
                <?php if($tampil->keterangan=='Debet'){ 
                  echo "<option value='Debet' selected>Debet</option>
                  <option value='kredit'>Kredit</option>";}
                  if($tampil->keterangan=='Kredit'){
                    echo "<option value='Debet'>Debet</option>
                  <option value='kredit' selected>Kredit</option>";} ?>
              </select>
             </div>
           </div>

           <div class="form-group">
             <div class="col-xs-3"><label class="control-label">Harga</label> </div>
             <div class="col-xs-6"><input type="text" class="form-control" name="harga" value="<?php echo $tampil->harga ?>"></div>
           </div>

           <div class="form-group">
             <div class="col-xs-3"><label class="control-label">Jumlah</label> </div>
             <div class="col-xs-6"><input type="text" class="form-control" name="jumlah" value="<?php echo $tampil->jumlah ?>"></div>
           </div>

           <div class="form-group">
             <div class="col-xs-3"><label class="control-label">ID Akun</label> </div>
             <div class="col-xs-6"> <?php echo $tampil->id_akun ?>
              <select name="id_akun" class="form-control">
               <?php
                  foreach ($akun as $hasil)
                  {
                    echo "<option value='$hasil->id_akun'";
                    echo $tampil->id_akun==$hasil->id_akun?'selected':'';
                    echo ">$hasil->nama_akun</option>";
                  }
                ?>
              </select>
             </div>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus<?php echo $tampil->id_barang_jurnal ?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Yakin ingin menghapus data ?</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('index.php/admin/hapus_barang_jurnal/')?><?php echo $tampil->id_barang_jurnal ?>" method="post" enctype="multipart/form-data" role="form">
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
