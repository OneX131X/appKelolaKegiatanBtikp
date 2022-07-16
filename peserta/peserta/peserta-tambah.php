<?php
session_start();
if ($_SESSION["peran"] == "ADMIN") {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';

if (isset($_POST["submit"])) {

    $nama_peserta = htmlspecialchars($_POST["nama_peserta"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $jenisKelamin = htmlspecialchars($_POST["jenisKelamin"]);
    $tglLahir = htmlspecialchars($_POST["tglLahir"]);
    $asalSekolah = htmlspecialchars($_POST["asalSekolah"]);
    $noTelp = htmlspecialchars($_POST["noTelp"]);
    $email = htmlspecialchars($_POST["email"]);

    $query = "INSERT INTO peserta VALUES ('', '$nama_peserta', '$nik', '$jenisKelamin', '$tglLahir', '$asalSekolah', '$noTelp', '$email')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = 'peserta.php';
            </script>";
        } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'peserta-tambah.php';
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peserta | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include "theme-header.php"; ?>

        <?php include "theme-sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="peserta.php">Peserta</a></li>
                                <li class="breadcrumb-item active">Tambah Peserta</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_peserta">Nama peserta :</label>
                                            <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" placeholder="Nama peserta" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">NIK peserta :</label>
                                            <input type="text" class="form-control" id="nik" name="nik" maxlength="16" placeholder="NIK Peserta" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenisKelamin">Jenis Kelamin :</label>
                                            <select class="form-control" id="jenisKelamin" name="jenisKelamin" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tglLahir">Tanggal Lahir :</label>
                                            <input type="date" class="form-control" id="tglLahir" name="tglLahir" placeholder="Tanggal Lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="asalSekolah">Asal Sekolah :</label>
                                            <input type="text" class="form-control" id="asalSekolah" name="asalSekolah" placeholder="Asal Sekolah" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp">Nomor Telepon :</label>
                                            <input type="text" class="form-control" id="noTelp" name="noTelp" maxlength="13" placeholder="Nomor Telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="peserta.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "theme-footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>