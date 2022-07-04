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
              <?php foreach($barang as $barang) { ?>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $barang->id ?>">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang->nama_barang ?>">
                  </div>
                  <?= form_error('nama'); ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <textarea row="7" type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $barang->deskripsi ?>"><?= $barang->deskripsi ?></textarea>
                  </div>
                  <?= form_error('deskripsi'); ?>
                </div>
                <!-- /.card-body -->
                <?php } ?>
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