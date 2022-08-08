<?php
include "koneksi.php";
$id=$_GET["id"];
$q=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kamar WHERE id=$id"));
if (isset($_POST["submit"])) {
    $no_kamar=$_POST["no_kamar"];
    $kuantitas=$_POST["kuantitas"];
    $jenis_kamar=$_POST["jenis_kamar"];
    $lantai=$_POST["lantai"];
    $simpan=mysqli_query($conn, "UPDATE kamar SET 
    no_kamar='$no_kamar',
    kuantitas='$kuantitas',
    jenis_kamar='$jenis_kamar',
    lantai='$lantai'
    WHERE id=$id");
    if ($simpan) {
        echo "<script type='text/javascript'>
            alert ('Data berhasil ditambah');
            document.location.href='index.php'; 
            </script>";
    }else{
        echo "<script type='text/javascript'>
            alert ('Data berhasil ditambah');
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
    <title>KAMAR</title>
    <style>
        .isi{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid black;
            padding: 20px;
        }
        .box{
            display: grid;
            grid-template-columns: auto auto;
        }
        .item{
            padding: 10px;
        }
        .bt{
            border: 1px solid black;
            padding-inline: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="isi">
            <div class="box">
                <div class="item">
                    <label for="no_kamar">No Kamar</label>
                </div>
                <div class="item">
                    <input value="<?= $q["no_kamar"]; ?>" type="text" name="no_kamar" id="no_kamar">
                </div>
                <div class="item">
                    <label for="kuantitas">Kuantitas</label>
                </div>
                <div class="item">
                    <input value="<?= $q["kuantitas"]; ?>" type="text" name="kuantitas" id="kuantitas">
                </div>
                <div class="item">
                    <label for="jenis_kamar">Jenis Kamar</label>
                </div>
                <div class="item">
                    <select name="jenis_kamar" id="jenis_kamar">
                        <option value="">--pilih--</option>
                        <option <?php if($q["jenis_kamar"]=="Pria"){ echo "selected"; } ?> value="Pria">Pria</option>
                        <option <?php if($q["jenis_kamar"]=="Wanita"){ echo "selected"; } ?> value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="item">
                    <label for="lantai">Lantai</label>
                </div>
                <div class="item">
                    <select name="lantai" id="lantai">
                        <option value="">--pilih--</option>
                        <option <?php if($q["lantai"]=="1"){ echo "selected"; } ?> value="1">1</option>
                        <option <?php if($q["lantai"]=="2"){ echo "selected"; } ?> value="2">2</option>
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" name="submit">Simpan</button>
                <a href="index.php" class="bt">Batal</a>
            </div>
        </div>
    </form>
</body>
</html>