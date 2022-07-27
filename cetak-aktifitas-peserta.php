<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$kegiatan = $_GET["nama_kegiatan"];
$query = "SELECT 
            peserta_aktifitas.*, 
            peserta.nama_peserta, 
            kegiatan.nama_kegiatan  
            FROM 
            peserta_aktifitas, peserta, kegiatan 
            WHERE 
            peserta.id = peserta_aktifitas.id_peserta AND
            kegiatan.id = peserta_aktifitas.id_kegiatan AND
            kegiatan.nama_kegiatan = '$kegiatan'
            ORDER BY nama_peserta ASC";
$result = mysqli_query($conn, $query);

$html = '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Peserta</title>
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
    <h4 class="heading">AKTIFITAS PESERTA <br> '.$kegiatan.'</h4>
    <table align="center" border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama Peserta</th>
            <th>Kegiatan</th>
            <th>Hari 1</th>
            <th>Hari 2</th>
            <th>Hari 3</th>
        </tr>';

        $i = 1;
        foreach( $result as $row ) {
            $html .= '<tr>
                    <td align="center">'. $i++ .'</td>
                    <td>'. $row["nama_peserta"] .'</td>
                    <td>'. $row["nama_kegiatan"] .'</td>
                    <td>'. $row["absen1"] .'</td>
                    <td>'. $row["absen2"] .'</td>
                    <td>'. $row["absen3"] .'</td>
            </tr>';
        }
        
$html .= '</table>
        <div align="right">
        <p>
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
// $mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-peserta', 'I');

?>
