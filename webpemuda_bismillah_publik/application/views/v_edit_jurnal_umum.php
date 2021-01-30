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
              <h3>Edit Jurnal</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="<?php echo base_url('index.php/admin/proses_edit_jurnal_umum/'.$jurnal->id_barang_jurnal)?>">
                <div class="form-group col-xs-12" style="display: none">
                 <div class="col-xs-2"><label class="control-label">ID Jurnal</label> </div>
                 <div class="col-xs-3">
                  <input type="text" class="form-control" name="id_jurnal" value="<?php echo $jurnal->id_jurnal?>" readonly />
                 </div>
               </div>

               <div class="form-group col-xs-12">
                 <div class="col-xs-2"><label class="control-label">Tgl Jurnal</label> </div>
                 <div class="col-xs-3"><input type="date" class="form-control" name="tgl" value="<?php echo $jurnal->tgl_jurnal?>" /> </div>
               </div>

                <div class="form-group col-xs-12">
                 <div class="col-xs-2"><label class="control-label">ID Akun</label> </div>
                 <div class="col-xs-3">
                  <select name="akun" class="form-control">
                    <?php
                    foreach ($akun as $p)
                    {
                      echo "<option value='$p->id_akun'";
                      echo $jurnal->id_akun==$p->id_akun?'selected':'';
                      echo ">$p->nama_akun</option>";
                    }
                    ?>
                  </select> 
                </div>
               </div>

               <div class="form-group col-xs-12">
                 <div class="col-xs-2"><label class="control-label">Keterangan</label> </div>
                  <div class="col-xs-3">
                    <select name="keterangan" class="form-control">
                      <?php if($jurnal->keterangan=='Debet'){ 
                        echo "<option value='Debet' selected>Debet</option>
                        <option value='kredit'>Kredit</option>";}
                        if($jurnal->keterangan=='Kredit'){
                          echo "<option value='Debet'>Debet</option>
                        <option value='kredit' selected>Kredit</option>";} ?>
                    </select>
                  </div>
               </div>

               <div class="form-group col-xs-12">
                 <div class="col-xs-2"><label class="control-label">Perihal</label> </div>
                 <div class="col-xs-3"><input type="text" class="form-control" name="perihal" value="<?php echo $jurnal->perihal?>" /> </div>
               </div>

               <div class="form-group col-xs-12">
                 <div class="col-xs-2"><label class="control-label">Harga</label> </div>
                 <div class="col-xs-3"><input type="text" class="form-control" name="harga" value="<?php echo $jurnal->harga?>" /> </div>
               </div>

               <div class="form-group col-xs-12">
                 <div class="col-xs-2"><label class="control-label">Jumlah</label> </div>
                 <div class="col-xs-3"><input type="text" class="form-control" name="jumlah" value="<?php echo $jurnal->jumlah?>" /> </div>
               </div>

               <div class="form-group col-sm-2">
                <input type="submit" name="submit" value="Simpan" class="btn btn-primary" />
              </div>
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
