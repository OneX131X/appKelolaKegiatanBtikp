<?php
session_start();
if ($_SESSION["peran"] != "ADMIN") {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';

$query = "SELECT 
        peserta.*, 
        peserta_daftar.id_peserta, 
        peserta_daftar.status_, 
        kegiatan.nama_kegiatan 
        FROM 
        peserta_daftar, peserta, kegiatan 
        WHERE 
        peserta.id = peserta_daftar.id_peserta AND
        peserta_daftar.status_ = 'diterima' AND 
        kegiatan.id = peserta.id_kegiatan 
        ORDER BY nama_peserta ASC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peserta | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item active">Data Peserta</li>
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
                                    <!-- <a href="peserta-tambah.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a> -->
                                    <!-- <a href="../cetak-peserta.php" target="_blank" class="btn btn-info"><i class="fa fa-print"></i> Cetak Data</a> -->
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-olive dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-print"></i> Cetak Data</button>
                                        <ul class="dropdown-menu">
                                        <?php 
                                        $r_cetak = mysqli_query($conn, "SELECT kegiatan.nama_kegiatan FROM kegiatan ORDER BY nama_kegiatan");
                                        while ($row_cetak = mysqli_fetch_assoc($r_cetak)) { ?>
                                            <li class="dropdown-item"><a style="color: green;" href="../cetak-peserta.php?nama_kegiatan=<?= $row_cetak["nama_kegiatan"] ?>" target="_blank"><?= $row_cetak["nama_kegiatan"] ?></a></li>
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
                                                <th>NIK</th>
                                                <th>Kegiatan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Asal Sekolah</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>No Telp</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td>
                                                        <a href="peserta-detail.php?id=<?php echo $row["id"]; ?>" class="btn btn-info btn-xs mr-1"><i class="fa fa-info"></i> Detail</a>
                                                        <a href="peserta-edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-xs mr-1"><i class="fa fa-edit"></i> Ubah</a>
                                                        <a href="../cetak-peserta-satu.php?id=<?php echo $row["id"]; ?>" target="_blank" class="btn btn-warning btn-xs mr-1"><i class="fa fa-edit"></i> Cetak</a>
                                                        <a href="peserta-hapus.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs text-light" onClick="javascript: return confirm('Apakah yakin ingin menghapus data ini...?');"><i class="fa fa-trash"></i> Hapus</a>
                                                    </td>
                                                    <td><?= $row["nama_peserta"]; ?></td>
                                                    <td><?= $row["nik"]; ?></td>
                                                    <td><?= $row["nama_kegiatan"]; ?></td>
                                                    <td>
                                                        <?php 
                                                            if ($row["jenisKelamin"] == "L") {
                                                                echo "Laki-Laki"; 
                                                            } else {
                                                                echo "Perempuan";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?= date('d-m-Y', strtotime($row["tglLahir"])) ?></td>
                                                    <td><?= $row["asalSekolah"]; ?></td>
                                                    <td><?= $row["pendTerakhir"]; ?></td>
                                                    <td><?= $row["noTelp"]; ?></td>
                                                    <td><?= $row["email"]; ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Nama Peserta</th>
                                                <th>NIK</th>
                                                <th>Kegiatan</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Asal Sekolah</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>No Telp</th>
                                                <th>Email</th>
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
                // "buttons": ["copy", "csv", "excel", "pdf", "print"],
                "order": [
                    [0, "asc"]
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>