<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';

$id = $_GET["id"];
$query_akpes = "SELECT 
                peserta_aktifitas.*,
                peserta.nama_peserta, 
                kegiatan.nama_kegiatan, 
                kegiatan.tglMulai 
                FROM 
                peserta_aktifitas, peserta, kegiatan 
                WHERE 
                peserta.id = peserta_aktifitas.id_peserta AND 
                kegiatan.id = peserta_aktifitas.id_kegiatan AND 
                peserta_aktifitas.id_peserta = $id";
$result_akpes = mysqli_query($conn, $query_akpes);
$query_peserta = mysqli_query($conn, "SELECT nama_peserta FROM peserta WHERE id = $id");
$row_peserta = mysqli_fetch_assoc($query_peserta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Riwayat Aktifitas - <?= $row_peserta["nama_peserta"]; ?></title>
        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            /* // border: 0px; */
            }

            td, th {
            border: 1px solid #000000;
            /* // text-align: left; */
            padding: 8px;
            }
            .heading{
                text-align: center;
                /* // text-decoration: underline; */
            }
            .grid {
                display: grid;
                position: relative;
                left: 50%;
                transform: translate(-50%);
                grid-template-columns: 20% auto;
                width: 70%;
                margin-block: 1em;
            }
            .grid-item {
                padding-inline: 5px;
                /* border: 1px solid black; */
            }
            .ttd {
                margin-top: 3em;
            }
            .ttd-box {
                margin-block: 4em;
            }
        </style>
    </head>
    <body onload="print()">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3" style="text-align: center">
                    <!-- <img src="img/logoW.png" alt="logo" style="width: 80px; height: 80px; float: left; align: left"> -->
                    <img src="img/logoW.png" alt="logo" style="width: 80px; height: 80px; float: left;">
                    <b>PEMERINTAH PROVINSI KALIMANTAN SELATAN
                    <br style="font-size: larger">DINAS PENDIDIKAN
                    <br>BALAI TEKNOLOGI INFORMASI DAN KOMUNIKASI PENDIDIKAN
                    <br>Jl. Perdagangan Komplek Bumi Indah Lestari II</b>
                    <br><b>Website</b> : http://disdik-kalsel.org  <b>E-mail</b> : btikp@yahoo.co.id
                </div>
            </div>
        </div>
        <hr>
        <h4 class="heading" style="text-decoration: underline;">RIWAYAT AKTIFITAS PESERTA</h4>
        <div class="grid">
            <div class="grid-item">
                <label for="id_peserta">Nama Peserta</label>
            </div>
            <div class="grid-item">: <?= $row_peserta["nama_peserta"] ?> </div>
        </div>
        <div class="tabel">
            <table>
                <tr>
                    <td>No</td>
                    <td>Nama Kegiatan</td>
                    <td>Tanggal Mulai</td>
                </tr>
                <?php $no=1; 
                while ($row_akpes = mysqli_fetch_assoc($result_akpes)) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row_akpes["nama_kegiatan"]; ?></td>
                        <td><?= $row_akpes["tglMulai"]; ?></td>
                    </tr>
                <?php $no++;}?>
            </table>
        </div>
        <div class="ttd" align="right">
            Kepala Balai Teknologi Informasi
            <br>Dan Komunikasi Pendidikan
            <br>Provinsi Kalimantan Selatan,
            <div class="ttd-box"></div>
            <b>Eksan Muhtar, S.Pd, M.Pd</b>
            <br>Penata TK.I
            <br>NIP. 19651218 198803 1 009
        </div>
    </body>
</html>
<!-- 
$mpdf = new \Mpdf\Mpdf();
// $mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-peserta', 'I');

?> -->
