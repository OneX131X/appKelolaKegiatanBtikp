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
$query_peserta = "SELECT 
peserta_daftar.*,
peserta.id, 
peserta.nama_peserta 
FROM 
peserta_daftar, peserta 
WHERE 
peserta.id = peserta_daftar.id_peserta AND 
peserta_daftar.id_peserta = '$id'";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

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
    $keterangan = htmlspecialchars($_POST["keterangan"]);

    $query = "UPDATE peserta_daftar SET  
                id_kegiatan = '$namaKegiatan', 
                jenjang = '$jenjang', 
                jabatan = '$jabatan', 
                golongan = '$golongan', 
                agama = '$agama', 
                kabKota = '$kabKota', 
                alamatSekolah = '$alamatSekolah', 
                suratSK = '$suratSK', 
                status_ = '$status',  
                keterangan = '$keterangan'  
                WHERE id_peserta = '$id'";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
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
                                <li class="breadcrumb-item active">Pendaftaran Peserta</a></li>
                                <li class="breadcrumb-item active">Edit Data</a></li>
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
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Edit</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="upload2.php" method="post" enctype="multipart/form-data">

                                <input type="text" value="<?php echo $id; ?>" name="id" style="display: none;">
                                    <div class="card-body table-responsive pad">
                                        <p class="login-box-msg">Lengkapi Data Peserta</p>
                                        <div class="input-group mb-3">
                                            <label for="id_peserta">Nama Peserta :</label>
                                            <!-- <input type="text" class="form-control ml-2" name="id_peserta" value="<?php if ($row_peserta["id_peserta"] == $row_peserta["id"]) { echo $row_peserta["nama_peserta"];} ?>" readonly> -->
                                            <select class="form-control ml-2" id="id_peserta" name="id_peserta" required>
                                                <option value="">-- Pilih Peserta --</option>
                                                <?php
                                                $q_p = "SELECT * FROM peserta";
                                                $r_p = mysqli_query($conn, $q_p);
                                                while ($row_p = mysqli_fetch_assoc($r_p)) {
                                                    ?>
                                                    <option value="<?php echo $row_p["id"]; ?>" <?php if ($row_peserta["id_peserta"] == $row_p["id"]) { echo "selected"; } ?>>
                                                    <?php echo $row_p["nama_peserta"] . " || " . $row_p["asalSekolah"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="id_kegiatan">Pilih Kegiatan :</label>
                                            <!-- <input type="text" class="form-control ml-2" name="id_kegiatan" value="<?php echo $row_peserta["kegiatan"]; ?>" readonly> -->
                                            <select class="form-control ml-2" id="id_kegiatan" name="id_kegiatan" required>
                                                <option>-- Pilih Kegiatan --</option>
                                                <?php
                                                $query_keg = "SELECT * FROM kegiatan";
                                                $result_keg = mysqli_query($conn, $query_keg);
                                                while ($row_keg = mysqli_fetch_assoc($result_keg)) {
                                                    ?>
                                                    <option value="<?php echo $row_keg["id"]; ?>" <?php if ($row_peserta["id_kegiatan"] == $row_keg["id"]) { echo "selected"; } ?>>
                                                    <?php echo $row_keg["nama_kegiatan"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="jenjang">Jenjang :</label>
                                            <select class="form-control ml-2" id="jenjang" name="jenjang" required>
                                                <option value="">-- Pilih Jenjang --</option>
                                                <option value="SD/MI" <?php if ($row_peserta["jenjang"] == "SD/MI") {
                                                    echo "selected";
                                                } ?>>SD/MI</option>
                                                <option value="SMP/MTS" <?php if ($row_peserta["jenjang"] == "SMP/MTS") {
                                                    echo "selected";
                                                } ?>>SMP/MTS</option>
                                                <option value="SMA/MA" <?php if ($row_peserta["jenjang"] == "SMA/MA") {
                                                    echo "selected";
                                                } ?>>SMA/MA</option>
                                                <option value="SMK" <?php if ($row_peserta["jenjang"] == "SMK") {
                                                    echo "selected";
                                                } ?>>SMK</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="jabatan">Jabatan :</label>
                                            <input type="text" class="form-control ml-2" name="jabatan" value="<?= $row_peserta["jabatan"]; ?>" placeholder="Jabatan" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="golongan">Golongan :</label>
                                            <input type="text" class="form-control ml-2" name="golongan" value="<?= $row_peserta["golongan"]; ?>" placeholder="*jika tidak ada kosongkan">
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="agama">Agama :</label>
                                            <select class="form-control ml-2" id="agama" name="agama" required>
                                                <option value="">-- Pilih Agama --</option>
                                                <option value="islam" <?php if ($row_peserta["agama"] == "islam") {
                                                    echo "selected";
                                                } ?>>Islam</option>
                                                <option value="katolik" <?php if ($row_peserta["agama"] == "katolik") {
                                                    echo "selected";
                                                } ?>>Katolik</option>
                                                <option value="protestan" <?php if ($row_peserta["agama"] == "protestan") {
                                                    echo "selected";
                                                } ?>>Protestan</option>
                                                <option value="hindu" <?php if ($row_peserta["agama"] == "hindu") {
                                                    echo "selected";
                                                } ?>>Hindu</option>
                                                <option value="budha" <?php if ($row_peserta["agama"] == "budha") {
                                                    echo "selected";
                                                } ?>>Budha</option>
                                                <option value="khonghuchu" <?php if ($row_peserta["agama"] == "khonghuchu") {
                                                    echo "selected";
                                                } ?>>Khonghuchu</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="kabKkota">Kab / Kota :</label>
                                            <select class="form-control ml-2" id="kabKkota" name="kabKota" required>
                                                <option value="">-- Pilih Kabupaten / Kota --</option>
                                                <option value="bjm" <?php if ($row_peserta["kabKota"] == "bjm") {
                                                    echo "selected";
                                                } ?>>Banjarmasin</option>
                                                <option value="bjb" <?php if ($row_peserta["kabKota"] == "bjb") {
                                                    echo "selected";
                                                } ?>>Banjarbaru</option>
                                                <option value="banjar" <?php if ($row_peserta["kabKota"] == "banjar") {
                                                    echo "selected";
                                                } ?>>Banjar</option>
                                                <option value="tapin" <?php if ($row_peserta["kabKota"] == "tapin") {
                                                    echo "selected";
                                                } ?>>Tapin</option>
                                                <option value="hss" <?php if ($row_peserta["kabKota"] == "hss") {
                                                    echo "selected";
                                                } ?>>Hulu Sungai Selatan</option>
                                                <option value="hst" <?php if ($row_peserta["kabKota"] == "hst") {
                                                    echo "selected";
                                                } ?>>Hulu Sungai Tengah</option>
                                                <option value="hsu" <?php if ($row_peserta["kabKota"] == "hsu") {
                                                    echo "selected";
                                                } ?>>Hulu Sungai Utara</option>
                                                <option value="balangan" <?php if ($row_peserta["kabKota"] == "balangan") {
                                                    echo "selected";
                                                } ?>>Balangan</option>
                                                <option value="tabalong" <?php if ($row_peserta["kabKota"] == "tabalong") {
                                                    echo "selected";
                                                } ?>>Tabalong</option>
                                                <option value="barito kuala" <?php if ($row_peserta["kabKota"] == "barito kuala") {
                                                    echo "selected";
                                                } ?>>Barito Kuala</option>
                                                <option value="tanah laut" <?php if ($row_peserta["kabKota"] == "tanah laut") {
                                                    echo "selected";
                                                } ?>>Tanah Laut</option>
                                                <option value="tanah bumbu" <?php if ($row_peserta["kabKota"] == "tanah bumbu") {
                                                    echo "selected";
                                                } ?>>Tanah Bumbu</option>
                                                <option value="kotabaru" <?php if ($row_peserta["kabKota"] == "kotabaru") {
                                                    echo "selected";
                                                } ?>>Kotabaru</option>
                                            </select>
                                        </div>
                                        <!-- <div class="input-group mb-3">
                                            <label for="unitKerja">Pilih Unit Kerja :</label>
                                            <select class="form-control ml-2" id="unitKerja" name="unitKerja" required>
                                                <option value="<?=$row_peserta["unitKerja"] ?>"><?=$row_peserta["unitKerja"] ?></option>
                                                <?php
                                                $query_unit = "SELECT * FROM peserta";
                                                $result_unit = mysqli_query($conn, $query_unit);
                                                while ($row_unit = mysqli_fetch_assoc($result_unit)) {
                                                    ?>
                                                    <option value="<?php echo $row_unit["asalSekolah"]; ?>">
                                                    <?php echo $row_unit["asalSekolah"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div> -->
                                        <div class="input-group mb-3">
                                            <label for="alamatSekolah">Alamat Sekolah :</label>
                                            <input type="text" class="form-control ml-2" name="alamatSekolah" value="<?= $row_peserta["alamatSekolah"]; ?>" placeholder="Alamat Sekolah">
                                        </div>
                                        <!-- <div class="input-group mb-3">
                                            <label for="hp">No HP :</label>
                                            <input type="text" class="form-control ml-2" name="hp" value="<?= $row_peserta["hp"]; ?>" maxlength="13" placeholder="Nomor HP / WA" required>
                                        </div> -->
                                        <div class="input-group mb-3">
                                            Upload Surat SK :
                                            <input type="file" class="ml-2" name="suratSK" id="suratSK">    
                                                <i class="fas fa-upload"></i>
                                                <span class="ml-1 mr-2">Upload file</span>
                                                <a href="../file-upload/<?= $row_peserta["suratSK"]; ?>">
                                                    <h5><?= $row_peserta["suratSK"]; ?></h5>
                                                </a>
                                            </input>
                                            <input type="text" value="<?= $row_peserta["suratSK"]; ?>" name="suratSK2" style="display: none;">
                                        </div>
                                        <div class="table-responsive pad mb-3">
                                            Status :
                                            <div class="btn-group btn-group-toggle ml-2" data-toggle="buttons">
                                            <label class="btn btn-info">
                                                <input  type="radio" name="status_" id="status_" autocomplete="off" <?php if ($row_peserta["status_"] == "diterima") {
                                                    echo "selected";
                                                } ?> value="diterima"> Diterima
                                            </label>
                                            <label class="btn btn-danger">
                                                <input  type="radio" name="status_" id="status_" autocomplete="off" <?php if ($row_peserta["status_"] == "ditolak") {
                                                    echo "selected";
                                                } ?> value="ditolak"> Ditolak
                                            </label>
                                            <!-- <label class="btn btn-secondary">
                                                <input  type="radio" name="status_" id="status_" autocomplete="off"  value=""> Belum Ditentukan
                                            </label> -->
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label for="keterangan">Keterangan :</label>
                                            <input type="text" class="form-control ml-2" name="keterangan" value="<?= $row_peserta["keterangan"]; ?>" placeholder="Keterangan Status">
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