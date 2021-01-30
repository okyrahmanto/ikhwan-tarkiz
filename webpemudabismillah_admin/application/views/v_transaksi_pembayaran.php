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
                <form method="post" action="<?php echo base_url() ?>index.php/admin/proses_transaksi_pembayaran">

                  <table width="100%" border="0">
                    <tr>
                      <td>
                          <div class="form-group col-xs-6">
                            <label for="text">Jenis Pembayaran</label><br/>
                            <input type="radio" name="opsi" value="utang" class="detail">Utang
                            <br/>
                            <input type="radio" name="opsi" value="piutang" class="detail">Piutang
                          </div>

                        <div id="form-input">
                          <div class="form-group col-xs-6">
                             <label for="text">Pelanggan/Vendor</label>
                              <select class="form-control" name="id_pelanggan" id="pelanggan">
                                <option value="" disabled selected>-- Pilih Kustomer --</option>
                                <?php                                
                                foreach ($pelanggan as $data) {  
                              echo "<option value='".$data->id_pelanggan."'>".$data->id_pelanggan." - ".$data->nama_pelanggan."</option>";
                              }
                            ?>
                            </select>
                          </div>
                        </div>

                        <div id="form-input2">
                          <div class="form-group col-xs-6">
                             <label for="text">Pelanggan/Vendor</label>
                              <select class="form-control" name="id_vendor" id="id_vendor">
                                <option value="" disabled selected>-- Pilih Kustomer --</option>
                                <?php                                
                                foreach ($vendor as $data) {  
                              echo "<option value='".$data->id_vendor."'>".$data->id_vendor." - ".$data->nama_vendor."</option>";
                              }
                            ?>
                            </select>
                          </div>
                        </div>
                      </td>
          
                      <td>
                        <div class="form-group col-xs-6">
                          <label for="text">No. Kontrak/SPK</label>
                          <input type="text" class="form-control" name="no_kontrak" required="">
                        </div>
                         <div class="form-group col-xs-6">
                          <label for="text">Tanggal</label>
                          <input type="date" class="form-control" name="tgl_pembayaran" required="" value="<?php echo date('Y-m-d')?>">
                        </div>
                      </td>

                      <tr>
                        <td>
                          <div class="form-group col-xs-6">
                            <h4 class="data_pelanggan"></h4>
                            <h4 class="coba"></h4>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td colspan="2" style=" background-color: black;height: 3px"></td>
                      </tr>

                      <tr>
                        <td colspan="2"><h4 style="display: none;"><b>Data Transaksi Cucian</b></h4></td>
                      </tr>

                      <!-- Tabel Untuk Input Data Cucian -->
                      <tr>
                        <td colspan="2">
                          <table width="100%" border="1" class="table order-list table-bordered table-striped">
                            <thead>
                              <th width="30%">Perihal Pembayaran</th>
                              <th width="20%">MemoOrder</th>
                              <th width="10%">Harga Pembayaran</th>
                              <th style="display: none">Aksi</th>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="text" name="keterangan[]" id="keterangan0" class="form-control"></td>
                                <td><input type="text" name="memo_order[]" id="memo_order0" class="form-control"></td>
                                <td><input type="text" name="total_harga[]" id="totalharga0" class="form-control" onkeyup="calculateGrandTotal()"></td>
                                <td class="col-sm-2"><a class="deleteRow"></a>
                                </td>
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="2">
                                  <label>Total Pembayaran</label>
                                </td>
                                <td><input type="text" name="alltotal" id="alltotal" class="form-control" readonly="" onclick="calculateGrandTotal()"></td>
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

                    <tr style="display: none">
                      <td>
                        <div class="form-group">
                          <div class="col-xs-6">
                            <label for="text">Biaya</label>
                          </div>
                          <div class="col-xs-6">
                            <input type="text" id="biaya" name="biaya" class="form-control" onclick="total_barang()" readonly="" style="text-align: right;">
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <div class="col-xs-3">
                            <label for="text"><h4><b>TOTAL</b></h4></label>
                          </div>

                          <div class="col-xs-9">
                            <textarea class="form-control" name="total" id="total" style="text-align: right;font-size: 10pt;font-weight: bold;"></textarea>
                          </div>
                        </div>
                      </td>
                    </tr>

                     <tr>
                      <td>
                          <div class="form-group col-xs-6" style="display: none">
                            <label for="text">Akun Biaya</label>
                            <select class="form-control" name="akun_biaya">
                              <option value="" disabled selected>-- Pilih Akun --</option>
                              <?php foreach ($akun as $row) {  
                                echo "<option value='".$row->id_akun."'>".$row->nama_akun."</option>";
                              }?>
                            </select>
                          </div>

                           <div class="form-group col-xs-6" style="display: none">
                            <label for="text">Akun Total</label>
                            <select class="form-control" name="akun_total">
                              <option value="" disabled selected>-- Pilih Akun --</option>
                              <?php foreach ($akun as $row) {  
                                echo "<option value='".$row->id_akun."'>".$row->nama_akun."</option>";
                              }?>
                            </select>
                          </div>
                      </td>
                      <td>
                       
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group col-xs-6">
                          <input class="btn btn-success" type="submit" name="submit" value="Simpan">
                        </div>
                      </td>
                    </tr>
                  </table>
              </form>
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
<script src="<?php echo base_url()?>assets/select2/js/select2.js"></script>
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
$(document).ready(function(){
$("#form-input").css("display","none");
$("#form-input2").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
if ($("input[name='opsi']:checked").val() == "utang" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$("#form-input").slideDown("fast");
$("#form-input2").css("display","none");  //Efek Slide Down (Menampilkan Form Input)
}
if($("input[name='opsi']:checked").val() == "piutang" ) {
$("#form-input2").slideDown("fast");
$("#form-input").css("display","none");  //Efek Slide Up (Menghilangkan Form Input)
}
});
});
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#').change(function(){
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

/*function sum() {
      var index = 0;
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
}*/



function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name="total_harga[]"]').each(function () {
        grandTotal += +$(this).val();
    });
    console.log(grandTotal);
    $("#alltotal").val(grandTotal.toFixed(0));
    $("#biaya").val(grandTotal.toFixed(0));
    $("#total").val(grandTotal.toFixed(0));
}


function total_barang(){
    var totharga    = parseFloat(document.getElementById('alltotal').value);
  //  var totkimia   = parseFloat(document.getElementById('j_barang').value);
  //  var j_pelayanan = document.getElementById('jenis_pelayanan').value;

  //  console.log(j_pelayanan);
    var hitung = totharga ;
    console.log(hitung);
      document.getElementById('biaya').value = hitung;
    total_diskon();
  }



  function total_keseluruhan(){
    var biaya    = parseFloat(document.getElementById('biaya').value);
  
    console.log(hasil);
    document.getElementById('total').value = biaya;
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
        
        cols += '<td><input class="form-control" type="text" name="keterangan[]" id="keterangan'+counter+'" required>';
        cols += '<td><input class="form-control" type="text" name="memo_order[]" id="memo_order'+counter+'"></td>';
        cols += '<td><input type="text" name="total_harga[]" id="totalharga'+counter+'" class="form-control" onkeyup="calculateGrandTotal()"></td>';
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#nama_barang0').select2();

});
</script>
</body>
</html>
