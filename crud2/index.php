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
        }
        tr, th, td {
            border: 1px solid black;
            padding: 15px;
        }
        .tabel{
            padding-block: 20px;
        }
        .index{
            border: 1px solid black;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 1000px;
        }
        .bt{
            border: 1px solid black;
            /* border-radius: 100vw; */
            padding: 2px;
            padding-inline: 10px;
            text-decoration: none;
        }
        .bt-con{
            display: grid;
            grid-template-columns: auto auto ;
            /* padding: 10px; */
            width: 22%;
        }
        .bt-con-t{
            display: grid;
            grid-template-columns: auto auto ;
            /* padding: 10px; */
            width: 70%;
        }
        /* .grid{ */
            /* border: 1px solid black; */
            /* width: 20%; */
            /* padding: 10px; */
        /* } */
    </style>
</head>
<body>
    <div class="index">
        <h1>DATA KEGIATAN</h1>
        <div class="bt-con">
            <div class="grid">
                <a href="tambah.php" class="bt">Tambah Data</a>
            </div>
            <div class="grid">
                <a href="cetak.php" target="_blank" class="bt">Cetak Data</a>
            </div>
        </div>
        <div class="tabel">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Quota</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Aksi</th>
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
                            <td>
                                <div class="bt-con-t">
                                    <div>
                                        <a class="bt" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                                    </div>
                                    <div>
                                        <a class="bt" href="hapus.php?id=<?= $row["id"]; ?>">Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>