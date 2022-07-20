<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';

$id = $_GET["id"];
$query_peserta = "SELECT 
peserta_daftar.*, 
kegiatan.nama_kegiatan, 
peserta.*  
FROM 
peserta_daftar, kegiatan, peserta 
WHERE 
kegiatan.id = peserta_daftar.id_kegiatan AND
peserta.id = peserta_daftar.id_peserta AND 
peserta_daftar.id_peserta = '$id'
ORDER BY nama_peserta ASC";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

$html = '<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Daftar Peserta</title>
        <style>
            table {
            font-family: arial, sans-serif;
            // border-collapse: collapse;
            width: 100%;
            border: 0px;
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
        <h4 class="heading" style="text-decoration: underline;">DETAIL PENDAFTARAN PESERTA</h4>
        <br>
        <table align="center">
            <tr>
                <td>Nama Peserta</td>
                <td>:</td>
                <td>'. $row_peserta["nama_peserta"] .'</td>
            </tr>
            <tr>
                <td>Nama Kegiatan</td>
                <td>:</td>
                <td>'. $row_peserta["nama_kegiatan"] .'</td>
            </tr>
            <tr>
                <td>Jenjang</td>
                <td>:</td>
                <td>'. $row_peserta["jenjang"] .'</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>'. $row_peserta["jabatan"] .'</td>
            </tr>
            <tr>
                <td>Golongan</td>
                <td>:</td>
                <td>'. $row_peserta["golongan"] .'</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>'. $row_peserta["agama"] .'</td>
            </tr>
            <tr>
                <td>Kab / Kota</td>
                <td>:</td>
                <td>'; 
                $kabKota = $row_peserta['kabKota']; 
                switch ($kabKota) {
                    case 'bjm':
                        $html .= "Banjarmasin";
                        break;
                    case 'bjb':
                        $html .= "Banjarbaru";
                        break;
                    case 'banjar':
                        $html .= "Banjar";
                        break;
                    case 'tapin':
                        $html .= "Tapin";
                        break;
                    case 'hss':
                        $html .= "Hulu Sungai Selatan";
                        break;
                    case 'hst':
                        $html .= "Hulu Sungai Tengah";
                        break;
                    case 'hsu':
                        $html .= "Hulu Sungai Utara";
                        break;
                    case 'balangan':
                        $html .= "Balangan";
                        break;
                    case 'tabalong':
                        $html .= "Tabalong";
                        break;
                    case 'barito kuala':
                        $html .= "Barito Kuala";
                        break;
                    case 'tanah laut':
                        $html .= "Tanah Laut";
                        break;
                    case 'tanah bumbu':
                        $html .= "Tanah Bumbu";
                        break;
                    default:
                        $html .= "Kotabaru";
                        break;
                }
            $html .= '</td>
            </tr>            
            <tr>
                <td>Unit Kerja</td>
                <td>:</td>
                <td>'. $row_peserta["asalSekolah"] .'</td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td>:</td>
                <td>'. $row_peserta["alamatSekolah"] .'</td>
            </tr>
            <tr>
                <td>No Hp</td>
                <td>:</td>
                <td>'. $row_peserta["noTelp"] .'</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>'; 
                if ($row_peserta["status_"] == "diterima"){
                    $html .='Diterima';
                } elseif ($row_peserta["status_"] == "ditolak"){
                    $html .='Ditolak';
                } else {
                    $html .='Belum Ditentukan';
                }
                $html .='</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td>'. $row_peserta["keterangan"] .'</td>
            </tr>
        </table>
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
