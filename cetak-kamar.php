<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$query = "SELECT * FROM kamar ORDER BY no_kamar ASC";
$result = mysqli_query($conn, $query);

$html = '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Kamar</title>
        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #000000;
            text-align: center;
            padding: 8px;
            }

            td:nth-child(3){
                width: 30%;
            }
            tr:nth-child(even) {
            background-color: #dddddd;
            }
            .heading{
                text-align: center;
                text-decoration: underline;
            }
            .right {
                position: absolute;
                bottom: 5%;
                left: 70%;
            }
            .box {
                height: 25px;
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
    <h4 class="heading">DAFTAR KAMAR</h4>
    <table align="center" border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>No Kamar</th>
            <th>Jenis Kamar</th>
            <th>Letak Lantai</th>
            <th>Kuantitas</th>
            <th>Tersedia</th>
        </tr>';

        $i = 1;
        foreach( $result as $row ) {
            $html .= '<tr>
                    <td>'. $i++ .'</td>
                    <td>'. $row["no_kamar"] .'</td>
                    <td>'; 
                    if ($row["jenisKamar"] == "L") {
                        $html .= "Kamar Laki-laki";
                    } else {
                        $html .= "Kamar Perempuan";
                    }
            $html .= '</td>
                    <td>Lantai '. $row["letakLantai"] .'</td>
                    <td>'. $row["kuantitas"] .' orang</td>
                    <td>'; 
                    $q = mysqli_query($conn, "SELECT
                                                kamar.kuantitas, 
                                                reservasi.kamar_id 
                                                FROM kamar, reservasi 
                                                WHERE kamar.id = reservasi.kamar_id AND
                                                reservasi.kamar_id = '$row[id]'");
                    $j = mysqli_num_rows($q);
                    $qk = mysqli_query($conn, "SELECT kuantitas FROM kamar WHERE id = $row[id]");
                    $jk = mysqli_fetch_assoc($qk);
                    $html .= $jk["kuantitas"] - $j . " orang"; 
            $html .= '</td>
            </tr>';
        }
        
$html .= '</table>
        <div class="right">
            Kepala Balai Teknologi Informasi
            <br>Dan Komunikasi Pendidikan
            <br>Provinsi Kalimantan Selatan,
            <div class="box"></div>
            <b>Eksan Muhtar, S.Pd, M.Pd</b>
            <br>Penata TK.I
            <br>NIP. 19651218 198803 1 009
        </div>
    </body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-kamar', 'I');

?>
