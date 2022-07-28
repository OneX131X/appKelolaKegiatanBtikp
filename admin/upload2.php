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

$file = "SELECT suratSK FROM peserta_daftar WHERE id = '$_POST[id]'";
$result = mysqli_query($conn, $file);
$row = mysqli_fetch_assoc($result);

if($_FILES['suratSK']['name'] == null)  {
    $file_name = $_POST['suratSK2'];
} else {
    $file_name = $_FILES['suratSK']['name'];
    $rawBaseName = pathinfo($file_name, PATHINFO_FILENAME );
    $extension = pathinfo($file_name, PATHINFO_EXTENSION );
    $counter = 2;
    while(file_exists($directory.$file_name)) {
        $file_name = $rawBaseName . $counter . '.' . $extension;
        $counter++;
    };
    
    move_uploaded_file($_FILES['suratSK']['tmp_name'], $directory.$file_name);  
    $file_dokumen = $file_name;
    
    if (file_exists("../file-upload/$row[suratSK]")) {
        unlink("../file-upload/$row[suratSK]");
    }
}

// if ($_FILES['suratSK']['name'] !=""){


// } 
// $file_name = $_FILES['suratSK']['name'];
// move_uploaded_file($_FILES['suratSK']['tmp_name'], $directory.$file_name);

$query = "UPDATE peserta_daftar SET id_peserta = '$_POST[id_peserta]', id_kegiatan = '$_POST[id_kegiatan]', jenjang = '$_POST[jenjang]', jabatan = '$_POST[jabatan]', golongan = '$_POST[golongan]', agama = '$_POST[agama]', kabKota = '$_POST[kabKota]', alamatSekolah = '$_POST[alamatSekolah]', suratSK = '$file_name', status_ = '$_POST[status_]', keterangan = '$_POST[keterangan]' WHERE id = '$_POST[id]'";

$simpan = mysqli_query($conn, $query);
if ($simpan)
{
    echo "<script type='text/javascript'>
            alert('Pendaftaran Berhasil diubah...!');
            document.location.href = 'pendaftaran-peserta.php?';
        </script>";
    header('location:pendaftaran-peserta.php');
} else {
    echo "<script type='text/javascript'>
            alert('Pendaftaran GAGAL diubah...!');
            document.location.href = 'pendaftaran-peserta-tambah.php';
        </script>";
}



?>