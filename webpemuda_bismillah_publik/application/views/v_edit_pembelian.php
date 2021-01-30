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
                <form method="post" action="<?php echo base_url() ?>index.php/admin/proses_edit_pembelian">

                  <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $pembelian->id_transaksi ?>">

                  <table width="100%" border="0">
                    <tr>
                      <td>
                          <div class="form-group col-xs-6">
                             <label for="text">ID Vendor</label>
                              <select class="form-control" name="id_vendor" id="id_vendor">
                                <option value="" disabled selected>-- Pilih Vendor --</option>
                                <?php                                
                                foreach ($vendor as $p)
                                {
                                  echo "<option value='$p->id_vendor'";
                                  echo $pembelian->id_vendor==$p->id_vendor?'selected':'';
                                  echo ">$p->id_vendor</option>";
                                }
                                ?>
                            </select>
                          </div>
                          <div class="form-group col-xs-6">
                             <label for="text">Proyek</label>
                                <select class="form-control" name="id_proyek" id="proyek">
                                  <option value="" disabled selected>-- Pilih Proyek --</option>
                                  <?php                                
                                  foreach ($proyek as $pr)
                                  {
                                    echo "<option value='$pr->id_proyek'";
                                    echo $pembelian->id_proyek==$pr->id_proyek?'selected':'';
                                    echo ">$pr->nama_proyek</option>";
                                  }
                                  ?>
                              </select>
                          </div>
                      </td>
          
                      <td>
                        <div class="form-group col-xs-6">
                          <label for="text">No. Kontrak/SPK</label>
                          <input type="text" class="form-control" name="no_kontrak" value="<?php echo $pembelian->no_kontrak ?>">
                        </div>

                        <div class="form-group col-xs-3">
                          <label for="text">Jenis Transaksi</label>
                          <select class="form-control" name="retur" id="retur">
                            <?php if($pembelian->retur=='pembelian'){
                              echo "<option value='pembelian' selected> Pembelian </option>";
                              echo "<option value='retur_pembelian'> Retur Pembelian </option>";
                            }else{
                              echo "<option value='pembelian'> Pembelian </option>";
                              echo "<option value='retur_pembelian' selected> Retur Pembelian </option>";
                            } ?>
                            
                          </select>
                        </div>
                      </td>

                      <tr>
                        <td>
                          <div class="form-group col-xs-6">
                            <h4 class="data_pelanggan"></h4>
                            <h4 class="coba"></h4>
                          </div>
                        </td>
                        <td>
                          <div class="form-group col-xs-6">
                          <label for="text">Tanggal Transaksi</label>
                          <input type="date" class="form-control" name="tgl_diterima" required="" value="<?php echo $pembelian->tgl_diterima?>">
                        </div>

                        <div class="form-group col-xs-6">
                          <label for="text">Perihal</label>
                          <select class="form-control" name="perihal" id="perihal">
                                  <option value="" disabled selected>-- Pilih Perihal --</option>
                                  <?php                                
                                  foreach ($perihal as $data)
                                  {
                                    echo "<option value='$data->id_perihal'";
                                    echo $pembelian->perihal==$data->id_perihal?'selected':'';
                                    echo ">$data->nama_perihal</option>";
                                  }
                                  ?>
                          </select>
                        </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="form-group col-xs-6" style="display: none">
                          <label for="text">Shift</label>
                          <select class="form-control" name="shift">
                            <option value="" disabled selected>-- Pilih Shift --</option>
                            <option value="Pagi" selected> Pagi </option>
                            <option value="Sore"> Sore </option> 
                          </select>
                        </div>

                        <div class="form-group col-xs-6" style="display: none">
                          <label for="text">Area Antar</label>
                          <select class="form-control" name="area_antar">
                            <option value="" disabled selected>-- Pilih Area --</option>
                            <option value="DK"> DK </option> 
                            <option value="PBB" selected> PBB </option> 
                            <option value="LK"> LK </option> 
                          </select>
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
                              <th width="10%">Keterangan</th>
                              <th width="10%" style="display: none">Merek</th>
                              <th width="10%" style="display: none">Warna</th>
                              <th width="10%">MemoOrder</th>
                              <th width="10%" style="display: none">Pelayanan</th>
                              <th width="10%">Harga</th>
                              <th width="10%">Jumlah Barang</th>
                              <th width="10%" style="display: none">Harga Kimia</th>

                              <th width="10%">Jumlah Harga</th>
                              <th width="10%" style="display: none">Total Kimia</th>

                              <th width="10%" style="display: none">Sepasang</th>
                              <th style="display: none">Aksi</th>
                            </thead>
                            <tbody>
                              <?php
                                  $jumlahBarang = 0;
                                  $counterRow = 0;
                                  foreach ($barang_pembelian as $b) {
                                    $jumlahBarang = bcadd($jumlahBarang,$b->jumlah);
                                ?>
                              <tr>
                                <td width="20%">
                                <select class="form-control" name="nama_barang[]" id="nama_barang<?php echo $counterRow; ?>" onchange="get_harga(<?php echo $counterRow; ?>)">
                                    <option value="" disabled selected>-- Pilih Barang --</option>
                                        <?php                                
                                        foreach ($barang as $row) {  
                                      echo "<option value='$row->id_barang'";
                                      echo $b->id_barang==$row->id_barang?'selected':'';
                                          echo ">$row->kode_barang - $row->nama_barang</option>";
                                      
                                      }
                                   
                                    ?>
                                </select>
                                </td>
                                <td style="display: none"><input type="text" name="merek[]" id="merek<?php echo $counterRow; ?>" class="form-control"></td>
                                <td style="display: none"><input type="text" name="warna[]" id="warna<?php echo $counterRow; ?>" class="form-control"></td>
                                <td><input type="text" name="memo_order[]" id="memo_order<?php echo $counterRow; ?>" class="form-control"></td>
                                <td style="display: none">
                                  <select class="form-control" name="pelayanan[]" id="pelayanan<?php echo $counterRow; ?>" onchange="get_harga(<?php echo $counterRow; ?>)">
                                   <option value="" disabled diselected>-- Pilih Pelayanan--</option>
                                   <option value="2">Laundry</option>
                                   <option value="3">Pressing</option>
                                   <option value="4">Dry</option>
                                        <?php       /*                         
                                        foreach ($harga_barang as $row) {  
                                      echo "<option value='".$row->id_harga_barang."'>".$row->nama_pelayanan."</option>";
                                      }
                                      echo"
                                    </select>"
                                    */?>
                                  </select>
                                </td>
                                <td><input type="text" name="harga[]" id="harga<?php echo $counterRow; ?>" class="form-control" onkeyup="sum(<?php echo $counterRow; ?>)" value="<?php echo $b->harga; ?>"></td>
                                <td><input type="text" name="jumlah[]" id="jumlah<?php echo $counterRow; ?>" class="form-control" onkeyup="sum(<?php echo $counterRow; ?>)" value="<?php echo $b->jumlah; ?>"></td>
                                <td style="display: none"><input type="text" name="harga_kimia[]" id="harga_kimia<?php echo $counterRow; ?>" class="form-control" onkeyup="sum(<?php echo $counterRow; ?>);"></td>

                                <td><input type="text" name="total_harga[]" id="totalharga<?php echo $counterRow; ?>" class="form-control" readonly=""value="<?php echo bcmul($b->jumlah,$b->harga)?>"></td>
                                <td style="display: none"><input type="text" name="total_kimia[]" id="total_kimia<?php echo $counterRow; ?>" class="form-control" readonly=""></td>

                                <td style="display: none"><input type="checkbox" name="sepasang[]" id="sepasang<?php echo $counterRow; ?>" value="Ya"></td>

                            
                                <td class="col-sm-2"><a class="deleteRow"></a>
                                </td>
                              </tr>
                              <?php
                                $counterRow++;
                                } ?>
                            </tbody>
                            <tfoot>
                              <tr style="display: none">
                                <td colspan="6">
                                  <label>Total Sementara</label>
                                </td>
                                <td><input type="text" name="alltotal" id="alltotal" class="form-control" readonly="" onclick="calculateGrandTotal()" ></td>
                              
                                <td><input type="text" name="j_barang" id="j_barang" class="form-control" readonly="" onclick="jumlah_barang()" value="<?php echo $jumlahBarang; ?>" ></td>
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
                        <div class="form-group">
                          <div class="col-xs-6">
                            <label for="text">Biaya</label>
                          </div>
                          <div class="col-xs-6">
                            <input type="text" id="biaya" name="biaya" class="form-control" value="<?php echo $pembelian->biaya; ?>" onclick="total_barang()" readonly="" style="text-align: right;">
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <div class="col-xs-3">
                            <label for="text"><h4><b>TOTAL</b></h4></label>
                          </div>

                          <div class="col-xs-9">
                            <textarea class="form-control" name="total" id="total" style="text-align: right;font-size: 10pt;font-weight: bold;"><?php echo $pembelian->tagihan ?></textarea>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                          <div class="form-group col-xs-6">
                            <label for="text">Potongan(%)</label>
                          <input type="number" name="diskon1" id="diskon1" class="form-control" value="<?php echo $pembelian->diskon1 ?>" onkeyup="total_diskon()" required="" style="font-weight: bold;font-size:14pt">
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="text">Potongan(hasil)</label>
                            <input type="text" name="diskon2" id="diskon2"  class="form-control" value="<?php echo $pembelian->diskon2 ?>" style="text-align: right;font-weight: bold;font-size:14pt" readonly="">
                          </div>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group col-xs-6">
                          <label for="text">Operator</label>
                          <input type="text" name="operator" class="form-control" value="<?php echo $pembelian->operator ?>" readonly>
                        </div>
                      </td>
                    </tr>

                     <tr>
                      <td>
                          <div class="form-group col-xs-6">
                            <label for="text">Akun Biaya</label>
                            <select class="form-control" name="akun_biaya">
                              <option value="" disabled selected>-- Pilih Akun --</option>
                              <?php 
                              foreach ($akun as $row) {  
                                echo "<option value='$row->id_akun'";
                                echo $pembelian->akun_biaya==$row->id_akun?'selected':'';
                                echo ">$row->nama_akun</option>";

                              }?>
                            </select>
                          </div>
                          <div class="form-group col-xs-6">
                            <label for="text">Akun Potongan</label>
                            <select class="form-control" name="akun_potongan">
                              <option value="" disabled selected>-- Pilih Akun --</option>
                              <?php 
                              foreach ($akun as $row) {  
                                echo "<option value='$row->id_akun'";
                                echo $pembelian->akun_potongan==$row->id_akun?'selected':'';
                                echo ">$row->nama_akun</option>";

                              }?>
                            </select>
                          </div>

                           
                      </td>
                      <td>
                       <div class="form-group col-xs-6">
                            <label for="text">Akun Total</label>
                            <select class="form-control" name="akun_total">
                              <option value="" disabled selected>-- Pilih Akun --</option>
                              <?php 
                              foreach ($akun as $row) {  
                                echo "<option value='$row->id_akun'";
                                echo $pembelian->akun_total==$row->id_akun?'selected':'';
                                echo ">$row->nama_akun</option>";

                              }?>
                            </select>
                          </div>
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
    var counter = <?php echo count($barang_pembelian);?>;
    var no= <?php echo count($barang_pembelian)+1;?>;
                    var x;
                    for (x=0; x<counter; x++) {
                        $("#nama_barang"+x).select2({
                            placeholder: '-- Pilih Barang --',
                            width: '250px'
                        });
                    }

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
        cols += '<td style="display:none"><input class="form-control" type="text" name="merek[]" id="merek'+counter+'"></td>';

        cols += '<td style="display:none"><input class="form-control" type="text" name="warna[]" id="warna'+counter+'"></td>';

        cols += '<td><input class="form-control" type="text" name="memo_order[]" id="memo_order'+counter+'"></td>';

        cols += '<td style="display:none"><select class="form-control" required name="pelayanan[]" id="pelayanan'+counter+'" onchange="get_harga('+counter+')">';
    cols += '<option disabled diselected>- Pilih layanan -</option>';
  
                    cols += '<option value="2">Laundry</option><option value="3">Pressing</option><option value="4">Dry</option>';
          cols +=  '</select></td>';

        cols += '<td><input class="form-control" type="text" name="harga[]" id="harga'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td><input class="form-control" type="text" name="jumlah[]" id="jumlah'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td style="display:none"><input class="form-control" type="text" name="harga_kimia[]" id="harga_kimia'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td><input type="text" name="total_harga[]" id="totalharga'+counter+'" class="form-control" readonly=""></td>';

        cols += '<td style="display:none"><input type="hidden" name="total_kimia[]" id="total_kimia'+counter+'" class="form-control" readonly=""></td>';

        cols += '<td style="display:none"><input type="checkbox" name="sepasang[]" id="sepasang'+counter+'" value="Ya"></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger" value="Hapus"></td>';
        console.log(cols);  
        newRow.append(cols);
        $("table.order-list").append(newRow);
        $("#nama_barang"+counter).select2({
              width: '250'
               // need to override the changed default
          });

        no++;
        counter++;
        ; 
    }); 



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        window.sum(0);       
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

<script>
  $(document).ready(function () {
    $("#nama_barang0").select2({
      placeholder: '-- Pilih Barang --',
      width: '250px'
    });
  });

</script>
</body>
</html>
