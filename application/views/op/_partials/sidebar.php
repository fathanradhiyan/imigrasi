<!DOCTYPE html>
<html lang="en">
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
                        
                            <a class="nav-link" href="<?php echo site_url('admin') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">DPRI</div>
                                <div class="nav <?php echo $this->uri->segment(2) == 'dpri' ? 'active': '' ?>">
                                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDPRI" aria-expanded="false" aria-controls="collapseDPRI">
                                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                        Pelayanan DPRI
                                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                        <div class="collapse" id="collapseDPRI" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo site_url('admin/paspor') ?>">Rekap Paspor</a>
                                            <a class="nav-link" href="<?php echo site_url('admin/paspor/add') ?>">Tambah Paspor</a>
                                            <a class="nav-link" href="<?php echo site_url('admin/paspor/cari') ?>">Pencarian Paspor</a>
                                            <a class="nav-link" href="<?php echo site_url('admin/paspor/statistik') ?>">Statistik Paspor</a>
                                            </nav>
                                     </div>
                                </div>
                            
                            <div class="sb-sidenav-menu-heading">Izin Tinggal</div>
                                <div class="nav <?php echo $this->uri->segment(2) == 'izintinggal' ? 'active': '' ?>">
                                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseIzinTinggal" aria-expanded="false" aria-controls="collapseIzinTinggal">
                                    <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                    Pelayanan Izin Tinggal
                                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                        <div class="collapse" id="collapseIzinTinggal" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo site_url('admin/izintinggal') ?>">Rekap Izin Tinggal</a>
                                            <a class="nav-link" href="<?php echo site_url('admin/izintinggal/add') ?>">Tambah Izin Tinggal</a>
                                            <a class="nav-link" href="<?php echo site_url('admin/izintinggal/cari') ?>">Pencarian Izin Tinggal</a>
                                            <a class="nav-link" href="<?php echo site_url('admin/izintinggal/statistik') ?>">Statistik Izin Tinggal</a>
                                            </nav>
                                     </div>
                                </div>

                                <div class="sb-sidenav-menu-heading">Users</div>
                                <div class="nav <?php echo $this->uri->segment(2) == 'user' ? 'active': '' ?>">
                                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
                                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                    Manajemen Users
                                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                        <div class="collapse" id="collapseUser" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo site_url('admin/user') ?>">Rekap Users</a>
                                            <a class="nav-link" href="<?php echo site_url('admin/user/register') ?>">Tambah Users</a>
                                           
                                            </nav>
                                     </div>
                                </div>
                            
                </nav>
            </div>
</div>
</html>
