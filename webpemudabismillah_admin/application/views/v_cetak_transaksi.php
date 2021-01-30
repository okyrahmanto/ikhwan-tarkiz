<!DOCTYPE html>
<html>
<head>
 
<style>
@media print {
input.noPrint { display: none; }
}
@page 
        {
            size: auto;   /* auto is the initial value */
            margin: 6mm;  /* this affects the margin in the printer settings */
        }

</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Arba Laundry</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/bootstrap/dist/css/checkbox.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminlte/dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body>
          
          
             <h5 align="right">Printed <i><?php echo date('d-m-Y H:i:s') ?></i></h5>
            <!-- /.box-header -->
            
              
                  <table width="100%" border="0">
                     <?php foreach ($transaksi as $data) {
                    ?>
                    <tr>
                      <td colspan="2" rowspan="2" width="25%"><img src="<?php echo base_url()?>assets/img/arbanew.png" width="150px" height="64px"></td>
                      <td width="13%"></td>
                      <td width="15%"><b>Tanggal</b></td>
                      <td width="22%"><?php echo tgl_indo($data->tgl_diterima) ?></td>
                      <td width="10%"><b>Counter</b></td>
                      <td width="15%"><?php echo $data->kode_counter ?></td>
                    </tr>


                    <tr>
                      <td></td>
                      <td><b>Tanggal Selesai</b></td>
                      <td><?php echo tgl_indo($data->tgl_dikembalikan) ?></td>
                      <td><b>No. Nota</b></td>
                      <td align="right" style="padding-right: 30px"><b><?php echo $data->no_nota ?></b></td>
                    </tr>

                    <tr>
                      <td colspan="3" style="font-size: 8pt">Banjarmasin <b>085100524444</b> |Banjarbaru <b>085100594444</b><br/>Web. <u>https://arbalaundry.id</u></td>
                      <td colspan="4"><hr width="100%"></td>
                    </tr>
                  </table>

                  <br/>
                    <table width="100%" border="0">
                    <tr>
                      <td width="8%"><b>ID MO</b></td>
                      <td width="8%"><?php echo $data->id_mo ?></td>
                      <td width="3%"></td>
                      <td width="8%"><b>Shift</b></td>
                      <td width="8%"><?php if($data->shift=='Pagi'){echo "PAGI";}else{echo "SORE";} ?></td>
                      <td width="8%"><b>Nama</b></td>
                      <td width="20%" align="right"><b><?php echo $data->nama_pelanggan ?></b></td>
                    </tr>

                    <tr>
                      <td colspan="6"></td>
                      <td align="right" colspan="2"><?php echo $data->memo ?></td>
                    </tr>

                    <tr>
                      <td><b>Area Antar</b></td>
                      <td><?php echo $data->area_antar ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>Alamat</b> </td>
                      <td colspan="2"><?php echo $data->alamat ?></td>
                    </tr>

                     <tr>
                      <td><b>Jenis Pelayanan</b></td>
                      <td><?php echo $data->jenis_pelayanan ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><b>Telp </b></td>
                      <td colspan="2"><?php echo $data->telp ?></td>
                    </tr>
                  </table>


                  <hr width="100%">

                  <table width="100%" class="table table-bordered table-stripped">
                            <thead>
                              <td width="15%" style="text-align: left;font-weight: bold;">Data Cucian</td>
                              <td width="10%" style="text-align: left;font-weight: bold;">Warna</td>
                              <td width="10%" style="text-align: left;font-weight: bold;">Pelayanan</td>
                              <td width="5%" style="text-align: left;font-weight: bold;">Jumlah</td>
                              <td width="10%" style="text-align: right;font-weight: bold;">Harga</td>
                              <td width="10%" style="text-align: right;font-weight: bold;">K-EX</td>
                              <td width="10%" style="text-align: right;font-weight: bold;">Jumlah</td>
                            </thead>
                            <tbody>
                              <?php foreach ($barang_transaksi as $barang) { 
                                $lembar=0;?>
          
                              <tr>
                                <td><?php echo $barang->nama_barang ?></td>
                                <td><?php echo $barang->warna ?></td>

                                <td><?php if($barang->pelayanan==2){
                                    echo "Laundry";
                                  }elseif ($barang->pelayanan==3) {
                                    echo "Pressing";
                                  }elseif ($barang->pelayanan==4) {
                                    echo "Dry";
                                  } ?></td>

                                <td><?php echo $barang->jumlah ?></td>
                                <td align="right"><?php if($barang->pelayanan==2){
                                    $laundry=$barang->harga_laundry;
                                    $kimia=$barang->harga_kimia;
                                    $tot_harga1=$barang->jumlah * $laundry;
                                    $tot_kimia1=$barang->jumlah * $kimia;
                                    echo rupiah($laundry);
                                  }elseif ($barang->pelayanan==3) {
                                    $pressing=$barang->harga_pressing;
                                    $kimia=$barang->harga_kimia;
                                    $tot_harga2=$barang->jumlah * $pressing;
                                    $tot_kimia2=$barang->jumlah * $kimia;
                                    echo rupiah($pressing);
                                  }elseif ($barang->pelayanan==4) {
                                    $dry=$barang->harga_dry;
                                    $kimia=$barang->harga_kimia;
                                    $tot_harga3=$barang->jumlah * $dry;
                                    $tot_kimia3=$barang->jumlah * $kimia;
                                    echo rupiah($dry);
                                  } ?></td>

                                <td align="right"><?php echo rupiah($barang->harga_kimia) ?></td>

                                <td align="right"><?php  if($barang->pelayanan==2){
                                    $total1=$tot_harga1 + $tot_kimia1;
                                    echo rupiah($total1);
                                  }elseif ($barang->pelayanan==3) {
                                    $total2=$tot_harga2 + $tot_kimia2;
                                    echo rupiah($total2);
                                  }elseif ($barang->pelayanan==4) {
                                    $total3=$tot_harga3 + $tot_kimia3;
                                    echo rupiah($total3);
                                  }?>
                                </td>
                                </td>
                              </tr>
                            <?php $lembar+=$barang->jumlah;}?>
                            </tbody>
                          </table>

                          <hr width="100%">


                    <table width="100%" border="0">
                    <tr>
                      <td><b>Operator</b></td>
                      <td><?php echo $data->operator ?></td>
                      <td><b>Biaya Antar Jemput</b></td>
                      <td align="right" style="padding-right: 100px"><?php echo rupiah($data->biaya_jemput) ?></td>
                      <td><b>Total Biaya</b></td>
                      <td align="right"><?php echo rupiah($data->biaya) ?></td>
                    </tr>

                    <tr>
                      <td><b>Memo</b></td>
                      <td><?php echo $data->memo ?></td>
                      <td></td>
                      <td></td>
                      <td><b>Potongan <?php echo $data->diskon1."%" ?></b></td>
                      <td align="right"><?php echo rupiah($data->diskon2) ?></td>
                    </tr>

                    <tr>
                      <td><b>Permintaan</b></td>
                      <td><?php echo $data->permintaan ?></td>
                      <td></td>
                      <td></td>
                      <td><h3><b>Tagihan</b></h3></td>
                      <td align="right"><h3><b><?php $tagihan=$data->tagihan;
                      echo rupiah($tagihan); ?></b></h3></td>
                    </tr>

                    <tr>
                      <td><b>Diverifikasi oleh</b></td>
                      <td><?php echo $data->petugas_lap ?></td>
                      <td>Jumlah Lembar : <?php   
                      echo $lembar." lbr"; ?></td>
                      <td colspan="4"></td>

                    </tr>
                  <?php } ?>
                  </table>
            
            <!-- /.box-body -->
        
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

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
                   var i;
                    for(i=0; i<data.length; i++){
                        html += '<b> Nama : '+data[i].nama_pelanggan+'<br/>'+
                                'Alamat : '+data[i].alamat+'<br/>'+
                                'Telp : '+data[i].telp+' </b><br/>';
                    }
                    $('.data_pelanggan').html(html);


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
    total_barang();
}

function total_barang(){
    var totharga    = parseFloat(document.getElementById('alltotal').value);
    var totkimia   = parseFloat(document.getElementById('j_barang').value);

    var hitung = totharga + totkimia ;
    console.log(hitung);
    document.getElementById('biaya').value = hitung;
  }

  function total_diskon(){
    var biaya    = parseFloat(document.getElementById('biaya').value);
    var diskon   = parseFloat(document.getElementById('diskon1').value);

    var hitung = (diskon * biaya)/100;
    var hasil = biaya - hitung;
    console.log(diskon);
    document.getElementById('diskon2').value = hasil;
  }

  function total_keseluruhan(){
    var biaya_jemput    = parseFloat(document.getElementById('biaya_jemput').value);
    var diskon2   = parseFloat(document.getElementById('diskon2').value);

    var hasil = biaya_jemput + diskon2;
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
    var counter = 1;
    var no=2;

    $("#addrow").on("click", function () {
      //console.log('Ok')
        var newRow = $("<tr>");
        var cols = "";
        cols += '<td><input class="form-control" type="text" name="no" value="'+no+'" readonly=""></td>';
        cols += '<td><select class="form-control" required name="nama_barang[]" id="nama_barang'+counter+'" onchange="get_harga('+counter+')">';
    cols += '<option disabled diselected>- Pilih layanan -</option>';
    
                //    cols += '<?php                                
                                        foreach ($barang as $row) {  
                                      echo '<option value="'.$row->id_barang.'">'.$row->nama_barang.'</option>';
                                      }
                    ?>';
                    cols +='</select></td>';
        cols += '<td><input class="form-control" type="text" name="merek[]" id="merek'+counter+'"></td>';

        cols += '<td><input class="form-control" type="text" name="warna[]" id="warna'+counter+'"></td>';

        cols += '<td><input class="form-control" type="text" name="memo_order[]" id="memo_order'+counter+'"></td>';

        cols += '<td><select class="form-control" required name="pelayanan[]" id="pelayanan'+counter+'" onchange="get_harga('+counter+')">';
    cols += '<option disabled diselected>- Pilih layanan -</option>';
  
                    cols += '<option value="2">Laundry</option><option value="3">Pressing</option><option value="4">Dry</option>';
          cols +=  '</select></td>';

        cols += '<td><input class="form-control" type="text" name="harga[]" id="harga'+counter+'" onkeyup="sum('+counter+')" readonly></td>';

        cols += '<td><input class="form-control" type="text" name="jumlah[]" id="jumlah'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td><input class="form-control" type="text" name="harga_kimia[]" id="harga_kimia'+counter+'" onkeyup="sum('+counter+')"></td>';

        cols += '<td><input type="text" name="total_harga[]" id="totalharga'+counter+'" class="form-control" readonly=""></td>';

        cols += '<td><input type="text" name="total_kimia[]" id="total_kimia'+counter+'" class="form-control" readonly=""></td>';

        cols += '<td><input type="checkbox" name="sepasang[]" id="sepasang'+counter+'" value="Ya"></td>';

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
  window.print();
</script>
</body>
</html>
