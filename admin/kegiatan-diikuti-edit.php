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
$query_kgt_ = "SELECT 
                kegiatan_diikuti.*, kegiatan.* 
                FROM 
                kegiatan_diikuti, kegiatan 
                WHERE 
                kegiatan.id = kegiatan_diikuti.id_kegiatan AND 
                kegiatan_diikuti.id_kegiatan = $id";
$result_kgt_ = mysqli_query($conn, $query_kgt_);
$row_kgt_ = mysqli_fetch_assoc($result_kgt_);

if (isset($_POST["submit"])) {

    $nama_kegiatan = htmlspecialchars($_POST["id_kegiatan"]);
    $jumlah_peserta = htmlspecialchars($_POST["jumlah_peserta"]);

    $query = "UPDATE kegiatan_diikuti SET 
                id_kegiatan = '$nama_kegiatan',
                jumlah_peserta = '$jumlah_peserta'
                WHERE id = $id";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = 'kegiatan-diikuti.php';
            </script>";
        } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'kegiatan-diikuti-edit.php?id=$id';
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kegiatan Diikuti | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
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
                            <h1>Data Kegiatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="kegiatan-diikuti.php">List Kegiatan Diikuti</a></li>
                                <li class="breadcrumb-item active">Tambah Data</li>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="id_kegiatan">Nama Kegiatan :</label>
                                            <select class="form-control" id="id_kegiatan" name="id_kegiatan" required>
                                                <option>-- Pilih Kegiatan --</option>
                                                    <?php
                                                    $query_keg = "SELECT * FROM kegiatan";
                                                    $result_keg = mysqli_query($conn, $query_keg);
                                                    while ($row_keg = mysqli_fetch_assoc($result_keg)) {
                                                        ?>
                                                        <option value="<?php echo $row_keg["id"]; ?>" <?php if ($row_kgt_["id_kegiatan"] == $row_keg["id"]) { echo "selected"; } ?>>
                                                        <?php echo $row_keg["nama_kegiatan"]; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_peserta">Jumlah Peserta :</label>
                                            <input type="text" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $row_kgt_["jumlah_peserta"]; ?>" placeholder="Jumlah Peserta Yang Berpartisipasi" required>
                                        </div>
                                    </div>
                                </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="kegiatan-diikuti.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
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