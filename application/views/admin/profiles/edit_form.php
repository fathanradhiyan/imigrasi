<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class= "sb-nav-fixed" id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="layoutSidenav">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="layoutSidenav_content">

			<div class="container-fluid px-4">
			<h2 class="mt-4">Edit Data Profile</h1>
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<div>
				<a href="<?php echo site_url('admin/Profile') ?>" class='btn btn-danger btn-sm'> Kembali</a>
				</div>
				
</br>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

                <!-- Card  -->
				<div class="card mb-4">
					<div class="card-header">
						Edit Data Profile
					</div>
					<div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $user->id_user?>" />
							
                            <div class="form-group">
								<label for="username">Username</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="Username" value="<?php echo $user->username ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

							<br>
							<div class="form-group">
								<label for="password">Password</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="text" name="password" placeholder="Password"
                                  />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>
							</br>

                            <div class="form-group">
								<label for="email">Email</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email"  placeholder="Email"
                                 value="<?php echo $user->email ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

                            <br>
							<div class="form-group">
								<label for="full_name">Full Name</label>
								<input class="form-control <?php echo form_error('full_name') ? 'is-invalid':'' ?>"
								 type="text" name="full_name"  placeholder="Full Name" value="<?php echo $user->full_name ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('full_name') ?>
								</div>
							</div>
							</br>


							

							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>