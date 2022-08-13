<?php
include 'koneksi.php';
$query=mysqli_query($conn, "SELECT * FROM dataBuku");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA BUKU</title>
    <style>
        body{
            padding: 10px;

        }
        .bt{
            border: 1px solid black;
        }
        table{
            border-collapse: collapse;
            margin-top: 10px;
            width: 100%;
        }
        tr, td, th{
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Data Buku</h1>
    <a href="tambah.php" class="bt">Tambah</a>
    <a href="cetak.php" class="bt">Cetak</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; 
            while ($row=mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["kode_buku"]; ?></td>
                    <td><?= $row["judul"]; ?></td>
                    <td><?= $row["pengarang"]; ?></td>
                    <td><?= $row["penerbit"]; ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?>" class="br">Ubah</a>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" class="br">Hapus</a>
                    </td>
                </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
</body>
</html>