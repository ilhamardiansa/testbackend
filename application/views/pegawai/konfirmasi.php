<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<div class="container-fluid">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kendaraan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<br>
<?= $this->session->flashdata('message') ?>
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
                  <?php foreach($penyewaan as $penyewaan){ ?>
                  <tr>  
                    <td><?= $penyewaan->id; ?></td>
                    <td><?= $penyewaan->jenis_kendaraan; ?></td>
                    <td><?= $penyewaan->driver; ?></td>
                    <td><?= $penyewaan->barang; ?></td>
                    <td><?= $penyewaan->durasi; ?> Hari</td>
                    <td><?= $penyewaan->nama_penyewa; ?></td>
                    <td><span class="badge badge-warning" style="color:white;"><?= $penyewaan->status; ?></span></td>
                    <td><h5><a href="<?php echo 'konfirmasisewa/'.$penyewaan->id ?>" class="badge badge-warning" style="color:white;">Konfirmasi</a></h5></td>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->