<!DOCTYPE html>
<html lang="en">
    <head>
    <?php $this->load->view("admin/_partials/head.php") ?>
    </head>
    <body class="sb-nav-fixed" id= "page-top">
    <?php $this->load->view("admin/_partials/navbar.php") ?>
        <div id="layoutSidenav">
        <?php $this->load->view("admin/_partials/sidebar.php") ?> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h2 class="mt-4">Dashboard</h1>
                    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
                        <div class="row">
                            <div class="col-xl-6 col-md 8">
                            <div class="card mb-3" style="max-width: 540px;">
                             <div class="row g-0">
                             <div class="col-md-4"  action="<?php site_url('admin/profile')?>">
                             <img src="<?php echo base_url('assets/img/profile/') . $user['photo']; ?>" class="card-img" >
                             </div>
                             <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><?= $user['full_name'];?></h5>
                            <p class="card-text"><?= $user['username'];?></p>
                            <p class="card-text"><?= $user['email'];?></p>
                            <p class="card-text"><small class="text-muted">Admin since <?= $user['created_at'];?> </small></p>
                            </div>
                             </div>
                             </div>
                            </div>
                            </div>
                       
                        
                        
                        </div>

                        <div>
				        <a href="<?php echo site_url('admin/profile/edit/'.$user['id_user']) ?>" class='btn btn-primary btn-sm'><i class="fas fa-edit"></i> Edit Profile</a>
				        </div>

                </main>
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
        </div>
        <?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    </body>
</html>
