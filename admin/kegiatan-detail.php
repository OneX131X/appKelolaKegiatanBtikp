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
$query_detail = "SELECT 
        detail_kegiatan.id, 
        detail_kegiatan.id_kegiatan, 
        kegiatan.nama_kegiatan, 
        detail_kegiatan.hari_satu, 
        detail_kegiatan.hari_dua, 
        detail_kegiatan.hari_tiga, 
        detail_kegiatan.jp1,
        detail_kegiatan.jp2,
        detail_kegiatan.jp3
        FROM 
        detail_kegiatan, kegiatan 
        WHERE 
        kegiatan.id = detail_kegiatan.id_kegiatan AND
        detail_kegiatan.id_kegiatan = $id";
$result_detail = mysqli_query($conn, $query_detail);

$query_k = "SELECT * FROM kegiatan WHERE id = $id";
$result_k = mysqli_query($conn, $query_k);
$row_k = mysqli_fetch_assoc($result_k);

if (isset($_POST["submit"])) {

    $id_kegiatan = htmlspecialchars($_POST["id_kegiatan"]);
    $hari_satu = htmlspecialchars($_POST["hari_satu"]);
    $hari_dua = htmlspecialchars($_POST["hari_dua"]);
    $hari_tiga = htmlspecialchars($_POST["hari_tiga"]);
    $jp1 = htmlspecialchars($_POST["jp1"]);
    $jp2 = htmlspecialchars($_POST["jp2"]);
    $jp3 = htmlspecialchars($_POST["jp3"]);
    $query = "INSERT INTO detail_kegiatan VALUES ('', '$id_kegiatan', '$hari_satu', '$hari_dua', '$hari_tiga', '$jp1', '$jp2', '$jp3')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Detail Kegiatan berhasil disimpan...!');
                document.location.href = 'kegiatan-detail.php?id=$id';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Detail Kegiatan GAGAL disimpan...!');
                document.location.href = 'kegiatan-detail.php?id=$id';
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

        .grid {
            display: grid;
            grid-template-rows: auto auto;
            row-gap: .2em;
        }

        .bt {
            /* border: 1px solid red; */
            width: 100%;
        }

        .tw {
            width: 15%;
            text-align: center;
        }

        th {
            text-align: center;
            background-color: #007bff;
            color: white;
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
                                    <h3 class="card-title">Tambah Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_kegiatan">Nama Kegiatan :</label>
                                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $row_k["nama_kegiatan"]; ?>" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hari_satu">Aktifitas Hari I :</label>
                                            <textarea type="text" class="form-control" id="hari_satu" name="hari_satu" placeholder="Kegiatan-kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan 'kegiatan 1, kegiatan 2, kegiatan 3, ...')" rows="3" required></textarea>
                                            <label for="jp1" class="col-sm-2 col-form-label">Jam Pelatihan h1 (JP) :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jp1" name="jp1" placeholder="JP untuk masing-masing kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan '1, ,2, 2, 4, ...')" required>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="card-header">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hari_dua">Aktifitas Hari II :</label>
                                            <textarea type="text" class="form-control" id="hari_dua" name="hari_dua" placeholder="Kegiatan-kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan 'kegiatan 1, kegiatan 2, kegiatan 3, ...')" rows="3" required></textarea>
                                            <label for="jp2" class="col-sm-2 col-form-label">Jam Pelatihan h2 (JP) :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jp2" name="jp2" placeholder="JP untuk masing-masing kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan '2, 3, 3, ...')" required>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="card-header">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hari_tiga">Aktifitas Hari III :</label>
                                            <textarea type="text" class="form-control" id="hari_tiga" name="hari_tiga" placeholder="Kegiatan-kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan 'kegiatan 1, kegiatan 2, kegiatan 3, ...')" rows="3" required></textarea>
                                            <label for="jp3" class="col-sm-2 col-form-label">Jam Pelatihan h3 (JP) :</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jp3" name="jp3" placeholder="JP untuk masing-masing kegiatan ketik dengan dipisahkan dengan tanda koma (misalkan '2, 1, ...')" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_kegiatan" value="<?php echo $id; ?>">
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="margin-top: -2%;">
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
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Detail Kegiatan</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <!-- $result = mysqli_query($conn, "SELECT 
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
                                            peserta_aktifitas.id = $id"); -->
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <!-- <th class="tw">Hari</th> -->
                                                    <th>Aktifitas Hari I</th>
                                                    <th>Jam Pelatihan (JP)</th>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    $result = mysqli_query($conn, "SELECT * FROM detail_kegiatan WHERE id_kegiatan = $id");

                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                $arr = explode(",", $row["hari_satu"]);
                                                                $tes = count($arr);

                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="tw">
                                                                <?php
                                                                $arr = explode(",", $row["jp1"]);
                                                                $tes = count($arr);

                                                                foreach ($arr as $i) {
                                                                    echo $i . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <!-- H 2 -->
                                                        <th>Aktifitas Hari II</th>
                                                        <th> </th>
                                                        <tr>
                                                            <!-- <td>aktifitas h2 1</td> -->
                                                            <td>
                                                                <?php
                                                                $arr = explode(",", $row["hari_dua"]);
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="tw">
                                                                <?php
                                                                $arr = explode(",", $row["jp2"]);
                                                                $tes = count($arr);

                                                                foreach ($arr as $i) {
                                                                    echo $i . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <!-- H 3 -->
                                                        <th>Aktifitas Hari III</th>
                                                        <th> </th>
                                                        <tr>
                                                            <!-- <td>aktifitas h3 1</td> -->
                                                            <td>
                                                                <?php
                                                                $arr = explode(",", $row["hari_tiga"]);
                                                                foreach ($arr as $i) {
                                                                    echo '<b>-> </b>' . $i . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="tw">
                                                                <?php
                                                                $arr = explode(",", $row["jp3"]);
                                                                $tes = count($arr);

                                                                foreach ($arr as $i) {
                                                                    echo $i . '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <td style="text-align: right;">Total JP</td>
                                                        <td class="tw">
                                                            <?php
                                                            // Sum jp1, jp2, and jp3 values by exploding, converting to integers, and summing them
                                                            $total_jp = array_sum(array_map('intval', explode(",", $row["jp1"]))) +
                                                                array_sum(array_map('intval', explode(",", $row["jp2"]))) +
                                                                array_sum(array_map('intval', explode(",", $row["jp3"])));

                                                            // Display the result
                                                            echo $total_jp;
                                                            ?>
                                                        </td>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>

                                                <tfoot>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($result_detail)) { ?>
                                                        <tr>
                                                            <td colspan="6">
                                                                <div class="">
                                                                    <a href="kegiatan-detail-hapus.php?id=<?php echo $row["id"]; ?>" class=" btn btn-danger btn-xs text-light" onclick="javascript: return confirm('Apakah yakin ingin menghapus detail kegiatan ini...?');"><i class="fa fa-trash"></i> Hapus</a>
                                                                    <a href="kegiatan-detail-edit.php?id=<?php echo $row["id"]; ?>" class=" btn btn-success btn-xs"><i class="fa fa-edit"></i> Ubah</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tfoot>
                                            </table>
                                            <!-- <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Hari</th>
                                                        <th>Aktifitas</th>
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
                                                                peserta_aktifitas.id = $id");
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
                                                        </tr>
                                                    <?php $no++;
                                                    } ?>
                                                </tbody>
                                            </table> -->
                                            <div class="mt-2" align="right">
                                                <a class="btn btn-warning" href="../cetak-kegiatan-detail.php?id=<?php echo $id; ?>" target="_blank"><i class="fa fa-print"></i> Cetak Detail</a>
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