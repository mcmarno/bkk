<?php
$id_loker = $_POST['id_loker'];
$isi = $_POST['isi'];

include('config.php');
$query = mysqli_query($conn, "INSERT INTO pengumuman (id_loker, isi)VALUES('$id_loker', '$isi')");
header('location:cekPelamar.php?id='.$id_loker);
?>