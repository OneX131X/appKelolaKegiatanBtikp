<?php
session_start();
if ($_SESSION["peran"] == "ADMIN") {
    header("Location: logout.php");
    exit;
} elseif ($_SESSION["peran"] == "USER") {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';

// query piechart
$query = "SELECT * FROM kegiatan ORDER BY nama_kegiatan ASC";
$result = mysqli_query($conn, $query);

$jmlhPeserta = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY nama_kegiatan ASC");
$dataKegiatan = mysqli_query($conn, "SELECT nama_kegiatan FROM kegiatan ORDER BY nama_kegiatan ASC");

// hitung kolom peserta
$getPeserta = mysqli_query($conn, "SELECT * FROM peserta");
$countP = mysqli_num_rows($getPeserta);

// hitung kolom kegiatan
$getKegiatan = mysqli_query($conn, "SELECT * FROM kegiatan");
$countKgt = mysqli_num_rows($getKegiatan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Pemateri | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        table {
            width: 100%;
        }
        /* .tb-data {
            line-height: 40px;
        } */
        .tb-data td, th {
            margin: 0px 10px 0px 10px;
        }
        .tb-data td:nth-child(1) {
            width: 8%;
        }
        .tb-data td:nth-child(1), td:nth-child(3), td:nth-child(4), th:nth-child(1), th:nth-child(3), th:nth-child(4) {
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
                        <div class="col-sm-8">
                            <h1>Aplikasi Pengelolaan Kegiatan Bimtek Pada BTIKP KalSel </h1>
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row mw-100">
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h3>Kegiatan</h3>
                                    <?=$countKgt;?>
                                    
                                    <p></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-stream"></i>
                                </div>
                                <a href="kegiatan.php" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>Peserta</h3>
                                    <?=$countP;?>
                                    
                                    <p></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="data-peserta.php" class="small-box-footer">
                                    <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <!-- PIE CHART TABLE -->
                        <div class="col-lg-7 col-6">
                            <div class="card card-maroon" style="height: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title"><a href="kegiatan.php" class="btn btn-sm" style="width: 100%; height: 100%; position: absolute;"></a>Kegiatan</h3>
                                </div>
                                <div class="card-body">
                                <table id="example1" class="tb-data table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Quota Tersedia</th>
                                                <th>Jumlah Peserta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><a href="peserta.php?id=<?php echo $row["id"]; ?>"><?php echo $row["nama_kegiatan"]; ?></td>
                                                    <td>
                                                    <?php 
                                                            // query jumlah peserta kegiatan
                                                            $q = mysqli_query($conn, "SELECT 
                                                                                        kegiatan.id, 
                                                                                        peserta.id_kegiatan 
                                                                                        FROM 
                                                                                        kegiatan, peserta 
                                                                                        WHERE 
                                                                                        kegiatan.id = peserta.id_kegiatan AND 
                                                                                        peserta.id_kegiatan = '$row[id]'");
                                                            $j = mysqli_num_rows($q);
                                                            $qq = mysqli_query($conn, "SELECT quota FROM kegiatan WHERE id = $row[id]");
                                                            $jq = mysqli_fetch_assoc($qq);
                                                            echo $jq["quota"] - $j;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            // Jumlah Peserta; 
                                                            $q = mysqli_query($conn, "SELECT 
                                                                                        kegiatan.id, 
                                                                                        peserta.id_kegiatan 
                                                                                        FROM 
                                                                                        kegiatan, peserta 
                                                                                        WHERE 
                                                                                        kegiatan.id = peserta.id_kegiatan AND 
                                                                                        peserta.id_kegiatan = '$row[id]'");
                                                            $j = mysqli_num_rows($q);
                                                            echo $j; 
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Quota Tersedia</th>
                                                <th>Jumlah Peserta</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            <!-- /.card-body -->
                            </div>
                        </div>
                        
                        <!-- PIE CHART -->
                        <div class="col-lg-5 col-6">
                            <div class="card card-maroon" style="height: 100%;">
                                <div class="card-header">
                                    <h3 class="card-title">Pie Chart</h3>
                                </div>
                                <div class="card-body" style="margin-inline: 7%;">
                                    
                                    <canvas id="piechart" style="height: 380px; max-width: 100%;"></canvas>
                                </div>
                            <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>

                    
                    <!-- <?php include "../slideshow.php"; ?> -->
                    
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
    <script src="../plugins/chart.js/Chart.min.js"></script>
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

<script type="text/javascript">
    var ctx = document.getElementById("piechart").getContext("2d");
    var data = {
        labels: [<?php while ($p = mysqli_fetch_array($dataKegiatan)) {echo '"'.$p['nama_kegiatan'].'",';} ?>],
        datasets: [
        {
            label: "Perbandingan Kegiatan",
            data: [<?php while ($p = mysqli_fetch_array($jmlhPeserta)) { 
                    $q = mysqli_query($conn, "SELECT 
                                        kegiatan.id, 
                                        peserta.id_kegiatan 
                                        FROM 
                                        kegiatan, peserta 
                                        WHERE 
                                        kegiatan.id = peserta.id_kegiatan AND 
                                        peserta.id_kegiatan = '$p[id]'");
                    $j = mysqli_num_rows($q);
                    echo '"'.$j.'",'; 
                    } ?>],
            backgroundColor: [
                '#ff0066',
                '#ff6600',
                '#ffcc00',
                '#aaff00',
                '#1aff1a',
                '#1affb2',
                '#1ac6ff',
                '#1a66ff'
            ]
        }
        ]
    };

    var piechart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {responsive: true}
    });
</script>