<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body class="sb-nav-fixed" body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php")?>
	
	<div id="layoutSidenav">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>
		

		<div id="layoutSidenav_content">

			<div class="container-fluid px-4">
            <h2 class="mt-4">Daftar Pemohon Asing</h1>
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<div>
				<a href="<?php echo site_url('admin/izintinggal/add') ?>" class='btn btn-danger btn-sm'><i class="fas fa-plus"></i> Tambah Data</a>
				</div>
				
</br>
				
				<!-- DataTables -->
				<div class="card mb-4">
				
                        <div class="card-header">
						Data Pemohon Asing
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table id="datatablesSimple" >
								<thead>
									<tr>
									<th>No. Register</th>
									<th>Niora</th>
                                    <th>No. Permohonan</th>
									<th>Nama</th>
									<th>Kebangsaan</th>
									<th>Jenis Kelamin</th>
                                    <th>Tanggal Penyelesaian</th>
									<th>No. Paspor</th>
                                    <th>Habis Berlaku Paspor</th>
                                    <th>Layanan</th>
                                    <th>Perpanjangan</th>
                                    <th>Lokasi</th>
                                    <th>File</th>
                                    <th>Aksi</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($izintinggal as $izintinggals): ?>
									<tr>
										<td width="100">
											<?php echo $izintinggals->noregister ?>
										</td>
                                        <td width="100">
                                            <?php echo $izintinggals->niora ?>
										</td>
                                        <td width="100">
                                            <?php echo $izintinggals->nopermohonan ?>
										</td>
                                        <td width="100">
                                            <?php echo $izintinggals->nama ?>
										</td>
                                        <td width="100">
                                            <?php echo $izintinggals->kebangsaan ?>
										</td>
                                        <td width="100">
                                            <?php echo $izintinggals->jkelamin ?>
										</td>
                                        <td width="100">
                                            <?php echo $izintinggals->tgl_penyelesaian ?>
										</td>
                                        <td width="100">
                                            <?php echo $izintinggals->no_paspor ?>
										</td>
										<td width="100">
											<?php echo $izintinggals->tgl_habisberlakupaspor?></td>
										<td width="100">
											<?php echo $izintinggals->layanan?></td>	
										<td width="100">
											<?php echo $izintinggals->perpanjangan?></td>
										<td width="100">
										<a class="btn btn-secondary btn-sm"><?php echo $izintinggals->lokasi?></td>			
										
										<td width="100">
										
											<a href="<?php echo base_url('upload/izintinggals/'.$izintinggals->file) ?>"  class="btn btn-success btn-sm">Lihat Data</a>
										</td>
										
										<td width="500">
											<a href="<?php echo site_url('admin/izintinggal/edit/'.$izintinggals->id_izintinggal) ?>"
											 class="btn btn-sm text-warning"><i class="fas fa-edit"></i> Edit</a>
											
												
											 <a href="<?php echo site_url('admin/izintinggal/delete/'.$izintinggals->id_izintinggal) ?>"
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