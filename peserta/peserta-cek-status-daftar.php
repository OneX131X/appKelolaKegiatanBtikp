<?php
// session_start();
// if ($_SESSION["peran"] != "USER") {
//     header("Location: logout.php");
//     exit;
// } 
// if (!isset($_SESSION["login"])) {
//     header("Location: ../index.php");
//     exit;
// }

include '../koneksi.php';

// $query = "SELECT peserta.*, peserta_aktifitas.* FROM peserta, peserta_aktifitas WHERE peserta.id = peserta_aktifitas.id_peserta";
// $result = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($result);

if (isset($_POST["cekNama"])) {
    
    $nama_peserta = $_POST["nama_peserta"];

    $result = mysqli_query($conn, "SELECT 
                                    peserta.*, 
                                    peserta_daftar.* 
                                    FROM 
                                    peserta, peserta_daftar  
                                    WHERE 
                                    peserta.id = peserta_daftar.id_peserta AND
                                    peserta.nama_peserta = '$nama_peserta'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        header("Location: peserta-status-daftar.php?nama_peserta=$nama_peserta"); 
    } /* else {
        echo "<script type='text/javascript'>
                alert('Peserta belum mendaftar');
                document.location.href = 'peserta-cek-status-daftar.php';
            </script>";
    } */

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cek Status Pendaftaran Peserta | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Cek Status Pendaftaran Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item active">Cek Nama</li>
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
                                    <h3 class="card-title">Cek Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <p class="p-1">Masukkan Nama Anda</p>
                                        <?php if (isset($error)) { ?>
                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                                Anda Belum Mendaftar...!
                                            </div>
                                        <?php } ?>
                                    
                                        <form action="" method="post">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="nama_peserta" placeholder="Nama Lengkap Peserta Beserta Gelar" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- /.col -->
                                                <div class="col">
                                                    <button type="submit" class="btn btn-block btn-primary" name="cekNama"><i class="fa fa-search"></i> Cek</button>
                                                    <!-- <a href="peserta-daftar-kegiatan.php?id=<?php echo $row["id"]; ?>" name="cekNama" class="btn btn-block btn-primary"><i class="fa fa-search"></i> cek nama</a> -->
                                                    <!-- <a href="register.php" class="btn btn-block btn-danger">Buat Akun</a> -->
                                                </div>
                                            </div>
                                        </form>

                                        <!-- /.social-auth-links -->

                                        <p class="mt-3">
                                            <!-- <a href="lupa-password.php">Lupa Password?</a> -->
                                        </p>
                                    </div>
                                    <!-- /.card-body -->
                                    <!-- <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Kirim</button>
                                        <a href="peserta.php" class="btn btn-secondary">Batal</a>
                                    </div> -->
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