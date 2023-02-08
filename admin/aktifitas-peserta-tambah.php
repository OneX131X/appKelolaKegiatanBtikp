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

$query_akpes = "SELECT 
                peserta_aktifitas.id, 
                peserta_aktifitas.id_peserta, 
                peserta.nama_peserta, 
                kegiatan.nama_kegiatan, 
                kegiatan.tglMulai 
                FROM 
                peserta_aktifitas, peserta, kegiatan 
                WHERE 
                peserta.id = peserta_aktifitas.id_peserta AND 
                kegiatan.id = peserta_aktifitas.id_kegiatan AND 
                peserta_aktifitas.id_peserta = $id";
$result_akpes = mysqli_query($conn, $query_akpes);
// $result_akpes = mysqli_query($conn, "SELECT peserta_aktifitas.id, peserta_aktifitas.id_peserta, ");


$nama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama_peserta FROM peserta WHERE id = $id"));

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
                document.location.href = 'aktifitas-peserta-tambah.php?id=$id';
                </script>";
    } else {    
        echo "<script type='text/javascript'>
                alert('Aktifitas peserta GAGAL disimpan...!');
                document.location.href = 'aktifitas-peserta-tambah.php?id=$id';
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
    <style>
        .grid {
            display: grid;
            grid-template-columns: 10% auto;
            /* border: 1px solid black; */
            /* column-gap: 10px; */
        }
        .grid-item {
            /* border: 1px solid black; */
            /* padding: .2em; */
            height: 100%;
        }
        .grid-row {
            display: grid;
            grid-template-rows: auto auto;
        }
        .label {
            background-color: #01ff70;
            padding-inline: .5em;
            padding-top: .5em;
        }
        .bt-cetak {
            background-color: #adb5bd;
            /* border-color: gray; */
            color: black;
        }
        .bt-cetak:hover,
        .bt-cetak:active {
            background-color: #6c757d;
            color: white;
        }

    </style>
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
                                <li class="breadcrumb-item active">Aktifitas</a></li>
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
                                        <div class="grid">
                                            
                                            <!-- input-group mb-3 -->
                                            <div class="grid-item">
                                                <label for="id_peserta">Nama Peserta</label>
                                            </div>
                                            <div class="grid-item input-group mb-3">
                                                : <input list="peserta" autocomplete="off" class="form-control ml-2" value="<?= $nama["nama_peserta"] ?>" readonly>
                                                <input list="peserta" id="id_peserta" autocomplete="off" name="id_peserta" class="form-control ml-2" value="<?= $id ?>" type="hidden">
                                                <!-- <select class="form-control ml-2" id="id_peserta" name="id_peserta" required>
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
                                                </select> -->
                                            </div>
                                            <!-- input-group mb-3 -->
                                            <div class="grid-item">
                                                <label for="id_kegiatan">Nama Kegiatan</label>
                                                <!-- <input list="kegiatan" id="nama_kegiatan" autocomplete="off" name="nama_kegiatan" class="form-control ml-2" required> -->
                                            </div>
                                            <div class="grid-item input-group mb-3 ml-2 grid-row">
                                                <div class="row">
                                                    : <div class="label ml-2">-- Pilih Kegiatan Yang Telah Didaftarkan Peserta --</div>
                                                </div>
                                                <div class="row">
                                                    <select multiple class="form-control ml-2" id="id_kegiatan" name="id_kegiatan" required>
                                                        <?php
                                                        $query_keg = "SELECT peserta_daftar.*, kegiatan.* FROM peserta_daftar, kegiatan WHERE peserta_daftar.id_peserta = $id AND peserta_daftar.id_kegiatan = kegiatan.id";
                                                        $result_keg = mysqli_query($conn, $query_keg);
                                                        while ($row_keg = mysqli_fetch_assoc($result_keg)) {
                                                            ?>
                                                            <option value="<?php echo $row_keg["id"]; ?>">
                                                            <?php echo $row_keg["nama_kegiatan"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <!-- <select multiple class="form-control ml-2" id="id_kegiatan" name="id_kegiatan" required>
                                                    <option value="">-- Pilih Kegiatan --</option>
                                                    <?php
                                                    $query_keg = "SELECT * FROM kegiatan";
                                                    $result_keg = mysqli_query($conn, $query_keg);
                                                    while ($row_keg = mysqli_fetch_assoc($result_keg)) {
                                                        ?>
                                                        <option value="<?php echo $row_keg["id"]; ?>">
                                                        <?php echo $row_keg["nama_kegiatan"]; ?></option>
                                                    <?php } ?>
                                                </select> -->
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <!-- <a href="pendaftaran-peserta.php" class="btn btn-secondary">Batal</a> -->
                                    </div>
                                </form>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Riwayat Aktifitas</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Tanggal Mulai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            while ($row_akpes = mysqli_fetch_assoc($result_akpes)) { ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td>
                                                        <a href="aktifitas-peserta-hapus.php?id=<?php echo $row_akpes["id"]; ?>" class="btn btn-danger btn-xs text-light" onclick="javascript: return confirm('Apakah yakin ingin menghapus data ini...?');"><i class="fa fa-trash"></i> Hapus</a>
                                                        <a href="aktifitas-peserta-detail.php?id=<?php echo $row_akpes["id"]; ?>" class="bt btn btn-xs bg-info mr-1" ><i class="fa fa-info"></i> Detail</a>
                                                    </td>
                                                    <td><?php echo $row_akpes["nama_kegiatan"]; ?></td>
                                                    <td><?php echo $row_akpes["tglMulai"]; ?></td>
                                                </tr>
                                            <?php $no++;
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Nama kegiatan</th>
                                                <th>Tanggal Mulai</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a target="_blank" href="../cetak-riwayat-aktifitas-peserta.php?id=<?= $id ?>"><div class="btn bt-cetak mr-1">Cetak Riwayat</div></a>
                                </div>
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