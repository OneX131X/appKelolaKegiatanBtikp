<?php
include 'konek.php';
$id=$_GET["id"];
$q=mysqli_query($conn2, "SELECT * FROM kegiatan");
$r=mysqli_fetch_assoc($q);
if (isset($_POST["submit"])) {
    $nama_kegiatan=$_POST["nama_kegiatan"];
    $quota=$_POST["quota"];
    $mulai=$_POST["mulai"];
    $selesai=$_POST["selesai"];
    $simpan=mysqli_query($conn2, "UPDATE kegiatan SET 
    nama_kegiatan='$nama_kegiatan',
    quota='$quota',
    mulai='$mulai',
    selesai='$selesai'
    WHERE id='$id'");
    if ($simpan) {
        echo "<script type=text/javascript>
            alert('Data berhasil ditambah');
            document.location.href='index.php';
        </script>";
    }else{
        echo "<script type=text/javascript>
            alert('Data gagal ditambah');
            document.location.href='ubah.php?id=$id';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEGIATAN</title>
    <style>
        .isi{
            display: grid;
            border: 1px solid black;
            padding: 20px;
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            grid-template-columns: auto auto auto;
        }
        .head{
            text-align: center;
        }
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            padding: 10px;
        }
        .grid-item {
            padding: 20px;
            /* border: 1px solid black; */
        }
        .bt{
            border: 1px solid black;
            padding: 1px;
            padding-inline: 6px;
            text-decoration: none;
        }
        .bt-cont{
            /* position: absolute; */
            /* right: 12%; */
            padding-block: 2px;
            /* border: 1px solid black; */
            width: 100%;
            height: 100%;
        }
        .bt-item{
            display: grid;
            position: relative;
            justify-items: center;
            align-items: center;
            grid-template-columns: auto ;
            /* border: 1px solid black; */
            /* width: 100%; */
            margin-inline: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="isi">
        <form action="" method="post">
            <div class="head">
                <h1>TAMBAH DATA</h1>
            </div>
            <div class="grid-container">
                <div class="grid-item">
                    <label for="nama_kegiatan">Nama Kegiatan</label>
                </div>
                <div class="grid-item">:</div>
                <div class="grid-item">
                    <input value="<?= $r["nama_kegiatan"]; ?>" type="text" name="nama_kegiatan" id="nama_kegiatan">
                </div>
                <div class="grid-item">
                    <label for="quota">Quota Kegiatan</label>
                </div>  
                <div class="grid-item">:</div>
                <div class="grid-item">
                    <input value="<?= $r["quota"]; ?>" type="text" name="quota" id="quota">
                </div>
                <div class="grid-item">
                    <label for="mulai">Mulai Kegiatan</label>
                </div>
                <div class="grid-item">:</div>
                <div class="grid-item">
                    <input value="<?= $r["mulai"]; ?>" type="date" name="mulai" id="mulai">
                </div>  
                <div class="grid-item">
                    <label for="selesai">Selesai Kegiatan</label>
                </div>
                <div class="grid-item">:</div>
                <div class="grid-item">
                    <input value="<?= $r["selesai"]; ?>" type="date" name="selesai" id="selesai">
                </div>
            </div>
            <div class="bt-item">
                <div class="bt-cont">
                    <button type="submit" name="submit">Simpan</button>
                    <a class="bt" href="index.php">Batal</a>
                </div>
                <!-- <div class="bt-cont">
                </div> -->
            </div>  
        </form>
    </div>
</body>
</html>