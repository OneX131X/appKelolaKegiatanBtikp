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

$query = "SELECT 
        peserta_daftar.*, 
        kegiatan.nama_kegiatan, 
        peserta.*  
        FROM 
        peserta_daftar, kegiatan, peserta 
        WHERE 
        kegiatan.id = peserta_daftar.id_kegiatan AND
        peserta.id = peserta_daftar.id_peserta
        ORDER BY status_ ASC";
$result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Peserta | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        td:nth-child(4) {
            width: 50%;
        }
        td:nth-child(5) {
            width: 10%;
        }
        td:nth-child(6) {
            width: 10%;
        }
        .col-btn {
            width: 80px;
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
                            <h1>Data Pendaftaran Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item active">Pendaftaran Peserta</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="pendaftaran-peserta-tambah.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-olive dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-print"></i> Cetak Peserta</button>
                                        <ul class="dropdown-menu">
                                        <li class="dropdown-item"><a style="color: green;" href="../cetak-pendaftaran-peserta.php?status_=diterima" target="_blank">Diterima <i class="fas fa-check"></i></a></li>
                                        <li class="dropdown-item"><a style="color: red;" href="../cetak-pendaftaran-peserta.php?status_=ditolak" target="_blank">Ditolak <i class="far fa-times-circle"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-olive dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-print"></i> Cetak [Per Kegiatan]</button>
                                        <ul class="dropdown-menu">
                                        <?php 
                                        $r_cetak = mysqli_query($conn, "SELECT kegiatan.nama_kegiatan FROM kegiatan ");
                                        while ($row_cetak = mysqli_fetch_assoc($r_cetak)) { ?>
                                            <li class="dropdown-item"><a style="color: green;" href="../cetak-pendaftaran-peserta-keg.php?nama_kegiatan=<?= $row_cetak["nama_kegiatan"] ?>" target="_blank"><?= $row_cetak["nama_kegiatan"] ?></a></li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Nama Peserta</th>
                                                <th>Kegiatan</th>
                                                <th>Jenjang</th>
                                                <th>Jabatan</th>
                                                <th>Golongan</th>
                                                <th>Agama</th>
                                                <th>Kab/Kota</th>
                                                <th>Unit Kerja</th>
                                                <!-- <th>Alamat Sekolah</th> -->
                                                <th>No. Hp</th>
                                                <th>Surat SK</th>
                                                <th>Status</th>
                                                <!-- <th>Keterangan</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td>
                                                        <a href="pendaftaran-peserta-edit.php?id=<?php echo $row["id"]; ?>" class="col-btn btn btn-success btn-xs mr-1"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a href="pendaftaran-peserta-detail.php?id=<?php echo $row["id"]; ?>" class="col-btn btn btn-xs bg-info mr-1" ><i class="fa fa-info"></i> Detail</a>
                                                        <a href="../cetak-pendaftaran-peserta-satu.php?id=<?php echo $row["id"]; ?>" target="_blank" class="col-btn btn btn-warning btn-xs mr-1"><i class="fa fa-edit"></i> Cetak</a>
                                                        <a href="pendaftaran-peserta-hapus.php?id=<?php echo $row["id"]; ?>" class="col-btn btn btn-danger btn-xs text-light" onClick="javascript: return confirm('Apakah yakin ingin menghapus data ini...?');"><i class="fa fa-trash"></i> Hapus</a>
                                                    </td>
                                                    <td><?php echo $row["nama_peserta"]; ?></td>
                                                    <td><?php echo $row["nama_kegiatan"]; ?></td>
                                                    <td><?php echo $row["jenjang"]; ?></td>
                                                    <td><?php echo $row["jabatan"]; ?></td>
                                                    <td style="text-align: center;"><?php echo $row["golongan"]; ?></td>
                                                    <td><?php echo $row["agama"]; ?></td>
                                                    <td><?php echo $row["kabKota"]; ?></td>
                                                    <td><?php echo $row["asalSekolah"]; ?></td>
                                                    <!-- <td><?php echo $row["alamatSekolah"]; ?></td> -->
                                                    <td><?php echo $row["noTelp"]; ?></td>
                                                    <td>
                                                        <a href="../file-upload/<?php echo $row["suratSK"]; ?>" target="_blank">
                                                            <?php echo $row["suratSK"]; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php 
                                                        if ($row["status_"] == "diterima") {
                                                            echo "<span style='color: green'>Diterima</span>"; 
                                                        } elseif ($row["status_"] == "ditolak") {
                                                            echo "<span style='color: red'>Ditolak</span>";
                                                        } else {
                                                            echo "Belum Ditentukan";
                                                        }
                                                    ?></td>
                                                <!-- <td><?php echo $row["keterangan"]; ?></td> -->
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Nama Peserta</th>
                                                <th>Kegiatan</th>
                                                <th>Jenjang</th>
                                                <th>Jabatan</th>
                                                <th>Golongan</th>
                                                <th>Agama</th>
                                                <th>Kab/Kota</th>
                                                <th>Unit Kerja</th>
                                                <!-- <th>Alamat Sekolah</th> -->
                                                <th>No. Hp</th>
                                                <th>Surat SK</th>
                                                <th>Status</th>
                                                <!-- <th>Keterangan</th> -->
                                            </tr>
                                        </tfoot>
                                    </table>
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
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print"],
                "order": [
                    [0, "asc"]
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>