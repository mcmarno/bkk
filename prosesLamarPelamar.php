<?php
$id = $_GET['id'];
$i = $_GET['id_loker'];


include('config.php');

$sql = mysqli_query($conn, "SELECT * FROM pelamar_kerja WHERE id_loker = '$i' AND id_pelamar = '$id'");
//$hasil = mysqli_fetch_array($sql);
$sama = mysqli_num_rows($sql);


if($sama > 0 ){
	header('location:lamarLokerPelamar.php?id='.$i);
}else{
	$query = mysqli_query($conn, "INSERT INTO pelamar_kerja (id_loker, id_pelamar)VALUES('$i', '$id')");
	header('location:lamarLokerPelamar.php?id='.$i);
}

?>