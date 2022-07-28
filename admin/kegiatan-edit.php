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
$query_kegiatan = "SELECT * FROM kegiatan WHERE id = $id";
$result_kegiatan = mysqli_query($conn, $query_kegiatan);
$row_kegiatan = mysqli_fetch_assoc($result_kegiatan);

if (isset($_POST["submit"])) {

    $nama_kegiatan = htmlspecialchars($_POST["nama_kegiatan"]);
    $tglMulai = htmlspecialchars($_POST["tglMulai"]);
    $tglSelesai = htmlspecialchars($_POST["tglSelesai"]);
    // $jumlahSesi = htmlspecialchars($_POST["jumlahSesi"]);
    $quota = htmlspecialchars($_POST["quota"]);

    $query = "UPDATE kegiatan SET 
                nama_kegiatan = '$nama_kegiatan', 
                tglMulai = '$tglMulai', 
                tglSelesai = '$tglSelesai', 
                quota = '$quota' 
                WHERE id = $id";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data Kegiatan berhasil diubah..!');
                document.location.href = 'kegiatan.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data Kegiatan GAGAL diubah..!');
                document.location.href = 'kegiatan-edit.php?id=$id';
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kegiatan | APPKelolaKegiatanBTIKP</title>
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
                                <li class="breadcrumb-item"><a href="kegiatan.php">kegiatan</a></li>
                                <li class="breadcrumb-item active">Tambah kegiatan</li>
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
                                            <label for="nama_kegiatan">Nama Kegiatan :</label>
                                            <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php echo $row_kegiatan["nama_kegiatan"]; ?>" placeholder="Nama Kegiatan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tglMulai">Tanggal Mulai :</label>
                                            <input type="date" class="form-control" id="tglMulai" name="tglMulai" value="<?php echo $row_kegiatan["tglMulai"]; ?>" placeholder="Tanggal Mulai" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tglSelesai">Tanggal Selesai :</label>
                                            <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" value="<?php echo $row_kegiatan["tglSelesai"]; ?>" placeholder="Tanggal Selesai" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="jumlahSesi">Jumlah Sesi :</label>
                                            <input type="text" class="form-control" id="jumlahSesi" name="jumlahSesi" value="<?php echo $row_kegiatan["jumlahSesi"]; ?>" maxlength="1" placeholder="Jumlah Sesi" required>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="quota">Quota :</label>
                                            <input type="text" class="form-control" id="quota" name="quota" value="<?php echo $row_kegiatan["quota"]; ?>" maxlength="2" placeholder="Quota" required>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="karyawan_id">Kepala Kegiatan</label>
                                            <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                                                <option value="">-- Pilih Kepala Kegiatan --</option>
                                                <?php
                                                $query_karyawan = "SELECT * FROM karyawan";
                                                $result_karyawan = mysqli_query($conn, $query_karyawan);
                                                while ($row_karyawan = mysqli_fetch_assoc($result_karyawan)) {
                                                ?>
                                                    <option value="<?php echo $row_karyawan["id"]; ?>"><?php echo $row_karyawan["nama_lengkap"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="kegiatan_id">Kegiatan</label>
                                            <select class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                                                <option value="">-- Pilih Kegiatan --</option>
                                                <?php
                                                $query_kegiatan = "SELECT * FROM kegiatan";
                                                $result_kegiatan = mysqli_query($conn, $query_kegiatan);
                                                while ($row_kegiatan = mysqli_fetch_assoc($result_kegiatan)) {
                                                ?>
                                                    <option value="<?php echo $row_kegiatan["id"]; ?>"><?php echo $row_kegiatan["nama_kegiatan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div> -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="kegiatan.php" class="btn btn-secondary">Cancel</a>
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