<?php

$nama_pelamar = $_POST['nama_pelamar'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$no_telp = $_POST['no_telp'];
$pendidikan = $_POST['pendidikan'];
$ketrampilan = $_POST['ketrampilan'];

include 'config.php';
$query = mysqli_query($conn, "INSERT INTO pelamar (nama_pelamar, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, agama, no_telp, pendidikan, ketrampilan)VALUES('$nama_pelamar', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$agama', '$no_telp', '$pendidikan', '$ketrampilan')");
header('location:pelamar.php');
?>