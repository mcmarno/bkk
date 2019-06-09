<?php
$id_loker = $_POST['id_loker'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$isi = $_POST['isi'];
$tanggal = $_POST['tanggal'];

include('config.php');
$result = mysqli_query($conn, "UPDATE loker SET nama_perusahaan = '$nama', posisi = '$posisi', isi = '$isi', tanggal_ex = '$tanggal' WHERE id_loker = '$id_loker'");
header('location:loker.php');
?>