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
              <a class="btn btn-success" href="addkendaraan" role="button">Tambah Data</a><br>
<br>
<?= $this->session->flashdata('message') ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Jenis Kendaraan</th>
                    <th>Merk Kendaraan</th>
                    <th>Plat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($kendaraan as $kendaraan){ ?>
                  <tr>
                    <td><?= $kendaraan->id; ?></td>
                    <td><?= $kendaraan->jenis_kendaraan; ?></td>
                    <td><?= $kendaraan->merk_kendaraan; ?></td>
                    <td><?= $kendaraan->plat; ?></td>
                    <td><h6><a href="<?php echo 'editkendaraan/'.$kendaraan->id ?>" class="badge badge-warning" style="color:white;">Edit</a> 
                    <a href="<?php echo 'deletekendaraan/'.$kendaraan->id ?>" class="badge badge-danger">Delete</a></h6></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Jenis Kendaraan</th>
                    <th>Merk Kendaraan</th>
                    <th>Plat</th>
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