<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$data['judul'] ;?></title>

    <!-- Custom fonts for this template -->
    <link href="<?=BASEURL ;?>/vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=BASEURL ;?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?=BASEURL ;?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
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
            <!-- my-0 untuk margin hr -->

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

            <li class="nav-item active">
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

        <!-- Content Wrapper -->
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
                    <h1 class="h3 mb-2 text-gray-800">Riwayat Donasi</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Riwayat Donasi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id Submit</th>
                                            <th>Id Masjid</th>
                                            <th>Struk</th>
                                            <th>Nama Masjid</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Submit</th>
                                            <th>Id Masjid</th>
                                            <th>Struk</th>
                                            <th>Nama Masjid</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 'a' ;?>
                                        <?php foreach($data['data'] as $riwayat)   :?>
                                            <tr>
                                                <td><?=ucwords($riwayat['id_submit']) ;?></td>
                                                <td><?=ucwords($riwayat['id_masjid']) ;?></td>
                                                <td><a href="#" data-toggle="modal" data-target="#<?= $i ;?>">Gambar Struk</a></td>
                                                <td><?=ucwords($riwayat['nama']) ;?></td>
                                                <td><?=$riwayat['tanggal'] ;?></td>
                                                <td>Rp.<?=number_format($riwayat['jumlah'], 0, ",", ".") ;?></td>
                                                <td class="text-center"><span class="badge badge-pill badge-success px-3 py-2 h1 mb-0 mt-1">Diterima</span></td>
                                            </tr>

                                            <div class="modal fade" id="<?= $i ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Struk Bukti Donasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?=BASEURL ;?>/img/struk/<?=$riwayat['gambar'] ;?>" class="img-thumbnail" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        <?php $i++ ;?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal Detail Struk -->
            <div class="modal fade" id="strukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Struk Bukti Donasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <img src="<?=BASEURL ;?>/img/IMG_20210508_112718_843.jpg" class="img-thumbnail" alt="">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Akhir Modal Detail Struk -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Cahaya Donasi 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
                    <a class="btn btn-danger" href="<?=BASEURL ;?>/donatur/logout">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?=BASEURL ;?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASEURL ;?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASEURL ;?>/js/demo/admin.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=BASEURL ;?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=BASEURL ;?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=BASEURL ;?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=BASEURL ;?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=BASEURL ;?>/js/demo/datatables-demo.js"></script>

</body>

</html>