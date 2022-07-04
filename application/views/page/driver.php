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
                <h3 class="card-title">Data Driver</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a class="btn btn-success" href="adddriver" role="button">Tambah Data</a><br>
              <br>
<?= $this->session->flashdata('message') ?>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Driver</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($driver as $driver){ ?>
                  <tr>
                    <td><?= $driver->id; ?></td>
                    <td><?= $driver->nama; ?></td>
                    <td><h6><a href="<?php echo 'editdriver/'.$driver->id ?>" class="badge badge-warning" style="color:white;">Edit</a> 
                    <a href="<?php echo 'deletedriver/'.$driver->id ?>" class="badge badge-danger">Delete</a></h6></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Nama</th>
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