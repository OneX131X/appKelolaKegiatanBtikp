<?php
include "koneksi.php";
$q=mysqli_query($conn, "SELECT * FROM kamar ORDER BY no_kamar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAMAR</title>
    <style>
        .isi{
            /* position: absolute; */
            /* top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); */
            /* border: 1px solid black; */
            padding: 20px;
        }
        .bt{
            border: 1px solid black;
            padding-inline: 5px;
            text-decoration: none;
        }
        table{
            margin-top: 10px;
            border-collapse: collapse;
            width: 100%;
        }
        tr, td, th{
            padding: 10px;
            border: 1px solid black;
            margin: 10px;
        }
    </style>
</head>
<body onload="print()">
    <div class="isi">
        <h1>DATA KAMAR</h1>
        <!-- <div>
            <a href="tambah.php" class="bt">Tambah</a>
            <a href="cetak.php" class="bt">Cetak</a>
        </div> -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Kamar</th>
                    <th>Kuantitas</th>
                    <th>Jenis Kamar</th>
                    <th>Lantai</th>
                    <!-- <th>Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $no=1;
                while ($row=mysqli_fetch_assoc($q)) { ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["no_kamar"]; ?></td>
                    <td><?= $row["kuantitas"]; ?></td>
                    <td><?= $row["jenis_kamar"]; ?></td>
                    <td><?= $row["lantai"]; ?></td>
                    <!-- <td>
                        <div>
                            <a href="ubah.php?id=<?= $row["id"]; ?>" class="bt">Ubah</a>
                            <a href="hapus.php?id=<?= $row["id"]; ?>" class="bt">Hapus</a>
                        </div>
                    </td> -->
                </tr>
                <?php $no++; }?>
            </tbody>
        </table>
    </div>
</body>
</html>