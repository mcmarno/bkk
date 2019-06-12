<?php
$id = $_GET['id'];
$id_loker = $_GET['id_loker'];

include('config.php');
$query = mysqli_query($conn, "DELETE FROM pelamar_kerja WHERE id_pel = '$id'");
header('location:lamarLoker.php?id='.$id_loker);
?>