<?php
session_start();
if ($_SESSION["peran"] == "USER") {
    header("Location: logout.php");
    exit;
} elseif ($_SESSION["peran"] == "PEMATERI") {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';
if (isset($_POST["submit"])) {

    $no_kamar = htmlspecialchars($_POST["no_kamar"]);
    $kuantitas = htmlspecialchars($_POST["kuantitas"]);
    $jenisKamar = htmlspecialchars($_POST["jenisKamar"]);
    $letakLantai = htmlspecialchars($_POST["letakLantai"]);
    
    $query = "INSERT INTO kamar VALUES ('', '$no_kamar', '$kuantitas', '$jenisKamar', '$letakLantai')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Data Kamar berhasil disimpan...!');
                document.location.href = 'kamar.php';
            </script>";
        } else {
        echo "<script type='text/javascript'>
                alert('Data Kamar GAGAL disimpan...!');
                document.location.href = 'kamar-tambah.php';
                </script>";        
        }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kamar | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Data Kamar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="kamar.php">Kamar</a></li>
                                <li class="breadcrumb-item active">Tambah kamar</li>
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
                                            <label for="no_kamar">Nomor Kamar :</label>
                                            <input type="text" class="form-control" id="no_kamar" name="no_kamar" maxlength="2" placeholder="Nomor Kamar" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kuantitas">Kuantitas Kamar :</label>
                                            <input type="text" class="form-control" id="kuantitas" name="kuantitas" maxlength="1" placeholder="Kuantitas Kamar" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenisKamar">Jenis Kamar :</label>
                                            <select class="form-control" id="jenisKamar" name="jenisKamar" required>
                                                <option value="">-- Pilih Jenis Kamar --</option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="letakLantai">Letak Lantai Kamar :</label>
                                            <select class="form-control" id="letakLantai" name="letakLantai" required>
                                                <option value="">-- Pilih Letak Kamar --</option>
                                                <option value="1">Lantai 1</option>
                                                <option value="2">Lantai 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="kamar.php" class="btn btn-secondary">Cancel</a>
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