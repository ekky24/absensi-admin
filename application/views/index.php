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
        <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <!-- DataTables -->
        <div class="card mb-3">
          <div class="card-body">
            <h1>Data User</h1><hr>
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
                <table width="100%" class="table table-condensed table-detail-data">
                  <tr>
                    <th width="35%">Nama Lengkap</th>
                    <td><?php echo $user->nama ?></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <td><?php if ($user->jenis_kelamin == 'L') echo "Laki-Laki"; else echo "Perempuan"; ?></td>
                  </tr>
                  <tr>
                    <th>Tanggal Lahir</th>
                    <td><?php 
                      if ($user->tanggal_lahir != null) {
                        $temp = explode('-', $user->tanggal_lahir);
                        echo $temp[2] . '-' . $temp[1] . '-' . $temp[0];
                      }
                    ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td><?php echo $user->alamat ?></td>
                  </tr>
                  <tr>
                    <th>Telepon 1</th>
                    <td><?php echo $user->tlp1 ?></td>
                  </tr>
                  <tr>
                    <th>Telepon 2</th>
                    <td><?php echo $user->tlp2 ?></td>
                  </tr>
                  <tr>
                    <th>WA</th>
                    <td><?php echo $user->wa ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?php echo $user->email ?></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <form action="<?php echo site_url('user/form_foto/') . $user->pin ?>" method='get'>
                  <button class="btn btn-primary" type="submit">Detail Data</button>
                </form>
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