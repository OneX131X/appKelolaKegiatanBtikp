<?php
session_start();
date_default_timezone_set('Asia/Singapore');

if (isset($_SESSION["login"])) {
    header("Location: admin/index.php");
    exit;
}

require 'koneksi.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $login_terakhir = date('Y-m-d H:i:s');

    $result = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result); 

        if (password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            $_SESSION["peran"] = $row["peran"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["id"] = $row["id"];

            if ($row["peran"] == "ADMIN") {
                //mengupdate data ke database
                $update = mysqli_query($conn, "UPDATE pengguna SET login_terakhir = '$login_terakhir' WHERE username = '$username'");
                header("Location: admin/index.php");
            } else if ($row["peran"] == "USER") {
                $update = mysqli_query($conn, "UPDATE pengguna SET login_terakhir = '$login_terakhir' WHERE username = '$username'");
                header("Location: peserta/index.php");
            } else if ($row["peran"] == "PEMATERI") {
                $update = mysqli_query($conn, "UPDATE pengguna SET login_terakhir = '$login_terakhir' WHERE username = '$username'");
                header("Location: pemateri/index.php");
            }

            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APPKelolaKegiatanBTIKP | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
      body {
        background: url('img/bangunan_btikp.jpeg'); 
        background-repeat:no-repeat; 
        background-size: cover; 
        /* margin-top: 100px;  */
        overflow: hidden; 
        backdrop-filter: blur(2px);
      }
      .bg-color {
          position: absolute;
          background: #00cc7a;
          width: 100%;
          height: 100%;
          opacity: 0.6;
      }
      .circle {
          background: #00995c;
          width: 100px;
          height: 100px;
          position: absolute;
          left: 200px;
          border-radius: 50%;
          z-index: 2;
      }
      .bar {
        background: red;
        width: 400px;
        height: 100px;
        position: absolute;
        left: 200px;
        z-index: 1;
        overflow: hidden;
      }
  </style>
</head>
<body class="hold-transition login-page">
    <!-- <div class="circle"></div>
    <div class="bar"></div> -->
    <div class="bg-color"></div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="dist/img/logo.png" alt="BTIKP Logo" style="margin-inline: 10%; line-height: .8; max-height: 80px; width: auto;">
                <h1><b>APP</b> KELOLA KEGIATAN BTIKP</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masukkan username dan password anda</p>
                <?php if (isset($error)) { ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        Username atau Password salah...!
                    </div>
                <?php } ?>
             
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-block btn-primary" name="login">Masuk</button>
                            <!-- <a href="register.php" class="btn btn-block btn-danger">Buat Akun</a> -->
                        </div>
                    </div>
                </form>

                <!-- /.social-auth-links -->

                <p class="mt-3">
                    <!-- <a href="lupa-password.php">Lupa Password?</a> -->
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
