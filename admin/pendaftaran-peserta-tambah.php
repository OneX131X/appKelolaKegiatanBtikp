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

if (isset($_POST["submit"])) {
    $namaPeserta = htmlspecialchars($_POST["id_peserta"]);
    $namaKegiatan = htmlspecialchars($_POST["id_kegiatan"]);
    $jenjang = htmlspecialchars($_POST["jenjang"]);
    $jabatan = htmlspecialchars($_POST["jabatan"]);
    $golongan = htmlspecialchars($_POST["golongan"]);
    $agama = htmlspecialchars($_POST["agama"]);
    $kabKota = htmlspecialchars($_POST["kabKota"]);
    // $unitKerja = htmlspecialchars($_POST["unitKerja"]);
    $alamatSekolah = htmlspecialchars($_POST["alamatSekolah"]);
    // $hp = htmlspecialchars($_POST["hp"]);
    $suratSK = htmlspecialchars($_POST["suratSK"]);
    $status = htmlspecialchars($_POST["status_"]);

    $query = "INSERT INTO peserta_daftar VALUES ('', '$namaPeserta', '$namaKegiatan', '$jenjang', '$jabatan', '$golongan', '$agama', '$kabKota', '', '$alamatSekolah', '', '$suratSK', '$status')";
    $simpan = mysqli_query($conn, $query);

    if ($simpan) {
        echo "<script type='text/javascript'>
                alert('Data berhasil dikirim...!');
                document.location.href = 'pendaftaran-peserta.php?';
                </script>";
    } else {    
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'pendaftaran-peserta-tambah.php';
            </script>";;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Peserta | APPKelolaKegiatanBTIKP</title>
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
                            <h1>Pendaftaran Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item"><a href="pendaftaran-peserta.php">Pendaftaran Peserta</a></li>
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
                                    <h3 class="card-title">Daftar</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    <div class="card-body table-responsive pad">
                                        <p class="login-box-msg">Lengkapi Data Peserta</p>
                                        <div class="input-group mb-3">
                                            <label for="id_peserta">Nama Peserta :</label>
                                            <select class="form-control ml-2" id="id_peserta" name="id_peserta" required>
                                                <option value="">-- Pilih Peserta --</option>
                                                <?php
                                                $q_p = "SELECT * FROM peserta";
                                                $r_p = mysqli_query($conn, $q_p);
                                                while ($row_p = mysqli_fetch_assoc($r_p)) {
                                                    ?>
                                                    <option value="<?php echo $row_p["id"]; ?>">
                                                    <?php echo $row_p["nama_peserta"] . " || " . $row_p["asalSekolah"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="id_kegiatan">Pilih Kegiatan :</label>
                                            <!-- <input type="text" class="form-control ml-2" name="id_kegiatan" value="<?php echo $row_peserta["kegiatan"]; ?>" readonly> -->
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
                                        <!-- <div class="input-group mb-3">
                                            <label for="unitKerja">Unit Kerja :</label>
                                            <input type="text" class="form-control ml-2" name="unitKerja" placeholder="Unit Kerja/Sekolah"> -->
                                            <!-- <select class="form-control ml-2" id="unitKerja" name="unitKerja" required>
                                                <option value="">-- Pilih Unit Kerja / Sekolah --</option>
                                                <?php
                                                $query_unit = "SELECT * FROM peserta";
                                                $result_unit = mysqli_query($conn, $query_unit);
                                                while ($row_unit = mysqli_fetch_assoc($result_unit)) {
                                                    ?>
                                                    <option value="<?php echo $row_unit["asalSekolah"]; ?>">
                                                    <?php echo $row_unit["asalSekolah"]; ?></option>
                                                <?php } ?>
                                            </select> -->
                                        <!-- </div> -->
                                        <div class="input-group mb-3">
                                            <label for="alamatSekolah">Alamat Sekolah :</label>
                                            <input type="text" class="form-control ml-2" name="alamatSekolah" placeholder="Alamat Lengkap Sekolah">
                                        </div>
                                        <!-- <div class="input-group mb-3">
                                            <label for="hp">No HP :</label>
                                            <input type="text" class="form-control ml-2" name="hp" maxlength="13" placeholder="Nomor HP / WA" required>
                                        </div> -->
                                        <div class="input-group mb-3">
                                            Upload Surat SK :
                                            <input type="file" class="ml-2" name="suratSK" id="suratSK">
                                                <i class="fas fa-upload"></i>
                                                <span class="ml-1">upload file</span>
                                            </input>
                                        </div>
                                        <div class="table-responsive pad">
                                            Status :
                                            <div class="btn-group btn-group-toggle ml-2" data-toggle="buttons">
                                            <label class="btn bg-olive active">
                                                <input type="radio" name="status_" id="status_" autocomplete="off" value="diterima"> Diterima
                                            </label>
                                            <label class="btn bg-danger">
                                                <input type="radio" name="status_" id="status_" autocomplete="off" value="ditolak"> Ditolak
                                            </label>
                                            <!-- <label class="btn bg-secondary">
                                                <input type="radio" name="status_" id="status_" autocomplete="off" value=""> Belum Ditentukan
                                            </label> -->
                                            </div>
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

</html>