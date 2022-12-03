<?php
session_start();
include '../../app/function.php';
if (isset($_SESSION['id_petugas']) && isset($_SESSION['username'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin</title>

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
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
                <li class="nav-item">
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

                <li class="nav-item active">
                    <a class="nav-link" href="datapetugas.php">
                        <i class="fas fa-user-tie"></i>
                        <span>Data Akun</span>
                    </a>
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

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Petugas & Masyarakat</h1>
                        </div>
                        <hr>

                        <!-- Content Row -->
                        <div class="row">
                            <div class="col">
                                <?php if (isset($_GET['success'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_GET['success']; ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                                <div class="card border-left-primary shadow">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Petugas</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="collapseCardExample">
                                        <div class="card-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="namapetugas" class="form-label">Masukkan Nama Petugas</label>
                                                    <input type="text" class="form-control" id="namapetugas" name="nama_petugas" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Masukkan Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Masukkan Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" required>
                                                </div>
                                                <input type="hidden" class="form-control" name="level" value="petugas" readonly>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-block" name="tambahdatapetugas">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <div class="card border-left-primary shadow">
                                    <!-- Card Header - Accordion -->
                                    <a href="#masyarakat" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="masyarakat">
                                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Masyarakat</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="masyarakat">
                                        <div class="card-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="namapetugas" class="form-label">Masukkan Nama Petugas</label>
                                                    <input type="text" class="form-control" id="namapetugas" name="nama_petugas" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Masukkan Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Masukkan Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" required>
                                                </div>
                                                <input type="hidden" class="form-control" name="level" value="petugas" readonly>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary btn-block" name="tambahdatapetugas">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <h1 class="h3 mb-0 text-gray-800">Petugas</h1>
                                </div>
                                <div class="card border-left-success shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="table-responsive">
                                                <table class="table" id="table_id">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Username</th>
                                                            <th scope="col">Nama Petugas</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;

                                                        $query_mysql = $conn->query("SELECT * FROM petugas where level ='petugas' ORDER BY id_petugas DESC");
                                                        while ($data = $query_mysql->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?= $i++; ?>.</th>
                                                                <td><?php echo $data['username']; ?></td>
                                                                <td><?php echo $data['nama_petugas']; ?></td>
                                                                <td></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-center mb-2">
                                    <h1 class="h3 mb-0 text-gray-800">Masyarakat</h1>
                                </div>
                                <div class="card border-left-success shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="table-responsive">
                                                <table class="table" id="table_id1">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Username</th>
                                                            <th scope="col">Nama Petugas</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;

                                                        $query_mysql = $conn->query("SELECT * FROM petugas where level ='petugas' ORDER BY id_petugas DESC");
                                                        while ($data = $query_mysql->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?= $i++; ?>.</th>
                                                                <td><?php echo $data['username']; ?></td>
                                                                <td><?php echo $data['nama_petugas']; ?></td>
                                                                <td></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
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
                $('#table_id1').DataTable();
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