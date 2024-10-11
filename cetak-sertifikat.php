<?php
date_default_timezone_set("Asia/Makassar");
setlocale(LC_ALL, 'id_ID');

include 'koneksi.php';

$tanggal = mktime(date("m"), date("d"), date("Y"));
$nama_peserta = $_GET["nama_peserta"];
$query_peserta = "SELECT 
peserta_aktifitas.*, 
peserta.*, 
peserta_daftar.*, 
kegiatan.nama_kegiatan, 
kegiatan.tglMulai, 
kegiatan.tglSelesai, 
detail_kegiatan.*
FROM 
peserta_aktifitas, peserta, kegiatan, peserta_daftar, detail_kegiatan
WHERE 
peserta.id = peserta_aktifitas.id_peserta AND
peserta_aktifitas.id_peserta = peserta_daftar.id_peserta AND
kegiatan.id = peserta_aktifitas.id_kegiatan AND
peserta_aktifitas.id_kegiatan = detail_kegiatan.id_kegiatan AND
peserta.nama_peserta = '$nama_peserta'";
$result_peserta = mysqli_query($conn, $query_peserta);
$row_peserta = mysqli_fetch_assoc($result_peserta);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css" media="print">
        @page {
            size: landscape;
            /* auto is the initial value */
            margin: 0;
            /* this affects the margin in the printer settings */
        }

        .sertifikat {
            /* display: flex; */
            /* justify-content: center; */
            /* align-item: center; */
            margin-top: -30px;
            margin-bottom: -30px;
            font-weight: bold;
            font-size: 40px;
        }

        .tabel2 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
            width: 100%;
            height: 200px;
            line-height: 30px;
            margin-top: 40px;
        }

        .tabel2 td,
        th,
        tr {
            border: 1px solid black;
        }

        .tabel2 td,
        th {
            padding: 10px 15px 10px 15px;
        }

        .tabel2 th:nth-child(1) {
            width: 80%;
        }

        .tabel2 td:nth-child(3) {
            text-align: center;
        }

        .ttd-box {
            position: absolute;
            bottom: 14%;
            right: 41%;
        }

        .ttd {
            height: 40px;
            margin-left: 29%;
            /* border: 1px solid black; */
        }

        .bar {
            position: absolute;
            height: 71px;
            bottom: 36%;
        }

        /* .right {
            margin-left: 78%;
            margin-top: 20px;

        } */
        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            /* padding-top: 50px; */
        }

        .justify {
            text-align: justify;
        }

        body {
            background-image: url(img/sertifikat.png); 
            background-size: contain; 
            background-size: 1055px auto; 
            background-position: center 8%;
            background-repeat: no-repeat; 
            margin-left: 100px;
            margin-right: 100px;
            margin-top: 100px;
        }

        .hal-satu {
            margin-top: -40px;
            width: 1055px;
            height: 700px;
            background-color: #fcfcf0;
            background-image: url('img/sertifikat.png');
            background-size: 1055px auto;
            background-repeat: no-repeat;
            margin-left: -100px;
        }

        .hal-dua {
            margin-top: 60px;
            width: 1055px;
            height: 700px;
            /* background: grey; */
            margin-left: -100px;
        }

        .isi {
            margin: 0px 100px 0px 100px;
        }

        .text {
            padding: 50px;
        }

        .tw {
            text-align: center;
        }
    </style>
</head>

<body onload="script:window.print()">
    <div class="hal-satu">
        <div class="text">
            <div style="text-align: center">
                <img src="img/sertifikat.png" style="height: 70px; align-items: center; margin-top: 50px; display: none;">
                <img src="img/logoW.png" style="height: 70px; align-items: center; margin-top: 50px;">
                <br><span><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN
                        <br>BALAI TEKNOLOGI INFORMASI DAN KOMUNIKASI PENDIDIKAN</b></span>
            </div>
            <div class="sertifikat">
                <p align="center">SERTIFIKAT</p>
            </div>
            <div class="isi">
                Diberikan kepada
                <table style="margin-left: 70px;">
                    <tr>
                        <td style="width: 18%">Nama</td>
                        <td style="width: 2%;">:</td>
                        <td><?= $row_peserta['nama_peserta'] ?></td>
                    </tr>
                    <tr>
                        <td>Sekolah/Unit Kerja</td>
                        <td>:</td>
                        <td><?= $row_peserta['asalSekolah'] ?></td>
                    </tr>
                    <tr>
                        <td>Kabupaten/Kota</td>
                        <td>:</td>
                        <td>
                            <?php
                            $kabKota = $row_peserta['kabKota'];
                            switch ($kabKota) {
                                case 'bjm':
                                    echo "Banjarmasin";
                                    break;
                                case 'bjb':
                                    echo "Banjarbaru";
                                    break;
                                case 'banjar':
                                    echo "Banjar";
                                    break;
                                case 'tapin':
                                    echo "Tapin";
                                    break;
                                case 'hss':
                                    echo "Hulu Sungai Selatan";
                                    break;
                                case 'hst':
                                    echo "Hulu Sungai Tengah";
                                    break;
                                case 'hsu':
                                    echo "Hulu Sungai Utara";
                                    break;
                                case 'balangan':
                                    echo "Balangan";
                                    break;
                                case 'tabalong':
                                    echo "Tabalong";
                                    break;
                                case 'barito kuala':
                                    echo "Barito Kuala";
                                    break;
                                case 'tanah laut':
                                    echo "Tanah Laut";
                                    break;
                                case 'tanah bumbu':
                                    echo "Tanah Bumbu";
                                    break;
                                default:
                                    echo "Kotabaru";
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <div class="justify">
                    <p>
                        Yang Berpartisipasi Aktif Sebagai Peserta <b><?= $row_peserta['nama_kegiatan'] ?></b> yang diselenggarakan oleh BTIKP pada tanggal <?= date('d M Y', strtotime($row_peserta['tglMulai'])) ?> sampai dengan <?= date('d M Y', strtotime($row_peserta['tglSelesai'])) ?> di BTIKP KalSel Banjarmasin
                    </p>
                </div>
                <div class="ttd-box">
                    <p align="center">
                        Banjarmasin, <?= date('d M Y', $tanggal) ?> <br>
                        Kepala BTIKP, <br>
                    <div class="ttd"><img src="img/barcode.jpg" class="bar"></div>
                    <p align="center">
                        <b>Eksan Muhtar, S.Pd, M.Pd</b> <br>
                        Penata TK.I <br>
                        NIP. 19651218 198803 1 009
                </div>
            </div>
        </div>
    </div>

    <div class="hal-dua">
        <div style="padding: 50px; margin-top: 50px;">
            <p class="heading"><?= $row_peserta['nama_kegiatan'] ?></p>
            <table id="example1" class="tabel2">
                <thead>
                    <tr>
                        <th>Aktifitas Hari I</th>
                        <th class="tw">JP</th>
                        <th style="text-align: center;">Absensi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $result = mysqli_query($conn, "SELECT 
                                detail_kegiatan.*, 
                                peserta_aktifitas.*, 
                                peserta.nama_peserta, 
                                kegiatan.nama_kegiatan 
                                FROM 
                                detail_kegiatan, peserta_aktifitas, peserta, kegiatan 
                                WHERE 
                                peserta.id = peserta_aktifitas.id_peserta AND 
                                kegiatan.id = peserta_aktifitas.id_kegiatan AND 
                                peserta_aktifitas.id_kegiatan = detail_kegiatan.id_kegiatan AND 
                                peserta.nama_peserta = '$nama_peserta'");
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <?php
                                $arr = explode(",", $row["hari_satu"]);
                                $tes = count($arr);

                                foreach ($arr as $i) {
                                    echo '<b>-> </b>' . $i . '<br>';
                                }
                                ?>
                            </td>
                            <td class="tw">
                                <?php
                                $arr = explode(",", $row["jp1"]);
                                $tes = count($arr);

                                foreach ($arr as $i) {
                                    echo $i . '<br>';
                                }
                                ?>
                            </td>
                            <td><?php if ($row["absen1"] == "hadir") {
                                    echo "Hadir";
                                } else {
                                    echo "Tidak Hadir";
                                } ?></td>
                        </tr>
                        <th>Aktifitas Hari II</th>
                        <tr>
                            <td>
                                <?php
                                $arr = explode(",", $row["hari_dua"]);
                                foreach ($arr as $i) {
                                    echo '<b>-> </b>' . $i . '<br>';
                                }
                                ?>
                            </td>
                            <td class="tw">
                                <?php
                                $arr = explode(",", $row["jp2"]);
                                $tes = count($arr);

                                foreach ($arr as $i) {
                                    echo $i . '<br>';
                                }
                                ?>
                            </td>
                            <td><?php if ($row["absen2"] == "hadir") {
                                    echo "Hadir";
                                } else {
                                    echo "Tidak Hadir";
                                } ?></td>
                        </tr>
                        <th>Aktifitas Hari III</th>
                        <tr>
                            <td>
                                <?php
                                $arr = explode(",", $row["hari_tiga"]);
                                foreach ($arr as $i) {
                                    echo '<b>-> </b>' . $i . '<br>';
                                }
                                ?>
                            </td>
                            <td class="tw">
                                <?php
                                $arr = explode(",", $row["jp3"]);
                                $tes = count($arr);

                                foreach ($arr as $i) {
                                    echo $i . '<br>';
                                }
                                ?>
                            </td>
                            <td><?php if ($row["absen3"] == "hadir") {
                                    echo "Hadir";
                                } else {
                                    echo "Tidak Hadir";
                                } ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">Total JP</td>
                            <td class="tw">
                                <?php
                                // Sum jp1, jp2, and jp3 values by exploding, converting to integers, and summing them
                                $total_jp = array_sum(array_map('intval', explode(",", $row["jp1"]))) +
                                    array_sum(array_map('intval', explode(",", $row["jp2"]))) +
                                    array_sum(array_map('intval', explode(",", $row["jp3"])));
    
                                // Display the result
                                echo $total_jp;
                                ?>
                            </td>
                            <!-- <td align="right" class="mr-3" colspan="2">Nilai</td> -->
                            <td align="center">
                                <?php
                                $nilai = $row["penilaian"];
                                switch ($nilai) {
                                    case "sangat baik":
                                        echo "Sangat Baik";
                                        break;
                                    case "cukup baik":
                                        echo "Cukup Baik";
                                        break;
                                    default:
                                        echo "Baik";
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>