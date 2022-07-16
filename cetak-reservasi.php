<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$query_reservasi = "SELECT 
reservasi.id, 
reservasi.peserta_id, 
peserta.nama_peserta, 
kamar.no_kamar, 
kegiatan.nama_kegiatan, 
reservasi.checkin, 
reservasi.checkout  
FROM 
reservasi, peserta, kamar, kegiatan 
WHERE 
peserta.id = reservasi.peserta_id AND 
kamar.id = reservasi.kamar_id AND 
kegiatan.id = reservasi.kegiatan_id
ORDER BY
no_kamar ASC";
$result_reservasi = mysqli_query($conn, $query_reservasi);

$html = '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Reservasi</title>
        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
            .heading{
                text-align: center;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3" style="text-align: center">
                    <img src="img/logoW.png" alt="logo" style="width: 80px; height: 80px; float: left; align: left">
                    <b>PEMERINTAH PROVINSI KALIMANTAN SELATAN
                    <br style="font-size: larger">DINAS PENDIDIKAN
                    <br>BALAI TEKNOLOGI INFORMASI DAN KOMUNIKASI PENDIDIKAN
                    <br>Jl. Perdagangan Komplek Bumi Indah Lestari II</b>
                    <br><b>Website</b> : http://disdik-kalsel.org  <b>E-mail</b> : btikp@yahoo.co.id
                </div>
            </div>
        </div>
    <hr>
    <h4 class="heading">DAFTAR RESERVASI</h4>
    <table align="center" border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama Peserta</th>
            <th>No Kamar</th>
            <th>Nama Kegiatan</th>
            <th>Check In</th>
            <th>Check Out</th>
        </tr>';

        $i = 1;
        foreach( $result_reservasi as $row ) {
            $html .= '<tr>
                    <td align="center">'. $i++ .'</td>
                    <td>'. $row["nama_peserta"] .'</td>
                    <td align="center">'. $row["no_kamar"] .'</td>
                    <td>'. $row["nama_kegiatan"] .'</td>
                    <td>'. $row["checkin"] .'</td>
                    <td>'. $row["checkout"] .'</td>
            </tr>';
        }
        
$html .= '</table>
        <div align="right">
        <p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </p>
            Kepala Balai Teknologi Informasi
            <br>Dan Komunikasi Pendidikan
            <br>Provinsi Kalimantan Selatan,
            <br>
            <br>
            <br>
            <br>
            <b>Eksan Muhtar, S.Pd, M.Pd</b>
            <br>Penata TK.I
            <br>NIP. 19651218 198803 1 009
        </div>
    </body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-peserta', 'I');

?>
