<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                <div class="card-body">
                <div class="form-group">
                  <label for="exampleSelectRounded0">Jenis Kendaraan</label>
                  <select class="custom-select rounded-0" id="jenis" name="jenis">
                    <option value="Kendaraan Orang">Kendaraan Orang</option>
                    <option value="Kendaraan Barang">Kendaraan Barang</option>
                  </select>
                </div>
                <?= form_error('jenis'); ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Merk Kendaraan</label>
                    <input type="text" class="form-control" id="merk" name="merk" placeholder="Merk Kendaraan">
                  </div>
                  <?= form_error('merk'); ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Plat Kendaraan</label>
                    <input type="text" class="form-control" id="plat" name="plat" placeholder="Plat Kendaraan">
                  </div>
                  <?= form_error('plat'); ?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->