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
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-success" href="addbarang" role="button">Tambah Data</a><br>
              <br>
              <?= $this->session->flashdata('message') ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($barang as $barang){ ?>
                  <tr>
                    <td><?= $barang->id; ?></td>
                    <td><?= $barang->nama_barang; ?></td>
                    <td><?= $barang->deskripsi; ?></td>
                    <td><h6><a href="<?php echo 'editbarang/'.$barang->id ?>" class="badge badge-warning" style="color:white;">Edit</a> 
                    <a href="<?php echo 'deletebarang/'.$barang->id ?>" class="badge badge-danger">Delete</a></h6></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Nama Barang</th>
                    <th>Deskripsi</th>
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