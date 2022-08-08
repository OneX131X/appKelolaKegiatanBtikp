<?php
include "conn.php";
$id=$_GET["id"];
$data=mysqli_query($conn, "DELETE FROM activities WHERE id=$id");
if ($data) {
    echo "<script type='text/javascript'>
        alert ('Deleting Activity Success');
        document.location.href='act.php';
        </script>;";
}else{
    echo "<script type='text/javascript'>
        alert ('Deleting Activity Failed');
        document.location.href='act.php';
        </script>;";
}
?>