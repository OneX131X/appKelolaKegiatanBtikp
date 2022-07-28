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
$query_peserta = "SELECT * FROM peserta WHERE id = $id";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

if (isset($_POST["submit"])) {

    $nama_peserta = htmlspecialchars($_POST["nama_peserta"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $kegiatan = htmlspecialchars($_POST["id_kegiatan"]);
    $jenisKelamin = htmlspecialchars($_POST["jenisKelamin"]);
    $tglLahir = htmlspecialchars($_POST["tglLahir"]);
    $asalSekolah = htmlspecialchars($_POST["asalSekolah"]);
    $pendTerakhir = htmlspecialchars($_POST["pendTerakhir"]);
    $noTelp = htmlspecialchars($_POST["noTelp"]);
    $email = htmlspecialchars($_POST["email"]);

    $query = "UPDATE peserta SET 
                nama_peserta = '$nama_peserta', 
                nik = '$nik', 
                id_kegiatan = '$kegiatan', 
                jenisKelamin = '$jenisKelamin', 
                tglLahir = '$tglLahir',
                asalSekolah = '$asalSekolah',
                pendTerakhir = '$pendTerakhir',
                noTelp = '$noTelp',
                email = '$email'
                WHERE id = $id ";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data Peserta berhasil diubah...!');
                document.location.href = 'peserta.php';
            </script>";
        } else {
        echo "<script type='text/javascript'>
                alert('Data Peserta GAGAL diubah...!');
                document.location.href = 'peserta-edit.php?id=$id';
                </script>";        
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Peserta | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Data Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="peserta.php">Peserta</a></li>
                                <li class="breadcrumb-item active">Edit Peserta</li>
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
                                            <label for="nama_peserta">Nama Peserta :</label>
                                            <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" value="<?php echo $row_peserta["nama_peserta"]; ?>" placeholder="Nama Peserta" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">NIK Peserta :</label>
                                            <input type="text" class="form-control" id="nik" name="nik" maxlength="16" value="<?php echo $row_peserta["nik"]; ?>"placeholder="NIK Peserta" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kegiatan">Kegiatan :</label>
                                            <select class="form-control" name="id_kegiatan" id="id_kegiatan" required>
                                                <option>-- Pilih Kegiatan --</option>
                                                <?php
                                                $query_kegiatan = "SELECT * FROM kegiatan";
                                                $result_kegiatan = mysqli_query($conn, $query_kegiatan);
                                                while ($row_kegiatan = mysqli_fetch_assoc($result_kegiatan)) {
                                                ?>
                                                    <option value="<?php echo $row_kegiatan["id"]; ?>" <?php if ($row_peserta["id_kegiatan"] == $row_kegiatan["id"]) { echo "selected"; } ?>>
                                                    <?php echo $row_kegiatan["nama_kegiatan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenisKelamin">Jenis Kelamin :</label>
                                            <select class="form-control" id="jenisKelamin" name="jenisKelamin" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L" <?php if ($row_peserta["jenisKelamin"] == "L") {
                                                    echo "selected";
                                                } ?>>Laki-laki</option>
                                                <option value="P" <?php if ($row_peserta["jenisKelamin"] == "P") {
                                                    echo "selected";
                                                } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tglLahir">Tanggal Lahir :</label>
                                            <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="<?php echo $row_peserta["tglLahir"]; ?>" placeholder="Tanggal Lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="asalSekolah">Asal Sekolah :</label>
                                            <input type="text" class="form-control" id="asalSekolah" name="asalSekolah" value="<?php echo $row_peserta["asalSekolah"]; ?>" placeholder="Asal Sekolah" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="pendTerakhir">Pendidikan Terakhir :</label>
                                            <input type="text" class="form-control" id="pendTerakhir" name="pendTerakhir" value="<?php echo $row_peserta["pendTerakhir"]; ?>" placeholder="Pendidikan Terakhir" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelp">Nomor Telepon :</label>
                                            <input type="text" class="form-control" id="noTelp" name="noTelp" maxlength="13" value="<?php echo $row_peserta["noTelp"]; ?>" placeholder="Nomor Telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row_peserta["email"]; ?>" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="peserta.php" class="btn btn-secondary">Cancel</a>
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