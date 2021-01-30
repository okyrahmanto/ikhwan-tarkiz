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
                      <form method="get" action="<?php echo base_url('index.php/admin/neraca_range')?>">
                        <div class="col-xs-11">
                         <div class="form-group col-xs-1"><label class="control-label">Mulai Tgl</label> </div>
                         <div class="form-group col-xs-3"><input type="date" class="form-control" name="tgl_mulai" required value="<?php if(isset($tgl_mulai))echo $tgl_mulai ?>"> </div>

                         <div class="form-group col-xs-1"><label class="control-label">Sampai Tgl</label> </div>
                         <div class="form-group col-xs-3"><input type="date" class="form-control" name="tgl_sampai" required value="<?php if(isset($tgl_sampai))echo $tgl_sampai ?>"> </div>
                       </div>
                       

                     <div class="col-xs-11">
                      <div class="form-group col-xs-3">
                        <input type="submit" name="print" value="Cari" class="btn btn-primary" />
                        <input type="submit" name="print" value="Print" class="btn btn-success" />
                      </div>
                    </div>
                  </form>
                  <hr width="100%">

                  <div class="col-xs-8">
<table  id="printarea" class="table table-bordered">
    <thead>
<tr  class="table table-bordered tableizer-firstrow">
            <th style="text-align: center; " colspan="5">CV. INSAN MULIA</th>
        </tr>
    </thead>
<tbody>
    <tr>
<td style="text-align: center;" colspan="5">Laporan Neraca</td>
    </tr>
    <tr>
        <td colspan="5">Periode : <?php echo $tgl_mulai.' - '.$tgl_sampai;?></td>
    </tr>
    <tr>
        <td>No Akun</td>
        <td>Kelompok</td>
        <td>Header</td>
        <td>Akun</td>
        <td> Nilai Akun </td>

    </tr>
    <?php foreach ($hasil as $row) { ?>
    <tr>
        <td><?php echo $row['no_akun'];?></td>
        <td><?php echo $row['nama_akun_kelompok'];?></td>
        <td><?php echo $row['nama_akun_header'];?></td>
        <td><?php echo $row['nama_akun'];?></td>
        <td><?php echo $row['saldo_akhir'];?></td>
    </tr>
    <?php
    }
    ?>

</tbody>
</table>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>

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


    function printDiv() {
        window.frames["print_frame"].document.body.innerHTML = document.getElementById("printarea").innerHTML;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>
</body>
</html>



