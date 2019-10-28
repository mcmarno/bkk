    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a href="loker.php">Lowongan Kerja</a>
                                </li>
                                <li><a href="profil.php">Profil</a>
                                </li>
                                <li><a href="pengumuman.php">Informasi</a>
                                </li>
                                <li><a href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <?php
    include('config.php');
    $email = $_SESSION['email'];
    $cari = mysqli_query($conn, "SELECT * FROM pelamar WHERE email = '$email'");
    $id = mysqli_fetch_array($cari);
    $id_pelamar = $id['id_pelamar'];
    $hitung = mysqli_query($conn, "SELECT SUM(cek_view) AS hitung FROM pelamar_kerja WHERE id_pelamar = '$id_pelamar'");
    $hasil = mysqli_fetch_array($hitung);

    ?>
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="loker.php"><i class="fa fa-home"></i> Lowongan Kerja</a>
                        </li>
                        <li><a href="profilPelamar.php"><i class="fa fa-user"></i> Profil</a>
                        </li>
                        <li><a href="pengumuman.php"><i class="fa fa-envelope"></i> Informasi <button class='btn btn-danger btn-sm'> <?php echo $hasil['hitung'] ?></button></a>
                        </li>
                        <li><a href="logout.php"><i class="fa fa-close"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>