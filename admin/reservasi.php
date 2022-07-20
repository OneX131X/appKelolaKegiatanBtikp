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

// $query_reservasi = "SELECT 
// reservasi.id, 
// reservasi.peserta_id, 
// peserta.nama_peserta, 
// kamar.no_kamar, 
// kegiatan.nama_kegiatan, 
// reservasi.checkin, 
// reservasi.checkout  
// FROM 
// reservasi, peserta, kamar, kegiatan 
// WHERE 
// peserta.id = reservasi.peserta_id AND 
// kamar.id = reservasi.kamar_id AND 
// kegiatan.id = reservasi.kegiatan_id
// ORDER BY nama_kegiatan ASC";
$query_reservasi = "SELECT 
                    reservasi.*, 
                    peserta.nama_peserta, 
                    kamar.no_kamar, 
                    kamar.jenisKamar, 
                    kegiatan.nama_kegiatan, 
                    kegiatan.tglMulai, 
                    kegiatan.tglSelesai 
                    FROM 
                    reservasi, peserta, kamar, kegiatan 
                    WHERE 
                    peserta.id = reservasi.peserta_id AND 
                    kamar.id = reservasi.kamar_id AND 
                    kegiatan.id = reservasi.kegiatan_id
                    ORDER BY no_kamar ASC";
$result_reservasi = mysqli_query($conn, $query_reservasi);

// $query = "SELECT * FROM reservasi";
// $result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi Kamar | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        th, td:nth-child(1), td:nth-child(2), td:nth-child(6), td:nth-child(7) {
            text-align: center;
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
                            <h1>Reservasi Kamar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Kamar</li>
                                <li class="breadcrumb-item active">Reservasi Kamar</li>
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
                                    <!-- <a href="../cetak-reservasi.php" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Cetak Data</a> -->
                                    <div class="btn-group">
                                        <a href="reservasi-tambah.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
                                        <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-print"></i> Cetak [Per Kegiatan]</button>
                                        <ul class="dropdown-menu">
                                        <?php 
                                        $r_cetak = mysqli_query($conn, "SELECT kegiatan.nama_kegiatan FROM kegiatan ORDER BY nama_kegiatan");
                                        while ($row_cetak = mysqli_fetch_assoc($r_cetak)) { ?>
                                            <li class="dropdown-item"><a style="color: green;" href="../cetak-reservasi.php?nama_kegiatan=<?= $row_cetak["nama_kegiatan"] ?>" target="_blank"><?= $row_cetak["nama_kegiatan"] ?></a></li>
                                        <?php } ?>
                                        </ul>
                                        <button type="button" class="btn bg-olive dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-print"></i> Cetak [Per Jenis Kamar]</button>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a style="color: blue;" href="../cetak-reservasi-jKamar.php?jenisKamar=L" target="_blank">Kamar Laki-Laki</a></li>
                                            <li class="dropdown-item"><a style="color: purple;" href="../cetak-reservasi-jKamar.php?jenisKamar=P" target="_blank">Kamar Perempuan</a></li>
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
                                                <th>No Kamar</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($row_reservasi = mysqli_fetch_assoc($result_reservasi)) {?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td>
                                                        <a href="reservasi-edit.php?id=<?= $row_reservasi["id"]; ?>" class="btn btn-success btn-xs mr-1"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a href="reservasi-hapus.php?id=<?= $row_reservasi["id"]; ?>" class="btn btn-danger btn-xs text-light" onClick="javascript: return confirm('Apakah yakin ingin menghapus data ini...?');"><i class="fa fa-trash"></i> Hapus</a>
                                                    </td>
                                                    <td><?= $row_reservasi["nama_peserta"]; ?></td>
                                                    <td style="text-align: center;"><?= $row_reservasi["no_kamar"]. " || " .$row_reservasi["jenisKamar"]; ?></td>
                                                    <td><?= $row_reservasi["nama_kegiatan"]; ?></td>
                                                    <td><?= date('d-m-Y', strtotime($row_reservasi["tglMulai"])) ?></td>
                                                    <td><?= date('d-m-Y', strtotime($row_reservasi["tglSelesai"])) ?></td>
                                                    <!-- <td><span class="badge bg-warning">Status</span></td> -->
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Nama Peserta</th>
                                                <th>No Kamar</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
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
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                // "buttons": ["copy", "csv", "excel", "pdf", "print"],
                "order": [
                    [0, "asc"]
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>