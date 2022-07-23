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
                    peserta.*, 
                    peserta_daftar.*,
                    kegiatan.nama_kegiatan 
                    FROM 
                    peserta_daftar, peserta, kegiatan 
                    WHERE 
                    peserta.id = peserta_daftar.id_peserta AND
                    kegiatan.id = peserta.id_kegiatan AND
                    peserta.id_kegiatan = peserta_daftar.id_kegiatan AND
                    peserta.nama_peserta = '$nama_peserta'";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pendaftaran Peserta | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        table {
            border: 0px; 
            width: 100%; 
            /* padding: 8px;  */
            align-items: center;
        }
        td, th {
            border: 0px solid #000000;
            text-align: left;
            padding: 6px;
        }
        td:nth-child(1) {
            padding-right: 0px;
        }
        td:nth-child(2) {
            font-weight: bold;
            width: 1%;
        }
        td:nth-child(3) {
            width: 89%;
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
                            <h1>Detail Pendaftaran Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item"><a href="peserta-cek-status-daftar.php">Cek Nama</a></li>
                                <li class="breadcrumb-item active">Detail Pendaftaran Peserta</li>
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
                                    <h3 class="card-title">Detail Pendaftaran Peserta</h3>
                                </div>
                                <!-- /.card-header -->
                                    <div class="card-body table-responsive pad">
                                        <table>
                                        <tr>
                                                <td for="nama_peserta">Nama Peserta</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["nama_peserta"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="nama_kegiatan">Nama Kegiatan</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["nama_kegiatan"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="jenjang">Jenjang</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["jenjang"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="jabatan">Jabatan</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["jabatan"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="golongan">Golongan</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["golongan"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="agama">Agama</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["agama"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="kabKkota">Kab / Kota</td>
                                                <td>:</td>
                                                <td>
                                                    <?php 
                                                        $kabKota = $row_peserta['kabKota']; 
                                                        switch ($kabKota) {
                                                            case 'bjm':
                                                                echo "Banjarmasin";
                                                                break;
                                                            case 'bjb':
                                                                echo "Banjarbaru";
                                                                break;
                                                            case 'banjar':
                                                                echo "Banjar";
                                                                break;
                                                            case 'tapin':
                                                                echo "Tapin";
                                                                break;
                                                            case 'hss':
                                                                echo "Hulu Sungai Selatan";
                                                                break;
                                                            case 'hst':
                                                                echo "Hulu Sungai Tengah";
                                                                break;
                                                            case 'hsu':
                                                                echo "Hulu Sungai Utara";
                                                                break;
                                                            case 'balangan':
                                                                echo "Balangan";
                                                                break;
                                                            case 'tabalong':
                                                                echo "Tabalong";
                                                                break;
                                                            case 'barito kuala':
                                                                echo "Barito Kuala";
                                                                break;
                                                            case 'tanah laut':
                                                                echo "Tanah Laut";
                                                                break;
                                                            case 'tanah bumbu':
                                                                echo "Tanah Bumbu";
                                                                break;
                                                            default:
                                                                echo "Kotabaru";
                                                                break;
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td for="asalSekolah">Pilih Unit Kerja</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["asalSekolah"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="alamatSekolah">Alamat Sekolah</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["alamatSekolah"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="noTelp">No HP</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["noTelp"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="suratSK">Surat SK</td>
                                                <td>:</td>
                                                <td>
                                                <?php if ($row_peserta["suratSK"] == "") {?>
                                                    <span>*belum mengupload surat SK</span>
                                                <?php } else { ?>
                                                    <!-- <a href="../file-upload/<?= $row_peserta["suratSK"]; ?>">
                                                        <img src="../file-upload/<?= $row_peserta["suratSK"]; ?>" alt="Surat SK" style="height: 500px;">
                                                    </a> -->
                                                    <a href="../file-upload/<?= $row_peserta["suratSK"]; ?>" target="_blank">
                                                        <span class="btn btn-info"><?= $row_peserta["suratSK"]; ?></span>
                                                    </a>
                                                <?php } ?>
                                                </td>
                                                <!-- <input type="text" value="<?= $row_peserta["suratSK"]; ?>" name="suratSK2" style="display: none;"> -->
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td>:</td>
                                                <?php 
                                                if ($row_peserta["status_"] == "diterima") { ?>
                                                    <td><span class="btn btn-success disabled">Diterima</span></td>
                                                <?php } elseif ($row_peserta["status_"] == "ditolak"){ ?>
                                                    <td><span class="btn btn-danger disabled">Ditolak</span></td>
                                                <?php } else {?>
                                                    <td><span class="btn btn-secondary disabled">Belum Ditentukan</span></td>
                                                <?php }?>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["keterangan"] ?></td>
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