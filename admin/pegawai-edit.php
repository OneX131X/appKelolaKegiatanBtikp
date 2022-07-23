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
$query_pegawai = "SELECT * FROM pegawai WHERE id = $id";
$result_pegawai = mysqli_query($conn, $query_pegawai);
$row_pegawai = mysqli_fetch_assoc($result_pegawai);

if (isset($_POST["submit"])) {

    $nama_pegawai = htmlspecialchars($_POST["nama_pegawai"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $jK = htmlspecialchars($_POST["jK"]);
    $NoTelp = htmlspecialchars($_POST["NoTelp"]);
    $waktuTugas = htmlspecialchars($_POST["waktuTugas"]);

    $query = "UPDATE pegawai SET 
                nama_pegawai = '$nama_pegawai', 
                nik = '$nik', 
                jK = '$jK', 
                NoTelp = '$NoTelp',
                waktuTugas = '$waktuTugas'
                WHERE id = $id ";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = 'pegawai.php';
            </script>";
        } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'pegawai-edit.php?id=$id';
                </script>";        
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Data Pegawai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="pegawai.php">Pegawai</a></li>
                                <li class="breadcrumb-item active">Edit Pegawai</li>
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
                                            <label for="nama_pegawai">Nama Pegawai :</label>
                                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php echo $row_pegawai["nama_pegawai"]; ?>" placeholder="Nama Pegawai" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">NIK Pegawai :</label>
                                            <input type="text" class="form-control" id="nik" name="nik" maxlength="16" value="<?php echo $row_pegawai["nik"]; ?>" placeholder="NIK Pegawai" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jK">Jenis Kelamin :</label>
                                            <select class="form-control" id="jK" name="jK" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L" <?php if ($row_pegawai["jK"] == "L") {
                                                    echo "selected";
                                                } ?>>Laki-laki</option>
                                                <option value="P" <?php if ($row_pegawai["jK"] == "P") {
                                                    echo "selected";
                                                } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="NoTelp">Nomor Telepon :</label>
                                            <input type="text" class="form-control" id="NoTelp" name="NoTelp" maxlength="13" value="<?php echo $row_pegawai["NoTelp"]; ?>" placeholder="Nomor Telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="waktuTugas">Waktu Tugas :</label>
                                            <input type="date" class="form-control" id="waktuTugas" name="waktuTugas" value="<?php echo $row_pegawai["waktuTugas"]; ?>" placeholder="Waktu Tugas" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="pegawai.php" class="btn btn-secondary">Cancel</a>
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