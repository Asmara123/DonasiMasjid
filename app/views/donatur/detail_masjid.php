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
    <link href="<?=BASEURL ;?>/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=BASEURL ;?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=BASEURL ;?>/css/custome.css">

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

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL ;?>/donatur/index">
                    <i class="fa-solid fa-mosque"></i>
                    <span>Data Masjid</span></a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL ;?>/donatur/antrian_donasi">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Antrian Donasi</span></a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL ;?>/donatur/riwayat_donasi">
                    <i class="fa-solid fa-book"></i>
                    <span>Riwayat Donasi</span></a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL ;?>/donatur/profile">
                    <i class="fa-solid fa-user"></i>
                    <span>Profilku</span></a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="nav-item">
                <a class="nav-link" href="<?=BASEURL ;?>/donatur/ubah_password">
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
                        <div class="h5">Halaman Donatur Masjid</div>    
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Masjid</h1>
                        <!-- Akan digunakan itu hreff -->
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-8 col-md-12 col-sm-12">
                            <?php Flasher::flashMessage();  ;?>
                        </div>
                    </div>
                    <div class="row justify-content-center p-0 pb-5 px-5 pt-3">
                        <div class="card shadow-lg bg-white rounded" style="width: 50rem;" >
                            <img class="card-img-top" src="<?=BASEURL ;?>/img/masjid/<?=$data['data']['gambar'] ;?>" alt="Card image cap" >
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Id Masjid     :  <strong><?=ucwords($data['data']['id_masjid']) ;?></strong></li>
                                <li class="list-group-item">Email Masjid  : <strong><?=$data['data']['email'] ;?></strong></li>
                                <li class="list-group-item">No Hp Masjid  : <strong><?=$data['data']['no_hp'] ;?></strong></li>
                                <li class="list-group-item">Nama Masjid   : <strong><?=ucwords($data['data']['nama']) ;?></strong></li>
                                <li class="list-group-item">Alamat Masjid : <strong><?=$data['data']['alamat'] ;?></strong></li>
                                <li class="list-group-item">Nomor Rekening : <strong><?= $data['data']['no_rek'];?></strong></li>
                                <li class="list-group-item">Nama Bank : <strong><?= ucwords($data['data']['nama_bank']);?></strong></li>
                                <li class="list-group-item">Nama Rekening : <strong><?= ucwords($data['data']['nama_rek']);?></strong></li>
                                <li class="list-group-item">Donasi Yang Dibutuhkan : <strong>Rp.<?=number_format($data['data']['jml_donasi'], 0, ",", ".") ;?></strong></li>
                            </ul>
                            <div class="card-body">
                                <h5 class="card-title">Kerusakan Masjid</h5>
                                <strong><p class="card-text"><?=$data['data']['deskripsi'] ;?></p></strong>
                            </div>
                            <a class="btn btn-outline-success edit-profile" href="#" role="button" data-toggle="modal" data-target="#mulaidonasiModal">Mulai Berdonasi</a>
                    </div>

                        
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Mulai Footer -->
            <!-- Akhir Footer -->
            
        </div>
        <!-- Akhir untuk konten kolom sebelah kanan -->

        <!-- Mulai Donasi Modal-->
        <div class="modal fade " id="mulaidonasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Mulai Berdonasi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=BASEURL ;?>/donatur/submitstruk" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_masjid" value="<?=$data['data']['id_masjid'] ;?>">
                            <input type="hidden" name="id_donatur" value="<?=$_SESSION['idDonatur'] ;?>">
                            <div class="mb-3">
                                <label for="id" class="form-label">Id Submit</label>
                                <input type="text" name="id_submit" class="form-control" id="id" autocomplete="off" value="<?=ucwords($data['id_submit']) ;?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Struk Pembayaran Donasi</label>
                                <input type="file" name="gambar" class="form-control" id="gambar">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_donasi" class="form-label">Jumlah Donasi</label>
                                <input type="number" name="jumlah_donasi" class="form-control" id="jumlah_donasi" autocomplete="off" placeholder="Rp.000" required>
                                <small id="jumlah_donasi" class="form-text text-muted">Masukan hanya nominal angka.</small>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-success" type="submit">Donasi</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir Mulai Donasi Modal-->
        
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
    <div class="modal fade " id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah yakin keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?=BASEURL ;?>/donatur/logout">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?=BASEURL ;?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASEURL ;?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=BASEURL ;?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASEURL ;?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=BASEURL ;?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=BASEURL ;?>/js/demo/chart-area-demo.js"></script>
    <script src="<?=BASEURL ;?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>