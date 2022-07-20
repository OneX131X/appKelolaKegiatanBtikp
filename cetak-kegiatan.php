<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$query = "SELECT * FROM kegiatan ORDER BY nama_kegiatan ASC";
$result = mysqli_query($conn, $query);

$html = '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Kegiatan</title>
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
            td:nth-child(1), td:nth-child(5), td:nth-child(6), td:nth-child(7) {
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
                position: absolute;
                bottom: 3%;
                left: 70%;
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
    <h4 class="heading">DAFTAR KEGIATAN</h4>
    <table align="center" border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama kegiatan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Jumlah Sesi</th>
            <th>Quota</th>
            <th>Quota Tersedia</th>
        </tr>';

        $i = 1;
        foreach( $result as $row ) {
            $html .= '<tr>
                    <td>'. $i++ .'</td>
                    <td>'. $row["nama_kegiatan"] .'</td>
                    <td>'. date("m-d-Y", strtotime($row["tglMulai"])) .'</td>
                    <td>'. date("m-d-Y", strtotime($row["tglSelesai"])) .'</td>
                    <td>'; 
                        $q = mysqli_query($conn, "SELECT kegiatan.id, detail_kegiatan.* 
                        FROM kegiatan, detail_kegiatan 
                        WHERE kegiatan.id = detail_kegiatan.id_kegiatan 
                        AND detail_kegiatan.id_kegiatan = '$row[id]'");
                        while ($r = mysqli_fetch_array($q)) {
                            $ex1 = count(explode(",", $r["hari_satu"]));
                            $ex2 = count(explode(",", $r["hari_dua"]));
                            $ex3 = count(explode(",", $r["hari_tiga"]));
                            $jSesi = $ex1 + $ex2 + $ex3;
                            if (!$jSesi) {
                                $html .= '-';
                            } else {
                                $html .= $jSesi;
                            }
                        }
            $html .= '</td> 
                    <td>'. $row["quota"] .'</td>
                    <td>';
                    $q = mysqli_query($conn, "SELECT 
                                                kegiatan.id, 
                                                peserta.id_kegiatan 
                                                FROM 
                                                kegiatan, peserta 
                                                WHERE 
                                                kegiatan.id = peserta.id_kegiatan AND 
                                                peserta.id_kegiatan = '$row[id]'");
                    $j = mysqli_num_rows($q);
                    $qq = mysqli_query($conn, "SELECT quota FROM kegiatan WHERE id = $row[id]");
                    $jq = mysqli_fetch_assoc($qq);
                    $html .= $jq["quota"] - $j; 
            $html .= '</td>
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
// $mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-kegiatan', 'I');

?>
