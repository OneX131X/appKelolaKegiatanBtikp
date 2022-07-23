<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
// $nama_kegiatan = $_GET["nama_kegiatan"];
$query_reservasi = "SELECT 
reservasi.id, 
reservasi.peserta_id, 
peserta.nama_peserta, 
kamar.no_kamar, 
kamar.jenisKamar, 
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
            td:nth-child(2) {
                width: 17%;
            }
            td:nth-child(3) {
                width: 10%;
            }
            th:nth-child(3), th:nth-child(5), th:nth-child(6) {
                text-align: center;
            }
            tr:nth-child(even) {
            background-color: #dddddd;
            }
            .heading{
                text-align: center;
                text-decoration: underline;
            }
            .right {
                // position: absolute;
                // bottom: 3%;
                margin: 20px 0px 0px 70%;
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
                    <td align="center">'. $row["no_kamar"] . ' || ' . $row["jenisKamar"] .'</td>
                    <td>'. $row["nama_kegiatan"] .'</td>
                    <td>'. date("d-m-Y", strtotime($row["checkin"])) .'</td>
                    <td>'. date("d-m-Y", strtotime($row["checkout"])) .'</td>
            </tr>';
        }
        
$html .= '</table>
        <br>
        <div class="right">
            Kepala BTIKP
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
