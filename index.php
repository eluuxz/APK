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
    <!-- Step By Step -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Rubik', sans-serif;
        }

        .progress:before {
            width: 80%;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
            <div class="container" data-aos="fade-down" data-aos-duration="1000">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="..." width="40" height="30">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a href="login.php" class="btn btn-light btn-sm me-2">Login</a>
                        <a href="daftar.php" class="btn btn-outline-light btn-sm">Daftar</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="bg-primary bg-gradient" style="border-bottom-right-radius: 50px; border-bottom-left-radius: 50px; padding:0px;">
            <div class="container d-flex justify-content-center">
                <div class="text-center col-8 text-light" data-aos="zoom-in-down" data-aos-easing="linear" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <img src="img/logo.png" class="rounded mx-auto d-block h-50 mt-4 mb-4" alt="...">
                    <h1>Pengaduan Masyarakat Biringkanaya</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laudantium alias debitis,
                        officiis accusamus omnis unde eligendi repudiandae illo delectus,
                        dolore aliquam doloremque libero reiciendis iste excepturi exercitationem, provident necessitatibus
                        error.</p>
                    <a href="login.php" class="btn btn-light">Buat laporan sekarang!</a>
                </div>
            </div>
        </div>
        <div class="container mt-5 text-center">
            <!-- Card -->
            <div class="row mb-3">
                <div class="col-md-12 mb-4">
                    <div class="card border border-white shadow-lg h-100 py-0" data-aos="fade-down" data-aos-duration="1000">
                        <div class="card-body">
                            <h2 class="card-title mb-0 font-weight-bold text-primary mb-3">Jumlah Laporan Terkini</h2>
                            <div class="row no-gutters align-items-center">
                                <div class="col ml-3">
                                    <div class="h2 mt-1">
                                        <?php
                                            include 'app/function.php';
                                            $query = $conn->query("SELECT * from laporan");
                                            $count = mysqli_num_rows($query);

                                            echo "$count";
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tutup Card -->
        </div>

        <section id="wizard">
            <div class="wizard mt-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500" data-aos-anchor-placement="top-bottom">
                <div class="col-12">
                    <h1 class="title">Langkah Langkah Melapor</h1>
                    <ul class="progress mt-5">
                        <li class="complete">
                            <span class="step complete"><i class="fa-solid fa-right-to-bracket"></i></span>
                            <div class="step-txt">Login</div>
                        </li>
                        <li class="complete">
                            <span class="step complete"><i class="fa-solid fa-file-pen"></i></span>
                            <div class="step-txt">Buat Laporan</div>
                        </li>
                        <li class="complete">
                            <span class="step complete"><i class="fa-solid fa-share-from-square"></i></span>
                            <div class="step-txt">Verifikasi Laporan</div>
                        </li>
                        <li class="complete">
                            <span class="step complete"><i class="fa-regular fa-comment-dots"></i></span>
                            <div class="step-txt">Beri Tanggapan</div>
                        </li>
                        <li class="complete">
                            <span class="step complete"><i class="fa-solid fa-check"></i></span>
                            <div class="step-txt">Selesai</div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="informasi">
            <div class="container mt-5" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500" data-aos-anchor-placement="top-bottom">
                <div class="row">
                    <div class="col-lg-4 mb-3 text-center">
                        <img src="img/logo.png" alt="" height="250">
                    </div>
                    <div class="col-lg-4" style="margin-top: 60px;">
                        <ul>
                            <li class="list-group">
                                <h6><a href="https://goo.gl/maps/k3FE5Yaqe3YAXGiu9" target="_blank" class="text-decoration-none"> <i class="bi bi-geo-alt-fill"></i> Jl. Prof. Dr. Ir. Sutami, Nomor 100 Makassar</a>
                                </h6>
                            </li>
                            <li class="list-group">
                                <h6> <a href="https://www.instagram.com/kec_biringkanaya/" target="_blank" class="text-decoration-none"> <i class="bi bi-instagram"></i> @kec_biringkanaya</a></h6>
                            </li>
                            <li class="list-group">
                                <h6> <a href="https://www.youtube.com/channel/UCUfJOhCr5k9ealNV85fUmuQ" target="_blank" class="text-decoration-none"> <i class="bi bi-youtube"></i> KECAMATAN BIRINGKANAYA</a></h6>
                            </li>
                            <li class="list-group">
                                <h6> <a href="https://www.facebook.com/biringkanaya.kecamatan" target="_blank" class="text-decoration-none"> <i class="bi bi-facebook"></i> KECAMATAN BIRINGKANAYA</a></h6>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 text-center mb-3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.1392830963473!2d119.49673632420733!3d-5.081162584516453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefc6c89c8baaf%3A0x72b72b20991519bb!2sKantor%20Kecamatan%20Biringkanaya!5e0!3m2!1sid!2sid!4v1665017212858!5m2!1sid!2sid" width="300" height="300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="page-footer font-small blue text-bg-primary">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-2">©Copyright
                <a href="https://www.instagram.com/eluuxz" class="text-decoration-none text-white" target="blank"> Khairul </a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5f434f453c.js" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>