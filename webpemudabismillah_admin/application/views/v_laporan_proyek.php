
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
              <h3 class="box-title">CV. InsanMulia</h3>
              <h4 align="right">Tanggal Hari Ini:  <?php echo tgl_indo(date('Y-m-d')) ?></h4>
              <hr width="100%">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <form method="post" action="<?php echo base_url('index.php/admin/laporan_proyek')?>">
                      <div class="col-xs-11">
                         <div class="form-group col-xs-1"><label class="control-label">Proyek</label> </div>
                          <div class="form-group col-xs-3">
                            <select name="proyek" class="form-control">
                              <option disabled="" selected="">--Pilih Proyek--</option>
                              <?php foreach ($proyek as $row) {
                               echo "<option value='".$row->id_proyek."'>".$row->id_proyek."-".$row->nama_proyek."</option>";
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

                  <div class="col-xs-6">
                    <h4 align="center"><b>Penjualan</b></h4>
                    <table width="100%" border="0" id="table_id" class="table table-bordered table-striped">
                      <thead>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Perihal Transaksi</th>
                        <th style="text-align: center">Total Penjualan</th>
                      </thead>
                      <tbody>
                        <?php
                        $no=1;
                        $t1=0;    
                        $t2=0;   
                        foreach($proyek_penjualan as $data){
                          ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data->nama_perihal ?></td>
                            <td align="right">
                              <?php if($data->retur=='retur_penjualan'){
                                $totretur= -1*$data->total_penjualan; 
                                echo rupiah($totretur);
                                $t1 +=$totretur;
                              }
                                else{echo rupiah($data->total_penjualan);
                                  $t2 +=$data->total_penjualan;} ?></td>
                          </tr>
                        <?php $no++;}
                        $alltotal1=$t1+$t2;?>
                        <tr>
                          <td colspan="2" align="center"><b>Total</b></td>
                          <td align="right"><?php echo rupiah($alltotal1); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-xs-6">
                     <h4 align="center"><b>Pembelian</b></h4>
                    <table width="100%" border="0" id="example1" class="table table-bordered table-striped">
                      <thead>
                        <th style="text-align: center">No</th>
                        <th style="text-align: center">Perihal Transaksi</th>
                        <th style="text-align: center">Total Pembelian</th>
                      </thead>
                      <tbody>
                        <?php
                        $no=1;     
                        $totpem=0;
                        $totpem2=0;  
                        foreach($proyek_pembelian as $data){
                          ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data->nama_perihal ?></td>
                            <td align="right"><?php if($data->retur=='retur_pembelian'){
                                $tpem= -1*$data->total_pembelian; 
                                echo rupiah($tpem);
                                $totpem +=$tpem;
                              }
                                else{echo rupiah($data->total_pembelian);
                                  $totpem2 +=$data->total_pembelian;} ?></td>
                          </tr>
                        <?php $no++;} 
                        $alltotal2=$totpem+$totpem2;?>
                           <tr>
                          <td colspan="2" align="center"><b>Total</b></td>
                          <td align="right"><?php echo rupiah($alltotal2); ?></td>
                        </tr>

                        <tr>
                          <td colspan="2" align="center"><b>Laba Proyek</b></td>
                          <td align="right"><?php $keseluruhan=$alltotal1-$alltotal2; echo rupiah($keseluruhan); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
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
      'searching'   : false,
      'lengthChange': false,
    })
    $('#example1').DataTable({
      'searching'   : false,
      'lengthChange': false,
    })
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
