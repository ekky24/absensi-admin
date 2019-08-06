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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('user') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('user/upload_json') ?>" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label for="name">Upload JSON User*</label>
								<input class="form-control-file <?php echo form_error('user') ? 'is-invalid':'' ?>" type="file" name="user" />
								<div class="invalid-feedback">
									<?php echo form_error('user') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Upload JSON Scanlog*</label>
								<input class="form-control-file <?php echo form_error('scanlog') ? 'is-invalid':'' ?>" type="file" name="scanlog" />
								<div class="invalid-feedback">
									<?php echo form_error('scanlog') ?>
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