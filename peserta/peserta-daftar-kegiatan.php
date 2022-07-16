<?php
session_start();
if ($_SESSION["peran"] == "ADMIN") {
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

$nama_peserta = $_GET["nama_peserta"];
$query_peserta = "SELECT * FROM peserta WHERE nama_peserta = $nama_peserta";
$result_peserta = mysqli_query($conn, $query_peserta);

if (isset($_POST["submit"])) {
    $namaPeserta = htmlspecialchars($_POST["namaPeserta"]);
    $namaKegiatan = htmlspecialchars($_POST["namaKegiatan"]);
    $jenjang = htmlspecialchars($_POST["jenjang"]);
    $jabatan = htmlspecialchars($_POST["jabatan"]);
    $golongan = htmlspecialchars($_POST["golongan"]);
    $agama = htmlspecialchars($_POST["agama"]);
    $kabKota = htmlspecialchars($_POST["kabKota"]);
    $unitKerja = htmlspecialchars($_POST["unitKerja"]);
    $alamatSekolah = htmlspecialchars($_POST["alamatSekolah"]);
    $hp = htmlspecialchars($_POST["hp"]);
    $suratSK = htmlspecialchars($_POST["suratSK"]);

    $query = "INSERT INTO peserta_daftar VALUES ('', '$namaPeserta', '$namaKegiatan', '$jenjang', '$jabatan', '$golongan', '$agama', '$kabKota', '$unitKerja', '$alamatSekolah', '$hp', '$suratSK', '')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Data berhasil dikirim...!');
                document.location.href = 'peserta-cek-nama.php?';
                </script>";
    } else {    
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'peserta-cek-nama.php';
            </script>";;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Kegiatan | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Pendaftaran Kegiatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item"><a href="peserta-cek-nama.php">Cek Nama</a></li>
                                <li class="breadcrumb-item"><a href="peserta-daftar-kegiatan.php">Pendaftaran Kegiatan</a></li>
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
                                    <h3 class="card-title">Daftar</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <p class="login-box-msg">Lengkapi Data Anda</p>
                                            <div class="input-group mb-3">
                                                <label for="namaPeserta">Nama Peserta :</label>
                                                <input type="text" class="form-control ml-2" name="namaPeserta" value="<?php echo $nama_peserta;?>" readonly>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="namaKegiatan">Pilih Kegiatan :</label>
                                                <!-- <input type="text" class="form-control ml-2" name="namaKegiatan" value="<?php echo $row_peserta["kegiatan"]; ?>" readonly> -->
                                                <select class="form-control ml-2" id="namaKegiatan" name="namaKegiatan" required>
                                                    <option value="">-- Pilih Kegiatan --</option>
                                                    <?php
                                                    $query_keg = "SELECT * FROM kegiatan";
                                                    $result_keg = mysqli_query($conn, $query_keg);
                                                    while ($row_keg = mysqli_fetch_assoc($result_keg)) {
                                                        ?>
                                                        <option value="<?php echo $row_keg["nama_kegiatan"]; ?>">
                                                        <?php echo $row_keg["nama_kegiatan"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="jenjang">Jenjang :</label>
                                                <select class="form-control ml-2" id="jenjang" name="jenjang" required>
                                                    <option value="">-- Pilih Jenjang --</option>
                                                    <option value="SD/MI">SD/MI</option>
                                                    <option value="SMP/MTS">SMP/MTS</option>
                                                    <option value="SMA/MA">SMA/MA</option>
                                                    <option value="SMK">SMK</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="jabatan">Jabatan :</label>
                                                <input type="text" class="form-control ml-2" name="jabatan" placeholder="Jabatan" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="golongan">Golongan :</label>
                                                <input type="text" class="form-control ml-2" name="golongan" placeholder="*jika tidak ada kosongkan">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="agama">Agama :</label>
                                                <select class="form-control ml-2" id="agama" name="agama" required>
                                                    <option value="">-- Pilih Agama --</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="khonghuchu">Khonghuchu</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="kabKkota">Kab / Kota :</label>
                                                <select class="form-control ml-2" id="kabKkota" name="kabKota" required>
                                                    <option value="">-- Pilih Kabupaten / Kota --</option>
                                                    <option value="bjm">Banjarmasin</option>
                                                    <option value="bjb">Banjarbaru</option>
                                                    <option value="banjar">Banjar</option>
                                                    <option value="tapin">Tapin</option>
                                                    <option value="hss">Hulu Sungai Selatan</option>
                                                    <option value="hst">Hulu Sungai Tengah</option>
                                                    <option value="hsu">Hulu Sungai Utara</option>
                                                    <option value="balangan">Balangan</option>
                                                    <option value="tabalong">Tabalong</option>
                                                    <option value="barito kuala">Barito Kuala</option>
                                                    <option value="tanah laut">Tanah Laut</option>
                                                    <option value="tanah bumbu">Tanah Bumbu</option>
                                                    <option value="kotabaru">Kotabaru</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="unitKerja">Unit Kerja :</label>
                                                <input type="text" class="form-control ml-2" name="unitKerja" placeholder="Unit Kerja/Sekolah">
                                                <!-- <select class="form-control ml-2" id="unitKerja" name="unitKerja" required>
                                                    <option value="">-- Unit Kerja / Sekolah --</option>
                                                    <?php
                                                    $query_unit = "SELECT * FROM peserta";
                                                    $result_unit = mysqli_query($conn, $query_unit);
                                                    while ($row_unit = mysqli_fetch_assoc($result_unit)) {
                                                        ?>
                                                        <option value="<?php echo $row_unit["asalSekolah"]; ?>">
                                                        <?php echo $row_unit["asalSekolah"]; ?></option>
                                                    <?php } ?>
                                                </select> -->
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="alamatSekolah">Alamat Sekolah :</label>
                                                <input type="text" class="form-control ml-2" name="alamatSekolah" placeholder="Alamat Sekolah">
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="hp">No HP :</label>
                                                <input type="text" class="form-control ml-2" name="hp" maxlength="13" placeholder="Nomor HP / WA" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <!-- <label for="suratSK">No HP :</label> -->
                                                    Pilih file :
                                                    <!-- <input type="file" class="ml-2" name="suratSK" id="suratSK"> -->
                                                    <input type="file" class="ml-2" name="suratSK" id="suratSK">
                                                        <i class="fas fa-upload"></i>
                                                        <span class="ml-1">upload file</span>
                                                    </input>
                                            </div>
                                            <!-- <div class="input-group mb-3">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <!-- /.col -->
                                                <div class="col">
                                                    <!-- <button type="submit" class="btn btn-block btn-primary" name="login">Masuk</button> -->
                                                    <!-- <a href="register.php" class="btn btn-block btn-danger">Buat Akun</a> -->
                                                </div>
                                            </div>

                                        <!-- /.social-auth-links -->

                                        <p class="mt-3">
                                            <!-- <a href="lupa-password.php">Lupa Password?</a> -->
                                        </p>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Kirim</button>
                                        <a href="peserta-cek-nama.php" class="btn btn-secondary">Batal</a>
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