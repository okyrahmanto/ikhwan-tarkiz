

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Terkonfirmasi</h1>
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
              <h3 class="card-title">Berikut semua data yang telah terkonfirmasi. Anda dapat mengirimkan tiket kepada para peserta dan menandai tiket peserta yang telah digunakan disini</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <h5 style="margin:10px 0px 15px 0px">Filter</h5>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Event</label>
                        <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">Event 1</option>
                            <option>Event 2</option>
                            <option>Event 3</option>
                            <option>Event 4</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <select class="form-control select2bs4" style="width: 100%;">
                            <option selected="selected">24 Agustus 2019</option>
                            <option>30 November 2019</option>
                            <option>27 Januari 2020</option>
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
                </div>
              </div>
              <div class="dropdown-divider" style="margin:30px 0px 20px 0px"></div>
              <h5 style="margin:0px 0px 25px 0px">Data Hasil Filter</h5>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nomor Tiket</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Nomor WhatsApp</th>
                  <th>Jenis Kelamin</th>
                  <th>Tipe Tiket</th>
                  <th>Asal Input</th>
                  <th>No Tiket</th>
                  <th>Harga Tiket</th>
                  <th>Status Konfirmasi</th>
                  <th>Status Tiket</th>
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
                    echo ' <td>'.$row->noTelepon.'</td>';
                    echo ' <td>'.$row->jenisKelamin.'</td>';
                    echo ' <td>'.$row->descTicket.'</td>';
                    echo ' <td>'.$row->device.'</td>';
                    echo ' <td>'.$row->noTiket.'</td>';
                    echo ' <td>'.$row->hargaKonfirmasi.'</td>';
                    echo ' <td><span class="right badge badge-success">Telah Konfirmasi</span></td>';
                    echo ' <td><span class="right badge badge-warning">'.$row->statusTicket.'</span></td>';
                    echo '<td>
                      <button type="button" onclick="kirimTiket('.$row->idRegister.','.$row->idPeserta.')" data-toggle="tooltip" data-placement="top" title="Kirim tiket ke peserta" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-envelope"></i></button>
                      <button type="button" data-toggle="tooltip" data-placement="top" title="Tiket digunakan peserta" class="btn btn-sm btn-success"><i class="nav-icon fas fa-check"></i></button>
                      <button type="button" data-placement="top" title="Peserta Batal" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-batal"><i class="nav-icon fas fa-window-close"></i></button></td>';
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

    <div class="modal fade" id="modal-batal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pembatalan Peserta</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <p>Harap isi kolom alasan berikut untuk melanjutkan pembatalan peserta</p>
              <textarea class="form-control" rows="3" placeholder="Alasan pembatalan Peserta"></textarea>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            <button type="button" class="btn btn-danger">Batalkan Peserta</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

  </div>
  <!-- /.content-wrapper -->
  
