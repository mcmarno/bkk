<?php 
session_start();

    // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login.php");
}
if($_SESSION['level']!="admin") {
    header("location:login.php");
}

?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Media pembelajaran online komputer dan jaringan dasar</title>
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
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
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
    else
    {
        include('headerPerusahaan.php');
    }
    ?>
    <!-- Main Menu area End-->
    <!-- Start Status area -->

    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
   
    <!-- End Sale Statistic area-->
    <!-- Start Email Statistic area-->
    
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
    
    <!-- Breadcomb area End-->
    <!-- Normal Table area Start-->
    <?php
    include_once "config.php";
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM pelamar_kerja WHERE id_loker = '$id'");
    $cari = mysqli_fetch_array($result);
    $cari1 = $cari['id_pelamar'];
    $ketemu = mysqli_query($conn, "SELECT * FROM pelamar LEFT JOIN pelamar_kerja USING(id_pelamar) WHERE id_loker = '$id' ORDER BY nama_pelamar ASC" );
    $query = mysqli_query($conn, "SELECT * FROM loker WHERE id_loker = '$id'");
    $sql = mysqli_query($conn, "SELECT * FROM pelamar ORDER BY nama_pelamar ASC");
    $hasil = mysqli_fetch_array($query);
    ?>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Data Pelamar</h2>

                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Ketrampilan</th>
                                        <th>Pendidikan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php  
                                 while($dat = mysqli_fetch_array($sql)) {
                                    echo"<tr>";
                                    echo "<td>" .$dat['nama_pelamar']. "</td>";
                                    echo "<td>" .$dat['ketrampilan']. "</td>";
                                    echo "<td>" .$dat['pendidikan']. "</td>";
                                     echo "<td>
                                     <a href='prosesLamar.php?id=$dat[id_pelamar]&&id_loker=$hasil[id_loker]'><button class='btn btn-success btn-sm fa fa-plus'></button></a>
                                     <a data-toggle='modal' data-target='#myModalone' data-id=".$dat['id_pelamar']."><button class='btn btn-info btn-sm'>Lihat </button></a></td>";
                                    echo"</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   



    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Data Pelamar Yang Melamar ke <?php echo $hasil['nama_perusahaan'] ?> sebagai <?php echo $hasil['posisi'] ?></h2>
                            
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php  
                                    while($data = mysqli_fetch_array($ketemu)) {
                                        echo"<tr>";
                                        echo "<td>" .$data['nama_pelamar']. "</td>";
                                        echo "<td><a href='hapusLamarLoker.php?id=$data[id_pel]&&id_loker=$id'><button title='hapus' class='btn btn-danger btn-sm fa fa-trash'> hapus </button></a></td>";
                                        echo"</tr>";
                                    }
                                    ?>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
    <!--  Chat JS
        ============================================ -->
    <script src="js/chat/moment.min.js"></script>
    <script src="js/chat/jquery.chat.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
        ============================================ -->
    
    <script src="js/data-table/data-table-act.js"></script>
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myModalone').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detailPelamar.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
</body>

</html>