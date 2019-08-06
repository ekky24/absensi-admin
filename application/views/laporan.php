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
            <h1>Data Absen</h1><hr>
            <form class="form-inline" action="<?php echo site_url('user/laporan') ?>" method="post">
              <div class="form-group">
                <label for="tgl_awal">Rentang Tanggal</label>
                <input id="tgl_awal" type="date" class="form-control <?php echo form_error('tgl_awal') ? 'is-invalid':'' ?>" placeholder="Tanggal awal" autofocus="autofocus" name="tgl_awal" <?php if(!empty($tgl_awal)) echo "value='$tgl_awal'" ?>>
                <div class="invalid-feedback">
                  <?php echo form_error('tgl_awal') ?>
                </div>
              </div>
              <div class="form-group">
                <label for="tgl_akhir">-</label>
                <input id="tgl_akhir" type="date" class="form-control <?php echo form_error('tgl_akhir') ? 'is-invalid':'' ?>" placeholder="Tanggal akhir" autofocus="autofocus" name="tgl_akhir" <?php if(!empty($tgl_akhir)) echo "value='$tgl_akhir'" ?>>
                <div class="invalid-feedback">
                  <?php echo form_error('tgl_akhir') ?>
              </div>
              </div>
              <input class="btn btn-success" type="submit" name="btn" value="Filter" />
              <button id="resetButton" class="btn btn-secondary" href="<?php echo site_url('user/laporan') ?>">Reset</button>
            </form><br>

            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Anggota</th>
                    <th>Jumlah Masuk</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $i => $user): ?>
                  <tr>
                    <td>
                      <?php echo $user->nama ?>
                    </td>
                    <td>
                      <?php echo $user->count ?>
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
      <!-- Sticky Footer -->
      <?php $this->load->view("_partials/footer.php") ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <?php $this->load->view("_partials/scrolltop.php") ?>
  <?php $this->load->view("_partials/modal.php") ?>

  <?php $this->load->view("_partials/js.php") ?>

  <script>
    $('#resetButton').click(function(e) {
      e.preventDefault()
      $('#tgl_awal').trigger("reset")
      $('#tgl_akhir').trigger("reset")
      window.location.href = $('#resetButton').attr('href')
    });
  </script>

</body>

</html>