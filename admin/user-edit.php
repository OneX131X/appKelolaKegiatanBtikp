<?php
session_start();
if ($_SESSION["peran"] == "USER") {
    header("Location: logout.php");
    exit;
} elseif ($_SESSION["peran"] == "PEMATERI") {
    header("Location: logout.php");
    exit;
}
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include '../koneksi.php';

$id = $_GET["id"];
$query_psw = "SELECT * FROM pengguna WHERE id = $id";
$result_psw = mysqli_query($conn, $query_psw);
$row_psw = mysqli_fetch_assoc($result_psw);

if (isset($_POST["submit"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $peran = $_POST['peran'];
    $cek_username = mysqli_query($conn, "select * from pengguna where username='$username' and id != '$id'");

    if (mysqli_num_rows($cek_username) > 0) {
        echo "<script type='text/javascript'>
                alert('Username sudah terdaftar di sistem!'); 
                document.location.href = 'user.php;' 
                </script>";
            } else {
            $q = "update pengguna set username = '$username', password = '$password', peran = '$peran' where id = '$id'";
            $exe = mysqli_query($conn, $q);
            if ($exe){
                echo "<script type='text/javascript'>
                alert('Data pengguna berhasil diubah...!');
                document.location.href = 'user.php';
                </script>";
            }else{
                echo "<script type='text/javascript'>
                alert('Data pengguna GAGAL diubah...!');
                document.location.href = 'user-edit.php';
                </script>";        
            }
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data User | APPGAJI</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include "theme-header.php"; ?>

        <?php include "theme-sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">User</li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="username">Username :</label>
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $row_psw["username"]; ?>" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="peran">Kegiatan</label>
                                            <select name="peran" id="peran" class="form-control">
                                                <option value="">-- Pilih Peran --</option>
                                                <option value="ADMIN" <?php if ($row_psw['peran'] == 'ADMIN') echo 'selected'; ?>>ADMIN</option>
                                                <option value="USER" <?php if ($row_psw['peran'] == 'USER') echo 'selected'; ?>>USER</option>
                                                <option value="PEMATERI" <?php if ($row_psw['peran'] == 'PEMATERI') echo 'selected'; ?>>PEMATERI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary mr-1" name="submit">Simpan</button>
                                        <a href="fasilitas-kamar.php" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include "theme-footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"],
                "order": [
                    [0, "asc"]
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>