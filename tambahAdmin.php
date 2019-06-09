<?php
session_start();
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!=("admin" OR "perusahaan")){
    header("location:login.php");
}
function passAcak($panjang)
{

    $karakter = '';
    $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $karakter .= '1234567890';
    $karakter .= '@#$^*()_+=/?';

    $string = '';
    for ($i=0; $i < $panjang; $i++)
    { 
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
    }
    return $string;
}
$a = passAcak(4);
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
        }else
        {
            include('headerPerusahaan.php');
        }
        ?>
        <!-- Main Menu area End-->
        <!-- Start Status area -->
        <div class="dialog-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap mg-t-30">
                            <div class="cmp-tb-hd cmp-int-hd">
                                <h2>Tambah Data Admin</h2>
                                <p>Pastikan email perusahaan aktif agar dapat mengirim password random</p>
                            </div>
                            <form action="prosesTambahAdmin.php" method="POST">
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <input type="hidden" name="password" value="<?php echo $a; ?>">
                                            <div class="input-group">
                                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control" placeholder="Nama Admin" name="nama_admin">
                                                </div>
                                            </div>

                                            <div class="input-group mg-t-15">
                                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-house"></i></span>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                                                </div>
                                            </div>

                                            <div class="input-group mg-t-15">
                                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-windows"></i></span>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control" placeholder="NO Telp" name="no_telp">
                                                </div>
                                            </div>

                                            <div class="input-group mg-t-15">
                                                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control" placeholder="Email Address" name="email">
                                                </div>
                                            </div>

                                            <div class="fm-checkbox">
                                                <label><input type="checkbox" class="i-checks"> <i></i> Password akan dikirimkan ke email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int mg-t-15">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                               <button class="btn btn-success notika-btn-success" type="submit" title="simpan">Simpan</button>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
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
	<!-- tawk chat JS
		============================================ -->

    </body>

    </html>