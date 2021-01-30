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
            <div align="right" class="col-xs-11">
               <a href="<?php echo base_url() ?>index.php/admin/data_jurnal_umum"><button class="btn btn-primary">Lihat Jurnal</button></a>
            </div>
           
            <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="<?php echo base_url() ?>index.php/admin/proses_input_jurnal_umum">

                  <table width="100%" border="0">
                    <tr>
                      <td>
                        <div class="form-group col-xs-2">
                          <label for="text">Tanggal</label>
                          <input type="date" class="form-control" name="tgl" required="">
                        </div>
                      </td>
                    </tr>
                     <tr>
                        <td colspan="2" style=" background-color: black;height: 3px"></td>
                    </tr>

                      <!-- Tabel Untuk Input Data Jurnal -->
                      <tr>
                        <td colspan="2">
                          <table width="100%" border="1" class="table order-list table-bordered table-striped">
                            <thead>
                              <th width="20%">Akun</th>
                              <th width="15%">Keterangan</th>
                              <th width="20%">Perihal</th>
                              <th width="10%">Harga</th>
                              <th width="10%">Jumlah</th>
                              <th width="14%">Total</th>
                              <th>Aksi</th>
                            </thead>
                            <tbody>
                              <tr>
                                <td width="20%">
                                <select class="form-control" name="akun[]" id="akun0">
                                    <option value="" disabled selected>-- Pilih Akun --</option>
                                        <?php                                
                                        foreach ($akun as $row) {  
                                      echo "<option value='".$row->id_akun."'>".$row->id_akun."-".$row->nama_akun."</option>";
                                      
                                      }
                                   
                                    ?>
                                </select>
                                </td>
                                <td>
                                  <select class="form-control" name="keterangan[]" id="keterangan">
                                   <option value="" disabled diselected>-- Pilih Keterangan--</option>
                                   <option value="Debet">Debet</option>
                                   <option value="Kredit">Kredit</option>
                                  </select>
                                </td>
                                <td><input type="text" name="perihal[]" id="perihal0" class="form-control"></td>
                                <td><input type="text" name="harga[]" id="harga0" class="form-control" onkeyup="sum(0)"></td>
                                <td><input type="text" name="jumlah[]" id="jumlah0" class="form-control" onkeyup="sum(0)"></td>
                                <td><input type="text" name="total_harga[]" id="totalharga0" class="form-control"></td>
                               
                                <td class="col-sm-2"><a class="deleteRow"></a>
                                </td>
                              </tr>
                            </tbody>
                            <tfoot>
                               <tr>
                                  <td colspan="6">
                                      <input type="button" class="btn btn-primary " id="addrow" value="Tambah" />
                                  </td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <label><h4>Total</h4></label>
                                </td>
                                <td><input type="text" name="alltotal" id="alltotal" class="form-control" readonly="" onclick="calculateGrandTotal()" ></td>
                              
                              </tr>
                             
                              
                          </tfoot>
                          </table>
                        </td>
                      </tr>
                      <!-- Tabel Input Data Cucian Selesai -->
 
                    <tr>
                        <td colspan="2" style=" background-color: black;height: 3px"></td>
                    </tr>

                    <tr>
                      <td>
                        <div class="col-xs-12" style="padding-top: 10px">
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
    total_barang();
}

function jumlah_barang() {
    var grandTotal = 0;
    $("table.order-list").find('input[name="total_kimia[]"]').each(function () {
        grandTotal += +$(this).val();
    });
    console.log(grandTotal);
    $("#j_barang").val(grandTotal.toFixed(2));
   // total_barang();
}

function total_barang(){
    var totharga    = parseFloat(document.getElementById('alltotal').value);
  //  var totkimia   = parseFloat(document.getElementById('j_barang').value);
  //  var j_pelayanan = document.getElementById('jenis_pelayanan').value;

  //  console.log(j_pelayanan);
    var hitung = totharga ;
    var kilat = 2*hitung;
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
   // document.getElementById('biaya_jemput').value = 0;
    total_keseluruhan();
  }

  function total_keseluruhan(){
    var biaya    = parseFloat(document.getElementById('biaya').value);
   // var biaya_jemput    = parseFloat(document.getElementById('biaya_jemput').value);
    var diskon2   = parseFloat(document.getElementById('diskon2').value);

    var hasil = biaya - diskon2;
    console.log(hasil);
    document.getElementById('total').value = hasil;
  }

function sum(id) {
      var index = id;
      var harga = document.getElementById('harga'+index).value;
      var jumlah = document.getElementById('jumlah'+index).value;
     // var kimia = document.getElementById('harga_kimia'+index).value;

      var result = parseInt(harga) * parseInt(jumlah);
     // var result2 = parseInt(kimia) * parseInt(jumlah);

      if (!isNaN(result)) {
         document.getElementById('totalharga'+index).value = result;
      }

     // if (!isNaN(result2)) {
     //    document.getElementById('total_kimia'+index).value = result2;
     // }
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
        
        cols += '<td><select class="form-control" required name="akun[]" id="akun'+counter+'">';
    cols += '<option disabled selected>- Pilih Akun -</option>';
    
                    cols += '<?php                                
                                        foreach ($akun as $row) {  
                                      echo '<option value="'.$row->id_akun.'">'.$row->nama_akun.'</option>';
                                      }
                    ?>';
                    cols +='</select></td>';

        cols += '<td><select class="form-control" required name="keterangan[]" id="keterangan'+counter+'">';
    cols += '<option disabled diselected>- Pilih Keterangan -</option>';
  
                    cols += '<option value="Debet">Debet</option><option value="Kredit">Kredit</option>';
          cols +=  '</select></td>';

        cols += '<td><input class="form-control" type="text" name="perihal[]" id="perihal'+counter+'"></td>';

        cols += '<td><input class="form-control" type="text" name="harga[]" id="harga'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td><input class="form-control" type="text" name="jumlah[]" id="jumlah'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td><input type="text" name="total_harga[]" id="totalharga'+counter+'" class="form-control"></td>';

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
