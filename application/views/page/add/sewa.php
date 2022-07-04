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
                <h3 class="card-title">Sewa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <br>
              <?= $this->session->flashdata('message') ?>
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>" readonly>
                <div class="card-body">
                <div class="form-group">
                  <label for="exampleSelectRounded0">Jenis Kendaraan</label>
                  <select class="custom-select rounded-0" id="jenis" name="jenis">
                  <option value="0" disabled selected>Pilih Jenis Kendaraan</option>
                  <option value="Kendaraan Orang">Kendaraan Orang</option>
                    <option value="Kendaraan Barang">Kendaraan Barang</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectRounded0">Driver</label>
                  <select class="custom-select rounded-0" id="driver" name="driver">
                  <option value="0" disabled selected>Pilih Driver</option>
                  <?php foreach($driver as $driver) {?>
                    <option value="<?= $driver->nama ?>"><?= $driver->nama ?></option>
                <?php } ?>
                  </select>
                </div>
                <?= form_error('jenis'); ?>
                <div class="form-group">
                  <label for="exampleSelectRounded0">Barang</label>
                  <select class="custom-select rounded-0" id="barang" name="barang">
                  <option value="0" disabled selected>Pilih Barang</option>
                  <option value="tidak membawa barang">Tidak membawa barang</option>
                  <?php foreach($barang as $barang) {?>
                    <option value="<?= $barang->nama_barang ?>"><?= $barang->nama_barang ?></option>
                <?php } ?>
                  </select>
                </div>
                <?= form_error('barang'); ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Durasi</label>
                    <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Durasi">
                    <small>Masukan jumlah hari <b>Contoh : </b> 5 yang berarti 5 hari</small>
                </div>
                  <?= form_error('nama'); ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Penyewa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penyewa">
                  </div>
                  <?= form_error('nama'); ?>
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
           <!-- right column -->
           <div class="col-md-6">
           <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Jenis Kendaraan</th>
                    <th>Driver</th>
                    <th>Barang</th>
                    <th>Durasi</th>
                    <th>Nama Penyewa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($kofirmasi as $kofirmasi){ ?>
                  <tr>
                  <td><?= $kofirmasi->id; ?></td>
                    <td><?= $kofirmasi->jenis_kendaraan; ?></td>
                    <td><?= $kofirmasi->driver; ?></td>
                    <td><?= $kofirmasi->barang; ?></td>
                    <td><?= $kofirmasi->durasi; ?> Hari</td>
                    <td><?= $kofirmasi->nama_penyewa; ?></td>
                    <td><span class="badge badge-warning" style="color:white;"><?= $kofirmasi->status; ?></span></td>
                    <td><h5><a href="<?php echo 'konfirmasisewa/'.$kofirmasi->id ?>" class="badge badge-warning" style="color:white;">Konfirmasi</a>
                    <a href="<?php echo 'deletesewa/'.$kofirmasi->id ?>" class="badge badge-danger">Delete</a></h5></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Jenis Kendaraan</th>
                    <th>Driver</th>
                    <th>Barang</th>
                    <th>Durasi</th>
                    <th>Nama Penyewa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->