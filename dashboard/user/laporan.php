<?php
session_start();
include '../../app/function.php';
if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dashboard</title>
        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Sweet Alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-atlas"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Pengaduan</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="fas fa-users"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Fitur
                </div>

                <!-- Nav Item - Buat Laporan -->
                <li class="nav-item active">
                    <a class="nav-link" href="laporan.php">
                        <i class="fas fa-edit"></i>
                        <span>Buat Laporan</span></a>
                </li>

                <!-- Nav Item - Tanggapan -->
                <li class="nav-item">
                    <a class="nav-link" href="lihatlaporan.php">
                        <i class="fas fa-eye"></i>
                        <span>Lihat Laporan</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="lihattanggapan.php">
                        <i class="fas fa-comments"></i>
                        <span>Lihat Tanggapan</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']; ?></span>
                                    <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
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
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Sampaikan Laporan Anda</h1>
                        </div>
                        <hr>

                        <!-- Content Row -->
                        <div class="row">
                            <div class="col">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <?php if (isset($_GET['success'])) { ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong><?php echo $_GET['success']; ?></strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <!-- Email input -->
                                            <input type="hidden" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" name="id_user" readonly>
                                            <div class="mb-3">
                                                <label for="judul" class="form-label">Ketik Judul Laporan Anda</label>
                                                <input type="text" class="form-control" id="judul" name="judul_laporan" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="isi" class="form-label">Ketik Isi Laporan Anda</label>
                                                <textarea class="form-control" id="isi" rows="3" name="isi_laporan" required></textarea>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="form-label">Tanggal Kejadian</label>
                                                    <input type="date" class="form-control" name="tanggal_kejadian" value="<?php date_default_timezone_set('Asia/Makassar'); echo date_create('now')->format('Y-m-d'); ?>" max="<?php date_default_timezone_set('Asia/Makassar'); echo date_create('now')->format('Y-m-d'); ?>" required>
                                                </div>
                                                <div class="col">
                                                    <label for="lokasi" class="form-label">Ketik Lokasi Kejadian</label>
                                                    <input type="text" class="form-control" id="lokasi" name="lokasi_laporan" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto">Masukkan Foto</label>
                                                <input type="file" class="form-control-file" id="foto" name="foto">
                                            </div>
                                            <input type="hidden" class="form-control" name="status" value="proses" readonly>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-block" name="lapor">Lapor</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Content Row -->

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Eluuxz 2022</span>
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

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../../app/function.php?logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../assets/js/demo/chart-area-demo.js"></script>
        <script src="../assets/js/demo/chart-pie-demo.js"></script>

        <?php if (isset($_GET['error'])) { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gambar Harus Berekstensi JPG / PNG'
                })
            </script>
        <?php } ?>

    </body>

    </html>

<?php
} else {
    // session_unset();
    // session_destroy();
    header("Location: ../../login.php");
    exit();
}
?>