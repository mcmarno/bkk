<?php
$id_pelamar = $_POST['id_pelamar'];
$nama_pelamar = $_POST['nama_pelamar'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$no_telp = $_POST['no_telp'];
$pendidikan = $_POST['pendidikan'];
$ketrampilan = $_POST['ketrampilan'];

if (empty($_POST['tanggal_lahir']))
{
	$tanggal_lahir = $_POST['tgl'];
}
else
{
	$tanggal_lahir = $_POST['tanggal_lahir'];
}

include('config.php');
$result = mysqli_query($conn, "UPDATE pelamar SET nama_pelamar = '$nama_pelamar', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', agama = '$agama', no_telp = '$no_telp', pendidikan = '$pendidikan', ketrampilan = '$ketrampilan' WHERE id_pelamar = '$id_pelamar'");
header('location:pelamar.php');
?>