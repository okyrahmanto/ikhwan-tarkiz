

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tiket Kadaluarsa</h1>
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
              <h3 class="card-title">Berikut semua data tiket yang telah kadaluarsa karena tidak digunakan pada jadwal event tiket tersebut</h3>
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
                  <th>Status Tiket</th>
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
                    echo ' <td><span class="right badge badge-danger">Kadaluarsa</span></td>';
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
  </div>
  <!-- /.content-wrapper -->
  
