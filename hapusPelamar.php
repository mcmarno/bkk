<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id = $_GET['id'];

// Delete user row from table based on given id
$cari = mysqli_query($conn, "SELECT * FROM pelamar WHERE id_pelamar = '$id'");
$hasil = mysqli_fetch_array($cari);
$email = $hasil['email'];

if(is_file("sertifikat/".$hasil['sertifikat']))
	unlink("sertifikat/".$hasil['sertifikat']);

if(is_file("gambar/".$hasil['gambar']))
	unlink("gambar/".$hasil['gambar']);
$query = "DELETE FROM user WHERE email = '$email'";
$query1 = "DELETE FROM pelamar WHERE id_pelamar = '$id'";

$sql = mysqli_query($conn, $query);
$sql = mysqli_query($conn, $query1);

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:pelamar.php");
?>