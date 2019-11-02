<?php
$id_loker = $_POST['id_loker'];
$isi = $_POST['isi'];

include('config.php');
$query = mysqli_query($conn, "INSERT INTO pengumuman (id_loker, isi)VALUES('$id_loker', '$isi')");
$query1 = mysqli_query($conn, "UPDATE pelamar_kerja SET cek_view = '1' WHERE id_loker = '$id_loker'");
header('location:cekPelamar.php?id='.$id_loker);
?>