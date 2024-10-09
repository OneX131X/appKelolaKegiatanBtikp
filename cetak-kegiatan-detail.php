<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$id = $_GET["id"];
$query = "SELECT kegiatan.nama_kegiatan, detail_kegiatan.* 
            FROM kegiatan, detail_kegiatan 
            WHERE kegiatan.id = detail_kegiatan.id_kegiatan AND 
            detail_kegiatan.id_kegiatan = '$id'";
$result = mysqli_query($conn, $query);
$rw = mysqli_fetch_array($result);

$html = '<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Detail Kegiatan</title>
            <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                line-height: 30px;
                }

                td, th {
                border: 1px solid #000000;
                text-align: center;
                padding: 8px;
                }
                td:nth-child(1) {
                    text-align: left;
                }
                th:nth-child(1) {
                    text-align: center;
                }
                .heading{
                    text-align: center;
                    text-decoration: underline;
                }
                .right {
                    position: absolute;
                    left: 68%;
                    margin-top: 20px;
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
        <h4 class="heading">DETAIL KEGIATAN</h4><br>
        <h4 align="center">'.$rw["nama_kegiatan"].'</h4>
        <table id="example1" class="table table-bordered table-striped detail">
            <thead>
                <tr>
                    <th>Aktifitas Hari I</th>
                    <th>Jam Pelatihan (JP)</th>
                </tr>
            </thead>
            <tbody>';
                $no = 1;
                $result = mysqli_query($conn, "SELECT 
                            detail_kegiatan.*, 
                            kegiatan.nama_kegiatan 
                            FROM 
                            detail_kegiatan, kegiatan 
                            WHERE 
                            kegiatan.id = detail_kegiatan.id_kegiatan AND 
                            detail_kegiatan.id_kegiatan = '$id'");
                while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>
                        <td>';
                            $arr = explode(",", $row["hari_satu"]); 
                            $tes = count($arr);
                            foreach ($arr as $i) {
                                $html .= '<b>-> </b>' . $i . '<br>';
                            }
                $html .='</td>
                        <td class="tw">
                            <div>1</div>
                            <div>2</div>
                            <div>4</div>
                        </td>
                    </tr>
                    <tr>
                        <td>'; 
                            $arr = explode(",", $row["hari_dua"]); 
                            foreach ($arr as $i) {
                                $html .= '<b>-> </b>' . $i . '<br>';
                            }
                $html .='</td>
                        <td class="tw">
                            <div>2</div>
                            <div>3</div>
                            <div>3</div>
                            <div>3</div>
                            <div>2</div>
                            <div>4</div>
                        </td>
                    </tr>
                    <tr>
                        <td>'; 
                            $arr = explode(",", $row["hari_tiga"]); 
                            foreach ($arr as $i) {
                                $html .= '<b>-> </b>' . $i . '<br>';
                            }
                $html .= '</td>
                        <td class="tw">
                            <div>2</div>
                            <div>1</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">Total JP</td>
                        <td class="tw">27</td>
                    </tr>'. 
                    $no++;
                }
    $html .='</tbody>
        </table>
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
$mpdf->Output('kegiatan-detail', 'I');

?>
