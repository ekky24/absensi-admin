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

				<?php if ($this->session->flashdata('message')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('message'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        	<span aria-hidden="true">&times;</span>
			        </button>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-body">
						<h1>Ubah Password</h1><hr>
						<form action="<?php echo site_url('admin/simpan_password') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="email">Email</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" placeholder="Email" value="<?php echo $this->session->userdata('email') ?>" readonly />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Password Lama*</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="password_lama" placeholder="Password Lama" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Password Baru*</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="password_baru" placeholder="Password Baru" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Konfirmasi Password*</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="konfirmasi" placeholder="Konfirmasi Password" />
								<div class="invalid-feedback">
									<?php echo form_error('konfirmasi') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("_partials/js.php") ?>

</body>

</html>