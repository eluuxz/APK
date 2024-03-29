<?php
session_start();
include 'app/function.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PENGADUAN MASYARAKAT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body class="bg-primary bg-gradient">
    <div class="container">
        <div class="col-md-12 position-absolute top-50 start-50 translate-middle w-25">
            <div class="card text-bg-light mb-3 shadow">
                <div class="card-header text-center">Daftar</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="nik" required />
                            <label class="form-label" for="loginName">NIK</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="nama" required />
                            <label class="form-label" for="loginName">Nama</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" class="form-control" name="email" required />
                            <label class="form-label" for="loginName">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="username" required />
                            <label class="form-label" for="loginName">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" class="form-control" name="password" required />
                            <label class="form-label" for="loginPassword">Password</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" name="notelp" required />
                            <label class="form-label" for="loginName">No.Telpon</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4" name="daftar">Daftar</button>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_GET['success']; ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Kembali ke halaman<a href="login.php"> Login</a></p>
                        </div>
                        <div class="text-center">
                            <p>Kembali Ke <a href="index.php">Halaman Awal</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
</body>

</html>