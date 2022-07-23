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

$nama_peserta = $_GET["nama_peserta"];
$query_peserta = "SELECT 
                    peserta_aktifitas.*, 
                    peserta.nama_peserta, 
                    kegiatan.nama_kegiatan 
                    FROM 
                    peserta_aktifitas, peserta, kegiatan 
                    WHERE 
                    peserta.id = peserta_aktifitas.id_peserta AND
                    kegiatan.id = peserta_aktifitas.id_kegiatan AND
                    peserta.nama_peserta = '$nama_peserta'";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Aktifitas Peserta | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        .sertifikat{
            display: flex;
            float: right;
            margin-top: 20px;
        }
        .btn-sertifikat{
            background-color: #ffcc00;
            border: none;
            color: black;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            float: right;
        }
        .btn-sertifikat:hover{
            background-color: #e6b800;
            color: black;
        }
        .detail {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
            width: 100%;
            height: 200px;
            line-height: 30px;
            /* margin-top: 40px; */
        }
        .detail td, th{
            padding: 10px 15px 10px 15px;
        }
        .detail th:nth-child(1){
            width: 100%;
            height: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .detail td:nth-child(3){
            width: 100%;
            height: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
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
                            <h1>Detail Aktifitas Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item"><a href="peserta-cek-aktifitas.php">Cek Aktifitas Peserta</a></li>
                                <li class="breadcrumb-item active">Detail Aktifitas Peserta</li>
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
                                                <td for="nama_kegiatan">Kegiatan</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["nama_kegiatan"]; ?></td>
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
            <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card ">
                                        <div class="card-header bg-lime">
                                            <h3 class="card-title">Detail Kegiatan</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="card-header bg-orange">
                                                <h3 class="card-title"><?php echo $row_peserta["nama_kegiatan"]; ?></h3>
                                            </div>
                                            <table id="example1" class="table table-bordered table-striped detail">
                                                <thead>
                                                    <tr>
                                                        <th>Hari</th>
                                                        <th>Aktifitas</th>
                                                        <th style="text-align: center;">Absensi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    $result = mysqli_query($conn, "SELECT 
                                                                detail_kegiatan.*, 
                                                                peserta_aktifitas.*, 
                                                                peserta.nama_peserta, 
                                                                kegiatan.nama_kegiatan 
                                                                FROM 
                                                                detail_kegiatan, peserta_aktifitas, peserta, kegiatan 
                                                                WHERE 
                                                                peserta.id = peserta_aktifitas.id_peserta AND 
                                                                kegiatan.id = peserta_aktifitas.id_kegiatan AND 
                                                                peserta_aktifitas.id_kegiatan = detail_kegiatan.id_kegiatan AND 
                                                                peserta.nama_peserta = '$nama_peserta'");
                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <th>Hari I</th>
                                                            <td>
                                                                <?php 
                                                                $arr = explode(",", $row["hari_satu"]); 
                                                                $tes = count($arr);
                                                            
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }   
                                                                ?>
                                                            </td>
                                                            <td><?php if ($row["absen1"] == "hadir") {
                                                                echo "Hadir";
                                                            } else { 
                                                                echo "Tidak Hadir";
                                                            }?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Hari II</th>
                                                            <td>
                                                                <?php 
                                                                $arr = explode(",", $row["hari_dua"]); 
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }   
                                                                ?>
                                                            </td>
                                                            <td><?php if ($row["absen2"] == "hadir") {
                                                                echo "Hadir";
                                                            } else { 
                                                                echo "Tidak Hadir";
                                                            }?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Hari III</th>
                                                            <td>
                                                                <?php 
                                                                $arr = explode(",", $row["hari_tiga"]); 
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }   
                                                                ?>
                                                            </td>
                                                            <td><?php if ($row["absen3"] == "hadir") {
                                                                echo "Hadir";
                                                            } else { 
                                                                echo "Tidak Hadir";
                                                            }?></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="mr-3" colspan="2">Nilai</td>
                                                            <td align="center">
                                                                <?php 
                                                                $nilai = $row["penilaian"]; 
                                                                switch ($nilai) {
                                                                    case "sangat baik":
                                                                        echo "Sangat Baik";
                                                                        break;
                                                                    case "cukup baik":
                                                                        echo "Cukup Baik";
                                                                        break;
                                                                    default:
                                                                        echo "Baik";
                                                                        break;
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table>
                                            <div class="sertifikat">
                                                <a href="../cetak-sertifikat.php?nama_peserta=<?= $row_peserta['nama_peserta']; ?>" class="btn btn-sertifikat" target="_blank"><i class="fa fa-download mr-1"></i> Cetak Sertifikat</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
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