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

$id = $_GET["id"];
$query_peserta = "SELECT 
                    peserta.*, 
                    peserta_aktifitas.*,
                    kegiatan.nama_kegiatan 
                    FROM 
                    peserta_aktifitas, peserta, kegiatan 
                    WHERE 
                    peserta.id = peserta_aktifitas.id_peserta AND 
                    kegiatan.id = peserta_aktifitas.id_kegiatan AND 
                    peserta_aktifitas.id_peserta = $id";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

if (isset($_POST["submit"])) {

    $penilaian = htmlspecialchars($_POST["penilaian"]);

    $query = "UPDATE peserta_aktifitas SET 
                penilaian = '$penilaian' 
                WHERE id_peserta = $id ";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = 'peserta.php?id=$row_peserta[id_kegiatan]';
            </script>";
        } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                </script>";        
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penilaian Peserta | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Penilaian Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Penilaian</li>
                                <li class="breadcrumb-item"><a href="kegiatan.php">List Kegiatan</a></li>
                                <li class="breadcrumb-item"><a href="peserta.php?id=<?= $row_peserta["id_kegiatan"]; ?>">List Peserta</a></li>
                                <li class="breadcrumb-item active">Penilaian Peserta</li>
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
                                    <h3 class="card-title">Edit Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama_peserta">Nama Peserta :</label>
                                            <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" value="<?php echo $row_peserta["nama_peserta"]; ?>" placeholder="Nama Peserta" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp">Nomor Telepon :</label>
                                            <input type="text" class="form-control" id="noTelp" name="noTelp" maxlength="13" value="<?php echo $row_peserta["noTelp"]; ?>" placeholder="Nomor Telepon" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row_peserta["email"]; ?>" placeholder="Email" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kegiatan">Kegiatan :</label>
                                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $row_peserta["nama_kegiatan"]; ?>" placeholder="Nama Kegiatan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="penilaian">Penilain :</label>
                                            <!-- <input type="text" class="form-control" id="penilaian" name="penilaian" value="<?php echo $row_peserta["penilaian"]; ?>" placeholder="Penilaian Hasil Bimtek" required> -->
                                            <select class="form-control col-2" id="penilaian" name="penilaian" required>
                                                <option value="">-- Penilaian Hasil Bimtek --</option>
                                                <option value="sangat baik" <?php if ($row_peserta["penilaian"] == "sangat baik") { echo "selected"; }?>>Sangat Baik</option>
                                                <option value="baik" <?php if ($row_peserta["penilaian"] == "baik") { echo "selected"; }?>>Baik</option>
                                                <option value="cukup baik" <?php if ($row_peserta["penilaian"] == "cukup baik") { echo "selected"; }?>>Cukup Baik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="peserta.php?id=<?= $row_peserta["id_kegiatan"]; ?>" class="btn btn-secondary">Cancel</a>
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