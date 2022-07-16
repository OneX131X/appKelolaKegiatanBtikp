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

// $id = $_GET["id"];
$query_reservasi = "SELECT 
reservasi.id, 
reservasi.peserta_id, 
peserta.nama_peserta, 
kamar.no_kamar, 
kegiatan.nama_kegiatan, 
reservasi.checkin, 
reservasi.checkout  
FROM 
reservasi, peserta, kamar, kegiatan
WHERE 
peserta.id = reservasi.peserta_id AND 
kamar.id = reservasi.kamar_id AND 
kegiatan.id = reservasi.kegiatan_id AND 
peserta_daftar.status_ = 'diterima'";
$result_reservasi = mysqli_query($conn, $query_reservasi);

if (isset($_POST["submit"])) {

    $peserta_id = htmlspecialchars($_POST["peserta_id"]);
    $kamar_id = htmlspecialchars($_POST["kamar_id"]);
    $kegiatan_id = htmlspecialchars($_POST["kegiatan_id"]);
    $checkin = htmlspecialchars($_POST["checkin"]);
    $checkout = htmlspecialchars($_POST["checkout"]);
    
    $query = "INSERT INTO reservasi VALUES ('', '$peserta_id', '$kamar_id', '$kegiatan_id', '$checkin', '$checkout')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = 'reservasi.php';
            </script>";
        } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'reservasi-tambah.php';
            </script>";        
        }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservasi Kamar | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Tambah Reservasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Kamar</li>
                                <li class="breadcrumb-item"><a href="reservasi.php">Reservasi Kamar</a></li>
                                <li class="breadcrumb-item active">Tambah Reservasi</li>
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
                                            <label for="peserta_id">Nama Peserta :</label>
                                            <select class="form-control" id="peserta_id" name="peserta_id" required>
                                                <option value="">-- Pilih Peserta --</option>
                                                <?php
                                                $query_peserta = "SELECT peserta_daftar.*, peserta.nama_peserta FROM peserta, peserta_daftar WHERE peserta.id = peserta_daftar.id_peserta AND peserta_daftar.status_ = 'diterima'";
                                                $result_peserta = mysqli_query($conn, $query_peserta);
                                                while ($row_peserta = mysqli_fetch_assoc($result_peserta)) {
                                                ?>
                                                    <option value="<?php echo $row_peserta["id"]; ?>">
                                                    <?php echo $row_peserta["nama_peserta"]; ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input type="text" class="form-control" id="peserta_id" name="peserta_id" required> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="kamar_id">Nama Nomor Kamar :</label>
                                            <select class="form-control" id="kamar_id" name="kamar_id" required>
                                                <option value="">-- Pilih Nomor Kamar --</option>
                                                <?php
                                                $query_kamar = "SELECT * FROM kamar";
                                                $result_kamar = mysqli_query($conn, $query_kamar);
                                                while ($row_kamar = mysqli_fetch_assoc($result_kamar)) {
                                                    ?>
                                                    <option value="<?php echo $row_kamar["id"]; ?>">
                                                        <?php echo $row_kamar["no_kamar"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                            <!-- <input type="text" class="form-control" id="kamar_id" name="kamar_id" required> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="kegiatan_id">Nama Kegiatan :</label>
                                            <select class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                                                <option value="">-- Pilih Kegiatan --</option>
                                                <?php
                                                $query_kegiatan = "SELECT * FROM kegiatan";
                                                $result_kegiatan = mysqli_query($conn, $query_kegiatan);
                                                while ($row_kegiatan = mysqli_fetch_assoc($result_kegiatan)) {
                                                ?>
                                                <option value="<?php echo $row_kegiatan["id"]; ?>">
                                                    <?php echo $row_kegiatan["nama_kegiatan"]; echo "<span class='ml-1'> (</span>";
                                                        echo date("d-m-Y", strtotime($row_kegiatan["tglMulai"])); 
                                                        echo "<span class='ml-1'> sampai </span>";
                                                        echo date("d-m-Y", strtotime($row_kegiatan["tglSelesai"])); echo ")"; 
                                                    ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                            <!-- <input type="text" class="form-control" id="kegiatan_id" name="kegiatan_id" required> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="checkin">Tanggal Check In :</label>
                                            <input type="date" class="form-control col-2" id="checkin" name="checkin" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="checkout">Tanggal Check Out :</label>
                                            <input type="date" class="form-control col-2" id="checkout" name="checkout" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="reservasi.php" class="btn btn-secondary">Cancel</a>
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