<?php

include "config.php";

if($_POST['idx']) {

    $id = $_POST['idx'];  
   // $result = mysqli_query($conn, "SELECT * FROM tb_materi ORDER BY id_materi ASC");    

    $sql = mysqli_query($conn, "SELECT * FROM pelamar WHERE id_pelamar = '$id' ");
    //while($data = mysqli_fetch_array($result))

    while ($result = mysqli_fetch_array($sql)){
        $tgl = $result['tanggal_lahir'];
        $tanggal = date('d-m-Y', strtotime($tgl));

        ?>

        <form>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">Nama </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " . $result['nama_pelamar']; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">Jenis Kelamin </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " .$result['jenis_kelamin']; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">Tempat, Tanggal Lahir </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " . $result['tempat_lahir']. ", " . $tanggal; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">Alamat </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " . $result['alamat']; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">Agama </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " . $result['agama']; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">NO Telp </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " . $result['no_telp']; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">Pendidikan </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " . $result['pendidikan']; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="hrzn-fm">Ketrampilan </label>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                        <div class="nk-int-st">
                            <?php echo "<b>:</b> " . $result['ketrampilan']; ?>
                        </div>
                    </div>
                </div>


            </div>

        </form>     

    <?php }
}

?>