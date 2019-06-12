<?php

$id_loker = $_POST['id_loker'];
$id_pengumuman = $_POST['id_pengumuman'];
$isi = $_POST['isi'];

include('config.php');
$query = mysqli_query($conn, "UPDATE pengumuman SET isi = '$isi' WHERE id_pengumuman = '$id_pengumuman'");
header('location:cekPelamar.php?id='.$id_loker);
?>