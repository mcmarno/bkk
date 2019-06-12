<?php
session_start();
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!=("admin")){
    header("location:login.php");
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Informasi Lowongan Kerja</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="#"><img src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <?php
    if($_SESSION['level']=="admin")
    {
        include('headerAdmin.php');
    }
    ?>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <?php
    include('config.php');
    $id = $_GET['id'];
    $hasil = mysqli_query($conn, "SELECT * FROM pelamar WHERE id_pelamar = '$id'");
    $data = mysqli_fetch_array($hasil);
    $tgl = $data['tanggal_lahir'];
    $tanggal = date('d-m-Y', strtotime($tgl));
    ?>

    <div class="dialog-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>Ubah Profil</h2>
                        </div>
                        <form action="prosesUbahPelamar.php" method="POST">
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div>
                                            <input type="hidden" name="id_pelamar" value="<?php echo $id ?>">
                                            <input type="hidden" name="tgl" value="<?php echo $tgl ?>">
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Nama</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="<?php echo $data['nama_pelamar'] ?>" name="nama_pelamar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Jenis Kelamin</label>
                                        </div>
                                        <?php $jenis_kelamin = $data['jenis_kelamin']; ?>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                           <div class="bootstrap-select fm-cmp-mg">
                                            <select name="jenis_kelamin" class="selectpicker">
                                                <option <?php echo ($jenis_kelamin == 'LAKI - LAKI') ? "selected": "" ?>>LAKI - LAKI</option>
                                                <option <?php echo ($jenis_kelamin == 'PEREMPUAN') ? "selected": "" ?>>PEREMPUAN</option>
                                          </select>
                                      </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Tempat Lahir</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="<?php echo $data['tempat_lahir'] ?>" name="tempat_lahir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="<?php echo $tanggal ?>" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="date" class="form-control input-sm" name="tanggal_lahir">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Alamat</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="<?php echo $data['alamat'] ?>" name="alamat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Agama</label>
                                        </div>
                                        <?php $agama = $data['agama']; ?>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                           <div class="bootstrap-select fm-cmp-mg">
                                            <select name="agama" class="selectpicker">
                                                <option <?php echo ($agama == 'ISLAM') ? "selected": "" ?>>ISLAM</option>
                                                <option <?php echo ($agama == 'KRISTEN') ? "selected": "" ?>>KRISTEN</option>
                                                <option <?php echo ($agama == 'HINDU') ? "selected": "" ?>>HINDU</option>
                                                <option <?php echo ($agama == 'BUDHA') ? "selected": "" ?>>BUDHA</option>
                                                <option <?php echo ($agama == 'KONGHUCU') ? "selected": "" ?>>KONGHUCU</option>
                                          </select>
                                      </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">No Telp</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="<?php echo $data['no_telp'] ?>" name="no_telp">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Pendidikan</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="<?php echo $data['pendidikan'] ?>" name="pendidikan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Ketrampilan</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" value="<?php echo $data['ketrampilan'] ?>" name="ketrampilan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-example-int mg-t-15">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                       <button class="btn btn-success notika-btn-success" type="submit" title="simpan">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2019 
. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/curvedLines.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
	
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
     <script src="js/bootstrap-select/bootstrap-select.js"></script>
	<!-- tawk chat JS
		============================================ -->
   
</body>

</html>