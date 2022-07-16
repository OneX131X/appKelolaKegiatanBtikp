<?php

// // ambil data file
// $namaFile = $_FILES['suratSK']['name'];
// $namaSementara = $_FILES['suratSK']['tmp_name'];

// // tentukan lokasi file akan dipindahkan
// $dirUpload = "../file-upload/";

// // pindahkan file
// $file_upload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

// if ($file_upload) {
//     echo "<script type='text/javascript'>
//             document.location.href = 'pendaftaran-peserta.php?';
//         </script>";
//     // echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
// } else {
//     echo "<script type='text/javascript'>
//             alert('File GAGAL diupload...!');
//             document.location.href = 'pendaftaran-peserta-tambah.php';
//         </script>";
// }


include '../koneksi.php';
$directory = "../file-upload/";
$file_name = $_FILES['suratSK']['name'];
move_uploaded_file($_FILES['suratSK']['tmp_name'], $directory.$file_name);

$query = "INSERT INTO peserta_daftar VALUES ('', '$_POST[id_peserta]', '$_POST[id_kegiatan]', '$_POST[jenjang]', '$_POST[jabatan]', '$_POST[golongan]', '$_POST[agama]', '$_POST[kabKota]', '', '$_POST[alamatSekolah]', '', '$file_name', '$_POST[status_]', '')";

$simpan = mysqli_query($conn, $query);
if ($simpan)
{
    echo "<script type='text/javascript'>
        alert('Data Berhasil Disimpan...!');
            document.location.href = 'pendaftaran-peserta.php?';
        </script>";
} else {
    echo "<script type='text/javascript'>
            alert('File GAGAL diupload...!');
            document.location.href = 'pendaftaran-peserta-tambah.php';
        </script>";
}



?>