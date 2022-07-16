<?php

include '../koneksi.php';
$directory = "../file-upload/";
$file_name = $_FILES['suratSK']['name'];
move_uploaded_file($_FILES['suratSK']['tmp_name'], $directory.$file_name);

$query = "INSERT INTO peserta_daftar VALUES ('', '$_POST[namaPeserta]', '$_POST[namaKegiatan]', '$_POST[jenjang]', '$_POST[jabatan]', '$_POST[golongan]', '$_POST[agama]', '$_POST[kabKota]', '$_POST[unitKerja]', '$_POST[alamatSekolah]', '$_POST[hp]', '$file_name', '')";

$simpan = mysqli_query($conn, $query);
if ($simpan)
{
    echo "<script type='text/javascript'>
            alert('Data Berhasil Dikirim...!');
            document.location.href = 'peserta-cek-nama.php?';
        </script>";
} else {
    echo "<script type='text/javascript'>
            alert('Data Gagal Dikirim...!');
            document.location.href = 'peserta-daftar-kegiatan.php';
        </script>";
}

?>