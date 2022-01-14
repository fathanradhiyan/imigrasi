<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="<?php echo base_url('assets/img/imigrasi.png')?>" type="image/png">
        <title>Login - SIMSIP Imigrasi Cianjur</title>
        <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet" />
        <script src="<?php echo('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js')?>" ></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="<?= site_url('Login') ?>" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  type="text" name="username" id="username" placeholder="Username or Email" />
                                                <label for="username">Username </label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  type="password" name="password" id="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            
                                            
                                                <div class="form-group">
                                                <input type="submit" class="btn btn-success" name="login" id="login" value="Login" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SIMSIP Imigrasi Cianjur</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js')?>" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js/scripts.js')?>"></script>
    </body>
</html>
