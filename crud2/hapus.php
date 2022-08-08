<?php
include 'konek.php';
$id=$_GET["id"];
$query=mysqli_query($conn2, "DELETE FROM kegiatan WHERE id='$id'");
if ($query) {
    echo "<script type='text/javascript'>
        alert('Data Berhasil Dihapus');
        document.location.href='index.php';
    </script>";
}
?>