<?php

$id_loker = $_GET['id'];
include('config.php');
$query = mysqli_query($conn, "UPDATE pengumuman SET cekview = 0 WHERE id_loker = '$id_loker'");
header('location:lihatPengumuman.php?id='.$id_loker);
?>