<?php
session_start();
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!=("admin" OR "perusahaan" OR "pelamar")){
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
    elseif($_SESSION['level']=="perusahaan")
    {
        include('headerPerusahaan.php');
    }else
    {
        include('headerPelamar.php');
    }
    ?>
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <?php
    include('config.php');
    $a = $_SESSION['email'];
    $result = mysqli_query($conn, "SELECT * FROM perusahaan WHERE email = '$a'");
    $hasil = mysqli_fetch_array($result);
    $b = $hasil['nama_perusahaan'];
    if($_SESSION['level']==("admin" OR "pelamar"))
    {
        $query = mysqli_query($conn, "SELECT * FROM loker ORDER BY id_loker DESC");
    }
    else
    {
        $query = mysqli_query($conn, "SELECT * FROM loker WHERE nama_perusahaan = '$b' ORDER BY id_loker DESC");
    }

    ?>

     <div class="dialog-area">
        <div class="container">
            <?php
            if($_SESSION['level']==("admin" OR "perusahaan"))
            {
                "<div>
                <a href='tambahLoker.php'><button class='btn btn-primary btn-sm'>Tambah </button></a>
                </div>";
            }
            
            
            while($data = mysqli_fetch_array($query)) {
                $tgl = $data['tanggal_ex'];
                $tanggal = date('d-m-Y', strtotime($tgl));
            echo "<div class='row'>";
                echo "<div class='col-md-12'>";
                    echo "<div class='mg-t-30'>";
                            echo "<h2>".$data ['nama_perusahaan']."</h2>";
                            echo "<p><-- ".$data['posisi']." --></p>";
                            echo "<p>".$data['isi']."</p>";
                            echo "<p>berakhir pada tanggal : ".$tanggal."</p>";
                        echo "</div>";
                        echo "<div class='dialog-pro dialog'>";
                            echo "<a data-toggle='modal' data-target='#myModalone' data-id=".$data['id_loker']."><button class='btn btn-info btn-sm'>Lihat </button></a>"; ?>
                            <?php
                            if($_SESSION['level']=="admin") 
                            {
                               echo "<a href='lamarLoker.php?id=$data[id_loker]'><button class='btn btn-success btn-sm'>Lamar </button></a>";
                            }
                            elseif($_SESSION['level']=="pelamar") 
                            {
                                echo "<a href='lamarLokerPelamar.php?id=$data[id_loker]'><button class='btn btn-success btn-sm'>Lamar </button></a>";
                            }
                            else
                            {
                              echo "<a href='cekPelamar.php?id=$data[id_loker]'><button class='btn btn-success btn-sm'>Pelamar </button></a>";
                            }?>
                            <?php
                            if($_SESSION['level']!="pelamar")
                            {
                            echo "<a href='ubahLoker.php?id=$data[id_loker]'><button class='btn btn-warning btn-sm'>Ubah </button></a>
                              <a href='hapusLoker.php?id=$data[id_loker]'><button class='btn btn-danger btn-sm'>Hapus </button></a>";
                            
                            }
                             ?>
                            <?php
                         echo   "</div>";
                echo "</div>";
            echo "</div>";
        }
            ?>
        </div>
    </div>

    <div class="modal fade" id="myModalone" role="dialog">
        <div class="modal-dialog modals-default" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    <script type="text/javascript">
    $(document).ready(function(){
        $('#myModalone').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
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