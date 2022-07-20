<?php
session_start();
if ($_SESSION["peran"] != "PEMATERI") {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';

$id = $_GET["id"];
$query_detail = "SELECT 
        detail_kegiatan.id, 
        detail_kegiatan.id_kegiatan, 
        kegiatan.nama_kegiatan, 
        detail_kegiatan.hari_satu, 
        detail_kegiatan.hari_dua, 
        detail_kegiatan.hari_tiga 
        FROM 
        detail_kegiatan, kegiatan 
        WHERE 
        kegiatan.id = detail_kegiatan.id_kegiatan AND
        detail_kegiatan.id_kegiatan = '$id'";
$result_detail = mysqli_query($conn, $query_detail);

$query_k = "SELECT * FROM kegiatan WHERE id = $id";
$result_k = mysqli_query($conn, $query_k);
$row_k = mysqli_fetch_assoc($result_k);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Kegiatan | APPGAJI</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        td:nth-child(1) {
            text-align: center;
            font-weight: bold;
            background: #17a2b8;
            /* border: 1px solid grey; */
        }
        td {
            line-height: 40px;
        }
        .hari {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            /* border-radius: 10px; */
        }
        .fs-title {
            font-size: 22px;
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
                            <h1>Detail Kegiatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Kegiatan</li>
                                <li class="breadcrumb-item"><a href="kegiatan.php">List Kegiatan</a></li>
                                <li class="breadcrumb-item active">Detail Kegiatan</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
                <!-- /.content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title fs-title"><a href="kegiatan.php" class="btn bg-primary mr-2"><i class="fa fa-chevron-left"></i></a> <?= $row_k["nama_kegiatan"]; ?></h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>No</th> -->
                                                        <!-- <th>Nama Kegiatan</th> -->
                                                        <!-- <th>Hari I</th> -->
                                                        <!-- <th>Hari II</th> -->
                                                        <!-- <th>Hari III</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    // $hari = mysqli_query($conn, "SELECT hari_satu, hari_dua, hari_tiga FROM detail_kegiatan");
                                                    // $rh = mysqli_fetch_assoc($hari);
                                                    while ($row = mysqli_fetch_assoc($result_detail)) { ?>
                                                        <tr>
                                                            <!-- <td><?php echo $no; ?></td> -->
                                                            <!-- <td><?php echo $row["nama_kegiatan"]; ?></td> -->
                                                            <td><span class="hari">Hari 1</span></td>
                                                            <td>
                                                                <?php 
                                                                $arr = explode(",", $row["hari_satu"]); 
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }   
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="hari">Hari 2</span></td>
                                                            <td>
                                                                <?php 
                                                                $arr = explode(",", $row["hari_dua"]); 
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }   
                                                                ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span class="hari">Hari 3</span></td>
                                                            <td>
                                                                <?php 
                                                                $arr = explode(",", $row["hari_tiga"]); 
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }   
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                                <tfoot>
                                                <!-- <tr>
                                                    <th>No</th>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Hari I</th>
                                                    <th>Hari II</th>
                                                    <th>Hari III</th>
                                                </tr> -->
                                                </tfoot>
                                            </table>
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
                <!-- /.content -->
            </div>
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