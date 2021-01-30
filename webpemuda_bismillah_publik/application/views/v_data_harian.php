<!DOCTYPE html>
<html>
<head>
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

    
    <style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Arial"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
  </head>
<body>
          
          <div class="box">
             <h5 align="right">Printed <i><?php echo date('d-m-Y H:i:s') ?></i></h5>
            <!-- /.box-header -->
            <div class="box-body">
              
            <table cellspacing="0" border="0">
	<colgroup width="200"></colgroup>
	<colgroup width="147"></colgroup>
	<colgroup width="97"></colgroup>
	<colgroup width="129"></colgroup>
	<colgroup width="79"></colgroup>
	<colgroup width="81"></colgroup>
	<tr>
		<td height="23" align="left"><font color="#000000">Laporan Transaksi Pelanggan</font></td>
		<td align="left"><font color="#000000">Periode Tanggal</font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000">
			<?php 
			$date=date_create($tanggal_mulai);
			echo date_format($date,"l, d/m/Y");
					?></font></td>
		<td align="left"><font color="#000000">s/d</font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><?php 
			$date=date_create($tanggal_akhir);
			echo date_format($date,"l, d/m/Y");
					?></font></td>
		<td align="left"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="23" align="left"><font color="#000000">Kode Input Pelanggan : </font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="23" align="left"><font color="#000000">Tanggal : </font></td>
		<td align="left"><font face="Times New Roman" color="#000000"><?php 
			//$date=date('Y-m-d');
			echo date("l, d/m/Y");
					?></font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="23" align="left"><font color="#000000"><br></font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="17" align="left"><font color="#000000">Counter</font></td>
		<td align="left"><font color="#000000">NoNota</font></td>
		<td align="left"><font color="#000000">Lbr</font></td>
		<td align="left"><font color="#000000">NamaPlgn | Memo</font></td>
		<td align="left"><font color="#000000">Tunai</font></td>
		<td align="left"><font color="#000000">Bon</font></td>
	</tr>
	<tr>
		<td height="20" align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
	</tr>
	<?php 
		$jums = 0;
		$num=0;
	foreach ($result1 as $row) { ?>
	<tr>
		<td height="27" align="left"><font face="Times New Roman" color="#000000"><?php echo $row->kode_counter?></font></td>
		<td align="center" sdval="112" sdnum="1033;"><font face="Times New Roman" color="#000000"><?php echo $row->no_nota;?></font></td>
		
		<td align="center" sdval="6" sdnum="1033;"><font face="Times New Roman" color="#000000">
		<?php 
			echo $this->db->query("SELECT sum(jumlah) as jum FROM `barang_transaksi` where id_transaksi='".$row->id_transaksi."'")->row()->jum;
		?>	
		</font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><?php echo $row->nama_pelanggan." <br> ".$row->memo;?></font></td>
		<td align="right" sdval="0" sdnum="1033;0;&quot;Rp&quot;#.##0;&quot;-Rp&quot;#.##0"><font face="Times New Roman" size=1 color="#000000">Rp.000</font></td>
		<td align="right" sdval="15000" sdnum="1033;0;&quot;Rp&quot;#.##0;&quot;-Rp&quot;#.##0"><font face="Times New Roman" size=1 color="#000000"><?php echo number_format($row->tagihan,2,",",".");?></font></td>
	</tr>
	<?php  ?>
	<?php 
	?>
	<?php
		$row2 = $result2[$num];

	//foreach ($result2 as $row2) {
		$jums += (int) $row2->jumlah;
		?>
	<tr style="border-top: 1px #000000;" >
		<td height="18" align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="right" sdnum="1033;0;&quot;Rp&quot;#,##0;&quot;(Rp&quot;#,##0\)"><font face="Times New Roman" size=1 color="#000000">Tunai</font></td>
		<td align="right" sdnum="1033;0;&quot;Rp&quot;#,##0;&quot;(Rp&quot;#,##0\)"><font face="Times New Roman" size=1 color="#000000">Bon</font></td>
	</tr>
	
	<tr>
		<td height="18" align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000">sub Total Tanggal</font></td>
		<td align="left"><font face="Times New Roman" size=1 color="#000000"><?php 
			$date=date_create($row2->tanggal);
			echo date_format($date,"l, d/m/Y");
					?></font></td>
		<td align="right" sdnum="1033;0;&quot;Rp&quot;#,##0;&quot;(Rp&quot;#,##0\)"><font face="Times New Roman" size=1 color="#000000">0</font></td>
		<td align="right" sdnum="1033;0;&quot;Rp&quot;#,##0;&quot;(Rp&quot;#,##0\)"><font face="Times New Roman" size=1 color="#000000">Rp. <?php echo number_format($row2->jumlah,2,",",".");?></font></td>
	</tr>
	<?php
		$num++;
	} ?>
	<tr>
		<td height="17" align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000">Nilai Transaksi</font></td>
		<td align="right"><font face="Times New Roman" size=1 color="#000000">Rp. <?php echo number_format($jums,2,",",".");?></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
	</tr>
	<tr>
		<td height="17" align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000">TUNAI</font></td>
		<td align="left"><font color="#000000">BON</font></td>
	</tr>
	<tr>
		<td height="17" align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000"><br></font></td>
		<td align="left"><font color="#000000">Total Akhir</font></td>
		<td align="left"><font color="#000000">Rp. 0</font></td>
		<td align="left"><font color="#000000">Rp. <?php echo number_format($jums,2,",",".");?></font></td>
	</tr>
</table>
            </div>
            <!-- /.box-body -->
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
