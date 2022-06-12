<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$data['judul'] ;?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=BASEURL; ?>/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=BASEURL ;?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Mulai konten sidebar sebelah kiri -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-mosque mr-1"></i>
                </div>
                <div class="sidebar-brand-text ">Cahaya Donasi</div>
            </a>

            <hr class="sidebar-divider my-2">

            <li class="nav-item active">
                <a class="nav-link" href="<?=BASEURL; ?>/pengelola/index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL; ?>/pengelola/antrian_donasi">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    <span>Antrian Donasi</span></a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL; ?>/pengelola/riwayat_donasi">
                    <i class="fa-solid fa-book"></i>
                    <span>Riwayat Donasi</span></a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL; ?>/pengelola/ubah_password">
                    <i class="fa-solid fa-key"></i>
                    <span>Ubah Password</span></a>
            </li>


            <hr class="sidebar-divider d-none d-md-block">

            <!-- Mulai tombol hide unhide sidebar kolom kiri -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            
        </ul>
        <!-- Akhir konten sidebar sebelah kiri -->


        <!-- Mulai untuk konten kolom sebelah kanan -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Tombol hide unhide  hamburger saat ukuran mobile -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!--  Akan digunakan nanti Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                    <div class="p-3 col-xl-8 col-md-4 col-sm-4">
                        <div class="h5">Halaman Admin Masjid</div>    
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucwords($data['profile'][0]['nama']);?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?=BASEURL ;?>/img/masjid/<?=$data['profile'][0]['gambar'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?=BASEURL; ?>/pengelola/profile">
                                    <i class="fa-solid fa-mosque mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- Akan digunakan itu hreff -->
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="row">
                        <div class="col-xl-8 col-md-12 col-sm-12">
                            <?php Flasher::flashMessage();  ;?>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row align-items-center">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-4 mt-2">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Donatur</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$data['data'][0]['jumlah_donatur'] ;?> Orang</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-hand-holding-heart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-4 mt-2">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Donasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?=number_format($data['data'][0]['jumlah_donasi'], 0, ",", ".") ;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-rupiah-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-4 mt-2">
                            <div class="card border-left-primary shadow h-100 py-2 ">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Target Donasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?= number_format($data['profile'][0]['jml_donasi'], 0, ",", ".");?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-rupiah-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-4 mt-2">
                            <?php if(($data['data'][0]['jumlah_donasi'] >= $data['data'][0]['jml_donasi']) and $data['data'][0]['jml_donasi'] != 0)  :?>
                                <div class="card border-left-success shadow h-100 py-2 ">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-square-check fa-3x" style="color: #1cc88a;"></i>
                                        <div class="h3 mb-0 font-weight-bold text-gray-800">Tercapai</div>
                                    </div>
                                </div>
                            <?php elseif( $data['data'][0]['jumlah_donasi'] < $data['data'][0]['jml_donasi']) :?>
                                <div class="card border-left-danger shadow h-100 py-2 ">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-square-check fa-3x" style="color: #d9534f;"></i>
                                        <div class="h3 mb-0 font-weight-bold text-gray-800">Belum Tercapai</div>
                                    </div>
                                </div>
                            <?php elseif( ($data['data'][0]['jumlah_donasi'] and  $data['data'][0]['jml_donasi']) == 0 ) :?>
                                <div class="card border-left-warning shadow h-100 py-2 ">
                                    <div class="card-body text-center">
                                        <i class="fa-solid fa-square-check fa-3x" style="color: #ffc107;"></i>
                                        <div class="h3 mb-0 font-weight-bold text-gray-800">Belum Ditentukan</div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Mulai Footer -->
            <!-- Akhir Footer -->
            
        </div>
        <!-- Akhir untuk konten kolom sebelah kanan -->
        
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Cahaya Donasi 2022</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- End of Page Wrapper -->

    <!-- Mulai tombol Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Akhir tombol Scroll to Top Button-->

    <!-- Awal Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah yakin keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?=BASEURL ;?>/pengelola/logout">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?=BASEURL; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=BASEURL; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASEURL; ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=BASEURL; ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=BASEURL; ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?=BASEURL; ?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>