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

$id = $_GET["id"];
// $query_detail = "SELECT 
//         detail_kegiatan.id, 
//         detail_kegiatan.id_kegiatan, 
//         kegiatan.nama_kegiatan, 
//         detail_kegiatan.hari_satu, 
//         detail_kegiatan.hari_dua, 
//         detail_kegiatan.hari_tiga 
//         FROM 
//         detail_kegiatan, kegiatan 
//         WHERE 
//         kegiatan.id = detail_kegiatan.id_kegiatan AND
//         detail_kegiatan.id_kegiatan = $id";
$query_detail = "SELECT 
        detail_kegiatan.*,
        kegiatan.nama_kegiatan 
        FROM 
        detail_kegiatan, kegiatan 
        WHERE 
        kegiatan.id = detail_kegiatan.id_kegiatan AND
        detail_kegiatan.id = '$id'";
$result_detail = mysqli_query($conn, $query_detail);
$row_detail = mysqli_fetch_assoc($result_detail);

if (isset($_POST["submit"])) {

    // $id_kegiatan = htmlspecialchars($_POST["id_kegiatan"]);
    $hari_satu = htmlspecialchars($_POST["hari_satu"]);
    $hari_dua = htmlspecialchars($_POST["hari_dua"]);
    $hari_tiga = htmlspecialchars($_POST["hari_tiga"]);
    $jp1 = htmlspecialchars($_POST["jp1"]);
    $jp2 = htmlspecialchars($_POST["jp2"]);
    $jp3 = htmlspecialchars($_POST["jp3"]);
    $query = "UPDATE detail_kegiatan SET 
                hari_satu = '$hari_satu',
                hari_dua = '$hari_dua',
                hari_tiga = '$hari_tiga',
                jp1 = '$jp1',
                jp2 = '$jp2',
                jp3 = '$jp3'
                WHERE id = '$id'";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Detail Kegiatan berhasil diubah...!');
                document.location.href = 'kegiatan-detail.php?id=$row_detail[id_kegiatan]';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Detail Kegiatan GAGAL diubah...!');
                // document.location.href = 'kegiatan-detail-edit.php?id=$id';
                </script>";
    }
}

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
        td:nth-child(3) {
            width: 13%;
        }

        td:nth-child(4) {
            width: 30%;
        }

        td:nth-child(5) {
            width: 30%;
        }

        td:nth-child(6) {
            width: 30%;
        }

        .hari {
            height: 80px;
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
            <div class="container-fluid">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_kegiatan">Nama Kegiatan :</label>
                                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $row_detail["nama_kegiatan"]; ?>" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hari_satu">Hari I :</label>
                                            <input type="text" class="form-control hari" id="hari_satu" name="hari_satu" placeholder="Kegiatan-kegiatan di hari pertama" value="<?= $row_detail["hari_satu"]; ?>" required>
                                            <label for="jp1" class="col-sm-1 col-form-label">JP1 :</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="jp1" name="jp1" placeholder="JP untuk masing-masing kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan '1, ,2, 2, 4, ...')" value="<?= $row_detail["jp1"]; ?>" required></input>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="card-header">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hari_dua">Hari II :</label>
                                            <input type="text" class="form-control hari" id="hari_dua" name="hari_dua" placeholder="Kegiatan-kegiatan di hari kedua" value="<?= $row_detail["hari_dua"]; ?>" required>
                                            <label for="jp2" class="col-sm-1 col-form-label">JP2 :</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="jp2" name="jp2" placeholder="JP untuk masing-masing kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan '1, ,2, 2, 4, ...')" value="<?= $row_detail["jp2"]; ?>" required></input>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="card-header">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hari_tiga">Hari III :</label>
                                            <input type="text" class="form-control hari" id="hari_tiga" name="hari_tiga" placeholder="Kegiatan-kegiatan di hari ketiga" value="<?= $row_detail["hari_tiga"]; ?>" required>
                                            <label for="jp3" class="col-sm-1 col-form-label">JP3 :</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="jp3" name="jp3" placeholder="JP untuk masing-masing kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan '1, ,2, 2, 4, ...')" value="<?= $row_detail["jp3"]; ?>" required></input>
                                            </div>
                                        </div>
                                        <!-- <input type="hidden" name="id_kegiatan" value="<?php echo $id; ?>"> -->
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="kegiatan.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
                <!-- <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Detail Kegiatan</h3>
                                        </div>
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kegiatan</th>
                                                        <th>Hari I</th>
                                                        <th>Hari II</th>
                                                        <th>Hari III</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    while ($row = mysqli_fetch_assoc($result_detail)) { ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $row["nama_kegiatan"]; ?></td>
                                                            <td>
                                                                <?php
                                                                $arr = explode(",", $row["hari_satu"]);
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $arr = explode(",", $row["hari_dua"]);
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }
                                                                ?></td>
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
                                                <tr>
                                                        <th>No</th>
                                                        <th>Nama Kegiatan</th>
                                                        <th>Hari I</th>
                                                        <th>Hari II</th>
                                                        <th>Hari III</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
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