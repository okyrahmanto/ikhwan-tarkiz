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
                      <form method="post" action="<?php echo base_url('index.php/admin/buku_besar_range')?>">
                        <div class="col-xs-11">
                         <div class="form-group col-xs-1"><label class="control-label">Mulai Tgl</label> </div>
                         <div class="form-group col-xs-3"><input type="date" class="form-control" name="tgl_mulai" required value="<?php if(isset($tgl_mulai))echo $tgl_mulai ?>"> </div>

                         <div class="form-group col-xs-1"><label class="control-label">Sampai Tgl</label> </div>
                         <div class="form-group col-xs-3"><input type="date" class="form-control" name="tgl_sampai" required value="<?php if(isset($tgl_sampai))echo $tgl_sampai ?>"> </div>
                       </div>
                       <div class="col-xs-11">
                         <div class="form-group col-xs-1"><label class="control-label">ID Akun</label> </div>
                         <div class="form-group col-xs-3">
                          <select name="akun" class="form-control" required="">
                            <option value="" disabled="" selected="">-- Pilih Akun</option>
                            <?php foreach ($akun as $row) {
                                if ($row->id_akun==$data_akun->id_akun) {
                                    echo "<option selected='selected' value='".$row->id_akun."'>".$row->id_akun."-".$row->nama_akun."</option>";
                                } else {
                                    echo "<option value='".$row->id_akun."'>".$row->id_akun."-".$row->nama_akun."</option>";
                                }
                             
                           } ?>
                         </select> 
                       </div>
                     </div>


                     <div class="col-xs-11">
                      <div class="form-group col-xs-3">
                        <input type="submit" name="submit" value="Cari" class="btn btn-primary" />
                      </div>
                    </div>
                  </form>
                  <hr width="100%">

                  <div class="col-xs-8">
                    <h3><b>Akun <?php echo $data_akun->nama_akun; ?></b></h3>
                    <table width="100%" border="0" id="table_id" class="table table-bordered">
                      <thead>
                        <th style="text-align: center">Tgl Transaksi</th>
                        <th style="text-align: center">Keterangan</th>
                        <th style="text-align: center">Ref</th>
                        <th style="text-align: center">Debit</th>
                        <th style="text-align: center">Kredit</th>
                      </thead>
                      <tbody>
                        <?php
                            foreach ($data_buku_besar as $row) {
                                echo '<tr>';
                                echo '<td>'.$row->tgl_transaksi.'</td>';
                                 echo '<td>'.$row->keterangan_perihal.'</td>';
                                 echo '<td>'.$row->ref.'</td>';
                                 echo '<td>'.rupiah($row->debet).'</td>';
                                 echo '<td>'.rupiah($row->kredit).'</td>';
                                echo '</tr>';
                                
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-xs-4">
                    <h3 align="left"><b>Saldo</b></h3>
                    <table class="table table-bordered table-striped">
                      <tr align="right">
                        <td>Saldo Awal</td>
                        <td>Saldo Akhir</td>
                      </tr>
                      <tr>
                        <td align="right"><?php echo rupiah($data_saldo_awal->jumlah_saldo_awal) ?></td>
                        <td align="right"><?php 
                        echo rupiah(bcadd($total_saldo_transaksi->saldo_akhir,$data_saldo_awal->jumlah_saldo_awal));?></td>
                      </tr>
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
    $('#table_id').DataTable({
      "order" : [[ 1, "desc" ]],
      'lengthChange': false,
      'searching'   : false,
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
