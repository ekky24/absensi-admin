<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("_partials/navbar.php") ?>
  <div id="wrapper">

    <?php $this->load->view("_partials/sidebar.php") ?>

    <div id="content-wrapper">

      <div class="container-fluid">
        <!-- DataTables -->
        <div class="card mb-3">
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Anggota</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $i => $user): ?>
                  <tr>
                    <td>
                      <?php echo $user->nama ?>
                    </td>
                    <td>
                      <?php echo $user->alamat ?>
                    </td>
                    <td>
                      <?php echo $user->tlp1 ?>
                    </td>
                    <td>
                      <a href="#" class="btn btn-small" data-toggle="modal" data-target="#showModal<?php echo $i ?>"><i class="fas fa-search"></i> Show</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
      <?php foreach ($users as $i => $user): ?>
        <div class="modal fade" id="showModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <table width="100%">
                  <tr>
                    <td>Nama Lengkap</td>
                    <td><?php echo $user->nama ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td><?php echo $user->jenis_kelamin ?></td>
                  </tr>
                  <tr>
                    <td>TTL</td>
                    <td><?php echo $user->tanggal_lahir ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo $user->alamat ?></td>
                  </tr>
                  <tr>
                    <td>Telepon 1</td>
                    <td><?php echo $user->tlp1 ?></td>
                  </tr>
                  <tr>
                    <td>Telepon 2</td>
                    <td><?php echo $user->tlp2 ?></td>
                  </tr>
                  <tr>
                    <td>WA</td>
                    <td><?php echo $user->wa ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $user->email ?></td>
                  </tr>
                </table>
                <form action="<?php echo site_url('user/upload_foto') ?>" class="dropzone">
                  <div class="fallback">
                    <input name="file" type="file" multiple />
                  </div>
                  <button type="submit" class="btn btn-primary">Upload Foto</button>
                </form>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- Sticky Footer -->
      <?php $this->load->view("_partials/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <?php $this->load->view("_partials/scrolltop.php") ?>
  <?php $this->load->view("_partials/modal.php") ?>

  <?php $this->load->view("_partials/js.php") ?>
</body>

</html>