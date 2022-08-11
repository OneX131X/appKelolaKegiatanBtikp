<?php
include 'koneksi.php';
$id=$_GET["id"];
$hapus=mysqli_query($conn, "DELETE FROM kamar WHERE id=$id");
if ($hapus) {
    echo "<script type=text/javascript>
            alert ('DATA BERHASIL DIHAPUS');
            document.location.href='index.php';
        </script>";
}