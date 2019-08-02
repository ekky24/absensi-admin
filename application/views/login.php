<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("_partials/head.php") ?>
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo site_url('user/attempt') ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" placeholder="Email address" required="required" autofocus="autofocus" name="email">
              <label for="inputEmail">Email</label>
              <div class="invalid-feedback">
                <?php echo form_error('price') ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" placeholder="Password" required="required" name="password">
              <label for="inputPassword">Password</label>
              <div class="invalid-feedback">
                <?php echo form_error('price') ?>
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
