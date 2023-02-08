<?php
session_start();
if (!$_SESSION["peran"] == "ADMIN") {
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
                    peserta_aktifitas.*, 
                    peserta.nama_peserta, 
                    kegiatan.nama_kegiatan 
                    FROM 
                    peserta_aktifitas, peserta, kegiatan 
                    WHERE 
                    peserta.id = peserta_aktifitas.id_peserta AND
                    kegiatan.id = peserta_aktifitas.id_kegiatan AND
                    peserta_aktifitas.id = $id";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

if (isset($_POST["submit"])) {
    $absen1 = htmlspecialchars($_POST["absen1"]);
    $absen2 = htmlspecialchars($_POST["absen2"]);
    $absen3 = htmlspecialchars($_POST["absen3"]);

    $query = "UPDATE peserta_aktifitas SET  
                absen1 = '$absen1', 
                absen2 = '$absen2', 
                absen3 = '$absen3' 
                WHERE id = $id";
    $edit = mysqli_query($conn, $query);

    if ($edit) {
        echo "<script type='text/javascript'>
                alert('Data Aktifitas Peserta berhasil diubah...!');
                document.location.href = 'aktifitas-peserta-detail.php?id=$id';
                </script>";
    } else {    
        echo "<script type='text/javascript'>
                alert('Data Aktifitas Peserta GAGAL diubah...!');
                document.location.href = 'aktifitas-peserta-edit.php?id=$id';
            </script>";;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Aktifitas | APPKelolaKegiatanBTIKP</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <style>
        .label {
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
                            <h1>Detail Aktifitas Peserta</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Peserta</li>
                                <li class="breadcrumb-item"><a href="aktifitas-peserta.php">Aktifitas Peserta</a></li>
                                <li class="breadcrumb-item"><a href="aktifitas-peserta-tambah.php?id=<?= $row_peserta["id_peserta"]; ?>">Aktifitas</a></li>
                                <li class="breadcrumb-item"><a href="aktifitas-peserta-detail.php?id=<?= $id ?>">Detail Aktifitas</a></li>
                                <li class="breadcrumb-item active">Edit Detail</li>
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
                                    <h3 class="card-title">Peserta</h3>
                                </div>
                                <!-- /.card-header -->
                                    <div class="card-body table-responsive pad">
                                        <table>
                                            <tr>
                                                <td for="nama_peserta" style="width: 23%;">Nama Peserta</td>
                                                <td style="width: 2%;">:</td>
                                                <td><?= $row_peserta["nama_peserta"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td for="nama_kegiatan">Kegiatan</td>
                                                <td>:</td>
                                                <td><?= $row_peserta["nama_kegiatan"]; ?></td>
                                            </tr>
                                        </table>
                                        <!-- /.card-body -->
                                    </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card ">
                                        <form action="" method="post">
                                            <div class="card-header bg-lime">
                                                <h3 class="card-title">Detail Kegiatan</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="card-header bg-orange">
                                                    <h3 class="card-title label"><?php echo $row_peserta["nama_kegiatan"]; ?></h3>
                                                </div>
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Hari</th>
                                                            <th>Aktifitas</th>
                                                            <th>Absensi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 1;
                                                        $result = mysqli_query($conn, "SELECT 
                                                                    detail_kegiatan.*, 
                                                                    peserta_aktifitas.*, 
                                                                    peserta.nama_peserta, 
                                                                    kegiatan.nama_kegiatan 
                                                                    FROM 
                                                                    detail_kegiatan, peserta_aktifitas, peserta, kegiatan 
                                                                    WHERE 
                                                                    peserta.id = peserta_aktifitas.id_peserta AND 
                                                                    kegiatan.id = peserta_aktifitas.id_kegiatan AND 
                                                                    peserta_aktifitas.id_kegiatan = detail_kegiatan.id_kegiatan AND 
                                                                    peserta_aktifitas.id = $id");
                                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                                            <tr>
                                                                <th>Hari I</th>
                                                                <td>
                                                                    <?php 
                                                                    $arr = explode(",", $row["hari_satu"]); 
                                                                    foreach ($arr as $i) {
                                                                        echo '<b>-> </b>' . $i . '<br>';
                                                                    }   
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group btn-group-toggle ml-2" data-toggle="buttons">
                                                                        <label class="btn bg-success active">
                                                                            <input type="radio" name="absen1" id="absen1" autocomplete="off" value="hadir"> Hadir
                                                                        </label>
                                                                        <label class="btn bg-warning active">
                                                                            <input type="radio" name="absen1" id="absen1" autocomplete="off" value="tidak hadir"> Tidak Hadir
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Hari II</th>
                                                                <td>
                                                                    <?php 
                                                                    $arr = explode(",", $row["hari_dua"]); 
                                                                    foreach ($arr as $i) {
                                                                        echo '<b>-> </b>' . $i . '<br>';
                                                                    }   
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group btn-group-toggle ml-2" data-toggle="buttons">
                                                                        <label class="btn bg-success active">
                                                                            <input type="radio" name="absen2" id="absen2" autocomplete="off" value="hadir"> Hadir
                                                                        </label>
                                                                        <label class="btn bg-warning active">
                                                                            <input type="radio" name="absen2" id="absen2" autocomplete="off" value="tidak hadir"> Tidak Hadir
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Hari III</th>
                                                                <td>
                                                                    <?php 
                                                                    $arr = explode(",", $row["hari_tiga"]); 
                                                                    foreach ($arr as $i) {
                                                                        echo '<b>-> </b>' . $i . '<br>';
                                                                    }   
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group btn-group-toggle ml-2" data-toggle="buttons">
                                                                        <label class="btn bg-success active">
                                                                            <input type="radio" name="absen3" id="absen3" autocomplete="off" value="hadir"> Hadir
                                                                        </label>
                                                                        <label class="btn bg-warning active">
                                                                            <input type="radio" name="absen3" id="absen3" autocomplete="off" value="tidak hadir"> Tidak Hadir
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php $no++;
                                                        } ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                            <th>Hari</th>
                                                            <th>Aktifitas</th>
                                                            <th>Absensi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                                <a href="aktifitas-peserta.php" class="btn btn-secondary">Batal</a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
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