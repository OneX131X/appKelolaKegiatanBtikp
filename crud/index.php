<?php
include 'koneksi.php';
$query=mysqli_query($conn, "SELECT * FROM kamar ORDER BY no_kamar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAMAR</title>
    <style>
        body{
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 .5em darkgray;
            width: 1000px;
        }
        .bt{
            padding-inline: 5px;
            border: 1px solid black;
            text-decoration: none;
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
    <h1>DATA KAMAR</h1>
    <a href="tambah.php" class="bt">Tambah</a>
    <a href="cetak.php" target="_blank" class="bt">Cetak</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Kamar</th>
                <th>Kuantitas</th>
                <th>Jenis Kamar</th>
                <th>Lantai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; 
            while ($row=mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row["no_kamar"]; ?></td>
                <td><?= $row["kuantitas"]; ?></td>
                <td><?= $row["jenis_kamar"]; ?></td>
                <td><?= $row["lantai"]; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>" class="bt">Ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" class="bt">Hapus</a>
                </td>
            </tr>
            <?php $no++;} ?>
        </tbody>
    </table>
</body>
</html>