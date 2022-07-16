<?php
date_default_timezone_set("Asia/Makassar");
setlocale(LC_ALL, 'id_ID');

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';

$tanggal= mktime(date("m"),date("d"),date("Y"));
$id = $_GET["id"];
$query_peserta = "SELECT 
peserta_aktifitas.*, 
peserta.*, 
peserta_daftar.*, 
kegiatan.nama_kegiatan  
FROM 
peserta_aktifitas, peserta, kegiatan, peserta_daftar
WHERE 
peserta.id = peserta_aktifitas.id_peserta AND
peserta_aktifitas.id_peserta = peserta_daftar.id_peserta AND
kegiatan.id = peserta_aktifitas.id_kegiatan AND
peserta_aktifitas.id = '$id'";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

// $query = "SELECT * FROM peserta ORDER BY nama_peserta ASC";
// $result = mysqli_query($conn, $query);

$html = '<!DOCTYPE html>
<html lang="en">
    <head>
        <style>

        .sertifikat {
            // display: flex;
            // justify-content: center;
            // align-item: center;
            margin-top: -25px;
            font-weight: bold;
            font-size: 40px;
        }
        table {
            margin-left: 70px;
            width: 100%;
        }
        td:nth-child(1) {
            width: 18%;
        }
        td:nth-child(2) {
            width: 2%;
        }
        .ttd {
            height: 50px;
            margin-left: 80%;
            border: 1px solid black;
        }

        .right {
            margin-left: 80%;
            margin-top: 20px;

        }
        </style>
    </head>
    <body style="margin-top: -100px;">
    <div style="background: url(img/sertifikat.png); margin-left: -50px; margin-right: -50px; margin-top: -1000px; background-size: cover; background-repeat: no-repeat;" >
        <div class="kop" style="text-align: center">
            <img src="img/logoW.png" style="height: 70px; align-item: center; margin-top: 50px;">
            <br><span><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN
            <br>BALAI TEKNOLOGI INFORMASI DAN KOMUNIKASI PENDIDIKAN</b></span>
        </div>
        <div class="sertifikat">
            <p align="center">SERTIFIKAT</p>
        </div>
        <div>
            Diberikan kepada
            <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>' . $row_peserta['nama_peserta'] . '</td>
            </tr>
            <tr>
                <td>Sekolah/Unit Kerja</td>
                <td>:</td>
                <td>' . $row_peserta['asalSekolah'] . '</td>
            </tr>
            <tr>
                <td>Kabupaten/Kota</td>
                <td>:</td>
                <td>' . $row_peserta['kabKota'] .'</td>
            </tr>
            </table>
            <div style="text-align: center;">
                <p>
                    Yang Berpartisipasi Aktif Sebagai Peserta <b>' . $row_peserta['nama_kegiatan'] . '</b> yang diselenggarakan oleh BTIKP pada tanggal ... di BTIKP KalSel Banjarmasin
                </p>
            </div>
            </div>
            <p class="right">
                Banjarmasin, ' . date('d M Y', $tanggal) .' <br>
                Kepala BTIKP, <br>
                <div class="ttd"></div>
            <p class="right">
                <b>Eksan Muhtar, S.Pd, M.Pd</b> <br>
                Penata TK.I <br>
                NIP. 19651218 198803 1 009
            </div>
        </div>

        </div>



        <div style="page-break-before: always">
            <p>' . $row_peserta['nama_kegiatan'] . '</p>
        </div>

    </body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output('sertifikat-peserta', 'I');

?>


