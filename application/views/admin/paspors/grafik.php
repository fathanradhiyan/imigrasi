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
            <h2 class="mt-4">Statistik Rekap Paspor</h1>
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				
				
</br>
				
				<!-- DataTables -->
				
				
                        
					

                    <div class="col-xl-10">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar"></i>
                                        Statistik Rekap Paspor
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart" width="100%" height="40"></canvas>
                                        
                                        <?php
                                         //Inisialisasi nilai variabel awal
                                         $jpermohonan= "";
                                        $jumlah=null;
                                        foreach ($hasil as $item)
                                        {
                                        $jper=$item->jpermohonan;
                                        $jpermohonan .= "'$jper'". ", ";
                                        $jum=$item->total;
                                        $jumlah .= "$jum". ", ";
                                        }
                                        ?>
                                        <script src="<?php echo("https://cdn.jsdelivr.net/npm/chart.js@2.8.0")?>"></script>
                                        <script type="text/javascript">
                                        var ctx = document.getElementById('myChart').getContext('2d');
                                        var myChart = new Chart(ctx, {
                                        // The type of chart we want to create
                                        type: 'bar',
                                        // The data for our dataset
                                        data: {
                                        labels: [<?php echo $jpermohonan; ?>],
                                        datasets: [{
                                        label:'Data Paspor ',
                                        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                                        borderColor: ['rgb(255, 99, 132)'],
                                        data: [<?php echo $jumlah; ?>]
                                        }]
                                        },
                                        // Configuration options go here
                                        options: {
                                            scales: {
                                            yAxes: [{
                                            ticks: {
                                            beginAtZero:true
                                             }
                                            }]
                                            }
                                            }
                                            });
                                        </script>
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