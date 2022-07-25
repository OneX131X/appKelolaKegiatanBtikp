 <!-- Main Sidebar Container -->
 <aside class="main-sidebar elevation-4" style="background-color: #33805d; color: white;">
            <!-- Brand Logo -->
            <a href="../admin/index.php" class="brand-link" style="text-align: center; color: white;">
            <img src="../dist/img/logo.png" alt="BTIKP Logo" style="margin-inline: 10%; line-height: .8; max-height: 60px; width: auto;">
                <!-- <i class="fas fa-hotel"></i> -->
                <span class="brand-text" style="font-weight: normal;"> <br> APP Kelola Kegiatan BTIKP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div> -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="color: white;">
                        
                        <li class="nav-item">
                            <a href="index.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>Kamar</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="kamar.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon fas fa-door-closed ml-3"></i>
                                        <p>Data Kamar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="reservasi.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon fas fa-pencil-alt ml-3"></i>
                                        <p>Reservasi Kamar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="fasilitas-kamar.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon far fa-dot-circle ml-3"></i>
                                        <p>Fasilitas Kamar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="peserta.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Peserta</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="peserta.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon far fa-dot-circle ml-3"></i>
                                        <p>Registrasi Peserta</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="data-peserta.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon far fa-dot-circle ml-3"></i>
                                        <p>Data Peserta</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pendaftaran-peserta.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon far fa-dot-circle ml-3"></i>
                                        <p>Pendaftaran Peserta</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="aktifitas-peserta.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon far fa-dot-circle ml-3"></i>
                                        <p>Aktifitas Peserta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="kegiatan.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-stream"></i>
                                <p>Kegiatan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="kegiatan.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon far fa-dot-circle ml-3"></i>
                                        <p>Data Kegiatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="kegiatan-diikuti.php" class="nav-link" style="color: white;">
                                        <i class="nav-icon far fa-dot-circle ml-3"></i>
                                        <p>Data Kegiatan Diikuti</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="pegawai.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        
                        <li class="user-panel mt-1 pb-1 mb-1 d-flex" style="color: white;"></li>
                        <li class="nav-item">
                            <a href="user.php" class="nav-link" style="color: white;">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>User</p>
                            </a>
                        </li>
                        

                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-sliders-h"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="karyawan.php" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Karyawan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="gaji.php" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    Gaji
                                </p>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-print"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="cetak-kamar.php" class="nav-link">
                                        <i class="fas fa-circle nav-icon ml-3"></i>
                                        <p>Cetak Kamar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="cetak-reservasi.php" class="nav-link">
                                        <i class="fas fa-circle nav-icon ml-3"></i>
                                        <p>Cetak Reservasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="cetak-peserta.php" class="nav-link">
                                        <i class="fas fa-circle nav-icon ml-3"></i>
                                        <p>Cetak Peserta</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="cetak-kegiatan.php" class="nav-link">
                                        <i class="fas fa-circle nav-icon ml-3"></i>
                                        <p>Cetak Kegiatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="cetak-pegawai.php" class="nav-link">
                                        <i class="fas fa-circle nav-icon ml-3"></i>
                                        <p>Cetak Pegawai</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                    
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>