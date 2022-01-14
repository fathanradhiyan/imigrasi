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
            <h2 class="mt-4">Tambah Data Pemohon Paspor</h1>
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<div>
				<a href="<?php echo site_url('admin/paspor') ?>" class='btn btn-danger btn-sm'> Kembali</a>
				</div>
				
</br>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-4">
					<div class="card-header">
						Tambah Data
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/paspor/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="np_paspor">NP</label>
								<input class="form-control <?php echo form_error('np_paspor') ? 'is-invalid':'' ?>"
								 type="text" name="np_paspor" placeholder="NP" />
								<div class="invalid-feedback">
									<?php echo form_error('np_paspor') ?>
								</div>
							</div>

							<br>
							<div class="form-group">
								<label for="tglpermohonan">Tanggal Permohonan</label>
								<input class="form-control <?php echo form_error('tglpermohonan') ? 'is-invalid':'' ?>"
								 type="date" name="tglpermohonan" format="dd/mm/yyyy" placeholder="Tanggal Permohonan" />
								<div class="invalid-feedback">
									<?php echo form_error('tglpermohonan') ?>
								</div>
							</div>
							</br>

                            
							<div class="form-group">
								<label for="tglcetak">Tanggal Cetak</label>
								<input class="form-control <?php echo form_error('tglcetak') ? 'is-invalid':'' ?>"
								 type="date" name="tglcetak" format="dd/mm/yyyy" placeholder="Tanggal Cetak" />
								<div class="invalid-feedback">
									<?php echo form_error('tglcetak') ?>
								</div>
							</div>

                            <br>
							<div class="form-group">
								<label for="noregistrasi">No Registrasi</label>
								<input class="form-control <?php echo form_error('noregistrasi') ? 'is-invalid':'' ?>"
								 type="text" name="noregistrasi"  placeholder="Nomor Registrasi" />
								<div class="invalid-feedback">
									<?php echo form_error('noregistrasi') ?>
								</div>
							</div>
							</br>

                            <div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama"  placeholder="Nama" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

                            <br>
							<div class="form-group">
								<label for="jkelamin">Jenis Kelamin</label>
								<input class="form-control <?php echo form_error('jkelamin') ? 'is-invalid':'' ?>"
								 type="text" name="jkelamin" placeholder="Jenis Kelamin" />
                                
								<div class="invalid-feedback">
									<?php echo form_error('jkelamin') ?>
								</div>
							</div>
							</br>

                            <div class="form-group">
								<label for="jpermohonan">Jenis Permohonan</label>
								<input class="form-control <?php echo form_error('jpermohonan') ? 'is-invalid':'' ?>"
								 type="text" name="jpermohonan"  placeholder="Jenis Permohonan" />
								<div class="invalid-feedback">
									<?php echo form_error('jpermohonan') ?>
								</div>
							</div>

                            <br>
							<div class="form-group">
								<label for="no_paspor">Nomor Paspor</label>
								<input class="form-control <?php echo form_error('no_paspor') ? 'is-invalid':'' ?>"
								 type="text" name="no_paspor" placeholder="Nomor Paspor" />
								<div class="invalid-feedback">
									<?php echo form_error('no_paspor') ?>
								</div>
							</div>
							</br>

                            <div class="form-group">
								<label for="name">Maksud Keberangkatan</label>
								<input class="form-control <?php echo form_error('mksdkeberangkatan') ? 'is-invalid':'' ?>"
								 name="mksdkeberangkatan" placeholder="Maksud Keberangkatan"/>
								<div class="invalid-feedback">
									<?php echo form_error('mksdkeberangkatan') ?>
								</div>
							</div>

							<br>
							<div class="form-group">
								<label for="lokasi">Lokasi</label>
								<input class="form-control <?php echo form_error('lokasi') ? 'is-invalid':'' ?>"
								 type="text" name="lokasi"  placeholder="Lokasi Penyimpan Arsip Fisik" />
								<div class="invalid-feedback">
									<?php echo form_error('lokasi') ?>
								</div>
							</div>
							

							<br>
							<div>
                            <div class="form-group">
								<label for="name">File</label>
								<input class="form-control-file <?php echo form_error('file') ? 'is-invalid':'' ?>"
								 type="file" name="file" />
								<div class="invalid-feedback">
									<?php echo form_error('file') ?>
								</div>
							</div>
                            </div></br>

							

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