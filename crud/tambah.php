<?php
include 'koneksi.php';
if (isset($_POST["submit"])) {
    $kode_buku=$_POST["kode_buku"];
    $judul=$_POST["judul"];
    $pengarang=$_POST["pengarang"];
    $penerbit=$_POST["penerbit"];
    $simpan=mysqli_query($conn, "INSERT INTO dataBuku VALUES ('', '$kode_buku', '$judul', '$pengarang', '$penerbit')");
    if ($simpan) {
        echo "<script type=text/javascript>
            alert('Data buku berhasil ditambah');
            document.location.href='index.php';
        </script>";
    }else{
        echo "<script type=text/javascript>
            alert('Data buku gagal ditambah');
            document.location.href='tambah.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        body{
            padding: 10px;

        }
        .bt{
            border: 1px solid black;
        }
        .item{
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Tambah Buku</h1>
    <form action="" method="post">
        <div class="item">
            <label for="kode_buku">Kode Buku : </label>
            <input type="text" name="kode_buku" id="kode_buku">
        </div>
        <div class="item">
            <label for="judul">Judul Buku : </label>
            <input type="text" name="judul" id="judul">
        </div>
        <div class="item">
            <label for="pengarang">Pengarang Buku : </label>
            <input type="text" name="pengarang" id="pengarang">
        </div>
        <div class="item">
            <label for="penerbit">Penerbit Buku : </label>
            <input type="text" name="penerbit" id="penerbit">
        </div>
        <div class="item">
            <button type="submit" name="submit">Simpan</button>
            <a href="index.php" class="bt">Batal</a>
        </div>
    </form>
</body>
</html>