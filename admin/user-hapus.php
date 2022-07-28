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
$query = "DELETE FROM pengguna WHERE id = $id";
$delete = mysqli_query($conn, $query);

if ($delete) {
    echo "<script type='text/javascript'>
            alert('Data pengguna berhasil dihapus...!');
            document.location.href = 'user.php';
        </script>";
}
