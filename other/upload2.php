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

if($_FILES['suratSK']['name'] == null)  {
    $file_name = $_POST['suratSK2'];
} else {
    $file_name = $_FILES['suratSK']['name'];
    move_uploaded_file($_FILES['suratSK']['tmp_name'], $directory.$file_name);
    $file_dokumen = $file_name;
}

// $file_name = $_FILES['suratSK']['name'];
// move_uploaded_file($_FILES['suratSK']['tmp_name'], $directory.$file_name);

$query = "UPDATE peserta_daftar SET namaPeserta = '$_POST[namaPeserta]', namaKegiatan = '$_POST[namaKegiatan]', jenjang = '$_POST[jenjang]', jabatan = '$_POST[jabatan]', golongan = '$_POST[golongan]', agama = '$_POST[agama]', kabKota = '$_POST[kabKota]', unitKerja = '$_POST[unitKerja]', alamatSekolah = '$_POST[alamatSekolah]', hp = '$_POST[hp]', suratSK = '$file_name', status_ = '$_POST[status_]' WHERE id = '$_POST[id]'";

$simpan = mysqli_query($conn, $query);
if ($simpan)
{
header('location:pendaftaran-peserta.php');
} else {
    "<script type='text/javascript'>
            alert('File GAGAL diupload...!');
            document.location.href = 'pendaftaran-peserta-tambah.php';
        </script>";
}



?>