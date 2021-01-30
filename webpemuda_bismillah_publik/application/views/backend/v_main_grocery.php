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
              <h3 class="card-title">Berikut Data Utama</h3>
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
                            <option selected="selected">Cari</option>
                            <option>Event 2</option>
                            <option>Event 3</option>
                            <option>Event 4</option>
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
              <div class="col-md-12">
                <?php echo $output; ?>
              </div>
              
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
  