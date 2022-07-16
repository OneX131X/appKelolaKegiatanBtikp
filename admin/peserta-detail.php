<?php
session_start();
if (!$_SESSION["peran"] == "ADMIN") {
    header("Location: logout.php");
    exit;
} 
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';

$id = $_GET["id"];
$query_peserta = "SELECT 
                peserta.*, 
                kegiatan.nama_kegiatan  
                FROM 
                peserta, kegiatan 
                WHERE 
                kegiatan.id = peserta.id_kegiatan AND
                peserta.id = $id";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Peserta | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        table {
            border: 0px;
        }
        tr, td {
            padding-top: 5px;
            padding-left: 5px;
            height: 40px;
            font-size: 17px;
        }
        td:nth-child(1) {
            width: 0%;
        }
        td:nth-child(2) {
            font-weight: bold;
        }
    </style>
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
                            <h1>Detail Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item"><a href="peserta.php">List Peserta</a></li>
                                <li class="breadcrumb-item active">Detail Data</li>
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
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Data Peserta</h3>
                                </div>
                                <!-- /.card-header -->
                                    <div class="card-body table-responsive pad">
                                        <table>
                                            <tr>
                                                <td for="nama_peserta" style="width: 23%;">Nama Peserta</td>
                                                <td style="width: 2%;">:</td>
                                                <td><?= $row_peserta["nama_peserta"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="nik">NIK</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["nik"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="nama_kegiatan">Kegiatan</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["nama_kegiatan"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="jenisKelamin">Jenis Kelamin</td>
                                                <td>:</td>
                                                <td><?php 
                                                if ($row_peserta["jenisKelamin"] == 'L') {
                                                    echo "Laki-laki"; 
                                                } else {
                                                    echo "Perempuan";
                                                }
                                                ?></td>
                                            </tr>
                                            <tr>
                                                <td for="tglLahir">Tanggal Lahir</td>
                                                <td>:</td>
                                                <td><?= date('d-m-Y', strtotime($row_peserta["tglLahir"])); ?></td>
                                            </tr>
                                            <tr>
                                                <td for="asalSekolah">Asal Sekolah</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["asalSekolah"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="pendTerakhir">Pendidikan Terakhir</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["pendTerakhir"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="noTelp">No. Telp</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["noTelp"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="email">Email</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["email"]; ?></td>
                                            </tr>
                                        </table>
                                        <!-- /.card-body -->
                                    </div>
                                <!-- /.card-body -->
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