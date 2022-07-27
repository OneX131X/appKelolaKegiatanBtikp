<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$status_ = $_GET["status_"];
$query = "SELECT 
peserta_daftar.*, 
kegiatan.nama_kegiatan, 
peserta.* 
FROM 
peserta_daftar, kegiatan, peserta 
WHERE 
kegiatan.id = peserta_daftar.id_kegiatan AND
peserta.id = peserta_daftar.id_peserta AND 
status_ = '$status_'
ORDER BY nama_peserta ASC";
$result = mysqli_query($conn, $query);
$row_daf = mysqli_fetch_assoc($result);

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
    <h4 class="heading">DAFTAR PESERTA ';
    if ($status_ == "diterima") {
        $html .= "DITERIMA";
    } else {
        $html .= "DITOLAK";
    }
    $html .='</h4>
    <table align="center" border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama Peserta</th>
            <th>Kegiatan</th>
            <th>Jenjang</th>
            <th>Jabatan</th>
            <th>Kab/Kota</th>
            <th>Unit Kerja</th>
            <th>No. Hp</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>';

        $i = 1;
        foreach( $result as $row ) {
            $html .= '<tr>
                    <td align="center">'. $i++ .'</td>
                    <td>'. $row["nama_peserta"] .'</td>
                    <td>'. $row["nama_kegiatan"] .'</td>
                    <td>'. $row["jenjang"] .'</td>
                    <td>'. $row["jabatan"] .'</td>
                    <td>'. $row["kabKota"] .'</td>
                    <td>'. $row["asalSekolah"] .'</td>
                    <td>'. $row["noTelp"] .'</td>
                    <td>'. $row["status_"] .'</td>
                    <td>'. $row["keterangan"] .'</td>
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
$mpdf->Output('daftar-peserta-diterima', 'I');

?>
