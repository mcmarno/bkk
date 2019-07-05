<?php

$id_loker = $_POST['id_loker'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$isi = $_POST['isi'];
$tanggal = $_POST['tanggal'];

include('config.php');
$result = mysqli_query($conn, "INSERT INTO loker (id_loker, nama_perusahaan, posisi, isi, tanggal_ex)VALUES('$id_loker', '$nama', '$posisi', '$isi', '$tanggal')");
header('location:loker.php');
?>