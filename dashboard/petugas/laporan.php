<?php
session_start();
include '../../app/function.php';
if (isset($_SESSION['id_petugas']) && isset($_SESSION['username']) && isset($_SESSION['level'])) {
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
        <!-- Data Tables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
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
                        <i class="fas fa-book-open"></i>
                        <span>Laporan Masyarakat</span></a>
                </li>

                <!-- Nav Item - Laporan masyarakat -->
                <li class="nav-item">
                    <a class="nav-link" href="verify.php">
                        <i class="fas fa-check-circle"></i>
                        <span>Laporan Terverify</span></a>
                </li>

                <!-- Nav Item - Tanggapan -->
                <li class="nav-item">
                    <a class="nav-link" href="tanggapan.php">
                        <i class="fas fa-bookmark"></i>
                        <span>Tanggapan</span></a>
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
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_petugas']; ?></span>
                                    <img class="img-profile rounded-circle" src="../assets/img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <!-- <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div> -->
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
                            <h1 class="h3 mb-0 text-gray-800">Laporan Masyarakat</h1>
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
                                        <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong><?php echo $_GET['error']; ?></strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Pelapor</th>
                                                        <th scope="col">Judul Laporan</th>
                                                        <th scope="col">Tanggal Laporan</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;

                                                    $query_mysql = $conn->query("SELECT * FROM laporan LEFT JOIN users ON laporan.id_user = users.id_user where status ='proses' ORDER BY id_laporan DESC");
                                                    while ($data = $query_mysql->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $i++; ?>.</th>
                                                            <td><?php echo $data['nama']; ?></td>
                                                            <td><?php echo $data['judul_laporan']; ?></td>
                                                            <td><?php echo $data['tanggal_laporan']; ?></td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#previewlaporan<?php echo $data['id_laporan']; ?>"> <i class="fas fa-eye mr-2"></i>PREVIEW </a>
                                                                <!-- Modal Preview Laporan -->
                                                                <div class="modal fade" id="previewlaporan<?php echo $data['id_laporan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Preview Laporan</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="judul" class="form-label">Judul Laporan</label>
                                                                                    <input type="text" class="form-control" id="judul" name="judul_laporan" value="<?php echo $data['judul_laporan']; ?>" readonly>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label for="isi" class="form-label">Isi Laporan</label>
                                                                                    <textarea class="form-control" id="isi" rows="10" name="isi_laporan" readonly><?php echo $data['isi_laporan']; ?> </textarea>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col">
                                                                                        <label class="form-label">Tanggal Kejadian</label>
                                                                                        <input type="date" class="form-control" name="tanggal_kejadian" value="<?php echo $data['tanggal_kejadian']; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="lokasi" class="form-label">Lokasi Kejadian</label>
                                                                                        <input type="text" class="form-control" id="lokasi" name="lokasi_laporan" value="<?php echo $data['lokasi_laporan']; ?>" readonly>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <p>Foto Kejadian</p>
                                                                                    <img src="../assets/img/user/<?php echo $data['foto']; ?>" alt="<?php echo $data['foto']; ?>" width="750px">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-center">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#verify<?php echo $data['id_laporan']; ?>"> <i class="fas fa-check-square mr-2"></i>VERIFIKASI </a>
                                                                <!-- Modal Hapus Lpaoran -->
                                                                <div class="modal fade" id="verify<?php echo $data['id_laporan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <form action="" method="POST">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Verifikasi Laporan</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" class="form-control" name="id_laporan" value="<?php echo $data['id_laporan']; ?>" readonly>
                                                                                    <input type="hidden" class="form-control" name="level" value="<?php echo $_SESSION['level']; ?>" readonly>
                                                                                    <div class="form-group">
                                                                                        <label for="konfirmasi">Konfirmasi Laporan</label>
                                                                                        <select class="form-control" id="konfirmasi" name="status">
                                                                                            <option value="selesai">Terima</option>
                                                                                            <option value="tolak">Tolak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="keterangan">Keterangan</label>
                                                                                        <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary" name="verifikasilaporan">Submit</button>
                                                                                    <!-- <a href="../../app/function.php?verifikasilaporan&id_laporan=<?php echo $data['id_laporan']; ?>&level=<?php echo $_SESSION['level']; ?>" class="btn btn-success">Verifikasi</a> -->
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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

        <!-- Data Tables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>

    </body>

    </html>

<?php
} else {
    header("Location: ../../loginpetugas.php");
    exit();
}
?>