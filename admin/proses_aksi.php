<?php
include 'koneksi.php';
$id_peserta = $_GET['id_peserta'];
$query = mysqli_query($conn, "SELECT * FROM peserta WHERE id_peserta='$id_peserta'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'asalSekolah'      =>  $mahasiswa['asalSekolah']);
 echo json_encode($data);
?>