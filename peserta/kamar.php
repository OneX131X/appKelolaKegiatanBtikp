<?php
session_start();
// if ($_SESSION["peran"] == "ADMIN") {
//     header("Location: logout.php");
//     exit;
// } elseif ($_SESSION["peran"] == "PEMATERI") {
//     header("Location: logout.php");
//     exit;
// }
// if (!isset($_SESSION["login"])) {
//     header("Location: ../index.php");
//     exit;
// }

include '../koneksi.php';

$query = "SELECT * FROM kamar ORDER BY no_kamar ASC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kamar | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        td:nth-child(1) {
            width: 2%;
            text-align: center;
        }
        /* .back { */
            /* position: absolute;  */
            /* padding: 15px 0px 0px 20px; */
        /* } */
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
                            <h1>Data Kamar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Kamar</li>
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
                                <!-- <div class="card-header"> -->
                                    <!-- <a href="kamar-tambah.php" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a> -->
                                <!-- </div> -->
                                <!-- /.card-header -->
                                <div class="back">
                                    <a href="index.php" class="btn bg-maroon"><i class="fa fa-chevron-left"></i></a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Kamar</th>
                                                <th>Jenis Kamar</th>
                                                <th>Letak Lantai</th>
                                                <th>Kuantitas</th>
                                                <th>Tersedia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row["no_kamar"]; ?></td>
                                                    <td>
                                                        <?php 
                                                        if ($row["jenisKamar"] == "L") {
                                                            echo "Kamar Laki-Laki"; 
                                                        } else {
                                                            echo "Kamar Perempuan";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>Lantai <?php echo $row["letakLantai"]; ?></td>
                                                    <td><?php echo $row["kuantitas"]; ?> orang</td>
                                                    <td><?php 
                                                        $q = mysqli_query($conn, "SELECT
                                                                                    kamar.kuantitas, 
                                                                                    reservasi.kamar_id 
                                                                                    FROM kamar, reservasi 
                                                                                    WHERE kamar.id = reservasi.kamar_id AND
                                                                                    reservasi.kamar_id = '$row[id]'");
                                                        $j = mysqli_num_rows($q);
                                                        $qk = mysqli_query($conn, "SELECT kuantitas FROM kamar WHERE id = $row[id]");
                                                        $jk = mysqli_fetch_assoc($qk);
                                                        echo $jk["kuantitas"] - $j . " orang";
                                                    ?></td>
                                                    <!-- <td><span class="badge bg-warning">Status</span></td> -->
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>No Kamar</th>
                                                <th>Jenis Kamar</th>
                                                <th>Letak Lantai</th>
                                                <th>Kuantitas</th>
                                                <th>Tersedia</th>
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