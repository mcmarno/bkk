<?php

$id_pelamar = $_GET['id'];
$id_loker = $_GET['id_loker'];

include('config.php');
$query = mysqli_query($conn, "UPDATE pelamar_kerja SET rekrut = 1 WHERE id_loker = '$id_loker' AND id_pelamar = '$id_pelamar'");
header('location:cekPelamar.php?id='.$id_loker);
?>