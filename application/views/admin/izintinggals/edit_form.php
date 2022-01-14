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
			<h2 class="mt-4">Edit Data Pemohon Asing</h1>
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

                <!-- Card  -->
				<div class="card mb-4">
					<div class="card-header">
						Edit Data Pemohon Asing
					</div>
					<div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $izintinggals->id_izintinggal?>" />
							
                            <div class="form-group">
								<label for="nama_jlayanan">Jenis Layanan</label>
								<input class="form-control <?php echo form_error('nama_jlayanan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_jlayanan" placeholder="Jenis Layanan" value="<?php echo $izintinggals->nama_jlayanan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_jlayanan') ?>
								</div>
							</div>
							
							<br>
							<div class="form-group">
								<label for="noregister">No. Register</label>
								<input class="form-control <?php echo form_error('noregister') ? 'is-invalid':'' ?>"
								 type="text" name="noregister" placeholder="Nomor Register" value="<?php echo $izintinggals->noregister ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('noregister') ?>
								</div>
							</div>

							</br>

							<div class="form-group">
								<label for="niora">Niora</label>
								<input class="form-control <?php echo form_error('niora') ? 'is-invalid':'' ?>"
								 type="text" name="niora" placeholder="Niora" value="<?php echo $izintinggals->niora ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('niora') ?>
								</div>
							</div>

							<br>
							<div class="form-group">
								<label for="nopermohonan">Nomor Permohonan</label>
								<input class="form-control <?php echo form_error('nopermohonan') ? 'is-invalid':'' ?>"
								 type="text" name="nopermohonan" placeholder="Nomor Permohonan" value="<?php echo $izintinggals->nopermohonan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jlayanan') ?>
								</div>
							</div>
							</br>

							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama"  placeholder="Nama" value="<?php echo $izintinggals->nama ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<br>
							<div class="form-group">
								<label for="kebangsaan">Kebangsaan</label>
								<input class="form-control <?php echo form_error(' kebangsaan') ? 'is-invalid':'' ?>"
								 type="text" name="kebangsaan" placeholder="Kebangsaan" value="<?php echo $izintinggals->kebangsaan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kebangsaan') ?>
								</div>
							</div>
							</br>

							<div class="form-group">
								<label for="jkelamin">Jenis Kelamin</label>
								<input class="form-control <?php echo form_error('jkelamin') ? 'is-invalid':'' ?>"
								 type="text" name="jkelamin" placeholder= "Jenis Kelamin" value="<?php echo $izintinggals->jkelamin ?>"/>
                                 
								<div class="invalid-feedback">
									<?php echo form_error('jkelamin') ?>
								</div>
							</div>

							<br>
							<div class="form-group">
								<label for="tgl_penyelesaian">Tanggal Penyelesaian</label>
								<input class="form-control <?php echo form_error('tgl_penyelesaian') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_penyelesaian" format="dd/mm/yyyy" placeholder="Tanggal Penyelesaian"
                                 value="<?php echo $izintinggals->tgl_penyelesaian ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tgl_penyelesaian') ?>
								</div>
							</div>
							</br>

							<div class="form-group">
								<label for="no_paspor">Nomor Paspor</label>
								<input class="form-control <?php echo form_error('no_paspor') ? 'is-invalid':'' ?>"
								 type="text" name="no_paspor" placeholder="Nomor Paspor" value="<?php echo $izintinggals->no_paspor ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('no_paspor') ?>
								</div>
							</div>

                            <br>
							<div class="form-group">
								<label for="tgl_habisberlakupaspor">Tanggal Habis Berlaku Paspor</label>
								<input class="form-control <?php echo form_error('tgl_habisberlakupaspor') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_habisberlakupaspor" format="dd/mm/yyyy" placeholder="Tanggal Habis Berlaku Paspor"
                                 value="<?php echo $izintinggals->tgl_habisberlakupaspor ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tgl_habisberlakupaspor') ?>
								</div>
							</div>
							</br>

                            <div class="form-group">
								<label for="layanan">Layanan</label>
								<input class="form-control <?php echo form_error('layanan') ? 'is-invalid':'' ?>"
								 type="text" name="layanan"  placeholder="Layanan" value="<?php echo $izintinggals->layanan ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('layanan') ?>
								</div>
							</div>

							<br>
                            <div class="form-group">
								<label for="perpanjangan">Perpanjangan</label>
								<input class="form-control <?php echo form_error('perpanjangan') ? 'is-invalid':'' ?>"
								 type="number" name="perpanjangan" placeholder="Perpanjangan" value="<?php echo $izintinggals->perpanjangan ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('perpanjangan') ?>
								</div>
							</div>
							</br>

							
							<div class="form-group">
								<label for="lokasi">Lokasi</label>
								<input class="form-control <?php echo form_error('lokasi') ? 'is-invalid':'' ?>"
								 type="text" name="lokasi"  placeholder="Lokasi Penyimpan Arsip Fisik" value="<?php echo $izintinggals->lokasi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('lokasi') ?>
								</div>
							</div>

							<br>
							<div class="form-group">
								<label for="name">File</label>
								<input class="form-control-file <?php echo form_error('file') ? 'is-invalid':'' ?>"
								 type="file" name="file" />
                                 <input type="hidden" name="old_file" value="<?php echo $izintinggals->file ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('file') ?>
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