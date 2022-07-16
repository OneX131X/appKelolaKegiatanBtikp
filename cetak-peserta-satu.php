<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';

$id = $_GET["id"];
$query_peserta = "SELECT 
peserta.*, 
kegiatan.nama_kegiatan  
FROM 
peserta, kegiatan
WHERE 
kegiatan.id = peserta.id_kegiatan AND
peserta.id = $id
ORDER BY nama_peserta ASC";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

// $query = "SELECT * FROM peserta ORDER BY nama_peserta ASC";
// $result = mysqli_query($conn, $query);

$html = '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Peserta</title>
        <style>
            .kartu {
                border: 1px solid black;
                padding: 25px;
                height: 500px;
                // box-sizing: border-box;
            }
            table {
                font-family: arial, sans-serif;
                // border-collapse: collapse;
                width: 100%;
                border: 0px;
            }

            .nama {
                width: 500px;
                border: 1px solid black;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                margin-left: 23%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            td, th {
                border: 0px solid #000000;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
            // background-color: #dddddd;
            }
            .heading{
                text-align: center;
                // text-decoration: underline;
            }
            .heading-nama{
                margin-left: 30%;
                text-align: center;
                font-size: 20px;
                border: 1px solid black;
                width: 40%;
                height: 10%;
                padding-block: 10%;
            }

            .item {
                text-align: center;
            }

            .ttd {
                margin-top: 48px;
            }

            .right {
                text-align: right;
            }

        </style>
    </head>
    <body>
        <div class="kartu">
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
            <h4 class="heading" style="text-decoration: underline; font-size: 21; margin-bottom: 20px;">KARTU PESERTA</h4>
            <h4 class="heading" style="font-size: 16;">'. $row_peserta["nama_kegiatan"] .'</h4>
            <br>
            <div class="nama">
                <p style="margin-bottom: -5px;">'. $row_peserta["nama_peserta"] .'<div style="margin-bottom: 25px;">NIK : '. $row_peserta["nik"] .'</div></p>
            </div>
            <div class="item">
                <p>Asal Sekolah : <br>'. $row_peserta["asalSekolah"] .'</p>
            </div>
            <p class="right">Kepala Balai Teknologi Informasi <br>
                Dan Komunikasi Pendidikan <br>
                Provinsi Kalimantan Selatan, <br>
            <p class="ttd right">
                <b>Eksan Muhtar, S.Pd, M.Pd</b> <br>
                Penata TK.I <br>
                NIP. 19651218 198803 1 009
            </div>
    </body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output('daftar-peserta', 'I');

?>

<html>
    <head>
        <style>
            .heading {
                align-items: center;
            }
        </style>
    </head>
</html>
