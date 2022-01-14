<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="sb-nav-fixed" body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="layoutSidenav">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="layoutSidenav_content">

			<div class="container-fluid px-4">
            <h2 class="mt-4">Daftar Pemohon Paspor</h1>
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<div>
				<a href="<?php echo site_url('admin/paspor/add') ?>" class='btn btn-danger btn-sm'><i class="fas fa-plus"></i> Tambah Data</a>
				</div>
				
</br>
				
				<!-- DataTables -->
				<div class="card mb-4">
				
                        <div class="card-header">
						Data Pemohon Paspor
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table id="datatablesSimple" >
								<thead>
									<tr>
                                    <th>NP</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Tanggal Cetak</th>
                                    <th>No. Registrasi</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jenis Permohonan</th>
                                    <th>No. Paspor</th>
                                    <th>Maksud Keberangkatan</th>
									<th>Lokasi</th>
                                    <th>File</th>
                                    <th>Aksi</th>
									
									</tr>
								</thead>
								<tbody>
									<?php foreach ($paspor as $paspors): ?>
									<tr>
										<td width="100">
											<?php echo $paspors->np_paspor ?>
										</td>
                                        <td width="100">
                                            <?php echo $paspors->tglpermohonan ?>
										</td>
                                        <td width="100">
                                            <?php echo $paspors->tglcetak ?>
										</td>
                                        <td width="100">
                                            <?php echo $paspors->noregistrasi ?>
										</td>
                                        <td width="100">
                                            <?php echo $paspors->nama ?>
										</td>
                                        <td width="100">
                                            <?php echo $paspors->jkelamin ?>
										</td>
                                        <td width="100">
                                            <?php echo $paspors->jpermohonan ?>
										</td>
                                        <td width="100">
                                            <?php echo $paspors->no_paspor ?>
										</td>
										<td width="100">
											<?php echo $paspors->mksdkeberangkatan?></td>
										</td>

										<td width="100">
										
											<a class="btn btn-secondary btn-sm"><?php echo $paspors->lokasi?></a>
										</td>

										<td width="100">	
											<a href="<?php echo base_url('upload/paspors/'.$paspors->file) ?>"  class="btn btn-success btn-sm">Lihat Data</a>
										</td>
										
										<td width="500">
											<a href="<?php echo site_url('admin/paspor/edit/'.$paspors->id_pemohonpaspor) ?>"
											 class="btn btn-sm text-warning"><i class="fas fa-edit"></i> Edit</a>
											
											
											 <a href="<?php echo site_url('admin/paspor/delete/'.$paspors->id_pemohonpaspor) ?>"
											 class="btn btn-sm text-danger" onclick= "return confirm('Are you sure?')"><i class="fas fa-trash"></i>Hapus</a>
											
											
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid px-4 -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-layoutSidenav -->

	</div>
	<!-- /#layoutSidenav -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MyModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

	<script>
	function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
	}
	</script>



</body>

</html>