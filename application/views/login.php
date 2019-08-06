<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="bg-dark">

  <div class="container">
    <?php if ($this->session->flashdata('message')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $this->session->flashdata('message'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php endif; ?>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo site_url('admin/attempt') ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" placeholder="Email address" required="required" autofocus="autofocus" name="email">
              <label for="inputEmail">Email</label>
              <div class="invalid-feedback">
                <?php echo form_error('email') ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" placeholder="Password" required="required" name="password">
              <label for="inputPassword">Password</label>
              <div class="invalid-feedback">
                <?php echo form_error('password') ?>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" style="color: white" value="Login">
        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view("_partials/js.php") ?>

</body>

</html>
