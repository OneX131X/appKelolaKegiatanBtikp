<?php
include 'koneksi.php';
$id=$_GET["id"];
$row=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kamar WHERE id=$id"));
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
        echo "<script type=text/javascript>
            alert ('DATA BERHASIL DIUBAH');
            document.location.href='index.php';
        </script>";
    }else{
        echo "<script type=text/javascript>
            alert ('DATA GAGAL DIUBAH');
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
        body{
            padding: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 .5em darkgray;
        }
        .bt{
            padding-inline: 5px;
            border: 1px solid black;
            text-decoration: none;
        }
        .item{
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Ubah Kamar</h1>
    <form action="" method="post">
        <div class="item">
            <label for="no_kamar">No Kamar</label>
            <input value="<?= $row["no_kamar"]; ?>" type="text" name="no_kamar" id="no_kamar">
        </div>
        <div class="item">
            <label for="kuantitas">kuantitas Kamar</label>
            <input value="<?= $row["kuantitas"]; ?>" type="text" name="kuantitas" id="kuantitas">
        </div>
        <div class="item">
            <label for="jenis_kamar">Jenis Kamar</label>
            <select name="jenis_kamar" id="jenis_kamar">
                <option value="">--pilih--</option>
                <option <?php if($row["jenis_kamar"]=="Pria"){ echo "selected"; } ?> value="Pria">Pria</option>
                <option <?php if($row["jenis_kamar"]=="Wanita"){ echo "selected"; } ?> value="Wanita">Wanita</option>
            </select>
        </div>
        <div class="item">
            <label for="lantai">Lantai</label>
            <select name="lantai" id="lantai">
                <option value="">--pilih--</option>
                <option <?php if($row["lantai"]=="1"){ echo "selected"; } ?> value="1">1</option>
                <option <?php if($row["lantai"]=="2"){ echo "selected"; } ?> value="2">2</option>
            </select>
        </div>
        <div class="item">
            <button type="submit" name="submit">Simpan</button>
            <a href="index.php" class="bt">batal</a>
        </div>
    </form>
</body>
</html>