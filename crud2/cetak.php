<?php
include 'konek.php';

$query = mysqli_query($conn2, "SELECT * FROM kegiatan");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEGIATAN</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            padding: 20px;
        }
        tr, th, td {
            border: 1px solid black;
            padding: 10px;
        }
        .tabel{
            padding: 20px;
        }
    </style>
</head>
<body onload="print()">
    <div class="index">
        <h1 align="center">DATA KEGIATAN</h1>
        <!-- <a href="tambah.php">Tambah Data</a> -->
        <div class="tabel">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Quota</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                    while ($row=mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row["nama_kegiatan"]; ?></td>
                            <td><?= $row["quota"]; ?></td>
                            <td><?= $row["mulai"]; ?></td>
                            <td><?= $row["selesai"]; ?></td>
                            <!-- <td>
                                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                                <a href="hapus.php?id=<?= $row["id"]; ?>">Hapus</a>
                            </td> -->
                        </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>