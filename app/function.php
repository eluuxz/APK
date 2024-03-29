<?php
    $conn = mysqli_connect("localhost","root","","konsentrasi");

    // Login User Start
    if(isset($_POST['submit'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);
    
        if (empty($uname)) {
            header("Location: login.php?error=Silahkan Isi Username");
            exit();
        }else if(empty($pass)){
            header("Location: login.php?error=Silahkan Isi Password");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $uname && $row['password'] === $pass) {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama'] = $row['nama'];
                    $_SESSION['id_user'] = $row['id_user'];
                    header("Location: dashboard/user/index.php");
                    exit();
                }else{
                    header("Location: login.php?error=Username Dan Passoword Salah");
                    exit();
                }
            }else{
                header("Location: login.php?error=Username Dan Password Salah");
                exit();
            }
        }
    }
    // End User Login

    // Logout Start
    if(isset($_GET['logout'])){
        session_start();

        session_unset();
        session_destroy();
        
        header("Location: ../index.php");
        exit();
    }
    // End Logout

    // Daftar User
    if(isset($_POST['daftar'])){
        $errors = array(); 

        $nik = $_POST ['nik'];
        $nama = $_POST ['nama'];
        $email = $_POST ['email'];
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $notelp = $_POST ['notelp'];

        $user_check_query = "SELECT * FROM users WHERE nik='$nik' OR username='$username' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['nik'] === $nik) {
                array_push($errors, "1");
                header("Location: daftar.php?error=NIK Telah Terdaftar");
            }
            if ($user['username'] === $username) {
                array_push($errors, "2");
                header("Location: daftar.php?error=Username Telah Terdaftar");
            }
            if ($user['username'] === $username && $user['nik'] === $nik) {
                array_push($errors, "3");
                header("Location: daftar.php?error=NIK dan Username Telah Terdaftar");
            }
        }

        if (count($errors) == 0) {
            $sql =("INSERT INTO users (nik, email, username, password, nama, notelp) VALUES ('$nik','$email','$username', '$password','$nama','$notelp')");
            if ($conn->query($sql) === TRUE) {
                header("Location: daftar.php?success=Akun Anda Telah Terdaftar Silahkan Login");
                exit();
            }
        }
    }
    // End Daftar User

    // Login petugas
    if(isset($_POST['loginpetugas'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);
    
        if (empty($uname)) {
            header("Location: loginpetugas.php?error=Silahkan Isi Username");
            exit();
        }else if(empty($pass)){
            header("Location: loginpetugas.php?error=Silahkan Isi Password");
            exit();
        }else{
            $sql = "SELECT * FROM petugas WHERE username='$uname' AND password='$pass'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $uname && $row['password'] === $pass && $row['level'] === "petugas") {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama_petugas'] = $row['nama_petugas'];
                    $_SESSION['id_petugas'] = $row['id_petugas'];
                    $_SESSION['level'] = $row['level'];
                    header("Location: dashboard/petugas/index.php");
                    exit();
                }else if ($row['username'] === $uname && $row['password'] === $pass && $row['level'] === "admin") {
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['nama_petugas'] = $row['nama_petugas'];
                    $_SESSION['id_petugas'] = $row['id_petugas'];
                    $_SESSION['level'] = $row['level'];
                    header("Location: dashboard/admin/index.php");
                    exit();
                }else{
                    header("Location: loginpetugas.php?error=Username Dan Passoword Salah");
                    exit();
                }
            }else{
                header("Location: loginpetugas.php?error=Username Dan Password Salah");
                exit();
            }
        }
    }
    // End Login Petugas

    // Tambah Laporan
    if(isset($_POST['lapor'])){
        
        $id_user = $_POST ['id_user'];
        $judul_laporan = $_POST ['judul_laporan'];
        $isi_laporan = $_POST ['isi_laporan'];
        $tanggal_kejadian = $_POST ['tanggal_kejadian'];
        date_default_timezone_set('Asia/Makassar');
        $tanggal_laporan = date_create('now')->format('Y-m-d H:i:s');
        $lokasi_laporan = $_POST ['lokasi_laporan'];
        $status = $_POST ['status'];
        $foto = $_FILES['foto']['name'];

        if($foto != "") {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
            $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['foto']['tmp_name'];   
            $angka_acak     = rand(1,999);
            $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                        move_uploaded_file($file_tmp, '../assets/img/user/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                        $sql =("INSERT INTO laporan (id_user, judul_laporan, isi_laporan, tanggal_laporan, tanggal_kejadian, lokasi_laporan, foto, status) VALUES ('$id_user', '$judul_laporan', '$isi_laporan','$tanggal_laporan','$tanggal_kejadian','$lokasi_laporan', '$nama_gambar_baru', '$status')");

                        if ($conn->query($sql) === TRUE) {
                            header("Location:laporan.php?success=Laporan Anda Telah Tersimpan Dan Sedang Diproses");
                            exit();
                        }
                } else {     
                    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                    header("Location:laporan.php?error");
                    exit();
                }
        } else {
            $sql =("INSERT INTO laporan (id_user, judul_laporan, isi_laporan, tanggal_laporan, tanggal_kejadian, lokasi_laporan, foto, status) VALUES ('$id_user', '$judul_laporan', '$isi_laporan','$tanggal_laporan','$tanggal_kejadian','$lokasi_laporan', null, '$status')");

            if ($conn->query($sql) === TRUE) {
                header("Location:laporan.php?success=Laporan Anda Telah Tersimpan Dan Sedang Diproses");
                exit();
            }
        }
    }
    // // End Tambah Laporan

    // Hapus Laporan

    if (isset($_GET['hapuslaporan'])){
        $id_laporan = $_GET['id_laporan'];
    
        //query hapus
        $querydelete = mysqli_query($conn, "DELETE FROM laporan WHERE id_laporan = '$id_laporan'");
    
        if ($querydelete) {
            header("location:../dashboard/user/lihatlaporan.php?success=Laporan Telah Dihapus");
        }
    }

    // End Hapus Laporan

    // Edit Laporan
    if(isset($_POST['editlaporan'])){
        
        $id_laporan = $_POST ['id_laporan'];  
        $id_user = $_POST ['id_user'];  
        $judul_laporan = $_POST ['judul_laporan'];
        $isi_laporan = $_POST ['isi_laporan'];
        $tanggal_kejadian = $_POST ['tanggal_kejadian'];
        $lokasi_laporan = $_POST ['lokasi_laporan'];
        $status = $_POST ['status'];
        $foto = $_FILES['foto']['name'];

        if($foto != "") {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
            $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['foto']['tmp_name'];   
            $angka_acak     = rand(1,999);
            $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                        // Query untuk menampilkan data user berdasarkan id_user yang dikirim
                        $query = "SELECT * FROM laporan where id_laporan = $id_laporan";
                        $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
                        $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
                        // Cek apakah file gambar sebelumnya ada di folder foto
                        if(is_file("../assets/img/user/".$data['foto'])){ // Jika gambar ada
                            unlink("../assets/img/user/".$data['foto']); // Hapus file gambar sebelumnya yang ada di folder images
                        }
                        move_uploaded_file($file_tmp, '../assets/img/user/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                        $sql = ("UPDATE laporan SET id_laporan='$id_laporan',id_user='$id_user',judul_laporan='$judul_laporan',isi_laporan='$isi_laporan',tanggal_kejadian='$tanggal_kejadian',lokasi_laporan='$lokasi_laporan',foto='$nama_gambar_baru', status='$status' where id_laporan='$id_laporan'");

                        if ($conn->query($sql) === TRUE) {
                            header("Location:lihatlaporan.php?success=Laporan Telah Di Edit");
                            exit();
                        }
                } else {     
                    //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                    header("Location:lihatlaporan.php?error");
                    exit();
                }
        } else {
            $sql = ("UPDATE laporan SET id_laporan='$id_laporan',id_user='$id_user',judul_laporan='$judul_laporan',isi_laporan='$isi_laporan',tanggal_kejadian='$tanggal_kejadian',lokasi_laporan='$lokasi_laporan', status='$status' where id_laporan='$id_laporan'");

            if ($conn->query($sql) === TRUE) {
                header("Location:lihatlaporan.php?success=Laporan Telah Di Edit");
                exit();
            }
        }
    }
    // End Edit Laporan

    // Verifikasi Laporan

    if (isset($_POST['verifikasilaporan'])){
        
        $id_laporan = $_POST['id_laporan'];
        // $level = $_POST['level'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];
        //query hapus
        $sql = ("UPDATE laporan SET status = '$status', keterangan = '$keterangan' WHERE id_laporan = '$id_laporan'");
    
        // if ($conn->query($sql) === TRUE && $level == 'petugas') {
        //     header("location:laporan.php?success=Laporan Telah Diverifikasi");
        //     exit();
        // } else if ($conn->query($sql) === TRUE && $level == 'admin') {
        //     header("location:laporan.php?success=Laporan Telah Diverifikasi");
        //     exit();
        // }
        if ($conn->query($sql) === TRUE  && $status === 'selesai') {
            header("location:laporan.php?success=Laporan Telah Diverifikasi");
            exit();
        } else if ($conn->query($sql) === TRUE  && $status === 'tolak') {
            header("location:laporan.php?error=Laporan Ditolak");
            exit();  
        }
    }
    // End Verifikasi Laporan

    // Tanggapi Laporan
    if (isset($_POST['tanggapilaporan'])){
        $id_laporan = $_POST['id_laporan'];
        $id_user = $_POST['id_user'];
        $id_petugas = $_POST['id_petugas'];
        $tanggapan = $_POST['tanggapan'];
        date_default_timezone_set('Asia/Makassar');
        $tanggal_tanggapan = date_create('now')->format('Y-m-d H:i:s');
        $status = "tanggap";
        $level = $_POST['level'];
        
        $sql = ("INSERT INTO tanggapan (id_laporan, id_user, id_petugas, tanggapan, tanggal_tanggapan) VALUES ('$id_laporan', '$id_user', '$id_petugas', '$tanggapan','$tanggal_tanggapan')");
        $sql1 = ("UPDATE laporan SET status = '$status' WHERE id_laporan = '$id_laporan'");

        if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
            header("location:verify.php?success=Laporan Telah Ditanggapi");
            exit();
        }
    }
    // End Tanggapi Laporan

    // Tambah Data Petugas

    if(isset($_POST['tambahdatapetugas'])){

        $nama_petugas = $_POST ['nama_petugas'];  
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $level = $_POST ['level'];
        
        $sql = ("INSERT INTO petugas (nama_petugas, username, password, level) VALUES ('$nama_petugas', '$username', '$password','$level')");

        if ($conn->query($sql) === TRUE) {
            header("Location:datapetugas.php?success=Data Petugas Telah Di Tambahkan");
            exit();
        }
    }

    // End Tambah Data Petugas

    // Hapus Data Petugas

    if (isset($_GET['hapuspetugas'])){
        $id_petugas = $_GET['id_petugas'];
    
        //query hapus
        $querydelete = mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = '$id_petugas'");
    
        if ($querydelete) {
            header("location:../dashboard/admin/datapetugas.php?success=Data Petugas Telah Dihapus");
        }
    }
    // End Hapus Data Petugas

    // Edit Data Petugas

    if(isset($_POST['editpetugas'])){
        
        $id_petugas = $_POST ['id_petugas'];  
        $nama_petugas = $_POST ['nama_petugas'];  
        $username = $_POST ['username'];
        $password = $_POST ['password'];
        $password_baru = $_POST ['password_baru'];

        if($password_baru != "") {
            $sql = ("UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',password='$password_baru' where id_petugas='$id_petugas'");

            if ($conn->query($sql) === TRUE) {
                header("Location:datapetugas.php?success=Data Petugas Telah Di Edit");
                exit();
            }
        } else {
            $sql = ("UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',password='$password' where id_petugas='$id_petugas'");

            if ($conn->query($sql) === TRUE) {
                header("Location:datapetugas.php?success=Data Petugas Telah Di Edit");
                exit();
            }
        }
    }

    // End Edit Data Petugas


    // Hapus Data Masyarakat

    if (isset($_GET['hapususer'])){
        $id_user = $_GET['id_user'];
    
        //query hapus
        $querydelete = mysqli_query($conn, "DELETE FROM users WHERE id_user = '$id_user'");
    
        if ($querydelete) {
            header("location:../dashboard/admin/datapetugas.php?success=Data Masyarakat Telah Dihapus");
        }
    }
    // End Hapus Data Masyarakat
?>