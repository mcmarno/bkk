<?php

include "config.php";

if($_POST['idx']) {

    $id = $_POST['idx'];  
   // $result = mysqli_query($conn, "SELECT * FROM tb_materi ORDER BY id_materi ASC");    

    $sql = mysqli_query($conn, "SELECT * FROM loker WHERE id_loker = '$id' ");
    //while($data = mysqli_fetch_array($result))

    while ($result = mysqli_fetch_array($sql)){
        $tgl = $result['tanggal_ex'];
        $tanggal = date('d-m-Y', strtotime($tgl));

        ?>

        <form>

            <div class="form-group">

                <h3><label><?php echo $result['nama_perusahaan']; ?></label></h3>

            </div>

            <div class="form-group">

                <?php 
                echo "<-- ".$result['posisi']." -->";
                echo "<p>".$result['isi']."</p>";
                echo "<p>berakhir pada tanggal : ".$tanggal."</p>"; ?>
            </div>

        </form>     

    <?php }
 }

    ?>