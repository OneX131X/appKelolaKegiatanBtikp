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
// hapus file
$file = "SELECT suratSK FROM peserta_daftar WHERE id_peserta = $id";
$result = mysqli_query($conn, $file);
$row = mysqli_fetch_assoc($result);
// $directory = "../file-upload/";
if (file_exists("../file-upload/$row[suratSK]")) {
    unlink("../file-upload/$row[suratSK]");
}
$query = "DELETE FROM peserta_daftar WHERE id_peserta = $id";
$delete = mysqli_query($conn, $query);

if ($delete) {
    echo "<script type='text/javascript'>
            alert('Data berhasil dihapus...!');
            document.location.href = 'pendaftaran-peserta.php';
        </script>";
    }

?>