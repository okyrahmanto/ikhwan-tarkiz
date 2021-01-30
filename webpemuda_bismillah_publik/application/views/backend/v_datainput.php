  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Masuk</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Berikut semua data yang masuk kedalam sistem. Data yang dikonfirmasi akan otomatis berpindah ke tab data terkonfirmasi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <h5 style="margin:10px 0px 15px 0px">Filter</h5>
                  <form action="<?php echo base_url()?>index.php/manager/peserta_masuk" method="get">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Event</label>
                        <select name="idEvent" class="form-control select2bs4" style="width: 100%;">
                          <?php
                            foreach ($dataEvent as $row) {
                              echo '<option selected="selected">Semua</option>';
                              if ($row->idEvent==$idEventSelected) {
                                echo '<option selected="selected" value="'.$row->idEvent.'">'.$row->name.' </option>';
                              } else {
                                echo '<option value="'.$row->idEvent.'">'.$row->name.' </option>';
                              }
                              
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label style="visibility: hidden">tombol filter</label>
                      <div class="form-group">
                        <button class="btn btn-primary">Filter</button>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <?php
                $ptn = "/^0/";  // Regex
                $rpltxt = "62";  // Replacement string
              ?>
              <div class="dropdown-divider" style="margin:30px 0px 20px 0px"></div>
              <h5 style="margin:0px 0px 25px 0px">Data Hasil Filter</h5>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Nomor WhatsApp</th>
                  <th>Jenis Kelamin</th>
                  <th>Tipe Tiket</th>
                  <th>Asal Input</th>
                  <th>Harga Tiket</th>
                  <th>Status Konfirmasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  $i = 0;
                  foreach ($dataPeserta as $row) {

                    $i++;
                    echo '<tr>';
                    echo ' <td>'.$row->idRegister.'</td>';
                    echo ' <td>'.$row->nama.'</td>';
                    echo ' <td>'.$row->email.'</td>';
                    echo ' <td> <a href="https://api.whatsapp.com/send?phone='.preg_replace($ptn, $rpltxt, $row->noTelepon).'&text='.urlencode('Assalamu\'alaykum
                    saya Muhammad Junaidi dari tim Pemuda Bismillah,
                    Terima kasih kepada '.$row->nama.' atas pendaftaran di acara kami,
                    untuk kelanjutan mengikuti acara, Anda bisa mentransfer biaya pendaftaran
                    ke rekening :
                    Bank BNI Syariah | No Rek. 0834479663 | atas Nama : Muhammad Junaidi
                    dengan nominal transfer Rp. '.number_format($row->hargaKonfirmasi, "0", "", ".").'
                    
                    Pastikan jumlah transfer sesuai yang kami instruksikan untuk mempermudah verifikasi pembayaran Anda
                    jika sudah berhasil transfer, mohon agar dapat mengirimkan bukti transfernya.
                    
                    maksimum waktu pembayaran 2x24 jam semenjak menerima pesan ini').'"> '.$row->noTelepon.'</a></td>';
                    echo ' <td>'.$row->jenisKelamin.'</td>';
                    echo ' <td>'.$row->descTicket.'</td>';
                    echo ' <td>'.$row->device.'</td>';
                    echo ' <td>'.$row->hargaKonfirmasi.'</td>';
                    echo ' <td><span class="right badge badge-danger">Belum Konfirmasi</span></td>';
                    echo '<td>
                      <button onclick="konfirmasi('.$row->idRegister.','.$row->idEvent.')" type="button" data-toggle="tooltip" data-placement="top" title="Konfirmasi Peserta" class="btn btn-sm btn-success"><i class="nav-icon fas fa-check"></i></button>
                      <button type="button" data-toggle="modal" data-target="#modal-hapus" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-window-close"></i></button>
                    </td>';
                    echo '</tr>';
                  }
                  
                ?>

                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal-hapus">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Penghapusan Data Peserta</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <p>Pembatalan Peserta sebelum konfirmasi akan <b>menghapus data peserta</b>. Apa anda yakin?</p>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            <button type="button" class="btn btn-danger">Hapus Data Peserta</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </div>
  
  <!-- /.content-wrapper -->
  
  