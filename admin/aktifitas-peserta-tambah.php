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

$query = mysqli_query($conn, "SELECT peserta_aktifitas.*, peserta.nama_peserta, kegiatan.nama_kegiatan FROM peserta_aktifitas, peserta, kegiatan");
$row = mysqli_fetch_assoc($query);

if (isset($_POST["submit"])) {
    $namaPeserta = htmlspecialchars($_POST["id_peserta"]);
    $namaKegiatan = htmlspecialchars($_POST["id_kegiatan"]);

    $query = "INSERT INTO peserta_aktifitas VALUES ('', '$namaPeserta', '$namaKegiatan', '', '', '', '')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Aktifitas peserta berhasil disimpan...!');
                document.location.href = 'aktifitas-peserta.php?';
                </script>";
    } else {    
        echo "<script type='text/javascript'>
                alert('Aktifitas peserta GAGAL disimpan...!');
                document.location.href = 'aktifitas-peserta-tambah.php';
            </script>";;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aktifitas Peserta | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Aktifitas Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item"><a href="aktifitas-peserta.php">Aktifitas Peserta</a></li>
                                <li class="breadcrumb-item active">Tambah Data</a></li>
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
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card-body table-responsive pad mt-2">
                                        <!-- <p class="login-box-msg">Lengkapi Data Peserta</p> -->
                                        <div class="input-group mb-3">
                                            <label for="id_peserta">Nama Peserta :</label>
                                            <!-- <input list="peserta" id="nama_peserta" autocomplete="off" name="nama_peserta" class="form-control ml-2" required> -->
                                            <select class="form-control ml-2" id="id_peserta" name="id_peserta" required>
                                                <option value="">-- Pilih Peserta --</option>
                                                <?php
                                                $q_p = "SELECT peserta.nama_peserta, peserta.id, peserta_daftar.id_peserta, peserta_daftar.status_, kegiatan.nama_kegiatan  
                                                        FROM peserta, peserta_daftar, kegiatan 
                                                        WHERE peserta.id = peserta_daftar.id_peserta 
                                                        AND peserta_daftar.status_ = 'diterima'
                                                        AND kegiatan.id = peserta_daftar.id_kegiatan";
                                                $r_p = mysqli_query($conn, $q_p);
                                                while ($row_p = mysqli_fetch_assoc($r_p)) {
                                                    ?>
                                                    <option value="<?php echo $row_p["id"]; ?>">
                                                    <?php echo $row_p["nama_peserta"] . " || " . $row_p["nama_kegiatan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="id_kegiatan">Nama Kegiatan :</label>
                                            <!-- <input list="kegiatan" id="nama_kegiatan" autocomplete="off" name="nama_kegiatan" class="form-control ml-2" required> -->
                                            <select class="form-control ml-2" id="id_kegiatan" name="id_kegiatan" required>
                                                <option value="">-- Pilih Kegiatan --</option>
                                                <?php
                                                $query_keg = "SELECT * FROM kegiatan";
                                                $result_keg = mysqli_query($conn, $query_keg);
                                                while ($row_keg = mysqli_fetch_assoc($result_keg)) {
                                                    ?>
                                                    <option value="<?php echo $row_keg["id"]; ?>">
                                                    <?php echo $row_keg["nama_kegiatan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="pendaftaran-peserta.php" class="btn btn-secondary">Batal</a>
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
<!-- <datalist id="peserta">
    <?php $exe = mysqli_query($conn, "SELECT peserta.nama_peserta, peserta_daftar.* FROM peserta, peserta_daftar WHERE peserta.id = peserta_daftar.id_peserta AND peserta_daftar.status_ = 'diterima'"); 
    while ($data = mysqli_fetch_array($exe)) {
        echo "<option value = '". $data['nama_peserta'] ."'>";
    }
    ?>
</datalist>
<datalist id="kegiatan">
    <?php $exe = mysqli_query($conn, "SELECT * FROM kegiatan"); 
    while ($data = mysqli_fetch_array($exe)) {
        echo "<option value = '". $data['nama_kegiatan'] ."'>";
    }
    ?>
</datalist> -->
</html>
<script>
    $(function () {
        $("#nama_peserta").change(function(){
            var nama = $("#nama_peserta").val();
            $.ajax({
                url: 'admin/proses_aksi.php?op=cari_peserta',
                data: 'nama=' + nama,
                success: function(msg){
                    // var data = msg.split("|");
                    $("#nama_kegiatan").val(data[0]);
                }
            })
        }) 
    });
</script>