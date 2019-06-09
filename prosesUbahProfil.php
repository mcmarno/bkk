<?php
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id = $_POST['id'];
$id_user = $_POST['id_user'];

include('config.php');
$query = "UPDATE perusahaan SET nama_perusahaan = '$nama', alamat = '$alamat', no_telp = '$no_telp', email = '$email' WHERE id_perusahaan = '$id'";
$query1 = "UPDATE user SET email = '$email' WHERE id_user = '$id_user' ";
$result = mysqli_query($conn, $query);
$result = mysqli_query($conn, $query1);
header('location:profil.php');
?>