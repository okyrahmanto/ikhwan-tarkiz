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
            margin: 20mm;  /* this affects the margin in the printer settings */
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
          
            <!-- /.box-header -->
            
              <?php 
              $val = null;
              $jumlah=0;
               foreach ($tabel as $data) {
                foreach ($data as $value) {
                $jumlah = bcadd($jumlah,$value->jm);
                $val= $value;
               }
             }
                    ?>

                  <table width="100%" border="0">
                     
                    <tr>
                      <td width="70%"><img src="<?php echo base_url()?>assets/img/arbanew.png" width="150px" height="64px"></td>
                      <td width="10%">Tanggal</td>
                      <td width="20%">: <?php echo tgl_indo(date('Y-m-d')) ?></td>
                    </tr>

                    <tr>
                      <td colspan="3" style="font-size: 8pt">Banjarmasin <b>085100524444</b> |Banjarbaru <b>085100594444</b><br/>Web. <u>https://arbalaundry.id</u></td>
                      <td colspan="4"><hr width="100%"></td>
                    </tr>
                  </table>

                  <hr width="100%" height="10px">

                  <h2 align="center">RINGKASAN FAKTUR</h2>

                  <table width="100%">
                    <tr>
                      <td><h3>Kepada</h3></td>
                      <td><h3>: <?php echo $val->nama_pelanggan ?></h3></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td><b><?php echo $val->alamat ?></b></td>
                    </tr>
                  </table>
                  
                 <br/>
                 Untuk tagihan jasa laundry sebagai berikut (<i>rincian_terlampir</i>):

                 <table class="table table-bordered">
                   <thead align="center">
                     <th>No.</th>
                     <th>ID Costumer</th>
                     <th>Periode</th>
                     <th>Jumlah</th>
                   </thead>

                   <tbody>
                    <?php 
                    $no=1;
                    foreach ($tabel as $value) { 
                        foreach ($value as $row) {
                                                  
                      ?>
                     <tr>
                       <td width="3px"><?php echo $no ?></td>
                       <td><?php echo $row->nama_pelanggan ?></td>
                       <td><?php echo tgl_indo($range_tanggal['tgl_mulai'])." - ". tgl_indo($range_tanggal['tgl_sampai']);?></td>
                       <td align="right"><?php echo rupiah($row->jm) ?></td>
                     </tr>
                   <?php $no++;
                  } 
                 }
                 ?>
                     <tr>
                       <td></td>
                       <td colspan="2"><b>Total</b></td>
                       <td align="right"><b><?php echo rupiah($jumlah) ?></b></td>
                     </tr>
                     
                   </tbody>
                 </table>

                 Terbilang : <?php echo terbilang($jumlah)." rupiah" ?>

                 <br/> <br/> <br/>
                 <table width="100%">
                   <tr>
                     <td width="68%">Pembayaran dapat ditransfer ke :</td>
                     <td width="32%" align="center">Hormat kami</td>
                   </tr>
                   <tr>
                     <td><b>Bank BNI Syariah<br>No. Rek. 0370868485<br>a.n. M. Riza Rahmani</b></td>
                     <td></td>
                   </tr>
                   <tr>
                     <td></td>
                     <td align="center"><u><?php echo $pj['pj']?></u><br><?php echo $jabatan['jabatan'] ?></td>
                   </tr>
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

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
      $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
  }
 
  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim(penyebut($nilai));
    } else {
      $hasil = trim(penyebut($nilai));
    }         
    return $hasil;
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
